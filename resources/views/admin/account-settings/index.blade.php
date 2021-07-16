@extends('admin.partials._layout')

@section('title')
    <title>Account Settings | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Account Settings</h1>
    </div>
@endsection

@section('content')
    <section class="personalInformation">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">Personal Information</h2>

            <div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="#" method="POST" id="formPersonalInfo">
                    @csrf

                    <div class="bg-white px-4 py-4">
                        <div>
                            <label for="full_name" class="text-gray-500">Full Name:</label>
                            <input type="text" name="full_name" id="full_name" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="John Doe" />
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="username" class="text-gray-500">Username:</label>
                                <input type="text" name="username" id="username" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe" />
                            </div>
                            <div class="w-full">
                                <label for="email" class="text-gray-500">E-mail:</label>
                                <input type="email" name="email" id="email" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="john@example.com" />
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none focus:bg-blue-600 tracking-wider font-medium">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="changePassword mt-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">Change Password</h2>

            <div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="#" method="POST" id="formChangePassword">
                    @csrf

                    <div class="bg-white px-4 py-4">
                        <div>
                            <label for="current_passworde" class="text-gray-500">Current Password:</label>
                            <input type="password" name="current_passworde" id="current_passworde" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="new_password" class="text-gray-500">New Password:</label>
                                <input type="password" name="new_password" id="new_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe" />
                            </div>
                            <div class="w-full">
                                <label for="repeat_new_password" class="text-gray-500">Repeat New Password:</label>
                                <input type="password" name="repeat_new_password" id="repeat_new_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none focus:bg-blue-600 tracking-wider font-medium">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
