<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Log;
use Str;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.subscription.package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($package = null)
    {
        $services = Service::get();
        return view('backend.subscription.package.create', compact('package', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required',
            'total_property_limit' => 'required',
            'amount' => 'required',
            'services' => 'required',
            'status' => 'required',
            'description' => 'required|max:180',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
            'total_property_limit.required' => 'The total property limit field is required.',
            'amount.required' => 'The amount field is required.',
            'services.required' => 'The services field is required.',
            'status.required' => 'The status field is required.',
            'description.required' => 'The description field is required.',
            'description.max' => 'The description may not be greater than 180 characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first(), 'errors' => $validator->errors()], 422);
        }

        $requestData = $request->all();
        $requestData['slug'] = Str::slug($requestData['title']);
        $serviceIds =  $requestData['services'];
        unset($requestData['services']);
        $package = Package::create($requestData);
        $package->packageServices()->sync($serviceIds);

        $features = [];
        foreach ($package->packageServices as $service) {
            $features[] = ['name' => $service->title];
        }

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $product = $stripe->products->create([
            'name' => $package->title,
            'description' => $package->description,
            'metadata' => [
                'property_limit' => (string)$package->total_property_limit,
                'features' => json_encode($features)
            ]
        ]);

        $price = $stripe->prices->create([
            'product' => $product->id,
            'unit_amount' => $package->amount,
            'currency' => 'usd',
            'recurring' => [
                'interval' => 'month',
            ],
        ]);
        $package->update([
            'stripe_product_id' => $product->id,
            'stripe_price_id' => $price->id
        ]);
        return redirect()->route('admin.subscription.packages.index')->withFlashSuccess(__('Package Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $selectedServices = $package->services;
        $services = Service::get();
        return view('backend.subscription.package.create', compact('package', 'services', 'selectedServices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $requestData = $request->all();
        $requestData['slug'] = Str::slug($requestData['title']);
        $serviceIds =  $requestData['services'];
        unset($requestData['services']);
        $package->update($requestData);
        $package->packageServices()->sync($serviceIds);

        $features = [];
        foreach ($package->packageServices as $service) {
            $features[] = ['name' => $service->title];
        }
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        if ($package->stripe_product_id) {
            try {
                $product = $stripe->products->update($package->stripe_product_id, [
                    'name' => $package->title,
                    'description' => $package->description,
                    'metadata' => [
                        'property_limit' => (string)$package->total_property_limit,
                        'features' => json_encode($features)
                    ]
                ]);
                $newPrice = $stripe->prices->create([
                    'product' => $package->stripe_product_id,
                    'unit_amount' => $package->amount * 100,
                    'currency' => 'usd',
                    'recurring' => [
                        'interval' => 'month',
                    ],
                ]);
                $prices = $stripe->prices->all(['product' => $package->stripe_product_id]);
                foreach ($prices->data as $price) {
                    if ($price->id !== $newPrice->id) {
                        $stripe->prices->update($price->id, ['active' => false]);
                    }
                }

                $package->update([
                    'stripe_product_id' => $product->id,
                    'stripe_price_id' => $newPrice->id,
                ]);
                Log::info($product . '  ' . $newPrice);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        } else {
            try {
                $product = $stripe->products->create([
                    'name' => $package->title,
                    'description' => $package->description,
                    'features' => $features,
                ]);

                $price = $stripe->prices->create([
                    'product' => $product->id,
                    'unit_amount' => ($package->amount * 100),
                    'currency' => 'usd',
                    'recurring' => [
                        'interval' => 'month',
                    ],
                ]);
                $package->update([
                    'stripe_product_id' => $product->id,
                    'stripe_price_id' => $price->id
                ]);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }
        return redirect()->route('admin.subscription.packages.index')->withFlashSuccess(__('Package Created Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
