<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Exceptions\GeneralException;
use App\Models\Company;
use App\Notifications\SendVerificationCodeNotification;
use App\Rules\Captcha;
use Carbon\Carbon;
use DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\Leads\Entities\UserEntity;
use Str;

/**
 * Class RegisterController.
 */
class RegisterController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * RegisterController constructor.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);
        $roles = Role::whereNotIn('name', ['Administrator', 'Agent'])->get();

        return view('frontend.auth.register', compact('roles'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $nameValidation = ['required', 'string', 'max:100',];
        $emailValidation = ['required', 'string', 'email', 'max:255', Rule::unique('users'),];
        $passwordValidation = array_merge(['max:16', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*?&]/',], Password::min(8)->mixedCase()->numbers()->symbols());
        $captchaValidation = ['required_if:captcha_status,true', new Captcha,];
        if (isset($data['name'])) {
            $nameValidationRules = ['name' => $nameValidation];
        } else {
            $nameValidationRules = ['first_name' => $nameValidation, 'last_name' => $nameValidation];
        }

        return Validator::make($data, array_merge($nameValidationRules, ['email' => $emailValidation, 'password' => $passwordValidation, 'terms' => ['required', 'in:1'], 'g-recaptcha-response' => $captchaValidation]), ['terms.required' => __('You must accept the Terms & Conditions.'), 'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha'])]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Domains\Auth\Models\User|mixed
     *
     * @throws \App\Domains\Auth\Exceptions\RegisterException
     */
    protected function create(array $data)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        return $this->userService->registerUser($data);
    }

    public function rentalApplicationRegister(Request $request)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:13'],
            'email' => ['required', 'email', 'unique:users,email', 'email:rfc,dns'],
            'password' => ['required', 'string', 'max:16', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/'],
            'terms' => ['required', 'in:1'],
            'captcha' => ['required_if:captcha_status,true', new Captcha],
        ];

        $messages = [
            'first_name.required' => __('Please enter first name.'),
            'last_name.required' => __('Please enter last name.'),
            'phone.required' => __('Please enter phone number.'),
            'email.required' => __('Please enter email address.'),
            'email.unique' => __('This :attribute has already been taken.'),
            'email.email' => __('Please enter a valid email address.'),
            'password.required' => __('Please enter a password.'),
            'password.max' => __('Password must not exceed :max characters.'),
            'password.confirmed' => __('The password confirmation does not match.'),
            'password.regex' => __('Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.'),
            'terms.required' => __('You must accept the Terms & Conditions to proceed.'),
            'captcha.required_if' => __('The :attribute field is required when captcha is enabled.'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'status' => 422, 'success' => false], 422);
        }
        try {
            DB::beginTransaction();
            event(new Registered($user = $this->create($request->all())));
            if ($response = $this->registered($request, $user)) {
                return $response;
            }
            if ($request->prop_id && $request->roles[0] == 'Tenant') {
                $name = $user->name;
                $id = $user->id;
                $user->update(['email_verified_at' => now(), 'slug' => Str::slug($name) . '-' . $id]);
                $accountId = UserEntity::where(['entity_key' => 'property', 'entity_value' => $request->prop_id])->first()->account_id;
                userEntity($accountId, 'Tenant', $user->id);
            }
            $this->guard()->login($user);
            $setupIntent = $user->createSetupIntent();
            $newCsrfToken = csrf_token();
            DB::commit();
            return response(['data' => $user, 'token' => $newCsrfToken, 'intent' => $setupIntent, 'message' => 'User Register successful', 'status' => 200, 'success' => true], 200);
        } catch (\Exception $th) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating this user. Please try again.'));
        }
    }

    public function verifyEmail(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users,email|email:rfc,dns',
        ];
        $messages = [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response(['error' => $validator->errors()->first(), 'status' => 422, 'success' => false], 422);
        }
        $otp = '123456';
        $user = new User(['email' => $request->email]);
        $data = [
            'subject' => appName() . ' - Verification Code',
            'message' => 'Your verification code is ' . $otp,
        ];
        try {
            $user->notify(new SendVerificationCodeNotification($data));
            Session::put('code', $otp);

            return response(['email' => $request->email, 'code' => $otp, 'status' => 200, 'success' => true], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response(['error' => 'Failed to send verification code', 'status' => 500, 'success' => false], 500);
        }
    }

    public function subscriptionRegistration(Request $request)
    {
        $rules = [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'company' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:13'],
            'email' => ['required', 'email', 'unique:users,email', 'regex:/^[\w\.\+-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,6}$/', 'email:rfc,dns'],
            'password' => ['required', 'string', 'max:16', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/'],
            'terms' => ['required', 'in:1'],
            'captcha' => ['required_if:captcha_status,true', new Captcha],
        ];

        $messages = [
            'first_name.required' => __('Please enter first name.'),
            'last_name.required' => __('Please enter last name.'),
            'company.required' => __('Please enter company name.'),
            'phone.required' => __('Please enter phone number.'),
            'email.required' => __('Please enter email address.'),
            'email.unique' => __('This :attribute has already been taken.'),
            'email.email' => __('Please enter a valid email address.'),
            'email.regex' => __('Please enter a valid email address.'),
            'password.required' => __('Please enter a password.'),
            'password.max' => __('Password must not exceed :max characters.'),
            'password.confirmed' => __('The password confirmation does not match.'),
            'password.regex' => __('Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.'),
            'terms.required' => __('You must accept the Terms & Conditions to proceed.'),
            'captcha.required_if' => __('The :attribute field is required when captcha is enabled.'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'status' => 422, 'success' => false], 422);
        }

        try {
            DB::beginTransaction();
            event(new Registered($user = $this->create($request->all())));
            if ($response = $this->registered($request, $user)) {
                return $response;
            }
            if ($request->roles[0] == 'Property Manager') {
                $user->update(['email_verified_at' => Carbon::now(), 'slug' => Str::slug($user->name) . '-' . $user->id]);
                if ($request->isVerified) {
                    Company::create([
                        'user_id' => $user->id,
                        'name' => $request->company ?? 'For Rent Central',
                        'email' => $request->company_email ?? $user->email,
                    ]);
                }
            }

            $this->guard()->login($user);
            $setupIntent = $user->createSetupIntent();
            DB::commit();
            return response(['intent' => $setupIntent, 'message' => 'Registration successful', 'status' => 200, 'success' => true], 200);
        } catch (\Exception $th) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating this user. Please try again.'));
        }
    }
}
