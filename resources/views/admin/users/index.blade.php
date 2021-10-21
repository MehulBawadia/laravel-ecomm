@extends('admin.partials._layout')

@section('title')
    <title>Users | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Users</h1>
    </div>
@endsection

@section('content')
    <section class="latestOrders mt-8 pt-16 px-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-medium tracking-wide">All Users</h2>

                <div>
                    <button class="linkAddNewUser bg-indigo-500 text-sm text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium"><i class="fas fa-plus text-xs"></i> Add New</button>
                </div>
            </div>

            @include('admin.users._create')

            <div class="bg-white rounded-md shadow mt-3 overflow-x-auto allUsersTable">
                @include('admin.users._table')
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script>
        $('body').on('click', '.btnAction', function (e) {
            e.preventDefault();

            $(this).addClass('bg-transparent outline-none border-0 focus:outline-none focus:border-0');

            var user = $(this).attr('data-user');

            $(user).toggleClass('hidden');

            return false;
        });

        $('.linkAddNewUser').on('click', function (e) {
            e.preventDefault();

            $('#sectionAddNewUser').slideDown().removeClass('hidden').addClass('transition ease-in-out duration-150');

            return false;
        });

        $('.linkCancel').on('click', function(e) {
            e.preventDefault();

            $('#sectionAddNewUser').slideUp().addClass('hidden').removeClass('transition ease-in-out duration-150');

            return false;
        });
    </script>
@endsection
