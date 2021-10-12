<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display all the products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::withTrashed()->orderBy('id', 'DESC')->get() ?? collect();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Add a new product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|alpha_dash|unique:products,code|max:15',
            'name' => 'required|max:255',
        ]);

        $request['slug'] = \Illuminate\Support\Str::slug($request->name);
        $product = Product::create($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product added successfully! Redirecting...',
            'location' => route('admin.products.edit', $product->id),
        ]);
    }

    /**
     * Display edit form of the given product id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View|void
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (! $product) {
            abort(404);
        }

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update product details of the given product id.
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateGeneral($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'code' => 'required|alpha_dash|max:15|unique:products,code,' . $id,
            'sku' => 'required|max:255',
            'rate' => 'required|numeric|min:0.0',
            'tax_percent' => 'required|numeric|min:0.0|max:100.00',
            'discount_percent' => 'nullable|numeric|max:100.00',
            'stock' => 'required|integer|min:0',
            'sort_number' => 'required|integer|min:0',
            'short_description' => 'nullable|max:255',
            'description' => 'nullable',
        ]);

        $product = Product::withTrashed()->find($id);
        if (! $product) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Product not found with the given id: '. $id,
            ], 404);
        }

        $request['slug'] = \Illuminate\Support\Str::slug($request->name);
        $request['description'] = htmlspecialchars($request->description);
        $product->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product updated successfully.',
        ]);
    }

    /**
     * Update seo details of the given product id.
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

        $product = Product::withTrashed()->find($id);
        if (! $product) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Product not found with the given id: '. $id,
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product SEO details updated successfully.',
        ]);
    }

    /**
     * Delete the product of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $product = Product::find($id);
        if (! $product) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Product not found with the given id: '. $id,
            ], 404);
        }

        $product->delete();

        $products = Product::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product deleted successfully.',
            'table'    => view('admin.products._table', compact('products'))->render()
        ]);
    }

    /**
     * Restore the temporarily deleted product of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        if (! $product) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Product not found with the given id: '. $id,
            ], 404);
        }

        $product->restore();

        $products = Product::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product restored successfully.',
            'table'    => view('admin.products._table', compact('products'))->render()
        ]);
    }

    /**
     * Permanently destroy the temporarily deleted product of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = Product::onlyTrashed()->find($id);
        if (! $product) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Product not found with the given id: '. $id,
            ], 404);
        }

        $product->forceDelete();

        $products = Product::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Product deleted permanently.',
            'table'    => view('admin.products._table', compact('products'))->render()
        ]);
    }
}
