<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponsController extends Controller
{
    /**
     * Display all the coupons.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $coupons = Coupon::withTrashed()->orderBy('id', 'DESC')->get();

        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Add a new coupon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|alpha_num|max:30',
        ]);

        $coupon = Coupon::create($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon added successfully! Redirecting...',
            'location' => route('admin.coupons.edit', $coupon->id),
        ]);
    }

    /**
     * Display edit form of the given coupon id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View|void
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        if (! $coupon) {
            abort(404);
        }

        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update coupon details of the given coupon id.
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'code' => 'required|alpha_num|max:30',
            'type' => 'required|in:flat,percentage',
            'description' => 'nullable|max:255',
            'minimum_amount' => 'required|numeric|min:0',
            'percent_or_amount' => 'required|numeric|min:0',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date|after_or_equal:starts_at',
        ], [
            'type.in' => 'The type must be either percentage or flat only.'
        ]);

        $coupon = Coupon::withTrashed()->find($id);
        if (! $coupon) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Coupon not found with the given id: '. $id,
            ], 404);
        }

        $coupon->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon updated successfully.',
        ]);
    }

    /**
     * Delete the coupon of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $coupon = Coupon::find($id);
        if (! $coupon) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Coupon not found with the given id: '. $id,
            ], 404);
        }

        $coupon->delete();

        $coupons = Coupon::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon deleted successfully.',
            'table'    => view('admin.coupons._table', compact('coupons'))->render()
        ]);
    }

    /**
     * Restore the temporarily deleted coupon of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $coupon = Coupon::onlyTrashed()->find($id);
        if (! $coupon) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Coupon not found with the given id: '. $id,
            ], 404);
        }

        $coupon->restore();

        $coupons = Coupon::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon restored successfully.',
            'table'    => view('admin.coupons._table', compact('coupons'))->render()
        ]);
    }

    /**
     * Permanently destroy the temporarily deleted coupon of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $coupon = Coupon::onlyTrashed()->find($id);
        if (! $coupon) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Coupon not found with the given id: '. $id,
            ], 404);
        }

        $coupon->forceDelete();

        $coupons = Coupon::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Coupon deleted permanently.',
            'table'    => view('admin.coupons._table', compact('coupons'))->render()
        ]);
    }
}
