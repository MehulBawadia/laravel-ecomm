@extends('partials._layout')

@section('title')
    <title>Home Page | {{ config('app.name') }}</title>
@endsection

@section('pageStyles')
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css" />
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
@endsection

@section('pageScripts')
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script>
        $('.sliderImages').bxSlider({
            auto: true,
            pager: false
        });
    </script>
@endsection
