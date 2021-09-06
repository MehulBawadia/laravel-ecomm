@extends('admin.partials._layout')

@section('title')
    <title>Edit Site Settings: General | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Edit Site Settings: General</h1>
    </div>
@endsection

@section('content')
    <section class="personalInformation">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">Address Information</h2>

            <div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="#" method="POST" id="formAddressInformation">
                    @csrf

                    <div class="bg-white px-4 py-4">
                        <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                            <div class="w-full">
                                <label for="address_line_1" class="text-gray-500">Address Line 1:</label>
                                <input type="text" name="address_line_1" id="address_line_1" value="4, Station Road" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Apartment, Building" />
                            </div>
                            <div class="w-full">
                                <label for="address_line_2" class="text-gray-500">Address Line 2 <small>(Optional)</small>:</label>
                                <input type="text" name="address_line_2" id="address_line_2" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Block, Street" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="area" class="text-gray-500">Area:</label>
                                <input type="text" name="area" id="area" value="Fort" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Random Area" />
                            </div>
                            <div class="w-full">
                                <label for="landmark" class="text-gray-500">Landmark <small>(Optional)</small>:</label>
                                <input type="text" name="landmark" id="landmark" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="SuperSonic Hotel" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="city" class="text-gray-500">City:</label>
                                <input type="text" name="city" id="city" value="Mumbai" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Mumbai" />
                            </div>
                            <div class="w-full">
                                <label for="pin_code" class="text-gray-500">Pin/Postal/Zip Code:</label>
                                <input type="text" name="pin_code" id="pin_code" value="400001" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="400067" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="state" class="text-gray-500">State:</label>
                                <input type="text" name="state" id="state" value="Maharashtra" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Maharashtra" />
                            </div>
                            <div class="w-full">
                                <label for="country" class="text-gray-500">Country:</label>
                                <input type="text" name="country" id="country" value="India" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="India" />
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none focus:bg-blue-600 tracking-wider font-medium">Update</button>

                        <a href="{{ route('admin.dashboard') }}" class="ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="contactInformation my-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">Contact Information</h2>

            <div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="#" method="POST" id="formContactInformation">
                    @csrf

                    <div class="bg-white px-4 py-4">
                        <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                            <div class="w-full">
                                <label for="support_email" class="text-gray-500">Support E-Mail:</label>
                                <input type="email" name="support_email" id="support_email" value="support@example.com" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="support@example.com" />
                            </div>
                            <div class="w-full">
                                <label for="contact_number" class="text-gray-500">Contact Number:</label>
                                <input type="email" name="contact_number" id="contact_number" value="9876543210" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="9876543210" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center gap-4 mt-5">
                            <div class="w-1/2">
                                <label for="fax_number" class="text-gray-500">Fax Number <small>(Optional)</small>:</label>
                                <input type="text" name="fax_number" id="fax_number" value="98765432210" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="9876543210" />
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none focus:bg-blue-600 tracking-wider font-medium">Update</button>

                        <a href="{{ route('admin.dashboard') }}" class="ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="emailInformation my-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">E-Mail Information</h2>

            <div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="#" method="POST" id="formEmailInformation">
                    @csrf

                    <div class="bg-white px-4 py-4">
                        <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                            <div class="w-full">
                                <label for="from_email" class="text-gray-500">From E-Mail:</label>
                                <input type="email" name="from_email" id="from_email" value="no-reply@example.com" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="no-reply@example.com" />
                            </div>
                            <div class="w-full">
                                <label for="from_name" class="text-gray-500">From Name:</label>
                                <input type="email" name="from_name" id="from_name" value="{{ config('app.name') }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="{{ config('app.name') }}" />
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row items-center gap-4 mt-5">
                            <div class="w-1/2">
                                <label for="order_notification_email" class="text-gray-500">Order Notification E-Mail:</label>
                                <input type="text" name="order_notification_email" id="order_notification_email" value="johndoe@example.com,adminorders@example.com" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johndoe@example.com,adminorders@example.com" />
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none focus:bg-blue-600 tracking-wider font-medium">Update</button>

                        <a href="{{ route('admin.dashboard') }}" class="ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
