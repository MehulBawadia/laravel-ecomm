<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Login the administrator after validation.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function check(Request $request)
    {
        $this->validate($request, [
            'usernameOrEmail' => 'required',
            'password'        => 'required'
        ]);

        $loggedIn = $this->processCredentials($request);

        if ($loggedIn) {
            return response()->json([
                'status'   => 'success',
                'title'    => 'Success !',
                'message'  => 'Admin logged in successfully! Redirecting...',
                'location' => route('admin.dashboard')
            ]);
        }

        return response([
            'status'  => 'failed',
            'title'   => 'Failed !',
            'message' => 'Invalid Credentials',
        ]);
    }

    /**
     * Process the login credentials.
     *
     * @param   \Illuminate\Http\Request  $request
     * @return  boolean
     */
    public function processCredentials(Request $request)
    {
        $field = filter_var($request->usernameOrEmail, FILTER_VALIDATE_EMAIL)
                    ? 'email'
                    : 'username';

        $request->merge([$field => $request->usernameOrEmail]);

        if (auth()->attempt($request->only($field, 'password'))) {
            return true;
        }

        return false;
    }
}
