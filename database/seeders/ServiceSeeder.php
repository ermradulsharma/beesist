<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageService;
use App\Models\Service;
use Carbon\Carbon;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    use DisableForeignKeys;
    use TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->disableForeignKeys();
        $this->truncate(PackageService::class);
        $this->truncate(Package::class);
        $this->truncate(Service::class);
        $packages = [
            ['title' => 'Bronze', 'description' => 'Our Bronze subscription tier offers essential features tailored to meet your needs without overwhelming you with unnecessary extras.', 'total_property_limit' => '10', 'amount' => '45.00', 'status' => '1'],
            ['title' => 'Silver', 'description' => 'Our Silver subscription tier offers essential features tailored to meet your needs without overwhelming you with unnecessary extras.', 'total_property_limit' => '20', 'amount' => '75.00', 'status' => '1'],
            ['title' => 'Gold', 'description' => 'Our Gold subscription tier offers essential features tailored to meet your needs without overwhelming you with unnecessary extras.', 'total_property_limit' => '30', 'amount' => '120.00', 'status' => '1'],
            ['title' => 'Platinum', 'description' => 'Our Platinum subscription tier offers essential features tailored to meet your needs without overwhelming you with unnecessary extras.', 'total_property_limit' => '50', 'amount' => '150.00', 'status' => '1'],
        ];

        $bronzeService = [
            ['Unlimited Tenants'],
            ['Properties'],
            ['Agent Accounts'],
            ['Tenant Screening & Criminal History'],
            ['Online Property Advertisement'],
            ['Tenant Email & SMS Notifications'],
        ];
        $silverService = [
            ['Unlimited Tenants'],
            ['Properties'],
            ['Agent Accounts'],
            ['Tenant Screening & Criminal History'],
            ['Online Property Advertisement'],
            ['Tenant Email & SMS Notifications'],
        ];
        $goldService = [
            ['Unlimited Tenants'],
            ['Properties'],
            ['Agent Accounts'],
            ['Tenant Screening & Criminal History'],
            ['Online Property Advertisement'],
            ['Tenant Email & SMS Notifications'],
            ['Property & Tenant Accounting'],
        ];
        $platinumService = [
            ['Unlimited Tenants'],
            ['Properties'],
            ['Agent Accounts'],
            ['Automatic Reminders'],
            ['Tenant Screening & Criminal History'],
            ['Online Property Advertisement'],
            ['Tenant Email & SMS Notifications'],
            ['Property & Tenant Accounting'],
        ];
        $services = array_unique(array_merge($bronzeService, $silverService, $goldService, $platinumService), SORT_REGULAR);
        $now = Carbon::now();
        foreach ($services as $service) {
            $serviceObj = new Service();
            $serviceObj->title = $service[0];
            $serviceObj->status = '1';
            $serviceObj->created_at = Carbon::now();
            $serviceObj->updated_at = Carbon::now();
            $serviceObj->save();
        }

        foreach ($packages as $package) {
            $packageObj = new Package();
            $packageObj->title = $package['title'];
            $packageObj->slug = Str::slug($package['title']);
            $packageObj->description = $package['description'];
            $packageObj->total_property_limit = $package['total_property_limit'];
            $packageObj->amount = $package['amount'];
            $packageObj->status = $package['status'];
            $packageObj->created_at = Carbon::now();
            if ($packageObj->save()) {
                $packageServices = [];
                switch ($package['title']) {
                    case 'Bronze':
                        $packageServices = $bronzeService;

                        break;
                    case 'Silver':
                        $packageServices = $silverService;

                        break;
                    case 'Gold':
                        $packageServices = $goldService;

                        break;
                    case 'Platinum':
                        $packageServices = $platinumService;

                        break;
                }
                foreach ($packageServices as $service) {
                    $serviceObj = Service::where('title', $service[0])->first();
                    if ($serviceObj) {
                        $packageServiceObj = new PackageService();
                        $packageServiceObj->package_id = $packageObj->id;
                        $packageServiceObj->service_id = $serviceObj->id;
                        $packageServiceObj->save();
                    }
                }
                $features = [];
                foreach ($packageServices as $service) {
                    $serviceObj = Service::where('title', $service[0])->first();
                    $features[] = ['name' => $serviceObj->title];
                }

                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
                $product = $stripe->products->create([
                    'name' => $packageObj->title,
                    'description' => $packageObj->description,
                    'metadata' => [
                        'property_limit' => (string)$packageObj->total_property_limit,
                        'features' => json_encode($features),
                    ],
                ]);

                $price = $stripe->prices->create([
                    'product' => $product->id,
                    'unit_amount' => $packageObj->amount * 100,
                    'currency' => 'usd',
                    'recurring' => [
                        'interval' => 'month',
                    ],
                ]);
                $packageObj->update([
                    'stripe_product_id' => $product->id,
                    'stripe_price_id' => $price->id,
                ]);
            }
        }
        $this->enableForeignKeys();
    }
}
