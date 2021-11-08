<table class="w-full">
    <thead>
        <tr class="bg-gray-50">
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Sr. No.</th>
            <th class="w-1/2 py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Details</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Status</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Registered On</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="border-b border-gray-100 text-sm text-gray-600">
                <td class="text-center px-5 py-4">{{ ++$loop->index }}</td>
                <td class="px-5 py-4">
                    <div class="flex items-start justify-center sm:justify-start">
                        <img src="{{ $user->getAvatarPath() }}" alt="{{ $user->getFullName() }}" title="{{ $user->getFullName() }}" class="block w-12 rounded shadow" />

                        <div class="ml-4">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150">{{ $user->getFullName() }}</a>

                            <div class="flex flex-wrap gap-x-3 mt-2">
                                <div class="text-gray-500">{{ $user->username }}</div>
                                <div class="text-gray-500">
                                    <a href="mailto:{{ $user->email }}" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to {{ $user->email }}">{{ $user->email }}</a>
                                </div>
                                <div class="text-gray-500">{{ $user->contact_number }}</div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-4 text-left">
                    @if ($user->email_verified_at == null)
                        <span class="text-red-800"><i class="fas fa-times"></i> Non-Verified</span>
                    @else
                        <span class="text-green-800"><i class="fas fa-check"></i> Verified</span>
                    @endif
                </td>
                <td class="px-5 py-4 text-left"><time datetime="{{ $user->created_at->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ $user->created_at->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}</time></td>
                <td class="flex justify-center items-center h-24">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="block sm:inline text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150">Edit</a>

                    @if ($user->deleted_at == null)
                        <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" id="formDeleteUser-{{ $user->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="block sm:inline ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-actionform="#formDeleteUser-{{ $user->id }}" data-action="temp-delete">Delete</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.users.restore', $user->id) }}" id="formRestoreUser-{{ $user->id }}">
                            @csrf
                            @method('PATCH')

                            <button class="block sm:inline ml-3 text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150 btnDeleteActions" data-actionform="#formRestoreUser-{{ $user->id }}" data-action="restore">Restore</button>
                        </form>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" id="formDestroyUser-{{ $user->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="block sm:inline mt-0 ml-3 text-red-600 text-sm tracking-wider hover:text-red-800 focus:text-red-800 focus:outline-none transition ease-in-out duration-150 pr-5 btnDeleteActions" data-actionform="#formDestroyUser-{{ $user->id }}" data-action="destroy">Destroy</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
