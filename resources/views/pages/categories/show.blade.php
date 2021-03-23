@extends('partials._layout')

@section('title')
    <title>Category Name | {{ config('app.name') }}</title>
    <link rel="canonical" href="{{ route('categories.show', 'category-1') }}" />
@endsection

@section('content')
    <section class="breadCrumbs">
        <div class="container mx-auto">
            <div class="py-4 px-4 border-b flex flex-col sm:flex-row justify-between items-center">
                <ul class="flex text-sm">
                    <li><a href="{{ route('homePage') }}" class="font-Rubik text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Home</a></li>
                    <li class="mx-2 text-gray-400 font-Rubik">&gt;</li>
                    <li class="text-blue-500 font-Rubik">Category 1</li>
                </ul>

                <h1 class="font-Rubik font-bold uppercase text-2xl leading-6 mt-2 sm:mt-0">Category 1</h1>
            </div>
        </div>
    </section>

    <section class="filtersAndProducts">
        <div class="container mx-auto">
            <div class="px-4 py-16 flex flex-col sm:flex-row">
                @include('pages.categories._filter')

                <div class="w-full md:2/3 lg:w-4/5"></div>
            </div>
        </div>
    </section>
@endsection
