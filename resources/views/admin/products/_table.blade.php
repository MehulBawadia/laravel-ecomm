<table class="w-full">
    <thead>
        <tr class="bg-gray-50">
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Sr. No.</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Name</th>
            <th class="py-2 pr-5 uppercase font-normal text-gray-500 text-sm text-right">Price</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Last Updated At</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr class="border-b border-gray-100 text-sm text-gray-600">
                <td class="px-5 py-4 text-left">#{{ $product->id }}</td>
                <td class="px-5 py-4 text-left">
                    <div class="flex items-center">
                        <div>
                            <img src="{{ asset('/images/products/demo-image-1.jpg') }}" alt="{{ $product->name }}" title="{{ $product->name }}" class="w-12 rounded shadow" />
                        </div>

                        <div class="ml-4">
                            <a href="{{ route('products.show', $product->id) }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" target="_blank">{{ $product->name }}</a>

                            <div class="flex gap-x-4 mt-2">
                                <div class="text-gray-500">{{ $product->code }}</div>
                                <div class="text-gray-500">{{ $product->weight }}</div>
                                <div class="text-gray-500">{{ $product->stock }} in stock</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-4 text-right">&#8377; {{ number_format($product->rate, 2) }}</td>
                <td class="px-5 py-4 text-left"><time datetime="{{ $product->updated_at->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ $product->updated_at->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
                <td class="flex justify-center items-center h-16">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Edit</a>

                    @if ($product->deleted_at == null)
                        <form method="POST" action="{{ route('admin.products.delete', $product->id) }}" id="formDeleteProduct-{{ $product->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-actionform="#formDeleteProduct-{{ $product->id }}" data-action="temp-delete">Delete</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.products.restore', $product->id) }}" id="formRestoreProduct-{{ $product->id }}">
                            @csrf
                            @method('PATCH')

                            <button class="block sm:inline ml-3 text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150 btnDeleteActions" data-actionform="#formRestoreProduct-{{ $product->id }}" data-action="restore">Restore</button>
                        </form>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" id="formDestroyProduct-{{ $product->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="block sm:inline mt-0 ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-actionform="#formDestroyProduct-{{ $product->id }}" data-action="destroy">Destroy</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <td colspan="5" class="py-4 text-center text-gray-600">No records found.</td>
        @endforelse
    </tbody>
</table>
