@extends('admin.partials._layout')

@section('title')
    <title>Orders | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Orders</h1>
    </div>
@endsection

@section('content')
    <section class="latestOrders mt-8 pt-16 px-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-medium tracking-wide">All Orders</h2>
            </div>

            <div class="bg-white rounded-md shadow mt-3 overflow-x-auto allOrdersTable">
                @include('admin.orders._table')
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script>
        $('body').on('click', '.btnAction', function (e) {
            e.preventDefault();

            $(this).addClass('bg-transparent outline-none border-0 focus:outline-none focus:border-0');

            var order = $(this).attr('data-order');

            $(order).toggleClass('hidden');

            return false;
        });
    </script>
@endsection
