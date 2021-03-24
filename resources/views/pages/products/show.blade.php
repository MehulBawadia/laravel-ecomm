@extends('partials._layout')

@section('title')
    <title>Product Name | {{ config('app.name') }}</title>
    <meta name="description" content="EComm is a Laravel based E-Commerce web application built by Mehul Bawadia.">
    <meta name="keywords" content="ECommerce, web application, website, products, online selling">
    <link rel="canonical" href="{{ route('products.show', 'category-1') }}" />
@endsection

@section('content')
    <section class="breadCrumbs">
        <div class="container mx-auto">
            <div class="py-4 px-4">
                <div class="border-b pb-3 flex flex-col sm:flex-row justify-between items-center">
                    <ul class="flex text-sm">
                        <li><a href="{{ route('homePage') }}" class="font-Rubik text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Home</a></li>
                        <li class="mx-2 text-gray-400 font-Rubik">&gt;</li>
                        <li><a href="{{ route('categories.show', 'category-1') }}" class="font-Rubik text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Category 1</a></li>
                        <li class="mx-2 text-gray-400 font-Rubik">&gt;</li>
                        <li class="text-blue-500 font-Rubik">Product 1</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="productDetails">
        <div class="container mx-auto">
            <div class="px-4 py-16 flex flex-col lg:flex-row gap-8">
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" class="block mx-auto" />
                </div>
                <div class="w-full lg:w-1/2">
                    <h1 class="font-Rubik font-bold text-4xl leading-6 mt-2 sm:mt-0">
                        Product 1
                    </h1>

                    <div class="my-6 text-2xl leading-6 text-blue-500 font-Rubik font-semibold">
                        &#8377; 15,000.00
                    </div>

                    <div class="my-6">
                        <span><i class="fas fa-star text-blue-500"></i></span>
                        <span><i class="fas fa-star text-blue-500"></i></span>
                        <span><i class="fas fa-star text-blue-500"></i></span>
                        <span><i class="fas fa-star text-blue-500"></i></span>
                        <span><i class="fas fa-star text-blue-500"></i></span>

                        <span class="text-gray-400">(1 customer review)</span>
                    </div>

                    <div class="my-6 text-gray-500">
                        <span>Availability:</span>
                        <span class="text-xl ml-1"><i class="far fa-check-square"></i></span>
                        <span class="ml-1">5 in stock</span>
                    </div>

                    <div class="my-6 text-gray-500">
                        Lorem, ipsum dolor, sit amet consectetur adipisicing elit. A possimus aspernatur, accusamus optio consequuntur laboriosam similique deleniti nesciunt, rerum officia beatae? Voluptatum aut velit nostrum qui. Nemo accusamus eligendi quaerat.
                    </div>

                    <div class="my-8">
                        <div class="flex items-center gap-5">
                            <div class="flex-none">
                                <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                            </div>

                            <div>
                                <a href="#" class="text-gray-500 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Add To Wishlist"><i class="far fa-heart"></i> Add To Wishlist</a>
                            </div>
                        </div>
                    </div>

                    <div class="my-10">
                        <div class="border-b py-3">
                            <span class="text-gray-900">SKU:</span>
                            <span class="text-gray-400">VHN00504</span>
                        </div>
                        <div class="border-b py-3">
                            <span class="text-gray-900">Categories:</span>
                            <a href="{{ route('categories.show', 'category-1') }}" class="text-gray-400 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Category 1</a>,
                            <a href="{{ route('categories.show', 'category-1') }}" class="text-gray-400 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Category 2</a>
                        </div>
                        <div class="border-b py-3">
                            <span class="text-gray-900">Tags:</span>
                            <a href="#" class="text-gray-400 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Tag 1</a>,
                            <a href="#" class="text-gray-400 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Tag 2</a>
                        </div>
                        <div class="border-b py-3 flex items-center">
                            <div class="text-gray-900">Share:</div>

                            <a href="https://www.facebook.com/sharer.php?u={{ route('products.show', 'product-1') }}" target="_blank" rel="nofollow noopener" class="text-sm text-gray-500 hover:text-blue-500 focus:text-blue-500 focus:outline-none">
                                <div class="rounded-full border flex items-center justify-center w-8 h-8 ml-2 hover:border-blue-500">
                                    <i class="fab fa-facebook"></i>
                                </div>
                            </a>

                            <a href="https://twitter.com/intent/tweet?url={{ route('products.show', 'product-1') }}&text=&via=" target="_blank" rel="nofollow noopener" class="text-sm text-gray-500 hover:text-blue-500 focus:text-blue-500 focus:outline-none">
                                <div class="rounded-full border flex items-center justify-center w-8 h-8 ml-2 hover:border-blue-500">
                                    <i class="fab fa-twitter"></i>
                                </div>
                            </a>

                            <a href="https://www.linkedin.com/shareArticle?url={{ route('products.show', 'product-1') }}&title" target="_blank" rel="nofollow noopener" class="text-sm text-gray-500 hover:text-blue-500 focus:text-blue-500 focus:outline-none">
                                <div class="rounded-full border flex items-center justify-center w-8 h-8 ml-2 hover:border-blue-500">
                                    <i class="fab fa-linkedin-in"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
