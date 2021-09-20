<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display all the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::withTrashed()->orderBy('id', 'DESC')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Add a new category.
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
        $category = Category::create($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category added successfully! Redirecting...',
            'location' => route('admin.categories.edit', $category->id),
        ]);
    }

    /**
     * Display edit form of the given category id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View|void
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if (! $category) {
            abort(404);
        }

        $statuses = Category::getAllStatus();

        return view('admin.categories.edit', compact('category', 'statuses'));
    }

    /**
     * Update category details of the given category id.
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'status' => 'required|integer|in:10,20',
            'description' => 'nullable|max:255'
        ], [
            'status.integer' => 'The status must be either draft or published only.',
            'status.in' => 'The status must be either draft or published only.'
        ]);

        $category = Category::withTrashed()->find($id);
        if (! $category) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Category not found with the given id: '. $id,
            ], 404);
        }

        $request['slug'] = \Illuminate\Support\Str::slug($request->name);
        $category->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category updated successfully.',
        ]);
    }

    /**
     * Update seo details of the given category id.
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

        $category = Category::withTrashed()->find($id);
        if (! $category) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Category not found with the given id: '. $id,
            ], 404);
        }

        $request['slug'] = \Illuminate\Support\Str::slug($request->name);
        $category->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category SEO details updated successfully.',
        ]);
    }

    /**
     * Delete the category of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $category = Category::find($id);
        if (! $category) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Category not found with the given id: '. $id,
            ], 404);
        }

        $category->delete();

        $categories = Category::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category deleted successfully.',
            'table'    => view('admin.categories._table', compact('categories'))->render()
        ]);
    }

    /**
     * Restore the temporarily deleted category of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        if (! $category) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Category not found with the given id: '. $id,
            ], 404);
        }

        $category->restore();

        $categories = Category::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category restored successfully.',
            'table'    => view('admin.categories._table', compact('categories'))->render()
        ]);
    }

    /**
     * Permanently destroy the temporarily deleted category of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $category = Category::onlyTrashed()->find($id);
        if (! $category) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Category not found with the given id: '. $id,
            ], 404);
        }

        $category->forceDelete();

        $categories = Category::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Category deleted permanently.',
            'table'    => view('admin.categories._table', compact('categories'))->render()
        ]);
    }
}
