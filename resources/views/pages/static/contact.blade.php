@extends('partials._layout')

@section('title')
    <title>Contact Page | {{ config('app.name') }}</title>
    <meta name="description" content="EComm is a Laravel based E-Commerce web application built by Mehul Bawadia.">
    <meta name="keywords" content="ECommerce, web application, website, products, online selling">
    <link rel="canonical" href="{{ route('pages.contact') }}" />
@endsection

@section('content')
    <section class="breadCrumbs border-b">
        <div class="container mx-auto">
            <div class="py-3 px-4">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <ul class="flex items-center font-Rubik text-sm">
                        <li><a href="{{ route('homePage') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150">Home</a></li>
                        <li class="mx-2 text-gray-400 text-xs"><i class="fas fa-chevron-right"></i></li>
                        <li class="text-gray-400">Contact</li>
                    </ul>

                    <h1 class="font-Rubik font-bold uppercase text-2xl leading-6 mt-2 sm:mt-0">
                        Contact
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="contactUs">
        <div class="container mx-auto">
            <div class="px-4 py-16">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="w-full md:w-1/2 shadow px-4 py-2">
                        <form action="#" method="POST">
                            @csrf

                            <div class="my-5">
                                <label for="full_name" class="text-gray-500">Full Name:</label>
                                <input type="text" name="full_name" id="full_name" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="flex flex-col lg:flex-row gap-4 my-5">
                                <div class="w-full lg:w-1/2">
                                    <label for="email" class="text-gray-500">Email:</label>
                                    <input type="email" name="email" id="email" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <label for="contact_number" class="text-gray-500">Contact Number:</label>
                                    <input type="text" name="contact_number" id="contact_number" class="w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500">
                                </div>
                            </div>

                            <div class="my-5">
                                <label for="message" class="text-gray-500">Message:</label>
                                <textarea name="message" id="message" rows="5" class="resize-none w-full pl-2 py-2 mt-1 bg-gray-100 focus:bg-white text-gray-900 border rounded shadow focus:outline-none focus:border-blue-500"></textarea>
                            </div>

                            <div class="my-5">
                                <button type="submit" class="w-full py-2 bg-blue-500 text-white uppercase rounded font-bold tracking-wider hover:bg-blue-600 focus:bg-blue-600 focus:outline-none transition ease-in-out duration-150">Submit Your Message</button>
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-1/2 space-y-12">
                        <div class="py-4 px-4 shadow">
                            <div class="flex gap-4">
                                <div class="flex-none w-12 h-12 rounded-full text-2xl bg-blue-500 text-white flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h2 class="font-Rubik font-bold text-lg leading-tight text-gray-500">Address</h2>

                                    <div class="mt-2 font-bold">{{ config('app.name') }}</div>
                                    <address class="text-gray-500 text-sm">
                                        4, Station Road, Fort, Mumbai - 400001, India.
                                    </address>
                                </div>
                            </div>
                        </div>

                        <div class="py-4 px-4 shadow">
                            <div class="flex gap-4">
                                <div class="flex-none w-12 h-12 rounded-full text-2xl bg-blue-500 text-white flex items-center justify-center">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h2 class="font-Rubik font-bold text-lg leading-tight text-gray-500">E-Mail Address</h2>

                                    <a href="mailto:support@example.com" class="mt-1 inline-block text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">support@example.com</a>
                                </div>
                            </div>
                        </div>

                        <div class="py-4 px-4 shadow">
                            <div class="flex gap-4">
                                <div class="flex-none w-12 h-12 rounded-full text-2xl bg-blue-500 text-white flex items-center justify-center">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h2 class="font-Rubik font-bold text-lg leading-tight text-gray-500">Contact Number</h2>

                                    <a href="tel:+919876543210" class="mt-1 inline-block text-gray-400 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">+91 98765 43210</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
