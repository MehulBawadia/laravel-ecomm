<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\Admin\AdminGenerated;
use App\Http\Controllers\Controller;

class GenerateController extends Controller
{
    /**
     * Display the generate administrator form.
     *
     * @return |Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (User::withTrashed()->first() != null) {
            return redirect(route('homePage'));
        }

        return view('admin.generate');
    }

    /**
     * Generate the administrator and store the form details.
     *
     * @param   \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::withTrashed()->first() != null) {
            return response()->json([
                'status' => 'failed',
                'title' => 'Failed !',
                'message' => 'Administrator already exists.',
            ]);
        }

        $this->validate($request, [
            'first_name'       => 'required|max:255',
            'last_name'        => 'required|max:255',
            'username'         => 'required|alpha_dash|max:30',
            'email'            => 'required|email',
            'password'         => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        session(['password' => $request->password]);
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());

        auth()->login($user);

        \Illuminate\Support\Facades\Mail::to($user->email)
            ->send(new AdminGenerated($user));

        session()->forget('password');

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'Administrator generated successfully! Redirecting...',
            'location' => route('admin.dashboard'),
        ]);
    }
}
