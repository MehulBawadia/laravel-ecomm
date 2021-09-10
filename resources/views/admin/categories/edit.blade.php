@extends('admin.partials._layout')

@section('title')
    <title>Edit: Category 1 | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
            <li><a href="{{ route('admin.categories') }}" class="text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Categories</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Edit: Category 1</h1>
    </div>
@endsection

@section('content')
    <section class="generalInformation px-10 mt-8 pt-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide">General Information</h2>

            @include('admin.categories._general_info')
        </div>
    </section>

    <section class="seoSection px-10 my-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide">SEO Details</h2>

            @include('admin.categories._seo_details')
        </div>
    </section>
@endsection
