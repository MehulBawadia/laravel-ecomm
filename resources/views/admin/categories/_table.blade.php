<table class="w-full">
    <thead>
        <tr class="bg-gray-50">
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Sr. No.</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Name</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Status</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left hidden lg:table-cell">Last Updated At</th>
            <th class="py-2 pr-5 sm:pr-0 uppercase font-normal text-gray-500 text-sm text-left">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">#{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Category 1</td>
            <td class="px-5 py-4 text-left text-yellow-500"><i class="fas fa-file"></i> Draft</td>
            <td class="px-5 py-4 text-left hidden lg:table-cell"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
            <td>
                <a href="{{ route('admin.categories.edit', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Edit</a>

                <a href="#" class="block sm:inline mt-2 sm:mt-0 sm:ml-3 text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Delete</a>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">#{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Category 2</td>
            <td class="px-5 py-4 text-left text-green-800"><i class="fas fa-check"></i> Published</td>
            <td class="px-5 py-4 text-left hidden lg:table-cell"><time datetime="{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subMinutes(30)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <a href="{{ route('admin.categories.edit', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Edit</a>

                <a href="#" class="block sm:inline mt-2 sm:mt-0 sm:ml-3 text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Delete</a>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4 text-left">#{{ mt_rand(1, 99999) }}</td>
            <td class="px-5 py-4 text-left">Category 3</td>
            <td class="px-5 py-4 text-left text-red-800"><i class="fas fa-times"></i> Temporarily Deleted</td>
            <td class="px-5 py-4 text-left hidden lg:table-cell"><time datetime="{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subHours(1)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <a href="{{ route('admin.categories.edit', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Edit</a>

                <a href="#" class="block sm:inline mt-2 sm:mt-0 sm:ml-3 text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
