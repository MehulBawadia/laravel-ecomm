@extends('admin.partials._layout')

@section('title')
    <title>Generate Administrator | {{ config('app.name') }}</title>
@endsection

@section('content')
    <section class="generateAdministrator">
        <div class="container mx-auto">
            <div class="flex justify-center items-center px-4 py-8">
                <div class="w-full md:w-4/5 lg:w-3/5 shadow rounded overflow-hidden">
                    <form action="#" method="POST" id="generateAdministratorForm" class="">
                        @csrf

                        <div class="bg-white px-6 py-6">
                            <h1 class="font-Rubik font-bold text-2xl uppercase text-gray-900">Generate Administrator</h1>

                            <p class="text-sm text-gray-500 my-3 tracking-wider">The below form details will be emailed to the given E-Mail address.</p>

                            <div class="mt-5">
                                <label for="full_name" class="text-gray-700">Full Name:</label>
                                <input type="text" name="full_name" id="full_name" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="John Doe" />
                            </div>

                            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                                <div class="w-full">
                                    <label for="username" class="text-gray-700">Username:</label>
                                    <input type="text" name="username" id="username" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe" />
                                </div>
                                <div class="w-full">
                                    <label for="email" class="text-gray-700">E-mail:</label>
                                    <input type="email" name="email" id="email" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="john@example.com" />
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                                <div class="w-full">
                                    <label for="password" class="text-gray-700">Password:</label>
                                    <input type="password" name="password" id="password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                                </div>
                                <div class="w-full">
                                    <label for="confirm_password" class="text-gray-700">Confirm Password:</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 py-3 px-6">
                            <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none focus:bg-blue-600 tracking-wider font-medium">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
