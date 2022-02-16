<div class="mt-3 bg-gray-50 rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 pl-8 text-left text-sm font-Rubik font-bold uppercase">Product</th>
                <th class="py-3 text-sm font-Rubik font-bold uppercase text-right">Rate</th>
                <th class="py-3 text-sm font-Rubik font-bold uppercase text-center">Quantity</th>
                <th class="py-3 pr-5 text-sm font-Rubik font-bold uppercase text-right">SubTotal</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-sm text-gray-600">
                <td class="py-5 pl-8">
                    <div class="flex items-center">
                        <div class="flex-none">
                            <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product 1" title="Product 1" class="w-16 rounded shadow" />
                        </div>

                        <div class="ml-3">
                            <a href="{{ route('products.show', 'product-1') }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" target="_blank">Product 1</a>

                            <div class="flex gap-x-4 mt-2">
                                <div class="text-gray-500">VHN00504</div>
                                <div class="text-gray-500">500 gms</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="py-5 text-gray-500 text-right">
                    &#8377; 15,000.00
                </td>
                <td class="py-5 text-gray-500 text-center">1</td>
                <td class="py-5 pr-5 text-blue-500 font-bold text-right">
                    &#8377; 15,000.00
                </td>
            </tr>
            <tr class="border-t border-gray-200 text-sm text-gray-600">
                <td class="py-5 pl-8">
                    <div class="flex items-center">
                        <div class="flex-none">
                            <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product 2" title="Product 2" class="w-16 rounded shadow" />
                        </div>

                        <div class="ml-3">
                            <a href="{{ route('products.show', 'product-1') }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" target="_blank">Product 2</a>

                            <div class="flex gap-x-4 mt-2">
                                <div class="text-gray-500">VHN420504</div>
                                <div class="text-gray-500">500 gms</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="py-5 text-gray-500 text-right">
                    &#8377; 10,000.00
                </td>
                <td class="py-5 text-gray-500 text-center">1</td>
                <td class="py-5 pr-5 text-blue-500 font-bold text-right">
                    &#8377; 10,000.00
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="4" class="py-3 pr-5 text-right">
                    <span class="text-gray-500 font-bold">Grand Total:</span>
                    <span class="text-blue-500">&#8377; 25,000.00</span>
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="4" class="py-3 pr-5 text-right">
                    <span class="text-gray-500">Coupon:</span>
                    <span class="text-red-500">&#8377; 0.00</span>
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="4" class="py-3 pr-5 text-right">
                    <span class="text-gray-500 font-bold">Shipping:</span>
                    <span class="text-blue-500">&#8377; 500.00</span>
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="4" class="py-3 pr-5 text-right text-xl font-bold">
                    <span class="text-gray-500 font-bold">Paid Amount:</span>
                    <span class="text-blue-500">&#8377; 25,500.00</span>
                </td>
            </tr>
            <tr class="border-t border-gray-200">
                <td colspan="4" class="py-3 pr-5 text-right">
                    <span class="text-gray-500 font-bold">Payment Method:</span>
                    <span class="text-gray-500">Cash On Delivery (COD)</span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
