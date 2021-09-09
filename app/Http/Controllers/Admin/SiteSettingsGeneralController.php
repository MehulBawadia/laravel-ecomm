<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteSettingsGeneralController extends Controller
{
    /**
     * Display the general site settings field.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $setting = SiteSetting::first();
        if (! $setting) {
            $setting = SiteSetting::create([
                'address_info' => null,
                'contact_info' => null,
                'email_info' => null,
            ]);
        }

        $address = json_decode($setting->address_info, true) ?? [];

        return view('admin.site-settings.general', compact('address'));
    }

    /**
     * Update the address info.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAddressInfo(Request $request)
    {
        $this->validate($request, [
            'address_line_1' => 'required|max:255',
            'address_line_2' => 'nullable|max:255',
            'area' => 'required|max:255',
            'landmark' => 'nullable|max:255',
            'city' => 'required|max:255',
            'pin_code' => 'required|max:20',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
        ]);

        $setting = SiteSetting::first();
        if (! $setting) {
            SiteSetting::create(['address_info' => json_encode($request->except(['_token', '_method']))]);
        } else {
            $setting->update(['address_info' => json_encode($request->except(['_token', '_method']))]);
        }

        return response()->json([
            'status' => 'success',
            'title' => 'Success !',
            'message' => 'Address information updated successfully.',
        ]);
    }
}
