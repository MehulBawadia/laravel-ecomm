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

    <section class="latestOrders my-12">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-4">Latest Orders</h2>

            <div class="bg-white rounded-md overflow-hidden shadow mx-4 mt-3">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Code</th>
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Placed By</th>
                            <th class="py-2 pr-5 uppercase font-normal text-gray-500 text-sm text-right">Amount</th>
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Status</th>
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Placed On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">Murli Bhai</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-yellow-200 text-yellow-800"><i class="fas fa-sync-alt"></i> Processing</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">J. Asthana</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Completed</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">Amisha B.</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-blue-200 text-blue-800"><i class="fas fa-shipping-fast"></i> Shipped</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">Amit K.</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Cancelled</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">Sonia S.</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Completed</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}</time></td>
                        </tr>

                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">Murli Bhai</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-yellow-200 text-yellow-800"><i class="fas fa-sync-alt"></i> Processing</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">J. Asthana</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Completed</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">Amisha B.</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-blue-200 text-blue-800"><i class="fas fa-shipping-fast"></i> Shipped</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">Amit K.</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Cancelled</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
                            <td class="px-5 py-4 text-left">Sonia S.</td>
                            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Completed</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="latestOrders my-12">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-4">Latest Users</h2>

            <div class="bg-white rounded-md overflow-hidden shadow mx-4 mt-3">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Name</th>
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Username</th>
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">E-Mail</th>
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Status</th>
                            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Registered On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4">Murli Bhai</td>
                            <td class="px-5 py-4">murliBhaiMBBS</td>
                            <td class="px-5 py-4">
                                <a href="mailto:murlibhaimbbs@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to murlibhaimbbs@example.com">murlibhaimbbs@example.com</a>
                            </td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Verified</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(2)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4">J. Asthana</td>
                            <td class="px-5 py-4">jAsthana</td>
                            <td class="px-5 py-4">
                                <a href="mailto:j.asthana@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to j.asthana@example.com">j.asthana@example.com</a>
                            </td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Non-Verified</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(5)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4">Amisha B.</td>
                            <td class="px-5 py-4">amishaB</td>
                            <td class="px-5 py-4">
                                <a href="mailto:b.amisha@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to b.amisha@example.com">b.amisha@example.com</a>
                            </td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Non-Verified</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(7)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4">Sonia S.</td>
                            <td class="px-5 py-4">soniaS</td>
                            <td class="px-5 py-4">
                                <a href="mailto:sonias@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to sonias@example.com">sonias@example.com</a>
                            </td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-times"></i> Verified</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(10)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                        <tr class="border-b border-gray-100 text-sm text-gray-600">
                            <td class="px-5 py-4">Amit K.</td>
                            <td class="px-5 py-4">kAmit</td>
                            <td class="px-5 py-4">
                                <a href="mailto:kamit@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to kamit@example.com">kamit@example.com</a>
                            </td>
                            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-times"></i> Verified</span></td>
                            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(12)->format('dS M Y, h:i A') }}</time></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
