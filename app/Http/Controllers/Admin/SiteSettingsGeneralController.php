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
        $contact = json_decode($setting->contact_info, true) ?? [];
        $orderEmail = json_decode($setting->email_info, true) ?? [];

        return view('admin.site-settings.general', compact('address', 'contact', 'orderEmail'));
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

    /**
     * Update the contact info.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateContactInfo(Request $request)
    {
        $this->validate($request, [
            'support_email' => 'required|email:filter',
            'contact_number' => 'required|max:255',
            'fax_number' => 'nullable|max:255',
        ]);

        $setting = SiteSetting::first();
        if (! $setting) {
            SiteSetting::create(['contact_info' => json_encode($request->except(['_token', '_method']))]);
        } else {
            $setting->update(['contact_info' => json_encode($request->except(['_token', '_method']))]);
        }

        return response()->json([
            'status' => 'success',
            'title' => 'Success !',
            'message' => 'Contact information updated successfully.',
        ]);
    }

    /**
     * Update the order email info.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOrderEmailInfo(Request $request)
    {
        $this->validate($request, [
            'from_email' => 'required|email:filter',
            'from_name' => 'required|max:255',
            'order_notification_email' => 'required',
        ]);

        $setting = SiteSetting::first();
        if (! $setting) {
            SiteSetting::create(['email_info' => json_encode($request->except(['_token', '_method']))]);
        } else {
            $setting->update(['email_info' => json_encode($request->except(['_token', '_method']))]);
        }

        return response()->json([
            'status' => 'success',
            'title' => 'Success !',
            'message' => 'Order E-Mail information updated successfully.',
        ]);
    }
}
