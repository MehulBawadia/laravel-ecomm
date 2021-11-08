<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display all the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::withTrashed()->orderBy('id', 'DESC')->get() ?? collect();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Add a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter|unique:users,email',
            'username' => 'required|alpha_dash|unique:users,username|max:50',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User added successfully! Redirecting...',
            'location' => route('admin.users.edit', $user->id),
        ]);
    }

    /**
     * Display edit form of the given user id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View|void
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (! $user) {
            abort(404);
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user details of the given user id.
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateGeneral($id, Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|alpha_dash|max:50|unique:users,username,' . $id,
            'email' => 'required|email:filter|unique:users,email,'. $id,
            'gender' => 'required|in:male,female',
            'contact_number' => 'nullable|numeric',
            'profile_picture_image' => 'nullable|image|mimes:JPG,JPEG,PNG,jpg,jpeg,png|max:2000',
        ]);

        // dd($request->all());

        $user = User::withTrashed()->find($id);
        if (! $user) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'User not found with the given id: '. $id,
            ], 404);
        }

        $request['email_verified_at'] = $request->account_verified == "on" && $user->email_verified_at == null
                                            ? now() : $user->email_verified_at;
        $user->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User updated successfully.',
        ]);
    }

    /**
     * Change the password of the given user id.
     *
     * @param  integer  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword($id, Request $request)
    {
        $this->validate($request, [
            'new_password' => 'required',
            'repeat_new_password' => 'required|same:new_password',
        ]);

        $user = User::withTrashed()->find($id);
        if (! $user) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'User not found with the given id: '. $id,
            ], 404);
        }

        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User password changed successfully.',
        ]);
    }

    /**
     * Delete the user of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $user = User::find($id);
        if (! $user) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'User not found with the given id: '. $id,
            ], 404);
        }

        $user->delete();

        $users = User::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User deleted successfully.',
            'table'    => view('admin.users._table', compact('users'))->render()
        ]);
    }

    /**
     * Restore the temporarily deleted user of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        if (! $user) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'User not found with the given id: '. $id,
            ], 404);
        }

        $user->restore();

        $users = User::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User restored successfully.',
            'table'    => view('admin.users._table', compact('users'))->render()
        ]);
    }

    /**
     * Permanently destroy the temporarily deleted user of the given id.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::onlyTrashed()->find($id);
        if (! $user) {
            return response()->json([
                'status'   => 'error',
                'title'    => 'Failed !',
                'message'  => 'User not found with the given id: '. $id,
            ], 404);
        }

        $user->forceDelete();

        $users = User::withTrashed()->orderBy('id', 'DESC')->get();

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User deleted permanently.',
            'table'    => view('admin.users._table', compact('users'))->render()
        ]);
    }
}
