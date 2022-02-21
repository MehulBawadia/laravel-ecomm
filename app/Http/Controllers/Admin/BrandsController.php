<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    /**
     * Display all the brands.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $brands = Brand::withTrashed()->orderBy('id', 'DESC')->get() ?? collect();

        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Add a new brand.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request['slug'] = \Illuminate\Support\Str::slug($request->name);
        $brand = Brand::create($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand added successfully! Redirecting...',
            'location' => route('admin.brands.edit', $brand->id),
        ]);
    }

    /**
     * Display edit form of the given brand id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View|void
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        if (! $brand) {
            abort(404);
        }

        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update brand details of the given brand id.
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'nullable|max:255'
        ]);

        $brand = Brand::withTrashed()->find($id);
        if (! $brand) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Brand not found with the given id: '. $id,
            ], 404);
        }

        $request['slug'] = \Illuminate\Support\Str::slug($request->name);
        $brand->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand updated successfully.',
        ]);
    }

    /**
     * Update seo details of the given brand id.
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSeo($id, Request $request)
    {
        $this->validate($request, [
            'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:255',
            'meta_keywords' => 'nullable|max:255',
        ]);

        $brand = Brand::withTrashed()->find($id);
        if (! $brand) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Brand not found with the given id: '. $id,
            ], 404);
        }

        $brand->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand SEO details updated successfully.',
        ]);
    }

    /**
     * Delete the brand of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $brand = Brand::find($id);
        if (! $brand) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Brand not found with the given id: '. $id,
            ], 404);
        }

        $brand->delete();

        $brands = Brand::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand deleted successfully.',
            'table'    => view('admin.brands._table', compact('brands'))->render()
        ]);
    }

    /**
     * Restore the temporarily deleted brand of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $brand = Brand::onlyTrashed()->find($id);
        if (! $brand) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Brand not found with the given id: '. $id,
            ], 404);
        }

        $brand->restore();

        $brands = Brand::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand restored successfully.',
            'table'    => view('admin.brands._table', compact('brands'))->render()
        ]);
    }

    /**
     * Permanently destroy the temporarily deleted brand of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $brand = Brand::onlyTrashed()->find($id);
        if (! $brand) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Brand not found with the given id: '. $id,
            ], 404);
        }

        $brand->forceDelete();

        $brands = Brand::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Brand deleted permanently.',
            'table'    => view('admin.brands._table', compact('brands'))->render()
        ]);
    }
}
