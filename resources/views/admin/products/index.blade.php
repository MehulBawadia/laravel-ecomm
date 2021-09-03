@extends('admin.partials._layout')

@section('title')
    <title>Products | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Products</h1>
    </div>
@endsection

@section('content')
    <section class="latestOrders my-12">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mx-4">
                <h2 class="text-xl font-medium tracking-wide">All Products</h2>

                <div>
                    <button class="linkAddNewProduct bg-blue-500 text-sm text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-blue-600 focus:bg-blue-600 tracking-wider font-medium"><i class="fas fa-plus text-xs"></i> Add New</button>
                </div>
            </div>

            @include('admin.products._create')

            <div class="bg-white rounded-md shadow mx-4 mt-3">
                @include('admin.products._table')
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script>
        $('body').on('click', '.btnAction', function (e) {
            e.preventDefault();

            $(this).addClass('bg-transparent outline-none border-0 focus:outline-none focus:border-0');

            var product = $(this).attr('data-product');

            $(product).toggleClass('hidden');

            return false;
        });

        $('.linkAddNewProduct').on('click', function (e) {
            e.preventDefault();

            $('#sectionAddNewProduct').slideDown().removeClass('hidden').addClass('transition ease-in-out duration-150');

            return false;
        });

        $('.linkCancel').on('click', function(e) {
            e.preventDefault();

            $('#sectionAddNewProduct').slideUp().addClass('hidden').removeClass('transition ease-in-out duration-150');

            return false;
        });
    </script>
@endsection
