@extends('admin.partials._layout')

@section('title')
    <title>Dashboard | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div>
        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide">Dashboard</h1>
    </div>
@endsection

@section('content')
    <section class="dashboard">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-4">Overview</h2>

            <div class="flex justify-between items-center px-4 mt-3 gap-6">
                <div class="w-1/3 bg-white rounded-md shadow overflow-hidden">
                    <div class="flex items-center px-4 py-8">
                        <div class="mx-3 text-gray-400 text-xl">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <div class="ml-5">
                            <h3 class="text-gray-500">Amount Received</h3>
                            <div class="text-gray-800 text-xl mt-1">&#8377; 10,50,040.00</div>
                        </div>
                    </div>
                    <div class="bg-gray-50 pl-7 py-2">
                        <a href="#" class="text-blue-500 text-sm tracking-wide hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="View All Orders">View All Orders</a>
                    </div>
                </div>
                <div class="w-1/3 bg-white rounded-md shadow overflow-hidden">
                    <div class="flex items-center px-4 py-8">
                        <div class="mx-3 text-gray-400 text-xl">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="ml-5">
                            <h3 class="text-gray-500">Orders Placed</h3>
                            <div class="text-gray-800 text-xl mt-1">15,248</div>
                        </div>
                    </div>
                    <div class="bg-gray-50 pl-7 py-2">
                        <a href="#" class="text-blue-500 text-sm tracking-wide hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="View All Orders">View All Orders</a>
                    </div>
                </div>
                <div class="w-1/3 bg-white rounded-md shadow overflow-hidden">
                    <div class="flex items-center px-4 py-8">
                        <div class="mx-3 text-gray-400 text-xl">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="ml-5">
                            <h3 class="text-gray-500">Users Registered</h3>
                            <div class="text-gray-800 text-xl mt-1">245</div>
                        </div>
                    </div>
                    <div class="bg-gray-50 pl-7 py-2">
                        <a href="#" class="text-blue-500 text-sm tracking-wide hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="View All Users">View All Users</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
