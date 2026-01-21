<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Events\User\UserLoggedIn;
use App\Rules\Captcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController.
 */
class LoginController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    /**
     * Validate the user login request.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => ['required', 'max:255', 'string'],
            'password' => ['required', 'string', 'max:100'],
            'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
        ], [
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ]);
    }

    /**
     * Overidden for 2FA
     * https://github.com/DarkGhostHunter/Laraguard#protecting-the-login.
     *
     * Attempt to log the user into the application.
     *
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        try {
            return $this->guard()->attempt($this->credentials($request), $request->filled('remember'));
        } catch (HttpResponseException $exception) {
            $this->incrementLoginAttempts($request);
            throw $exception;
        }
    }

    /**
     * The user has been authenticated.
     *
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (!$user->isActive()) {
            Auth::logout();
            return redirect()->route('frontend.auth.login')->withFlashDanger(__('Your account has been deactivated.'));
        }
        event(new UserLoggedIn($user));

        if (! $request->ajax() && $user->hasrole('Property Manager') && $user->subscriptions()->active()->count() < 1) {
            return redirect()->route('frontend.price');
        }

        if (config('boilerplate.access.user.single_login')) {
            Auth::logoutOtherDevices($request->password);
        }
    }

    public function rentalApplicationLogin(Request $request)
    {
        $this->validateLogin($request);
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->rentalApplicationSendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function rentalApplicationSendLoginResponse($request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        $user = $this->guard()->user();
        $userRoleName = optional($user->role)->name;
        $newCsrfToken = csrf_token();

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }
        $userObj = Auth::user();
        $setupIntent = $userObj->createSetupIntent();

        $customerId = $user->stripe_id;
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $subscriptions = $stripe->subscriptions->all([
            'customer' => $customerId,
            'status' => 'active',
        ]);

        return response([
            'message' => 'Login successful',
            'success' => true,
            'token' => $newCsrfToken,
            'userRole' => $userRoleName,
            'intent' => $setupIntent,
            'subscription' => count($subscriptions->data) ?? '0',
        ]);
    }
}
