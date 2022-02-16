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
            <td class="px-5 py-4 text-left"><span class="text-yellow-800"><i class="fas fa-sync-alt"></i> Processing</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">J. Asthana</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-green-800"><i class="fas fa-check"></i> Completed</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Amisha B.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-blue-800"><i class="fas fa-shipping-fast"></i> Shipped</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Amit K.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-red-800"><i class="fas fa-times"></i> Cancelled</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Sonia S.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-green-800"><i class="fas fa-check"></i> Completed</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>

        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Murli Bhai</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-yellow-800"><i class="fas fa-sync-alt"></i> Processing</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">J. Asthana</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-green-800"><i class="fas fa-check"></i> Completed</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Amisha B.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-blue-800"><i class="fas fa-shipping-fast"></i> Shipped</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(35)->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Amit K.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-red-800"><i class="fas fa-times"></i> Cancelled</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">ORD-{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Sonia S.</td>
            <td class="px-5 py-4 text-right"><i class="fas fa-rupee-sign"></i> {{ number_format(mt_rand(1, 99999), 2) }}</td>
            <td class="px-5 py-4 text-left"><span class="text-green-800"><i class="fas fa-check"></i> Completed</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(2)->format('dS M Y, h:i A') }}</time></td>
            <td class="flex justify-center items-center py-3.5">
                <a href="{{ route('admin.orders.show', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">View</a>

                <form method="POST" action="{{ route('admin.orders.destroy', 0) }}">
                    @csrf
                    @method('DELETE')

                    <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-action="temp-destroy">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
