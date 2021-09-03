<div class="mx-4 mt-3 bg-gray-50 rounded shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-3 pl-5 text-left text-sm font-Rubik font-bold uppercase">Product</th>
                <th class="py-3 text-sm font-Rubik font-bold uppercase text-left">Status</th>
                <th class="py-3 text-sm font-Rubik font-bold uppercase text-left">Added On</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-sm text-gray-600">
                <td class="py-3 pl-5">
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
                <td class="py-3 text-gray-500 text-left">
                    <span class="rounded-full shadow px-4 py-1 bg-blue-200 text-blue-800"><i class="fas fa-shipping-fast"></i> Shipped</span>
                </td>
                <td class="py-3">
                    <time datetime="{{ now()->subHours(5)->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">
                        {{ now()->subHours(5)->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}
                    </time>
                </td>
            </tr>

            <tr class="border-t text-sm text-gray-600">
                <td class="py-3 pl-5">
                    <div class="flex items-center">
                        <div class="flex-none">
                            <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product 2" title="Product 2" class="w-16 rounded shadow" />
                        </div>

                        <div class="ml-3">
                            <a href="{{ route('products.show', 'product-1') }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" target="_blank">Product 2</a>

                            <div class="flex gap-x-4 mt-2">
                                <div class="text-gray-500">VHN00504</div>
                                <div class="text-gray-500">500 gms</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="py-3 text-gray-500 text-left">
                    <span class="rounded-full shadow px-4 py-1 bg-yellow-200 text-yellow-800"><i class="fas fa-sync-alt"></i> Processing</span>
                </td>
                <td class="py-3">
                    <time datetime="{{ now()->subHours(5)->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">
                        {{ now()->subHours(5)->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}
                    </time>
                </td>
            </tr>
        </tbody>
    </table>
</div>
