@extends('admin.partials._layout')

@section('title')
    <title>Login Administrator | {{ config('app.name') }}</title>
@endsection

@section('content')
    <section class="generateAdministrator">
        <div class="container mx-auto">
            <div class="flex justify-center items-center px-4 py-8">
                <div class="w-full md:w-4/5 lg:w-1/2 shadow rounded overflow-hidden">
                    <form action="#" method="POST" id="generateAdministratorForm" class="">
                        @csrf

                        <div class="bg-white px-6 py-6">
                            <h1 class="font-Rubik font-bold text-2xl uppercase text-gray-900">Login Administrator</h1>

                            <div class="mt-5 w-full">
                                <label for="username" class="text-gray-700">Username / E-Mail:</label>
                                <input type="text" name="username" id="username" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe / john@example.com" required autofocus />
                            </div>

                            <div class="mt-5 w-full">
                                <label for="password" class="text-gray-700">Password:</label>
                                <input type="password" name="password" id="password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" required />
                            </div>
                        </div>

                        <div class="bg-gray-50 py-3 px-6">
                            <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-blue-600 focus:bg-blue-600 tracking-wider font-medium">Login</button>

                            <a href="{{ route('homePage') }}" class="ml-3 text-gray-500 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Cancel and go to home page">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
