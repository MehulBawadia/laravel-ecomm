@extends('admin.partials._layout')

@section('title')
    <title>Edit: {{ $user->getFullName() }} | {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://source.unsplash.com" />
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
            <li><a href="{{ route('admin.users') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Users Page">Users</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Edit: {{ $user->getFullName() }}</h1>
    </div>
@endsection

@section('content')
    <section class="personalInformation mt-8 pt-16 px-6">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide">Personal Information</h2>

            <div class="mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="#" method="POST" id="formPersonalInfo">
                    @csrf

                    <div class="bg-white px-4 py-4">
                        <div class="flex items-center justify-center">
                            <img src="{{ $user->getAvatarPath() }}" alt="{{ $user->getFullName() }}" class="rounded-full w-28 block">

                            <a href="#" class="text-sm text-red-400 ml-3"><i class="fas fa-trash"></i> Remove</a>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="first_name" class="text-gray-500">First Name:</label>
                                <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="John" />
                                <span data-name="first_name"></span>
                            </div>

                            <div class="w-full">
                                <label for="last_name" class="text-gray-500">Last Name:</label>
                                <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Doe" />
                                <span data-name="last_name"></span>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="username" class="text-gray-500">Username:</label>
                                <input type="text" name="username" id="username" value="{{ $user->username }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe" />
                                <span data-name="username"></span>
                            </div>
                            <div class="w-full">
                                <label for="email" class="text-gray-500">E-mail:</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="john@example.com" />
                                <span data-name="email"></span>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="contact_number" class="text-gray-500">Contact Number:</label>
                                <input type="text" name="contact_number" id="contact_number" value="{{ $user->contact_number }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="9876543210" />
                                <span data-name="contact_number"></span>
                            </div>
                            <div class="w-full">
                                <label for="gender" class="text-gray-500">Gender:</label>
                                <select name="gender" id="gender" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400">
                                    <option value="Male" @if ($user->gender == 'Male') selected="Male" @endif>Male</option>
                                    <option value="Female" @if ($user->gender == 'Female') selected="Female" @endif>Female</option>
                                </select>
                                <span data-name="gender"></span>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="upload_profile_picture" class="text-gray-500">Profile Picture:</label>
                                <input type="file" name="upload_profile_picture" id="upload_profile_picture" class="block pl-2 py-2 w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" accept="image/png, image/jpeg, image/jpg" />
                                <span data-name="upload_profile_picture"></span>
                            </div>
                            <div class="w-full">
                                <label for="account_verified" class="mt-6 inline-block">
                                    <input type="checkbox" name="account_verified" id="account_verified" class="form-checkbox" @if ($user->email_verified_at != null) checked @endif />
                                    <span class="ml-2 text-gray-500">Account Verified</span>
                                </label>
                                <span data-name="account_verified"></span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="w-36 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnUpdateGeneralInfo">Update</button>

                        <a href="{{ route('admin.users') }}" class="ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel and go to all users page">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="changePassword my-16 px-6">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide">Change Password</h2>

            <div class="mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="#" method="POST" id="formChangePassword">
                    @csrf

                    <div class="bg-white px-4 py-4">
                        <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                            <div class="w-full">
                                <label for="new_password" class="text-gray-500">New Password:</label>
                                <input type="password" name="new_password" id="new_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                            </div>
                            <div class="w-full">
                                <label for="repeat_new_password" class="text-gray-500">Repeat New Password:</label>
                                <input type="password" name="repeat_new_password" id="repeat_new_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="w-36 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnChangePassword">Change</button>

                        <a href="{{ route('admin.users') }}" class="ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel and go to all users page">Cancel</a>
                    </div>
                </form>
            </div>

            <p class="text-gray-500 text-sm mt-8 text-center">This user was registered on <time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(2)->format('dS M Y, h:i A') }}</time></p>
        </div>
    </section>
@endsection
