<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Events\Role\RoleCreated;
use App\Domains\Auth\Events\Role\RoleDeleted;
use App\Domains\Auth\Events\Role\RoleUpdated;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class RoleService.
 */
class RoleService extends BaseService
{
    /**
     * RoleService constructor.
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    /**
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Role
    {
        DB::beginTransaction();
        try {
            $role = $this->model::create(['type' => $data['type'], 'name' => $data['name']]);
            $permissions = $data['permissions'] ?? [];
            $validPermissions = Permission::whereIn('id', $permissions)->pluck('id');
            $role->syncPermissions($validPermissions);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new GeneralException(__('There was a problem creating the role.'));
        }
        event(new RoleCreated($role));
        DB::commit();
        return $role;
    }

    /**
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Role $role, array $data = []): Role
    {
        DB::beginTransaction();
        try {
            $roleData = [
                'type' => $data['type'] ?? $role->type,
                'name' => $data['name'] ?? $role->name,
            ];
            $role->update($roleData);
            $permissions = $data['permissions'] ?? [];
            $validPermissions = Permission::whereIn('id', $permissions)->pluck('id');
            $role->syncPermissions($validPermissions);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            throw new GeneralException(__('There was a problem updating the role.'));
        }
        event(new RoleUpdated($role));
        DB::commit();
        return $role;
    }

    /**
     * @throws GeneralException
     */
    public function destroy(Role $role): bool
    {
        if ($role->users()->count()) {
            throw new GeneralException(__('You can not delete a role with associated users.'));
        }
        if ($this->deleteById($role->id)) {
            event(new RoleDeleted($role));
            return true;
        }
        throw new GeneralException(__('There was a problem deleting the role.'));
    }
}
