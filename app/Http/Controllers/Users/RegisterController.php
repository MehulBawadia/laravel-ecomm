<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserRegistered;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Display the generate administrator form.
     *
     * @return |Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        return view('users.register');
    }

    /**
     * Register the user.
     *
     * @param   \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            ->send(new UserRegistered($user));

        session()->forget('password');

        return response()->json([
            'status'   => 'success',
            'title'    => 'Success !',
            'message'  => 'User registered successfully! Redirecting...',
            'location' => route('users.dashboard'),
        ]);
    }
}
