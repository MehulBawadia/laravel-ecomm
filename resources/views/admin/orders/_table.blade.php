<table class="w-full">
    <thead>
        <tr class="bg-gray-50">
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Code</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Placed By</th>
            <th class="py-2 pr-5 uppercase font-normal text-gray-500 text-sm text-right">Amount</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Status</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Placed On</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left"></th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Murli Bhai</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-yellow-200 text-yellow-800"><i class="fas fa-sync-alt"></i> Processing</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">J. Asthana</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Completed</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Amisha B.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-blue-200 text-blue-800"><i class="fas fa-shipping-fast"></i> Shipped</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Amit K.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Cancelled</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Sonia S.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Completed</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>

        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Murli Bhai</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-yellow-200 text-yellow-800"><i class="fas fa-sync-alt"></i> Processing</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">J. Asthana</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Completed</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Amisha B.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-blue-200 text-blue-800"><i class="fas fa-shipping-fast"></i> Shipped</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Amit K.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Cancelled</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Sonia S.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Completed</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-order="#order-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="order-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.orders.show', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> View</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><i class="fas fa-pencil"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
