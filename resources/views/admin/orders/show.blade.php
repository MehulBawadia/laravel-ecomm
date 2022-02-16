@extends('admin.partials._layout')

@section('title')
    <title>View: Order 1 | {{ config('app.name') }}</title>
@endsection

@section('pageStyles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css" />
    <style>
        .selectize-control.single .selectize-input > div, {
            margin: 0 3px 0 0;
            padding: 0 1px;
        }

        .selectize-control.multi .selectize-input > div {
            background: #3b82f6;
            color: #fff;
            border-radius: .25rem;
            margin: 0 3px 0 0;
            padding: 1px 6px;
        }
    </style>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
            <li><a href="{{ route('admin.orders') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Orders</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">View: Order 1</h1>
    </div>
@endsection

@section('content')
    <section class="generalInformation mt-8 pt-16 px-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-medium tracking-wide">Products Details</h2>
            </div>

            @include('admin.orders._products_info')
        </div>
    </section>

    <section class="addressSection mt-8">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-medium tracking-wide">Address Details</h2>
            </div>

            @include('admin.orders._address_details')
        </div>
    </section>

    <section class="historySection mt-8">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-medium tracking-wide">History Details</h2>

                <div>
                    <button class="linkAddNewHistory bg-blue-500 text-sm text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-blue-600 focus:bg-blue-600 tracking-wider font-medium">
                        <i class="fas fa-plus text-xs"></i> Add New
                    </button>
                </div>
            </div>

            @include('admin.orders._add_history_detail')

            @include('admin.orders._history_details')
        </div>
    </section>
@endsection

@section('pageScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
    <script>
        $('.linkAddNewHistory').on('click', function (e) {
            e.preventDefault();

            $('#sectionAddNewHistory').slideDown().removeClass('hidden').addClass('transition ease-in-out duration-150');

            return false;
        });

        $('.linkCancel').on('click', function(e) {
            e.preventDefault();

            $('#sectionAddNewHistory').slideUp().addClass('hidden').removeClass('transition ease-in-out duration-150');

            return false;
        });

        $('select#products').selectize({
            openOnSelect: false,
            hideSelected: true,
            closeAfterSelect: false,
            placeholder: "Select Products"
        });

        var $selectizeStatus = $('select#status').selectize({
            openOnSelect: false,
            hideSelected: true,
            closeAfterSelect: false,
            placeholder: "Select Status"
        });

        $selectizeStatus.on('change', function (e) {
            var selectedStatus = e.target.value;

            $('.shippingProvider').addClass('hidden');
            if (selectedStatus == "shipped") {
                $('.shippingProvider').removeClass('hidden');
            }
        });
    </script>
@endsection
