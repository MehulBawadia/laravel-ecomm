@extends('admin.partials._layout')

@section('title')
    <title>Edit: Product 1 | {{ config('app.name') }}</title>
@endsection

@section('pageStyles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css" />
    <style>
        .selectize-control.multi .selectize-input>div {
            background: #3b82f6;
            color: #fff;
            border-radius: .25rem;
        }

        .ck-editor__editable {
            min-height: 20rem;
        }
    </style>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
            <li><a href="{{ route('admin.products') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Products</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Edit: Product 1</h1>
    </div>
@endsection

@section('content')
    <section class="generalInformation">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">General Information</h2>

            @include('admin.products._general_info')
        </div>
    </section>

    <section class="seoSection my-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">Images</h2>

            @include('admin.products._images')
        </div>
    </section>

    <section class="seoSection my-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">SEO Details</h2>

            @include('admin.products._seo_details')
        </div>
    </section>
@endsection

@section('pageScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        var $categoriesSelectize = $('select#categories').selectize({
            openOnSelect: false,
            hideSelected: true,
            closeAfterSelect: false
        });
        $categoriesSelectize[0].selectize.setValue([1]);

        var $tagsSelectize = $('select#tags').selectize({
            openOnSelect: false,
            hideSelected: true,
            closeAfterSelect: false
        });
        $tagsSelectize[0].selectize.setValue([1, 2]);

        $('select#related_products').selectize({
            openOnSelect: false,
            hideSelected: true,
            closeAfterSelect: false
        });

        ClassicEditor.create(document.querySelector('#description'));
    </script>
@endsection
