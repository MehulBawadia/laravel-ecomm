<table class="w-full">
    <thead>
        <tr class="bg-gray-50">
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Sr. No.</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Name</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Status</th>
            <th class="py-2 pr-5 uppercase font-normal text-gray-500 text-sm text-right">Price</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Last Updated At</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left"></th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">#{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">
                <div class="flex items-center">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="Product-1" title="Product-1" class="w-16 rounded shadow" />
                    </div>

                    <div class="ml-4">
                        <a href="{{ route('products.show', 'product-1') }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" target="_blank">Product 1</a>

                        <div class="flex gap-x-4 mt-2">
                            <div class="text-gray-500">PRD-{{ mt_rand(1, 99999) }}</div>
                            <div class="text-gray-500">500 gms</div>
                            <div class="text-gray-500">5 in stock</div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-yellow-200 text-yellow-800"><i class="fas fa-file"></i> Draft</span></td>
            <td class="px-5 py-4 text-right">&#8377; 15,000.00</td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-product="#product-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="product-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.products.edit', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white""><i class="fas fa-pencil"></i> Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white""><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">#{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">
                <div class="flex items-center">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-2.jpg') }}" alt="Product-2" title="Product-2" class="w-16 rounded shadow" />
                    </div>

                    <div class="ml-4">
                        <a href="{{ route('products.show', 'product-1') }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" target="_blank">Product 1</a>

                        <div class="flex gap-x-4 mt-2">
                            <div class="text-gray-500">PRD-{{ mt_rand(1, 99999) }}</div>
                            <div class="text-gray-500">500 gms</div>
                            <div class="text-gray-500">5 in stock</div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Published</span></td>
            <td class="px-5 py-4 text-right">&#8377; 7,500.00</td>
            <td class="px-5 py-4 text-left"><time datetime="{{ today()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}">{{ today()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-product="#product-2"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="product-2">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.products.edit', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white""><i class="fas fa-pencil"></i> Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white""><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">#{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">
                <div class="flex items-center">
                    <div>
                        <img src="{{ asset('/images/products/demo-image-3.jpg') }}" alt="Product-3" title="Product-3" class="w-16 rounded shadow" />
                    </div>

                    <div class="ml-4">
                        <a href="{{ route('products.show', 'product-1') }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" target="_blank">Product 3</a>

                        <div class="flex gap-x-4 mt-2">
                            <div class="text-gray-500">PRD-{{ mt_rand(1, 99999) }}</div>
                            <div class="text-gray-500">500 gms</div>
                            <div class="text-gray-500">5 in stock</div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Temporarily Deleted</span></td>
            <td class="px-5 py-4 text-right">&#8377; 3,450.00</td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-product="#product-4"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="product-4">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.products.edit', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white""><i class="fas fa-pencil"></i> Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white""><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
