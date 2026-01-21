<?php

namespace App\Domains\Auth\Http\Controllers\Backend\User;

use App\Domains\Auth\Http\Requests\Backend\User\DeleteUserRequest;
use App\Domains\Auth\Http\Requests\Backend\User\EditUserRequest;
use App\Domains\Auth\Http\Requests\Backend\User\StoreUserRequest;
use App\Domains\Auth\Http\Requests\Backend\User\UpdateUserRequest;
use App\Domains\Auth\Http\Requests\Backend\User\UserProfileImageRequest;
use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\PermissionService;
use App\Domains\Auth\Services\RoleService;
use App\Domains\Auth\Services\UserService;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController.
 */
class UserController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var RoleService
     */
    protected $roleService;

    /**
     * @var PermissionService
     */
    protected $permissionService;

    /**
     * UserController constructor.
     */
    public function __construct(UserService $userService, RoleService $roleService, PermissionService $permissionService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.auth.user.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.auth.user.create')
            ->withRoles($this->roleService->get())
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions());
    }

    /**
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreUserRequest $request)
    {
        $routeName = Auth::user()->hasAllAccess() ? 'user' : 'agent';
        $requestData = $request->validated();
        if(Auth::user()->hasManagerAccess()){
            $requestData['type'] = 'user';
            $requestData['roles'] = ['Agent'];
        }
        $user = $this->userService->store($requestData);
        return redirect()->route(rolebased() . '.auth.' . $routeName . '.show', $user)->withFlashSuccess(__('The user was successfully created.'));
    }

    /**
     * @return mixed
     */
    public function show(User $user)
    {
        return view('backend.auth.user.show')->withUser($user);
    }

    /**
     * @return mixed
     */
    public function edit(EditUserRequest $request, User $user)
    {
        return view('backend.auth.user.edit')->withUser($user)
            ->withRoles($this->roleService->get())
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions())
            ->withUsedPermissions($user->permissions->modelKeys());
    }

    /**
     * @return mixed
     *
     * @throws \Throwable
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $routeName = Auth::user()->hasAllAccess() ? 'user' : 'agent';
        $this->userService->update($user, $request->validated());
        return redirect()->route(rolebased() . '.auth.' . $routeName . '.show', $user)->withFlashSuccess(__('The user was successfully updated.'));
    }

    /**
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function destroy(DeleteUserRequest $request, User $user)
    {
        $routeName = Auth::user()->hasAllAccess() ? 'user' : 'agent';
        $this->userService->delete($user);
        return redirect()->route(rolebased() . '.auth.' . $routeName . '.deleted')->withFlashSuccess(__('The user was successfully deleted.'));
    }

    public function profileImage(UserProfileImageRequest $request, User $user)
    {
        $authUser = Auth::user();
        $routeName = $authUser->hasAllAccess() ? 'user' : 'agent';
        $this->userService->profileImage($user, $request->validated());
        return back()->withUser($user)->withFlashSuccess(__('The user was successfully upload Profile.'));
    }
}
