@extends('partials._layout')

@section('title')
    <title>Home Page | {{ config('app.name') }}</title>
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

                    <a href="#" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Category Name 1</a>
                </div>
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-2.jpg') }}" alt="Category 2" title="Category 2" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="#" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Category Name 2</a>
                </div>
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-3.jpg') }}" alt="Category 3" title="Category 3" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="#" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Category Name 3</a>
                </div>
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-4.jpg') }}" alt="Category 4" title="Category 4" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="#" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Category Name 4</a>
                </div>
                <div class="my-8">
                    <img src="{{ asset('/images/categories/category-image-5.jpg') }}" alt="Category 5" title="Category 5" class="block mx-auto hover:animate-pulse transition ease-in-out duration-150" />

                    <a href="#" class="block mt-2 text-gray-900 text-center hover:text-blue-500 font-Rubik font-semibold text-sm focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Category Name 5</a>
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
                            <a href="#" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 1</a>
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
                            <a href="#" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 2</a>
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
                            <a href="#" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 3</a>
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
                            <a href="#" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 4</a>
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
    </script>
@endsection
