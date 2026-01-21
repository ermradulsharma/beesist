<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRoleTableSeeder.
 */
class UserRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();
        $adminUser = User::where('type', User::TYPE_ADMIN)->first();
        if ($adminUser) {
            $adminRole = config('boilerplate.access.role.admin');
            $adminUser->assignRole($adminRole);
            $permissions = Permission::all();
            $adminUser->syncPermissions($permissions);
            $adminUser->save();
        }
        // User::where('type', User::TYPE_ADMIN)->first()->assignRole(config('boilerplate.access.role.admin'));
        // $permissions = Permission::all();
        // User::where('type', User::TYPE_ADMIN)->first()->syncPermissions($permissions);
        $this->enableForeignKeys();
    }

    private function disableForeignKeys()
    {
        if (config('database.default') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }
    }

    private function enableForeignKeys()
    {
        if (config('database.default') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
