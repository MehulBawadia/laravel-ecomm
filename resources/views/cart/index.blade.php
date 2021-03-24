@extends('partials._layout')

@section('title')
    <title>Cart | {{ config('app.name') }}</title>
    <meta name="description" content="EComm is a Laravel based E-Commerce web application built by Mehul Bawadia.">
    <meta name="keywords" content="ECommerce, web application, website, products, online selling">
    <link rel="canonical" href="{{ route('cart.index') }}" />
@endsection

@section('content')
    <section class="breadCrumbs border-b">
        <div class="container mx-auto">
            <div class="py-3 px-4">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <ul class="flex items-center font-Rubik text-sm">
                        <li><a href="{{ route('homePage') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150">Home</a></li>
                        <li class="mx-2 text-gray-400 text-xs"><i class="fas fa-chevron-right"></i></li>
                        <li class="text-gray-400">Cart</li>
                    </ul>

                    <h1 class="font-Rubik font-bold uppercase text-2xl leading-6 mt-2 sm:mt-0">
                        <small class="text-sm text-gray-400 mr-2">Products added in </small> Cart
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="cartTable py-16 bg-gray-100">
        <div class="container mx-auto">
            <div class="px-4">
                @include('cart._table')

                @include('cart._mobile')

                <div class="text-right my-8">
                    <a href="#" class="bg-blue-500 text-white py-2 px-3 uppercase font-bold tracking-wider focus:outline-none focus:bg-blue-600" title="Proceed To Checkout">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </section>
@endsection
