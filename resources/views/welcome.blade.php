@extends('partials._layout')

@section('title')
    <title>Home Page | {{ config('app.name') }}</title>
    <meta name="description" content="EComm is a Laravel based E-Commerce web application built by Mehul Bawadia.">
    <meta name="keywords" content="ECommerce, web application, website, products, online selling">
    <link rel="canonical" href="{{ route('homePage') }}" />
@endsection

@section('pageStyles')
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
@endsection

@section('content')
    <section class="sliderImages">
        <div>
            <img src="{{ asset('/images/slider/image-1.jpg') }}" alt="Slider 1" title="Slider 1" class="border-0" />
        </div>
        <div>
            <img src="{{ asset('/images/slider/image-2.jpg') }}" alt="Slider 2" title="Slider 2" class="border-0" />
        </div>
    </section>

    <section class="shopByCategory">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 py-8 px-4">
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-1.jpg') }}" alt="Category 1" title="Category 1" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="{{ route('categories.show', 'category-1') }}" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Category Name 1">Category Name 1</a>
                </div>
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-2.jpg') }}" alt="Category 2" title="Category 2" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="{{ route('categories.show', 'category-1') }}" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Category Name 2">Category Name 2</a>
                </div>
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-3.jpg') }}" alt="Category 3" title="Category 3" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="{{ route('categories.show', 'category-1') }}" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Category Name 3">Category Name 3</a>
                </div>
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-4.jpg') }}" alt="Category 4" title="Category 4" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="{{ route('categories.show', 'category-1') }}" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Category Name 4">Category Name 4</a>
                </div>
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-5.jpg') }}" alt="Category 5" title="Category 5" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="{{ route('categories.show', 'category-1') }}" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Category Name 5">Category Name 5</a>
                </div>
            </div>
        </div>
    </section>

    <section class="thisWeeksDeals py-16">
        <div class="container mx-auto">
            <div class="text-center">
                <h3 class="font-Rubik font-bold uppercase text-4xl leading-9">This Week's Deals</h3>
            </div>

            <div class="py-8 px-4 mt-8 owl-carousel">
                <div class="bg-white hover:shadow-md transition ease-in-out duration-150">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" />
                    </div>
                    <div class="px-8 py-5">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 1">Product 1</a>
                        </div>
                        <div class="mt-2 text-blue-500 font-Rubik font-semibold">
                            &#8377; 15,000.00
                        </div>
                    </div>
                </div>
                <div class="bg-white hover:shadow-md transition ease-in-out duration-150">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product 2" title="Product 2" />
                    </div>
                    <div class="px-8 py-5">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 2">Product 2</a>
                        </div>
                        <div class="mt-2 text-blue-500 font-Rubik font-semibold">
                            &#8377; 10,000.00
                        </div>
                    </div>
                </div>
                <div class="bg-white hover:shadow-md transition ease-in-out duration-150">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-3.jpg') }}" alt="Product 3" title="Product 3" />
                    </div>
                    <div class="px-8 py-5">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 3">Product 3</a>
                        </div>
                        <div class="mt-2 text-blue-500 font-Rubik font-semibold">
                            &#8377; 20,000.00
                        </div>
                    </div>
                </div>
                <div class="bg-white hover:shadow-md transition ease-in-out duration-150">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-4.jpg') }}" alt="Product 4" title="Product 4" />
                    </div>
                    <div class="px-8 py-5">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 4">Product 4</a>
                        </div>
                        <div class="mt-2 font-Rubik">
                            <span class="text-gray-400 line-through">&#8377; 25,000.00</span>
                            <span class="text-blue-500 font-semibold">&#8377; 18,000.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="-mt-80 py-32" style="background: url({{ asset('/images/bg-banner-1.jpg') }}) no-repeat;">
            <div class="flex flex-wrap items-center justify-center space-x-4 sm:space-x-8 md:space-x-16 mt-56">
                <div class="mt-8">
                    <div class="bg-blue-500 w-16 md:w-28 h-16 md:h-28 font-bold rounded-full flex items-center justify-center text-lg text-white">200</div>
                    <p class="mt-2 text-center text-gray-400 uppercase">Days</p>
                </div>
                <div class="mt-8">
                    <div class="bg-blue-500 w-16 md:w-28 h-16 md:h-28 font-bold rounded-full flex items-center justify-center text-lg text-white">15</div>
                    <p class="mt-2 text-center text-gray-400 uppercase">Hours</p>
                </div>
                <div class="mt-8">
                    <div class="bg-blue-500 w-16 md:w-28 h-16 md:h-28 font-bold rounded-full flex items-center justify-center text-lg text-white">18</div>
                    <p class="mt-2 text-center text-gray-400 uppercase">Minutes</p>
                </div>
                <div class="mt-8">
                    <div class="bg-blue-500 w-16 md:w-28 h-16 md:h-28 font-bold rounded-full flex items-center justify-center text-lg text-white">10</div>
                    <p class="mt-2 text-center text-gray-400 uppercase">Seconds</p>
                </div>
            </div>
        </div>
    </section>

    <section class="topProducts py-16 px-4">
        <div class="container mx-auto">
            <div class="text-center">
                <h3 class="font-Rubik font-bold uppercase text-4xl leading-9">Top Products</h3>

                <ul class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 font-Rubik font-semibold mt-12">
                    <li class="mt-4"><a href="#" class="block w-full bg-blue-500 text-white rounded py-1" title="Filter All Products" data-filter="all">All</a></li>
                    <li class="mt-4"><a href="#" class="block w-full text-gray-500 rounded py-1 hover:text-white hover:bg-blue-500" title="Filter Latest Products" data-filter="latest">Latest</a></li>
                    <li class="mt-4"><a href="#" class="block w-full text-gray-500 rounded py-1 hover:text-white hover:bg-blue-500" title="Filter Featured Products" data-filter="featured">Featured</a></li>
                    <li class="mt-4"><a href="#" class="block w-full text-gray-500 rounded py-1 hover:text-white hover:bg-blue-500" title="Filter Top Rated Products" data-filter="topRated">Top Rated</a></li>
                    <li class="mt-4"><a href="#" class="block w-full text-gray-500 rounded py-1 hover:text-white hover:bg-blue-500" title="Filter Best Seller Products" data-filter="bestSeller">Best Seller</a></li>
                </ul>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-16">
                <div class="productItem bg-white hover:shadow-md transition ease-in-out duration-150" data-category="latest">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" />
                    </div>
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 1">Product 1</a>
                        </div>
                        <div class="mt-2 text-blue-500 font-Rubik font-semibold">
                            &#8377; 15,000.00
                        </div>
                    </div>
                </div>

                <div class="productItem bg-white hover:shadow-md transition ease-in-out duration-150" data-category="featured">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product 2" title="Product 2" />
                    </div>
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 2">Product 2</a>
                        </div>
                        <div class="mt-2 text-blue-500 font-Rubik font-semibold">
                            &#8377; 10,000.00
                        </div>
                    </div>
                </div>

                <div class="productItem bg-white hover:shadow-md transition ease-in-out duration-150" data-category="bestSeller">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-3.jpg') }}" alt="Product 3" title="Product 3" />
                    </div>
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 3">Product 3</a>
                        </div>
                        <div class="mt-2 text-blue-500 font-Rubik font-semibold">
                            &#8377; 20,000.00
                        </div>
                    </div>
                </div>

                <div class="productItem bg-white hover:shadow-md transition ease-in-out duration-150" data-category="topRated">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-4.jpg') }}" alt="Product 4" title="Product 4" />
                    </div>
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 4">Product 4</a>
                        </div>
                        <div class="mt-2 font-Rubik">
                            <span class="text-gray-400 line-through">&#8377; 25,000.00</span>
                            <span class="text-blue-500 font-semibold">&#8377; 18,000.00</span>
                        </div>
                    </div>
                </div>

                <div class="productItem bg-white hover:shadow-md transition ease-in-out duration-150" data-category="latest">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-5.jpg') }}" alt="Product 5" title="Product 5" />
                    </div>
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 5">Product 5</a>
                        </div>
                        <div class="mt-2 font-Rubik">
                            <span class="text-blue-500 font-semibold">&#8377; 30,000.00</span>
                        </div>
                    </div>
                </div>

                <div class="productItem bg-white hover:shadow-md transition ease-in-out duration-150" data-category="topRated">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-6.jpg') }}" alt="Product 6" title="Product 6" />
                    </div>
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 6">Product 6</a>
                        </div>
                        <div class="mt-2 font-Rubik">
                            <span class="text-blue-500 font-semibold">&#8377; 29,500.00</span>
                        </div>
                    </div>
                </div>

                <div class="productItem bg-white hover:shadow-md transition ease-in-out duration-150" data-category="featured">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-7.jpg') }}" alt="Product 7" title="Product 7" />
                    </div>
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 7">Product 7</a>
                        </div>
                        <div class="mt-2 font-Rubik">
                            <span class="text-blue-500 font-semibold">&#8377; 22,250.00</span>
                        </div>
                    </div>
                </div>

                <div class="productItem bg-white hover:shadow-md transition ease-in-out duration-150" data-category="bestSeller">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-8.jpg') }}" alt="Product 8" title="Product 8" />
                    </div>
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star text-blue-500"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150" title="Product 8">Product 8</a>
                        </div>
                        <div class="mt-2 font-Rubik">
                            <span class="text-blue-500 font-semibold">&#8377; 15,750.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mainFeaturedProduct py-32 px-4 bg-blue-500">
        <div class="container mx-auto">
            <div class="sm:flex justify-around">
                <div class="flex-none sm:w-1/3">
                    <img src="{{ asset('/images/products/main-featured-1.png') }}" alt="Main Featured Product Name" title="Main Featured Product Name" class="block mx-auto" />
                </div>
                <div class="mt-16 sm:mt-0 sm:ml-16">
                    <h3 class="text-white font-Rubik font-bold text-5xl">Main Featured<br />Product Name</h3>

                    <p class="mt-12 text-gray-100">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non minima deleniti, alias omnis facilis deserunt expedita recusandae ipsam provident itaque aperiam doloribus harum quis beatae necessitatibus excepturi saepe atque quam. Alias minus, sapiente laborum, dolorem unde excepturi omnis vero est consequuntur a? Voluptate esse ex, veniam eligendi placeat nobis laboriosam mollitia officiis iste sequi rerum et, dicta deserunt accusamus veritatis, reiciendis autem, provident ad similique quis voluptatibus.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="stats py-16 px-4 bg-white">
        <div class="container mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="flex items-center border-l-2 pl-8 my-4">
                    <div class="text-blue-500 text-3xl w-12"><i class="far fa-thumbs-up"></i></div>
                    <div class="ml-5">
                        <h4 class="uppercase font-Rubik font-bold text-blue-500">100% Satisfaction</h4>
                        <p class="text-sm text-gray-400">If you are unable</p>
                    </div>
                </div>
                <div class="flex items-center border-l-2 pl-8 my-4">
                    <div class="text-blue-500 text-3xl w-12"><i class="far fa-credit-card"></i></div>
                    <div class="ml-5">
                        <h4 class="uppercase font-Rubik font-bold text-blue-500">Save 20% When You</h4>
                        <p class="text-sm text-gray-400">Use Credit Card</p>
                    </div>
                </div>
                <div class="flex items-center border-l-2 pl-8 my-4">
                    <div class="text-blue-500 text-3xl w-12"><i class="fas fa-shipping-fast"></i></div>
                    <div class="ml-5">
                        <h4 class="uppercase font-Rubik font-bold text-blue-500">Fast Free Shipment</h4>
                        <p class="text-sm text-gray-400">Load any computers'</p>
                    </div>
                </div>
                <div class="flex items-center border-l-2 pl-8 my-4">
                    <div class="text-blue-500 text-3xl w-12"><i class="fas fa-money-check"></i></div>
                    <div class="ml-5">
                        <h4 class="uppercase font-Rubik font-bold text-blue-500">30 Days Money Back</h4>
                        <p class="text-sm text-gray-400">If unsatisfied</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('.sliderImages').bxSlider({
            auto: true,
            pager: false
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            responsive: {
                0: {
                    items: 1,
                },
                480: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                1024: {
                    items: 4,
                }
            }
        });

        var products = $('.productItem');
        $('.topProducts ul li a').on('click', function (e) {
            e.preventDefault();

            $('.topProducts ul li a').removeClass('bg-blue-500 text-white').addClass('text-gray-500');
            $(this).addClass('bg-blue-500 text-white').removeClass('text-gray-500');

            var selectedCategoryFilter = $(this).data('filter');

            products.hide().filter(function () {
                if (selectedCategoryFilter === 'all') {
                    return $(this).data('category') !== selectedCategoryFilter;
                }

                return $(this).data('category') === selectedCategoryFilter;
            }).show();

            return false;
        });
    </script>
@endsection
