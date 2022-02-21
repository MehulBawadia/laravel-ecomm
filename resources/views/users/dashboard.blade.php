@extends('users.partials._layout')

@section('title')
    <title>Dashboard | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div>
        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide">Dashboard</h1>
    </div>
@endsection

@section('content')
    <section class="dashboard pt-16 px-6">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8">Welcome {{ auth()->user()->getFullName() }}</h2>
        </div>
    </section>
@endsection
