<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\CreateDirectory;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class AccountSettingsController extends Controller
{
    use CreateDirectory;

    /**
     * Display the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();

        return view('admin.account-settings.index', compact('user'));
    }

    /**
     * Update the general details of the administrator.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illumminate\Http\JsonResponse
     */
    public function updateGeneral(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|alpha_dash|max:50|unique:users,username,' . auth()->id(),
            'email' => 'required|email:filter|unique:users,email,' . auth()->id(),
            'contact_number' => 'nullable|numeric|digits:10',
            'gender' => 'required|in:Male,Female',
            'avatar_image_file' => 'nullable|file|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:300',
        ], [
            'gender.in' => 'The gender must be either Male or Female only.',
            'avatar_image_file.mimes' => 'The avatar image file must be a file of type: jpg, jpeg, png.',
        ]);

        $user = auth()->user();
        $request['avatar'] = $user->avatar;
        if ($request->avatar_image_file) {
            $request['avatar'] = $this->uploadAndGetPath($request->avatar_image_file);
        }
        $user->update($request->all());

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Personal details updated successfully.',
            'avatar' => $user->avatar ?? null,
            'avatar_path' => $user->fresh()->getAvatarPath(),
        ]);
    }

    /**
     * Change the password of the admin user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required',
            'repeat_new_password' => 'required|same:new_password',
        ]);

        $validCurrentPassword = Hash::check($request->current_password, auth()->user()->password);
        if ($validCurrentPassword) {
            auth()->user()->update([
                'password' => bcrypt($request->new_password),
            ]);

            return response()->json([
                'status'   => 'success',
                'title'    => 'Success !',
                'message'  => 'Password changed successfully.',
            ]);
        }

        return response()->json([
            'status'   => 'failed',
            'title'    => 'Failed !',
            'message'  => 'Invalid current password.',
        ]);
    }

    public function deleteAvatar()
    {
        $user = auth()->user();

        $baseFolder = app()->environment() == 'testing'
                        ? '/images/testing-user-' . $user->id
                        : '/images/user-' . $user->id;

        $avatarPath = $this->getPublicPath() . $user->avatar;

        \Illuminate\Support\Facades\File::delete($avatarPath);

        $user->update(['avatar' => null]);

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Avatar deleted successfully.',
            'defaultAvatar' => $user->fresh()->getAvatarPath(),
        ]);
    }

    /**
     * Upload the avatar/profile image file to the server.
     *
     * @param  \Illuminate\Http\UploadedFile $file
     * @return string
     */
    protected function uploadAndGetPath($file)
    {
        if (! $file) {
            return null;
        }

        $folderName = app()->environment() == 'testing'
                        ? '/images/testing-user-' . auth()->user()->id
                        : '/images/user-' . auth()->user()->id;
        $imageRelativePath = $folderName . '/';
        $path = $this->createDirectoryIfNotExists($imageRelativePath);

        $fileName = $this->getFileName($file);

        $file->move($path, $fileName);

        return $imageRelativePath.$fileName;
    }

    /**
     * Get the new file name of the uploaded file.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $imageType
     */
    protected function getFileName($file)
    {
        $originalName = $file->getClientOriginalName();
        $originalExt = $file->getClientOriginalExtension();

        $filename = explode('.', $originalName);

        return Str::slug($filename[0]) .'.'. Str::slug($originalExt);
    }
}
