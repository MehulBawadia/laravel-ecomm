@extends('partials._layout')

@section('title')
    <title>Checkout | {{ config('app.name') }}</title>
    <meta name="description" content="EComm is a Laravel based E-Commerce web application built by Mehul Bawadia.">
    <meta name="keywords" content="ECommerce, web application, website, products, online selling">
    <link rel="canonical" href="{{ route('checkout.index') }}" />
@endsection

@section('content')
    <section class="breadCrumbs border-b">
        <div class="container mx-auto">
            <div class="py-3 px-4">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <ul class="flex items-center font-Rubik text-sm">
                        <li><a href="{{ route('homePage') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150">Home</a></li>
                        <li class="mx-2 text-gray-400 text-xs"><i class="fas fa-chevron-right"></i></li>
                        <li class="text-gray-400">Checkout</li>
                    </ul>

                    <h1 class="font-Rubik font-bold uppercase text-2xl leading-6 mt-2 sm:mt-0">Checkout</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="addressDetails">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row justify-center px-4 py-8 gap-8">
                <div class="md:w-1/2 shadow px-4 py-4">
                    <h2 class="font-Rubik font-bold text-lg leading-tight">Billing Address</h2>

                    <div class="my-5">
                        <label for="full_name" class="text-gray-500">Full Name:</label>
                        <input type="text" name="full_name" id="full_name" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="my-5">
                        <label for="address_line_1" class="text-gray-500">Address Line 1</label>
                        <input type="text" name="address_line_1" id="address_line_1" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="my-5">
                        <label for="address_line_2" class="text-gray-500">Address Line 2: <small class="text-gray-400">(Optional)</small></label>
                        <input type="text" name="address_line_2" id="address_line_2" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="my-5 flex flex-col lg:flex-row gap-4">
                        <div class="lg:w-1/2">
                            <label for="area" class="text-gray-500">Area:</label>
                            <input type="text" name="area" id="area" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="lg:w-1/2">
                            <label for="landmark" class="text-gray-500">Landmark: <small class="text-gray-400">(Optional)</small></label>
                            <input type="text" name="landmark" id="landmark" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="my-5 flex flex-col lg:flex-row gap-4">
                        <div class="lg:w-1/2">
                            <label for="city" class="text-gray-500">City:</label>
                            <input type="text" name="city" id="city" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="lg:w-1/2">
                            <label for="pin_code" class="text-gray-500">Pin / Postal / Zip Code:</label>
                            <input type="text" name="pin_code" id="pin_code" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="my-5 flex flex-col lg:flex-row gap-4">
                        <div class="lg:w-1/2">
                            <label for="state" class="text-gray-500">State:</label>
                            <input type="text" name="state" id="state" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="lg:w-1/2">
                            <label for="country" class="text-gray-500">Country:</label>
                            <input type="text" name="country" id="country" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="my-5">
                        <label for="contact_number" class="text-gray-500">Contact Number:</label>
                        <input type="text" name="contact_number" id="contact_number" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                    </div>
                </div>
                <div class="md:w-1/2 shadow px-4 py-4">
                    <h2 class="font-Rubik font-bold text-lg leading-tight">Shipping Address</h2>

                    <div class="my-5">
                        <label for="full_name" class="text-gray-500">Full Name:</label>
                        <input type="text" name="full_name" id="full_name" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="my-5">
                        <label for="address_line_1" class="text-gray-500">Address Line 1</label>
                        <input type="text" name="address_line_1" id="address_line_1" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="my-5">
                        <label for="address_line_2" class="text-gray-500">Address Line 2: <small class="text-gray-400">(Optional)</small></label>
                        <input type="text" name="address_line_2" id="address_line_2" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                    </div>

                    <div class="my-5 flex flex-col lg:flex-row gap-4">
                        <div class="lg:w-1/2">
                            <label for="area" class="text-gray-500">Area:</label>
                            <input type="text" name="area" id="area" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="lg:w-1/2">
                            <label for="landmark" class="text-gray-500">Landmark: <small class="text-gray-400">(Optional)</small></label>
                            <input type="text" name="landmark" id="landmark" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="my-5 flex flex-col lg:flex-row gap-4">
                        <div class="lg:w-1/2">
                            <label for="city" class="text-gray-500">City:</label>
                            <input type="text" name="city" id="city" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="lg:w-1/2">
                            <label for="pin_code" class="text-gray-500">Pin / Postal / Zip Code:</label>
                            <input type="text" name="pin_code" id="pin_code" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="my-5 flex flex-col lg:flex-row gap-4">
                        <div class="lg:w-1/2">
                            <label for="state" class="text-gray-500">State:</label>
                            <input type="text" name="state" id="state" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                        <div class="lg:w-1/2">
                            <label for="country" class="text-gray-500">Country:</label>
                            <input type="text" name="country" id="country" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                        </div>
                    </div>

                    <div class="my-5">
                        <label for="contact_number" class="text-gray-500">Contact Number:</label>
                        <input type="text" name="contact_number" id="contact_number" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="paymentMethod">
        <div class="container mx-auto">
            <div class="px-4 py-8">
                <div class="shadow px-4 py-4">
                    <h2 class="font-Rubik font-bold text-lg leading-tight">Select Payment Method</h2>

                    <div class="flex flex-col sm:flex-row gap-4 my-5">
                        <div>
                            <input type="radio" name="payment_method" id="payment_method_cod" value="COD">
                            <label for="payment_method_cod" class="text-gray-500">COD (Cash on Delivery)</label>
                        </div>

                        <div>
                            <input type="radio" name="payment_method" id="payment_method_paypal" value="paypal">
                            <label for="payment_method_paypal" class="text-gray-500">PayPal</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="confirmCart">
        <div class="container mx-auto">
            <div class="px-4 py-8">
                <div class="shadow px-4 py-8">
                    <h2 class="font-Rubik font-bold text-lg leading-tight mb-3">Confirm Cart</h2>

                    @include('checkout._confirm_cart_table')

                    @include('checkout._confirm_cart_mobile')
                </div>
            </div>
        </div>
    </section>
@endsection
