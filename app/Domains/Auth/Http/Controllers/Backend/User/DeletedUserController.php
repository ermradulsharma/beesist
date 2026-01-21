<?php

namespace App\Domains\Auth\Http\Controllers\Backend\User;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;

/**
 * Class DeletedUserController.
 */
class DeletedUserController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * DeletedUserController constructor.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.user.deleted');
    }

    /**
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function update(User $deletedUser)
    {
        $this->userService->restore($deletedUser);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('The user was successfully restored.'));
    }

    /**
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(User $deletedUser)
    {
        abort_unless(config('boilerplate.access.user.permanently_delete'), 404);

        $this->userService->destroy($deletedUser);

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('The user was permanently deleted.'));
    }
}
