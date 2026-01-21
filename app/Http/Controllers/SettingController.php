<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function termsCondition(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = [];
            $termsConditions = Setting::where(['account_id' => Auth::user()->id, 'key' => 'terms_conditions'])->first();
            if ($termsConditions) {
                $data = json_decode($termsConditions->value, true) ?? [];
            }

            return view('backend.account.termCandition', compact('data'));
        }

        try {
            $requestData = $request->all();
            $termsConditions = [];
            if (isset($requestData['terms_conditions']) && ! empty($requestData['terms_conditions'])) {
                $termsConditions['terms_conditions'] = $requestData['terms_conditions'];
            }

            $settingObj = Setting::where(['account_id' => Auth::user()->id, 'key' => 'terms_conditions'])->first();
            if (! $settingObj) {
                $settingObj = new Setting();
                $settingObj->account_id = Auth::user()->id;
                $settingObj->key = 'terms_conditions';
                $settingObj->description = 'Users terms & conditions';
            }
            $settingObj->value = json_encode($termsConditions);
            $settingObj->save();

            return back()->withFlashSuccess(__('User Terms & Conditions Successfully Submitted'));
        } catch (\Exception $e) {
            return back()->withFlashDanger(__($e->getMessage()));
        }
    }

    public function privacyPolicy(Request $request)
    {
        if ($request->isMethod('GET')) {
            $data = [];
            $privacyPolicy = Setting::where(['account_id' => Auth::user()->id, 'key' => 'privacy_policy'])->first();
            if ($privacyPolicy) {
                $data = json_decode($privacyPolicy->value, true) ?? [];
            }

            return view('backend.account.privacyPolicy', compact('data'));
        }

        try {
            $requestData = $request->all();
            $privacyPolicy = [];
            if (isset($requestData['privacy_policy']) && ! empty($requestData['privacy_policy'])) {
                $privacyPolicy['privacy_policy'] = $requestData['privacy_policy'];
            }
            $settingObj = Setting::where(['account_id' => Auth::user()->id, 'key' => 'privacy_policy'])->first();
            if (! $settingObj) {
                $settingObj = new Setting();
                $settingObj->account_id = Auth::user()->id;
                $settingObj->key = 'privacy_policy';
                $settingObj->description = 'Users Privacy Policy';
            }
            $settingObj->value = json_encode($privacyPolicy);
            $settingObj->save();

            return back()->withFlashSuccess(__('Privacy Policy Successfully Submitted'));
        } catch (\Exception $e) {
            return back()->withFlashDanger(__($e->getMessage()));
        }
    }

    public function generalSetting(Request $request)
    {

        if ($request->isMethod('GET')) {
            $data = [];
            $generalSetting = Setting::where(['account_id' => Auth::user()->id, 'key' => 'general_setting'])->first();
            if ($generalSetting) {
                $data = json_decode($generalSetting->value, true) ?? [];
            }

            return view('backend.account.siteSetting', compact('data'));
        }

        try {
            $userId = Auth::user()->id;
            $requestData = $request->all();
            $requestData = $request->except('_token');
            $settingObj = Setting::firstOrNew(
                ['account_id' => $userId, 'key' => 'general_setting'],
                ['description' => 'Manager General Setting']
            );
            $existingSettings = json_decode($settingObj->value, true) ?? [];
            if ($request->hasFile('site.favicon')) {
                $favicon = managerSetting($request, 'site.favicon', 'favicon', 44, 44);
                $existingSettings['site']['favicon'] = $favicon;
            }
            if ($request->hasFile('site.logo')) {
                $logo = managerSetting($request, 'site.logo', 'logo', null, 80);
                $existingSettings['site']['logo'] = $logo;
            }
            if (isset($existingSettings['site']['favicon'])) {
                $requestData['site']['favicon'] = $existingSettings['site']['favicon'];
            }
            if (isset($existingSettings['site']['logo'])) {
                $requestData['site']['logo'] = $existingSettings['site']['logo'];
            }
            $requestData = array_merge($existingSettings, $requestData);
            $settingObj->value = json_encode($requestData);
            $settingObj->save();

            return back()->withFlashSuccess(__('Site Setting Successfully Submitted'));
        } catch (\Exception $e) {
            return back()->withFlashDanger(__($e->getMessage()));
        }
    }
}
