<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {

        return view('admin.setting');
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {

        $allValue = $request->except('_token');

        foreach ($allValue as $key => $value) {

            if (is_null($value) || $value === '') {
                continue;
            }

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value ?? '']
            );
        }
        toast('Site setting updated successfully!','success');
        return redirect()->back();

    }
}
