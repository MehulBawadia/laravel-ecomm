@extends('partials._layout')

@section('title')
    <title>Order Placed: ORD-28241 | {{ config('app.name') }}</title>
@endsection

@section('content')
    <section class="thankYou">
        <div class="container mx-auto">
            <div class="px-4 py-4">
                <div class="flex items-center justify-center px-4 sm:px-0 py-4 border-2 border-dashed border-blue-500 text-blue-500 font-bold leading-tight">
                    Thank You. Your order has been received.
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-center border-l-2 pl-8 py-4 my-4">
                        <h4 class="text-sm text-gray-500">Order Number:</h4>
                        <p class="sm:ml-1 text-gray-600">ORD-28241</p>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-center border-l-2 pl-8 py-4 my-4">
                        <h4 class="text-sm text-gray-500">Placed On:</h4>
                        <p class="sm:ml-1 text-gray-600">{{ now()->timezone('Asia/Kolkata')->format('d M, Y h:i A') }}</p>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-center border-l-2 pl-8 py-4 my-4">
                        <h4 class="text-sm text-gray-500">Order Total:</h4>
                        <p class="sm:ml-1 text-gray-600">
                            &#8377; 25,500
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-center border-l-2 pl-8 py-4 my-4">
                        <h4 class="text-sm text-gray-500">Payment Method:</h4>
                        <p class="sm:ml-1 text-gray-600">Cash On Delivery</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="orderDetails">
        <div class="container mx-auto">
            <div class="px-4 py-16">
                <h2 class="font-Rubik font-bold text-lg leading-tight">Order Details</h2>

                <div class="flex items-center w-full text-base font-Rubik font-bold mt-2 uppercase">
                    <div class="bg-gray-200 py-4 px-4 w-1/2">Product</div>
                    <div class="bg-gray-200 py-4 px-4 w-1/2">Total</div>
                </div>

                <div class="flex items-center w-full border-b text-sm">
                    <div class="py-4 px-4 w-1/2">
                        <a href="{{ route('products.show', 'product-1') }}" class="text-base text-gray-900 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Product 1</a> <span class="text-xs text-gray-500">x</span> 1<br />
                        <div>
                            <span class="text-gray-500">SKU:</span>
                            <span class="text-gray-600">VHN00504</span>
                        </div>
                    </div>
                    <div class="py-4 px-4 w-1/2 text-gray-500">&#8377; 15,000.00</div>
                </div>

                <div class="flex items-center w-full border-b text-sm">
                    <div class="py-4 px-4 w-1/2">
                        <a href="{{ route('products.show', 'product-1') }}" class="text-base text-gray-900 hover:text-blue-500 focus:text-blue-500 focus:outline-none transition ease-in-out duration-150">Product 2</a> <span class="text-xs text-gray-500">x</span> 1<br />
                        <div>
                            <span class="text-gray-500">SKU:</span>
                            <span class="text-gray-600">VHN420504</span>
                        </div>
                    </div>
                    <div class="py-4 px-4 w-1/2 text-gray-500">&#8377; 10,000.00</div>
                </div>

                <div class="flex items-center w-full border-b text-sm">
                    <div class="py-4 px-4 w-1/2 font-bold font-Rubik">SubTotal:</div>
                    <div class="py-4 px-4 w-1/2 text-gray-500">&#8377; 25,000.00</div>
                </div>

                <div class="flex items-center w-full border-b text-sm">
                    <div class="py-4 px-4 w-1/2 font-bold font-Rubik">Shipping:</div>
                    <div class="py-4 px-4 w-1/2 text-gray-500">&#8377; 500.00</div>
                </div>

                <div class="flex items-center w-full border-b text-lg text-blue-500">
                    <div class="py-4 px-4 w-1/2 font-bold font-Rubik">Payable Amount:</div>
                    <div class="py-4 px-4 w-1/2 font-bold">&#8377; 25,500.00</div>
                </div>

                <div class="flex items-center w-full border-b text-sm">
                    <div class="py-4 px-4 w-1/2 font-bold font-Rubik">Payment Method:</div>
                    <div class="py-4 px-4 w-1/2 text-gray-500">Cash On Delivery</div>
                </div>

                <div class="flex items-center w-full text-sm">
                    <div class="py-4 px-4 w-1/2 font-bold font-Rubik">Order Notes:</div>
                    <div class="py-4 px-4 w-1/2 text-gray-500">This is an Order Notes</div>
                </div>
            </div>
        </div>
    </section>
@endsection
