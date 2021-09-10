<div class="md:hidden space-y-8">
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
            <div class="py-2">
                <input type="number" value="1" class="border pl-2 py-2 w-16 focus:outline-none focus:border-blue-500">
            </div>
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

        <div class="border-b flex items-center justify-between">
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
            <div class="py-2">
                <input type="number" value="1" class="border pl-2 py-2 w-16 focus:outline-none focus:border-blue-500">
            </div>
        </div>
        <div class="flex items-center justify-between">
            <div class="py-2 text-gray-500">SubTotal</div>
            <div class="py-2 font-bold text-blue-500">
                &#8377; 10,000.00
            </div>
        </div>
    </div>

    <div class="bg-white px-5 py-3 space-y-3 rounded shadow">
        <div class="flex justify-between items-center">
            <div class="text-gray-500 font-bold">Grand Total:</div>
            <div class="text-blue-500">&#8377; 25,000.00</div>
        </div>

        <div class="flex flex-wrap justify-between border-t pt-3">
            <div class="text-gray-500">Coupon:</div>
            <div class="flex flex-col">
                <input type="text" name="coupon_code" class="border w-36 py-2 pl-3 focus:outline-none focus:border-blue-500 text-gray-500" placeholder="Coupon Code" />
                <button type="submit" class="py-3 mt-5 w-36 bg-blue-500 text-white uppercase font-bold tracking-wider text-sm focus:outline-none focus:bg-blue-600">Apply Coupon</button>
            </div>
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
