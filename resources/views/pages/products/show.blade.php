@extends('partials._layout')

@section('title')
    <title>Product Name | {{ config('app.name') }}</title>
    <meta name="description" content="EComm is a Laravel based E-Commerce web application built by Mehul Bawadia.">
    <meta name="keywords" content="ECommerce, web application, website, products, online selling">
    <link rel="canonical" href="{{ route('products.show', 'category-1') }}" />
@endsection

@section('content')
    <section class="breadCrumbs border-b">
        <div class="container mx-auto">
            <div class="py-3 px-4">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <ul class="flex items-center font-Rubik text-sm">
                        <li><a href="{{ route('homePage') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150">Home</a></li>
                        <li class="mx-2 text-gray-400 text-xs"><i class="fas fa-chevron-right"></i></li>
                        <li><a href="{{ route('categories.show', 'category-1') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150">Category 1</a></li>
                        <li class="mx-2 text-gray-400 text-xs"><i class="fas fa-chevron-right"></i></li>
                        <li class="text-gray-400">Product 1</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="breadCrumbs">
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
    </section> --}}

    <section class="productDetails">
        <div class="container mx-auto">
            <div class="px-4 py-16 flex flex-col lg:flex-row gap-6">
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" class="block mx-auto lg:m-0" id="mainProductImage" />

                    <div class="flex flex-wrap gap-5 mt-5" id="productGallery">
                        <a href="#" data-image="{{ asset('/images/products/demo-image-1.jpg') }}" data-zoom-image="{{ asset('/images/products/demo-image-1.jpg') }}">
                            <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" class="w-32">
                        </a>
                        <a href="#" data-image="{{ asset('/images/products/demo-image-2.jpg') }}" data-zoom-image="{{ asset('/images/products/demo-image-2.jpg') }}">
                            <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product 1" title="Product 1" class="w-32">
                        </a>
                        <a href="#" data-image="{{ asset('/images/products/demo-image-3.jpg') }}" data-zoom-image="{{ asset('/images/products/demo-image-3.jpg') }}">
                            <img src="{{ asset('/images/products/demo-image-3.jpg') }}" alt="Product 1" title="Product 1" class="w-32">
                        </a>
                        <a href="#" data-image="{{ asset('/images/products/demo-image-4.jpg') }}" data-zoom-image="{{ asset('/images/products/demo-image-4.jpg') }}">
                            <img src="{{ asset('/images/products/demo-image-4.jpg') }}" alt="Product 1" title="Product 1" class="w-32">
                        </a>
                        <a href="#" data-image="{{ asset('/images/products/demo-image-5.jpg') }}" data-zoom-image="{{ asset('/images/products/demo-image-5.jpg') }}">
                            <img src="{{ asset('/images/products/demo-image-5.jpg') }}" alt="Product 1" title="Product 1" class="w-32">
                        </a>
                    </div>
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
                        <div class="py-3 flex items-center">
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

    <section class="productInformation">
        <div class="container mx-auto">
            <div class="px-4 py-16 tabs">
                <ul class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    <li>
                        <a href="#description" class="leading-9 text-xl font-Rubik font-bold uppercase text-blue-500 block hover:text-blue-500 focus:outline-none">Description</a>
                    </li>
                    <li>
                        <a href="#reviews" class="leading-9 text-xl font-Rubik font-bold uppercase text-gray-500 block hover:text-blue-500 focus:outline-none">Reviews</a>
                    </li>
                </ul>

                <div id="description" class="text-gray-500 py-8 leading-relaxed space-y-4">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, corporis atque illum dolore voluptates illo repellat adipisci magnam iusto quia ipsam voluptatibus eveniet facilis eius unde placeat necessitatibus, ipsa dolores! Rerum alias nulla, optio laboriosam quasi facere vero, eligendi amet suscipit autem nihil sit, eveniet animi, dolores error placeat porro aspernatur provident corporis! Rerum consequuntur consectetur reiciendis, odit, dignissimos quasi quisquam. Placeat a corporis suscipit minus illo fugiat rem quod. Reprehenderit perspiciatis eaque eos ducimus et. Sit aperiam, maiores harum.
                    </p>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum, corporis atque illum dolore voluptates illo repellat adipisci magnam iusto quia ipsam voluptatibus eveniet facilis eius unde placeat necessitatibus, ipsa dolores! Rerum alias nulla, optio laboriosam quasi facere vero, eligendi amet suscipit autem nihil sit, eveniet animi, dolores error placeat porro aspernatur provident corporis! Rerum consequuntur consectetur reiciendis, odit, dignissimos quasi quisquam. Placeat a corporis suscipit minus illo fugiat rem quod. Reprehenderit perspiciatis eaque eos ducimus et. Sit aperiam, maiores harum.
                    </p>
                </div>

                <div id="reviews" class="py-8">
                    <div class="flex flex-col md:flex-row justify-between gap-8">
                        <div class="w-full md:w-1/2">
                            <h3 class="font-Rubik font-bold text-xl uppercase leading-6 mt-2 sm:mt-0">
                                2 Reviews
                            </h3>

                            <div class="flex mt-8">
                                <div class="flex-none">
                                    <img src="{{ asset('/images/user-default.jpg') }}" alt="User Full Name" title="User Full Name" class="rounded hidden md:inline-block" />
                                </div>
                                <div class="md:ml-3">
                                    <div>
                                        <span class="text-gray-900">User Full Name</span>
                                        <span class="text-gray-500">has given</span>
                                        <span><i class="fas fa-star text-blue-500"></i></span>
                                        <span><i class="fas fa-star text-blue-500"></i></span>
                                        <span><i class="fas fa-star text-blue-500"></i></span>
                                        <span><i class="fas fa-star text-blue-500"></i></span>
                                        <span class="text-gray-500 text-sm">on {{ now()->format('d M Y, h:i A') }}</span>
                                    </div>

                                    <div class="mt-3 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Soluta quo iure sint, aut ad laboriosam quasi labore reprehenderit voluptatem, omnis sit beatae harum optio dolore est quia quis in odit?
                                    </div>
                                </div>
                            </div>

                            <div class="flex mt-8">
                                <div class="flex-none">
                                    <img src="{{ asset('/images/user-default.jpg') }}" alt="User Full Name" title="User Full Name" class="rounded hidden md:inline-block" />
                                </div>
                                <div class="md:ml-3">
                                    <div>
                                        <span class="text-gray-900">User Full Name</span>
                                        <span class="text-gray-500">has given</span>
                                        <span><i class="fas fa-star text-blue-500"></i></span>
                                        <span><i class="fas fa-star text-blue-500"></i></span>
                                        <span><i class="fas fa-star text-blue-500"></i></span>
                                        <span><i class="fas fa-star text-blue-500"></i></span>
                                        <span class="text-gray-500 text-sm">on {{ now()->format('d M Y, h:i A') }}</span>
                                    </div>

                                    <div class="mt-3 text-gray-500">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Soluta quo iure sint, aut ad laboriosam quasi labore reprehenderit voluptatem, omnis sit beatae harum optio dolore est quia quis in odit?
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2">
                            <h3 class="font-Rubik font-bold text-xl uppercase leading-6 mt-2 sm:mt-0">
                                Add Your Review
                            </h3>

                            <p class="text-gray-500 mt-8">Your email address will not be published. Required fields are marked *</p>

                            <form action="#" method="POST" class="mt-8">
                                @csrf

                                <div class="flex flex-col sm:flex-row">
                                    <label class="text-gray-500">Your Rating:</label>

                                    <div class="flex items-center sm:ml-3 text-sm">
                                        <input type="radio" name="rating" value="1" id="1_star">
                                        <label for="1_star" class="text-blue-500 ml-1"><i class="fas fa-star"></i></label>
                                    </div>

                                    <div class="flex items-center sm:ml-3 text-sm">
                                        <input type="radio" name="rating" value="2" id="2_star">
                                        <label for="2_star" class="text-blue-500 ml-1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>

                                    <div class="flex items-center sm:ml-3 text-sm">
                                        <input type="radio" name="rating" value="3" id="3_star">
                                        <label for="3_star" class="text-blue-500 ml-1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>

                                    <div class="flex items-center sm:ml-3 text-sm">
                                        <input type="radio" name="rating" value="4" id="4_star">
                                        <label for="4_star" class="text-blue-500 ml-1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>

                                    <div class="flex items-center sm:ml-3 text-sm">
                                        <input type="radio" name="rating" value="5" id="5_star">
                                        <label for="5_star" class="text-blue-500 ml-1">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </label>
                                    </div>
                                </div>

                                <div class="w-full">
                                    <textarea name="review" id="review" class="mt-5 resize-none border px-5 py-2 focus:outline-none focus:ring w-full" placeholder="Your Review *" rows="8">{{ old('review') }}</textarea>
                                </div>

                                <div class="flex justify-center items-center gap-6 mt-5">
                                    <div class="w-1/2">
                                        <input type="text" name="full_name" id="fullName" class="border px-5 py-2 focus:outline-none focus:ring w-full" placeholder="Full Name *" />
                                    </div>
                                    <div class="w-1/2">
                                        <input type="email" name="email" id="email" class="border px-5 py-2 focus:outline-none focus:ring w-full" placeholder="E-Mail *" />
                                    </div>
                                </div>

                                <button type="submit" class="w-full mt-5 py-3 font-Rubik text-sm tracking-wider uppercase bg-blue-500 text-white hover:bg-blue-600 focus:bg-blue-600 focus:outline-none">Submit Review</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="thisWeeksDeals py-16">
        <div class="container mx-auto">
            <h3 class="font-Rubik font-bold uppercase text-4xl leading-9 pl-4">Related Products</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 py-8 px-4 mt-8">
                <div class="bg-white hover:shadow-md transition ease-in-out duration-150">
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
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 2</a>
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
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 3</a>
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
                    <div class="px-8 py-5 border border-t-0">
                        <div class="mt-2 text-xs">
                            <span><i class="fas fa-star text-blue-500"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 4</a>
                        </div>
                        <div class="mt-2 font-Rubik">
                            <span class="text-gray-400 line-through">&#8377; 25,000.00</span>
                            <span class="text-blue-500 font-semibold">&#8377; 18,000.00</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white hover:shadow-md transition ease-in-out duration-150">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-5.jpg') }}" alt="Product 5" title="Product 5" />
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
                            <a href="{{ route('products.show', 'product-1') }}" class="text-gray-900 hover:text-blue-500 font-Rubik font-semibold text-base focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 5</a>
                        </div>
                        <div class="mt-2 font-Rubik">
                            <span class="text-blue-500 font-semibold">&#8377; 18,000.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tabslet.js/1.7.3/jquery.tabslet.min.js"></script>
    <script>
        var productImage = $("#mainProductImage");

        productImage.ezPlus({
            responsive: true,
            easing: true,
            zoomType: "lens",
            lensSize: 150,
            lensShape: "round",
            containLensZoom: true,
            gallery: "productGallery",
        });

        $('.tabs ul li a').on('click', function (e) {
            var self = $(this).attr('href');

            $('.tabs ul li a').each(function (index, elem) {
                var element = $(elem);

                if (element.attr('href') === self) {
                    element.addClass('text-blue-500').removeClass('text-gray-500');
                } else {
                    element.removeClass('text-blue-500').addClass('text-gray-500');
                }
            });
        });

        $('.tabs').tabslet();
    </script>
@endsection
