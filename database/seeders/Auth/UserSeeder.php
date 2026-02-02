<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();
        $roles = [
            ['type' => User::TYPE_ADMIN, 'name' => 'Administrator'],
            ['type' => User::TYPE_USER, 'name' => 'Manager'],
            ['type' => User::TYPE_USER, 'name' => 'Owner'],
            ['type' => User::TYPE_USER, 'name' => 'Agent'],
            ['type' => User::TYPE_USER, 'name' => 'Tenant'],
        ];
        foreach ($roles as $role) {
            Role::create([
                'type' => $role['type'],
                'name' => $role['name'],
            ]);
        }

        if (app()->environment('local', 'testing')) {
            $userDetails = [
                ['type' => User::TYPE_ADMIN, 'first_name' => 'Liam', 'last_name' => 'Smith', 'email' => 'admin@yopmail.com', 'role' => 'Administrator'],
                ['type' => User::TYPE_USER, 'first_name' => 'Noah', 'last_name' => 'Johnson', 'email' => 'manager@yopmail.com', 'role' => 'Manager'],
                ['type' => User::TYPE_USER, 'first_name' => 'Oliver', 'last_name' => 'Williams', 'email' => 'owner@yopmail.com', 'role' => 'Owner'],
                ['type' => User::TYPE_USER, 'first_name' => 'James', 'last_name' => 'Brown', 'email' => 'agent@yopmail.com', 'role' => 'Agent'],
                ['type' => User::TYPE_USER, 'first_name' => 'Emma', 'last_name' => 'Jones', 'email' => 'tenant@yopmail.com', 'role' => 'Tenant'],
            ];
            $addresses = [
                ['city' => 'Toronto', 'country' => 'CA', 'address_line1' => '123 Queen St W', 'address_line2' => 'Suite 100', 'postal_code' => 'M5H 3M9', 'state' => 'ON'],
                ['city' => 'Vancouver', 'country' => 'CA', 'address_line1' => '456 Granville St', 'address_line2' => 'Apt 202', 'postal_code' => 'V6C 1T1', 'state' => 'BC'],
                ['city' => 'Montreal', 'country' => 'CA', 'address_line1' => '789 Rue Sainte-Catherine O', 'address_line2' => 'Unit 3', 'postal_code' => 'H3B 1B5', 'state' => 'QC'],
                ['city' => 'Calgary', 'country' => 'CA', 'address_line1' => '101 9 Ave SW', 'address_line2' => 'Floor 2', 'postal_code' => 'T2P 1J9', 'state' => 'AB'],
                ['city' => 'Ottawa', 'country' => 'CA', 'address_line1' => '111 Sussex Dr', 'address_line2' => 'Building A', 'postal_code' => 'K1N 1J1', 'state' => 'ON'],
            ];
            foreach ($userDetails as $key => $value) {
                if (! User::where('email', $value['email'])->exists()) {
                    $user = User::create([
                        'type' => $value['type'],
                        'name' => $value['first_name'] . ' ' . $value['last_name'],
                        'first_name' => $value['first_name'],
                        'last_name' => $value['last_name'],
                        'email' => $value['email'],
                        'phone' => generateRandomPhoneNumber('CA'),
                        'password' => Hash::make('Secret@321$'),
                        'email_verified_at' => now(),
                        'timezone' => config('app.timezone'),
                        'active' => true,

                        'city' => $addresses[$key]['city'],
                        'country' => $addresses[$key]['country'],
                        'address_line1' => $addresses[$key]['address_line1'],
                        'address_line2' => $addresses[$key]['address_line2'],
                        'postal_code' => $addresses[$key]['postal_code'],
                        'state' => $addresses[$key]['state'],
                    ]);
                    $customerDetails = [
                        'name' => $user->name,
                        'email' => $user->email,
                        'phone' => $user->phone,
                        'address' => [
                            'line1' => $addresses[$key]['address_line1'],
                            'line2' => $addresses[$key]['address_line2'],
                            'city' => $addresses[$key]['city'],
                            'state' => $addresses[$key]['state'],
                            'postal_code' => $addresses[$key]['postal_code'],
                            'country' => $addresses[$key]['country'],
                        ],
                    ];
                    if (env('STRIPE_SECRET')) {
                        try {
                            $user->createAsStripeCustomer($customerDetails);
                        } catch (\Exception $e) {
                            \Log::error("Stripe Customer Creation Error: " . $e->getMessage());
                        }
                    }
                    $user->assignRole($value['role']);
                }
            }
        }
        $this->enableForeignKeys();
    }
}
function generateRandomPhoneNumber(string $countryCode): string
{
    switch (strtoupper($countryCode)) {
        case 'CA':
            $areaCode = rand(200, 999);
            $firstPart = rand(200, 999);
            $secondPart = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

            return "+1-$areaCode-$firstPart-$secondPart";
        default:
            return '';
    }
}
