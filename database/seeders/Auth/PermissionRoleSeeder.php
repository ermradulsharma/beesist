<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();
        // Admin Permission
        $adminPermissions = [
            ['name' => 'admin.access.user.list', 'description' => 'View Users'],
            ['name' => 'admin.access.user.deactivate', 'description' => 'Deactivate Users'],
            ['name' => 'admin.access.user.reactivate', 'description' => 'Reactivate Users'],
            ['name' => 'admin.access.user.clear-session', 'description' => 'Clear User Sessions'],
            ['name' => 'admin.access.user.impersonate', 'description' => 'Impersonate Users'],
            ['name' => 'admin.access.user.change-password', 'description' => 'Change User Passwords'],
        ];
        $admin = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.user',
            'description' => 'All User Permissions',
        ]);
        foreach ($adminPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $admin->children()->saveMany([$permission]);
        }

        // User Permission
        $userPermissions = [
            ['name' => 'user.access.user.list', 'description' => 'View Users'],
            ['name' => 'user.access.user.deactivate', 'description' => 'Deactivate Users'],
            ['name' => 'user.access.user.reactivate', 'description' => 'Reactivate Users'],
            ['name' => 'user.access.user.clear-session', 'description' => 'Clear User Sessions'],
            ['name' => 'user.access.user.impersonate', 'description' => 'Impersonate Users'],
            ['name' => 'user.access.user.change-password', 'description' => 'Change User Passwords']
        ];
        $user = Permission::create([
            'type' => User::TYPE_USER,
            'name' => 'user.access.user',
            'description' => 'All User Permissions',
        ]);
        foreach ($userPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_USER,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $user->children()->saveMany([$permission]);
        }

        // Properties Permission
        $propertyPermissions = [
            ['name' => 'user.access.property.list', 'description' => 'list Property'],
            ['name' => 'user.access.property.create', 'description' => 'Create Property'],
            ['name' => 'user.access.property.store', 'description' => 'Store Property'],
            ['name' => 'user.access.property.edit', 'description' => 'Edit Property'],
            ['name' => 'user.access.property.update', 'description' => 'Update Property'],
            ['name' => 'user.access.property.delete', 'description' => 'Delete Property'],
            ['name' => 'user.access.property.view', 'description' => 'View Property']
        ];
        $property = Permission::create([
            'type' => User::TYPE_USER,
            'name' => 'user.access.property',
            'description' => 'All Property Permissions',
        ]);
        foreach ($propertyPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_USER,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $property->children()->saveMany([$permission]);
        }

        // Buildings Permission
        $buildingPermissions = [
            ['name' => 'user.access.building.list', 'description' => 'list Building'],
            ['name' => 'user.access.building.create', 'description' => 'Create Building'],
            ['name' => 'user.access.building.store', 'description' => 'Store Building'],
            ['name' => 'user.access.building.edit', 'description' => 'Edit Building'],
            ['name' => 'user.access.building.update', 'description' => 'Update Building'],
            ['name' => 'user.access.building.delete', 'description' => 'Delete Building'],
            ['name' => 'user.access.building.view', 'description' => 'View Building']
        ];
        $building = Permission::create([
            'type' => User::TYPE_USER,
            'name' => 'user.access.building',
            'description' => 'All Building Permissions',
        ]);
        foreach ($buildingPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_USER,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $building->children()->saveMany([$permission]);
        }

        // Buildings Requets Permission
        $buildingRequestPermissions = [
            ['name' => 'user.access.building.request.list', 'description' => 'list Building Request'],
            ['name' => 'user.access.building.request.create', 'description' => 'Create Building Request'],
            ['name' => 'user.access.building.request.edit', 'description' => 'Edit Building Request'],
            ['name' => 'user.access.building.request.delete', 'description' => 'Delete Building Request'],
            ['name' => 'user.access.building.request.view', 'description' => 'View Building Request'],
            ['name' => 'user.access.building.request.approve', 'description' => 'Approve Building Request'],
            ['name' => 'user.access.building.request.cancel', 'description' => 'Cancel Building Request'],
            ['name' => 'user.access.building.request.decline', 'description' => 'Decline Building Request'],
        ];
        $buildingRequest = Permission::create([
            'type' => User::TYPE_USER,
            'name' => 'user.access.building.request',
            'description' => 'All Building Request Permissions',
        ]);
        foreach ($buildingRequestPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_USER,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $buildingRequest->children()->saveMany([$permission]);
        }

        // Showing Permission
        $showingPermissions = [
            ['name' => 'user.access.showing.list', 'description' => 'Schedule Showings List'],
            ['name' => 'user.access.showing.create', 'description' => 'Create Schedule Showings'],
            ['name' => 'user.access.showing.edit', 'description' => 'Edit Schedule Showings'],

            ['name' => 'user.access.showing.scheduled.list', 'description' => 'List Scheduled Showings'],
            ['name' => 'user.access.showing.scheduled.edit', 'description' => 'Edit Scheduled Showings'],
            ['name' => 'user.access.showing.scheduled.approve', 'description' => 'Approve Scheduled Showings'],
            ['name' => 'user.access.showing.scheduled.reject', 'description' => 'Reject Scheduled Showings Request'],
            ['name' => 'user.access.showing.scheduled.remove', 'description' => 'Remove Scheduled Showings Request'],

            ['name' => 'user.access.showing.request.list', 'description' => 'List Showings Request'],
            ['name' => 'user.access.showing.request.edit', 'description' => 'Edit Showings Request'],
            ['name' => 'user.access.showing.request.approve', 'description' => 'Approve Showings Request'],
            ['name' => 'user.access.showing.request.reject', 'description' => 'Reject Showings Request'],
            ['name' => 'user.access.showing.request.remove', 'description' => 'Remove Showings Request'],

            ['name' => 'user.access.showing.scheduleMultiple', 'description' => 'Schedule multiple showings'],

            ['name' => 'user.access.showing.questions', 'description' => 'View asked questions'],
            ['name' => 'user.access.showing.questions.list', 'description' => 'List asked questions'],

        ];
        $showing = Permission::create([
            'type' => User::TYPE_USER,
            'name' => 'user.access.showing',
            'description' => 'All Showing Permissions',
        ]);
        foreach ($showingPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_USER,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $showing->children()->saveMany([$permission]);
        }

        // Rental Application Permission
        $rentalPermissions = [
            ['name' => 'user.access.rental.list', 'description' => 'All Rental Application List'],
            ['name' => 'user.access.rental.create', 'description' => 'Create Rental Application'],
            ['name' => 'user.access.rental.edit', 'description' => 'Edit Rental Application'],
            ['name' => 'user.access.rental.view', 'description' => 'View Leas Rental Application'],
            ['name' => 'user.access.rental.application.view', 'description' => 'View Rental Application'],
            ['name' => 'user.access.rental.aggrement.send', 'description' => 'Send Tenancy Agreement Application'],
            ['name' => 'user.access.rental.resume', 'description' => 'Resume Rental Application'],
            ['name' => 'user.access.rental.delete', 'description' => 'Delete Rental Application'],

            ['name' => 'user.access.rental.screening.list', 'description' => 'All Rental Application Screening Question'],
            ['name' => 'user.access.rental.screening.create', 'description' => 'Create Rental Application Screening Question'],
            ['name' => 'user.access.rental.screening.edit', 'description' => 'Edit Rental Application Screening Question'],
            ['name' => 'user.access.rental.screening.view', 'description' => 'View Rental Application Screening Question'],
            ['name' => 'user.access.rental.screening.delete', 'description' => 'Delete Rental Application Screening Question']
        ];
        $application = Permission::create([
            'type' => User::TYPE_USER,
            'name' => 'user.access.rental',
            'description' => 'All Rental Application Permissions',
        ]);
        foreach ($rentalPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_USER,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $application->children()->saveMany([$permission]);
        }

        // Property Management Aggreement Permission
        $pmaPermissions = [
            ['name' => 'user.access.pma.send', 'description' => 'Send PMA Form'],
            ['name' => 'user.access.pma.copy', 'description' => 'Copy PMA Form Link'],
            ['name' => 'user.access.pma.manually', 'description' => 'PMA Form filled by Property Manager'],

            ['name' => 'user.access.pma.list', 'description' => 'Property Management Aggreement List'],
            ['name' => 'user.access.pma.create', 'description' => 'Add Property Management Aggreement Manually'],
            ['name' => 'user.access.pma.pdf', 'description' => 'View PDF Property Management Aggreement'],
            ['name' => 'user.access.pma.form', 'description' => 'View Property Management Aggreement Form'],
            ['name' => 'user.access.pma.agent', 'description' => 'Agent Signature on Property Management Aggreement'],
            ['name' => 'user.access.pma.info', 'description' => 'View Property Management Aggreement Property Infomation'],
            ['name' => 'user.access.pma.approve', 'description' => 'Approved Property Management Aggreement'],
            ['name' => 'user.access.pma.decline', 'description' => 'Decline Property Management Aggreement'],
        ];
        $application = Permission::create([
            'type' => User::TYPE_USER,
            'name' => 'user.access.pma',
            'description' => 'All Property Management Aggreement Permission',
        ]);
        foreach ($pmaPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_USER,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $application->children()->saveMany([$permission]);
        }

        // Tenancy Aggreement Permission
        $tenancyPermissions = [
            ['name' => 'user.access.tenancy.list', 'description' => 'Tenancy Agreement List'],
            ['name' => 'user.access.tenancy.add', 'description' => 'Create Tenancy Agreement'],
            ['name' => 'user.access.tenancy.edit', 'description' => 'Edit Tenancy Agreement'],
            ['name' => 'user.access.tenancy.view', 'description' => 'View Tenancy Agreement'],
            ['name' => 'user.access.tenancy.reject', 'description' => 'Reject Tenancy Agreement'],
            ['name' => 'user.access.tenancy.delete', 'description' => 'Delete Tenancy Agreement'],
            ['name' => 'user.access.tenancy.agreement', 'description' => 'Download Agreement Tenancy Agreement'],
            ['name' => 'user.access.tenancy.disclosure', 'description' => 'Download Disclosure Tenancy Agreement'],
            ['name' => 'user.access.tenancy.applicant', 'description' => 'Add Tenant Applicant'],
            ['name' => 'user.access.tenancy.tenant', 'description' => 'Tenant Applicant List'],
            ['name' => 'user.access.tenancy.notice', 'description' => 'Tenant End Notice List'],
        ];
        $application = Permission::create([
            'type' => User::TYPE_USER,
            'name' => 'user.access.tenancy',
            'description' => 'All Tenancy Aggreement Permission Permission',
        ]);
        foreach ($tenancyPermissions as $key => $permissionData) {
            $permission = new Permission([
                'type' => User::TYPE_USER,
                'name' => $permissionData['name'],
                'description' => $permissionData['description'],
                'sort' => $key + 1,
            ]);
            $application->children()->saveMany([$permission]);
        }

        $this->enableForeignKeys();
    }
}
