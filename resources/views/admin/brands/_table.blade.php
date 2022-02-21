<table class="w-full">
    <thead>
        <tr class="bg-gray-50">
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Sr. No.</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Name</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left hidden lg:table-cell">Last Updated At</th>
            <th class="py-2 pr-5 sm:pr-0 uppercase font-normal text-gray-500 text-sm text-left">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($brands as $brand)
            <tr class="border-b border-gray-100 text-sm text-gray-600">
                <td class="px-5 py-4 text-left">{{ ++$loop->index }}</td>
                <td class="px-5 py-4 text-left">{{ $brand->name }}</td>
                <td class="px-5 py-4 text-left hidden lg:table-cell"><time datetime="{{ $brand->updated_at->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ $brand->updated_at->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
                <td class="flex items-center py-3.5">
                    <a href="{{ route('admin.brands.edit', 1) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Edit</a>

                    @if ($brand->deleted_at == null)
                        <form method="POST" action="{{ route('admin.brands.delete', $brand->id) }}" id="formDeleteBrand-{{ $brand->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-actionform="#formDeleteBrand-{{ $brand->id }}" data-action="temp-delete">Delete</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.brands.restore', $brand->id) }}" id="formRestoreBrand-{{ $brand->id }}">
                            @csrf
                            @method('PATCH')

                            <button class="block sm:inline ml-3 text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150 btnDeleteActions" data-actionform="#formRestoreBrand-{{ $brand->id }}" data-action="restore">Restore</button>
                        </form>

                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" id="formDestroyBrand-{{ $brand->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="block sm:inline mt-0 ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-actionform="#formDestroyBrand-{{ $brand->id }}" data-action="destroy">Destroy</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-gray-600 py-2 text-sm">No records found</td>
            </tr>
        @endforelse
    </tbody>
</table>
