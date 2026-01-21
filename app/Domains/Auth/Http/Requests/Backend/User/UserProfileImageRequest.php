<?php

namespace App\Domains\Auth\Http\Requests\Backend\User;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class UserProfileImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ! ($this->user->isMasterAdmin() && ! $this->user()->isMasterAdmin());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'profilImg' => ['required', 'file', 'mimes:jpeg,png,bmp,gif,svg', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'profilImg.required' => 'Please upload a profile image.',
            'profilImg.file' => 'The uploaded file must be an image.',
            'profilImg.mimes' => 'The file must be a jpeg, png, bmp, gif, or svg image.',
            'profilImg.max' => 'The maximum allowed size for the profile image is 2MB.',
        ];
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__('Only the administrator can update this user.'));
    }
}
