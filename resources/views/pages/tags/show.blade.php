@extends('partials._layout')

@section('title')
    <title>Tag Name | {{ config('app.name') }}</title>
    <meta name="description" content="EComm is a Laravel based E-Commerce web application built by Mehul Bawadia.">
    <meta name="keywords" content="ECommerce, web application, website, products, online selling">
    <link rel="canonical" href="{{ route('tags.show', 'tag-1') }}" />
@endsection

@section('content')
    <section class="breadCrumbs border-b">
        <div class="container mx-auto">
            <div class="py-3 px-4">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <ul class="flex items-center font-Rubik text-sm">
                        <li><a href="{{ route('homePage') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150">Home</a></li>
                        <li class="mx-2 text-gray-400 text-xs"><i class="fas fa-chevron-right"></i></li>
                        <li class="text-gray-400">Tag 1</li>
                    </ul>

                    <h1 class="font-Rubik font-bold uppercase text-2xl leading-6 mt-2 sm:mt-0">
                        <small class="text-sm text-gray-400 mr-2">Products tagged in </small> Tag 1
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="filtersAndProducts">
        <div class="container mx-auto">
            <div class="px-4 py-16 flex flex-col sm:flex-row gap-8">
                @include('pages.tags._filter')

                <div class="w-full sm:w-2/3 md:w-4/5 space-y-16">
                    <div class="productItem hover:shadow-md rounded">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-none">
                                <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" class="w-full md:w-80 overflow-x-none" />
                            </div>
                            <div class="ml-2 pt-1">
                                <div class="rating text-sm text-gray-600">
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>

                                <div class="my-2">
                                    <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 text-xl font-Rubik font-bold hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Product 1">Product 1</a>
                                </div>
                                <div class="my-2 text-blue-500 font-Rubik font-semibold">
                                    &#8377; 15,000.00
                                </div>

                                <div class="my-6">
                                    <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                                </div>

                                <div class="border-t-2 mt-5">
                                    <p class="text-gray-500 py-5 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum explicabo, dolores porro exercitationem reprehenderit, quasi optio animi quam autem, suscipit, aliquid nisi voluptatem veritatis expedita odit in amet at nostrum excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productItem hover:shadow-md rounded">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-none">
                                <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product 2" title="Product 2" class="w-full md:w-80 overflow-x-none" />
                            </div>
                            <div class="ml-2 pt-1">
                                <div class="rating text-sm">
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>

                                <div class="my-2">
                                    <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 text-xl font-Rubik font-bold hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Product 1">Product 1</a>
                                </div>
                                <div class="my-2 text-blue-500 font-Rubik font-semibold">
                                    &#8377; 20,000.00
                                </div>

                                <div class="my-6">
                                    <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                                </div>

                                <div class="border-t-2 mt-5">
                                    <p class="text-gray-500 py-5 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum explicabo, dolores porro exercitationem reprehenderit, quasi optio animi quam autem, suscipit, aliquid nisi voluptatem veritatis expedita odit in amet at nostrum excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productItem hover:shadow-md rounded">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-none">
                                <img src="{{ asset('/images/products/demo-image-3.jpg') }}" alt="Product 3" title="Product 3" class="w-full md:w-80 overflow-x-none" />
                            </div>
                            <div class="ml-2 pt-1">
                                <div class="rating text-sm">
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>

                                <div class="my-2">
                                    <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 text-xl font-Rubik font-bold hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Product 3">Product 3</a>
                                </div>
                                <div class="my-2 text-blue-500 font-Rubik font-semibold">
                                    &#8377; 18,500.00
                                </div>

                                <div class="my-6">
                                    <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                                </div>

                                <div class="border-t-2 mt-5">
                                    <p class="text-gray-500 py-5 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum explicabo, dolores porro exercitationem reprehenderit, quasi optio animi quam autem, suscipit, aliquid nisi voluptatem veritatis expedita odit in amet at nostrum excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productItem hover:shadow-md rounded">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-none">
                                <img src="{{ asset('/images/products/demo-image-4.jpg') }}" alt="Product 4" title="Product 4" class="w-full md:w-80 overflow-x-none" />
                            </div>
                            <div class="ml-2 pt-1">
                                <div class="rating text-sm">
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                </div>

                                <div class="my-2">
                                    <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 text-xl font-Rubik font-bold hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Product 4">Product 4</a>
                                </div>
                                <div class="my-2 text-blue-500 font-Rubik font-semibold">
                                    &#8377; 10,000.00
                                </div>

                                <div class="my-6">
                                    <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                                </div>

                                <div class="border-t-2 mt-5">
                                    <p class="text-gray-500 py-5 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum explicabo, dolores porro exercitationem reprehenderit, quasi optio animi quam autem, suscipit, aliquid nisi voluptatem veritatis expedita odit in amet at nostrum excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productItem hover:shadow-md rounded">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-none">
                                <img src="{{ asset('/images/products/demo-image-5.jpg') }}" alt="Product 5" title="Product 5" class="w-full md:w-80 overflow-x-none" />
                            </div>
                            <div class="ml-2 pt-1">
                                <div class="rating text-sm">
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>

                                <div class="my-2">
                                    <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 text-xl font-Rubik font-bold hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Product 5">Product 5</a>
                                </div>
                                <div class="my-2 text-blue-500 font-Rubik font-semibold">
                                    &#8377; 25,000.00
                                </div>

                                <div class="my-6">
                                    <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                                </div>

                                <div class="border-t-2 mt-5">
                                    <p class="text-gray-500 py-5 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum explicabo, dolores porro exercitationem reprehenderit, quasi optio animi quam autem, suscipit, aliquid nisi voluptatem veritatis expedita odit in amet at nostrum excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productItem hover:shadow-md rounded">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-none">
                                <img src="{{ asset('/images/products/demo-image-6.jpg') }}" alt="Product 6" title="Product 6" class="w-full md:w-80 overflow-x-none" />
                            </div>
                            <div class="ml-2 pt-1">
                                <div class="rating text-sm">
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>

                                <div class="my-2">
                                    <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 text-xl font-Rubik font-bold hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Product 6">Product 6</a>
                                </div>
                                <div class="my-2 text-blue-500 font-Rubik font-semibold">
                                    &#8377; 27,460.00
                                </div>

                                <div class="my-6">
                                    <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                                </div>

                                <div class="border-t-2 mt-5">
                                    <p class="text-gray-500 py-5 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum explicabo, dolores porro exercitationem reprehenderit, quasi optio animi quam autem, suscipit, aliquid nisi voluptatem veritatis expedita odit in amet at nostrum excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productItem hover:shadow-md rounded">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-none">
                                <img src="{{ asset('/images/products/demo-image-7.jpg') }}" alt="Product 7" title="Product 7" class="w-full md:w-80 overflow-x-none" />
                            </div>
                            <div class="ml-2 pt-1">
                                <div class="rating text-sm">
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="fas fa-star text-blue-500"></i></span>
                                    <span><i class="far fa-star text-gray-400"></i></span>
                                    <span><i class="far fa-star text-gray-400"></i></span>
                                    <span><i class="far fa-star text-gray-400"></i></span>
                                </div>

                                <div class="my-2">
                                    <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 text-xl font-Rubik font-bold hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Product 7">Product 7</a>
                                </div>
                                <div class="my-2 text-blue-500 font-Rubik font-semibold">
                                    &#8377; 6,800.00
                                </div>

                                <div class="my-6">
                                    <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                                </div>

                                <div class="border-t-2 mt-5">
                                    <p class="text-gray-500 py-5 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum explicabo, dolores porro exercitationem reprehenderit, quasi optio animi quam autem, suscipit, aliquid nisi voluptatem veritatis expedita odit in amet at nostrum excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="productItem hover:shadow-md rounded">
                        <div class="flex flex-col md:flex-row gap-6">
                            <div class="flex-none">
                                <img src="{{ asset('/images/products/demo-image-8.jpg') }}" alt="Product 8" title="Product 8" class="w-full md:w-80 overflow-x-none" />
                            </div>
                            <div class="ml-2 pt-1">
                                <div class="rating text-sm">
                                    <span><i class="far fa-star text-gray-400"></i></span>
                                    <span><i class="far fa-star text-gray-400"></i></span>
                                    <span><i class="far fa-star text-gray-400"></i></span>
                                    <span><i class="far fa-star text-gray-400"></i></span>
                                    <span><i class="far fa-star text-gray-400"></i></span>
                                </div>

                                <div class="my-2">
                                    <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 text-xl font-Rubik font-bold hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150" title="Product 8">Product 8</a>
                                </div>
                                <div class="my-2 text-blue-500 font-Rubik font-semibold">
                                    &#8377; 10,000.00
                                </div>

                                <div class="my-6">
                                    <a href="#" class="bg-blue-500 text-white shadow-md px-5 py-3 text-sm font-Rubik font-bold uppercase tracking-widest leading-9 hover:bg-blue-600 focus:bg-blue-600 transition ease-in-out duration-150">Add To Cart</a>
                                </div>

                                <div class="border-t-2 mt-5">
                                    <p class="text-gray-500 py-5 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum explicabo, dolores porro exercitationem reprehenderit, quasi optio animi quam autem, suscipit, aliquid nisi voluptatem veritatis expedita odit in amet at nostrum excepturi!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
