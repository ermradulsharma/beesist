<?php

namespace App\Domains\Auth\Http\Controllers\Backend\User;

use App\Domains\Auth\Http\Requests\Backend\User\EditUserPasswordRequest;
use App\Domains\Auth\Http\Requests\Backend\User\UpdateUserPasswordRequest;
use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;

/**
 * Class UserPasswordController.
 */
class UserPasswordController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * UserPasswordController constructor.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return mixed
     */
    public function edit(EditUserPasswordRequest $request, User $user)
    {
        return view('backend.auth.user.change-password')
            ->withUser($user);
    }

    /**
     * @return mixed
     *
     * @throws \Throwable
     */
    public function update(UpdateUserPasswordRequest $request, User $user)
    {
        $this->userService->updatePassword($user, $request->validated());

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('The user\'s password was successfully updated.'));
    }
}
