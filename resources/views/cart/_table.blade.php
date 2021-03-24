<div class="hidden sm:block bg-white shadow">
    <table class="w-full">
        <thead class="bg-gray-200">
            <tr>
                <th></th>
                <th></th>
                <th class="py-3 text-sm font-Rubik font-bold uppercase text-left">Product</th>
                <th class="py-3 pr-5 text-sm font-Rubik font-bold uppercase text-right">Price</th>
                <th class="py-3 text-sm font-Rubik font-bold uppercase text-center">Quantity</th>
                <th class="py-3 pr-5 text-sm font-Rubik font-bold uppercase text-right">SubTotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-5 pl-5">
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="text-gray-500 w-10 h-10 rounded-full border flex items-center justify-center hover:bg-red-500 hover:text-white hover:border-0">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
                <td class="py-5">
                    <div class="flex-none">
                    <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" class="w-20 rounded shadow" />
                </div>
                </td>
                <td class="py-5">
                    <div>
                        <a href="{{ route('products.show', 'product-1') }}" class="text-lg text-gray-900 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 1</a>
                    </div>
                    <div class="text-gray-500">SKU: VHN00504</div>
                </td>
                <td class="py-5 pr-5 text-right text-gray-500">&#8377; 15,000.00</td>
                <td class="py-5 text-gray-500 text-center">
                    <input type="number" value="1" class="border pl-2 py-2 w-16 focus:outline-none focus:border-blue-500">
                </td>
                <td class="py-5 pr-5 text-blue-500 font-bold text-right">
                    &#8377; 15,000.00
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td class="py-5 pl-5">
                    <form action="#" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="text-gray-500 w-10 h-10 rounded-full border flex items-center justify-center hover:bg-red-500 hover:text-white hover:border-0">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
                <td class="py-5">
                    <div class="flex-none">
                    <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product 2" title="Product 2" class="w-20 rounded shadow" />
                </div>
                </td>
                <td class="py-5">
                    <div>
                        <a href="{{ route('products.show', 'product-1') }}" class="text-lg text-gray-900 hover:text-blue-500 focus:outline-none focus:text-blue-500 transition ease-in-out duration-150">Product 2</a>
                    </div>
                    <div class="text-gray-500">SKU: VHN420504</div>
                </td>
                <td class="py-5 pr-5 text-right text-gray-500">&#8377; 10,000.00</td>
                <td class="py-5 text-gray-500 text-center">
                    <input type="number" value="1" class="border pl-2 py-2 w-16 focus:outline-none focus:border-blue-500">
                </td>
                <td class="py-5 pr-5 text-blue-500 font-bold text-right">
                    &#8377; 10,000.00
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="6" class="py-5 pr-5 text-right">
                    <span class="text-gray-500 font-bold">Grand Total:</span>
                    <span class="text-blue-500">&#8377; 25,000.00</span>
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="6" class="py-5 pr-5 text-right">
                    <span class="text-gray-500">Coupon:</span>
                    <input type="text" name="coupon_code" class="border w-64 py-2 pl-3 focus:outline-none focus:border-blue-500 text-gray-500" placeholder="Coupon Code" />
                    <button type="submit" class="py-3 ml-3 w-48 bg-blue-500 text-white uppercase font-bold tracking-wider text-sm focus:outline-none focus:bg-blue-600">Apply Coupon</button>
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="6" class="py-5 pr-5 text-right">
                    <span class="text-gray-500 font-bold">Shipping:</span>
                    <span class="text-blue-500">&#8377; 500.00</span>
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="6" class="py-5 pr-5 text-right text-xl font-bold">
                    <span class="text-gray-500 font-bold">Payable Amount:</span>
                    <span class="text-blue-500">&#8377; 25,500.00</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
