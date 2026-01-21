<?php

namespace App\Domains\Auth\Http\Requests\Backend\User;

use Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EditUserRequest.
 */
class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user()) {
            return !($this->user->isAdmin() && !$this->user()->isAdmin());
        } else if ($this->user()->hasManagerAccess()) {
            return !($this->user->isManager() && !$this->user()->isManager());
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
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
