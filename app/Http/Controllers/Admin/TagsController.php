<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display all the tags.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::withTrashed()->orderBy('id', 'DESC')->get() ?? collect();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Add a new tag.
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
        $tag = Tag::create($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag added successfully! Redirecting...',
            'location' => route('admin.tags.edit', $tag->id),
        ]);
    }

    /**
     * Display edit form of the given tag id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View|void
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        if (! $tag) {
            abort(404);
        }

        $statuses = Tag::getAllStatus();

        return view('admin.tags.edit', compact('tag', 'statuses'));
    }

    /**
     * Update tag details of the given tag id.
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

        $tag = Tag::withTrashed()->find($id);
        if (! $tag) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Tag not found with the given id: '. $id,
            ], 404);
        }

        $request['slug'] = \Illuminate\Support\Str::slug($request->name);
        $tag->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag updated successfully.',
        ]);
    }

    /**
     * Update seo details of the given tag id.
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

        $tag = Tag::withTrashed()->find($id);
        if (! $tag) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Tag not found with the given id: '. $id,
            ], 404);
        }

        $tag->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag SEO details updated successfully.',
        ]);
    }

    /**
     * Delete the tag of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $tag = Tag::find($id);
        if (! $tag) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Tag not found with the given id: '. $id,
            ], 404);
        }

        $tag->delete();

        $tags = Tag::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag deleted successfully.',
            'table'    => view('admin.tags._table', compact('tags'))->render()
        ]);
    }

    /**
     * Restore the temporarily deleted tag of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $tag = Tag::onlyTrashed()->find($id);
        if (! $tag) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Tag not found with the given id: '. $id,
            ], 404);
        }

        $tag->restore();

        $tags = Tag::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag restored successfully.',
            'table'    => view('admin.tags._table', compact('tags'))->render()
        ]);
    }

    /**
     * Permanently destroy the temporarily deleted tag of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $tag = Tag::onlyTrashed()->find($id);
        if (! $tag) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'Tag not found with the given id: '. $id,
            ], 404);
        }

        $tag->forceDelete();

        $tags = Tag::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Tag deleted permanently.',
            'table'    => view('admin.tags._table', compact('tags'))->render()
        ]);
    }
}
