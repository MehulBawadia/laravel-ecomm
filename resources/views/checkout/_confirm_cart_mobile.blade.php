<div class="sm:hidden space-y-8">
    <div class="cartItem border px-5 py-3 bg-white rounded shadow">
        <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" class="mx-auto w-32 rounded shadow" />

        <div class="border-b flex items-center justify-between mt-5">
            <div class="py-2 text-gray-500">Product</div>
            <div class="py-2">
                <a href="{{ route('products.show', 'product-1') }}" class="text-lg text-gray-900 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 1</a>
            </div>
        </div>
        <div class="border-b flex items-center justify-between">
            <div class="py-2 text-gray-500">Price</div>
            <div class="py-2 text-blue-500">&#8377; 15,000.00</div>
        </div>
        <div class="border-b flex items-center justify-between">
            <div class="py-2 text-gray-500">Quantity</div>
            <div class="py-2">1</div>
        </div>
        <div class="flex items-center justify-between">
            <div class="py-2 text-gray-500">SubTotal</div>
            <div class="py-2 font-bold text-blue-500">
                &#8377; 15,000.00
            </div>
        </div>
    </div>

    <div class="cartItem border px-5 py-3 bg-white rounded shadow">
        <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product 2" title="Product 2" class="mx-auto w-32 rounded shadow" />

        <div class="border-b flex items-center justify-between mt-5">
            <div class="py-2 text-gray-500">Product</div>
            <div class="py-2">
                <a href="{{ route('products.show', 'product-1') }}" class="text-lg text-gray-900 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 2</a>
            </div>
        </div>
        <div class="border-b flex items-center justify-between">
            <div class="py-2 text-gray-500">Price</div>
            <div class="py-2 text-blue-500">&#8377; 10,000.00</div>
        </div>
        <div class="border-b flex items-center justify-between">
            <div class="py-2 text-gray-500">Quantity</div>
            <div class="py-2">1</div>
        </div>
        <div class="flex items-center justify-between">
            <div class="py-2 text-gray-500">SubTotal</div>
            <div class="py-2 font-bold text-blue-500">
                &#8377; 10,000.00
            </div>
        </div>
    </div>

    <div class="bg-white px-5 py-3 space-y-3 rounded">
        <div class="flex justify-between items-center">
            <div class="text-gray-500 font-bold">Grand Total:</div>
            <div class="text-blue-500">&#8377; 25,000.00</div>
        </div>

        <div class="flex flex-wrap justify-between border-t pt-3">
            <span class="text-gray-500">Coupon:</span>
            <span class="text-red-500">&#8377; 0.00</span>
        </div>

        <div class="flex justify-between items-center border-t pt-3">
            <div class="text-gray-500 font-bold">Shipping:</div>
            <div class="text-blue-500">&#8377; 500.00</div>
        </div>

        <div class="flex justify-between items-center border-t pt-3 text-xl">
            <div class="text-gray-500 font-bold">Payable Amount:</div>
            <div class="text-blue-500 font-bold">&#8377; 25,500.00</div>
        </div>
    </div>
</div>
