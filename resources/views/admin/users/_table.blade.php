<table class="w-full">
    <thead>
        <tr class="bg-gray-50">
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Sr. No.</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Details</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Status</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left">Registered On</th>
            <th class="py-2 pl-5 uppercase font-normal text-gray-500 text-sm text-left"></th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="text-center px-5 py-4">{{ mt_rand(1, 10) }}</td>
            <td class="px-5 py-4">
                <div class="flex items-center">
                    <div>
                        <img src="https://source.unsplash.com/100x100/?male-profile-picture" alt="User-1" title="User-1" class="w-12 rounded-full shadow" />
                    </div>

                    <div class="ml-4">
                        <a href="{{ route('admin.users.edit', 1) }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150">Murli Bhai</a>

                        <div class="flex gap-x-4 mt-2">
                            <div class="text-gray-500">murliBhaiMBBS</div>
                            <div class="text-gray-500">
                                <a href="mailto:murlibhaimbbs@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to murlibhaimbbs@example.com">murlibhaimbbs@example.com</a>
                            </div>
                            <div class="text-gray-500">+91 98765 43210</div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Non-Verified</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(2)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-user="#user-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="user-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.users.edit', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><span class="text-xs mr-1"><i class="fas fa-pen"></i></span> Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white">
                                    <span class="text-xs mr-1"><i class="fas fa-trash"></i></span> Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="text-center px-5 py-4">{{ mt_rand(1, 10) }}</td>
            <td class="px-5 py-4">
                <div class="flex items-center">
                    <div>
                        <img src="https://source.unsplash.com/100x100/?female-profile-picture" alt="User-1" title="User-1" class="w-12 rounded-full shadow" />
                    </div>

                    <div class="ml-4">
                        <a href="{{ route('admin.users.edit', 1) }}" class="d-block text-gray-700 text-blue-500 font-bold hover:text-blue-800 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150">Amisha B.</a>

                        <div class="flex gap-x-4 mt-2">
                            <div class="text-gray-500">amishab</div>
                            <div class="text-gray-500">
                                <a href="mailto:amishab@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to amishab@example.com">amishab@example.com</a>
                            </div>
                            <div class="text-gray-500">+91 98765 43210</div>
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-check"></i> Verified</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(2)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-user="#user-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="user-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.users.edit', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><span class="text-xs mr-1"><i class="fas fa-pen"></i></span> Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white">
                                    <span class="text-xs mr-1"><i class="fas fa-trash"></i></span> Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        {{-- <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4">J. Asthana</td>
            <td class="px-5 py-4">jAsthana</td>
            <td class="px-5 py-4">
                <a href="mailto:j.asthana@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to j.asthana@example.com">j.asthana@example.com</a>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Non-Verified</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(5)->format('dS M Y, h:i A') }}</time></td>
            <td>
                <div class="relative">
                    <button class="btnAction" data-user="#user-1"><i class="fas fa-ellipsis-v"></i></button>

                    <div class="hidden linksAction absolute top-0 right-6 mt-5 w-24 rounded bg-white border shadow z-50" id="user-1">
                        <ul class="p-0 m-0">
                            <li>
                                <a href="{{ route('admin.users.edit', 1) }}" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white"><span class="text-xs mr-1"><i class="fas fa-pen"></i></span> Edit</a>
                            </li>
                            <li>
                                <a href="#" class="block pl-2 py-1 hover:bg-blue-500 hover:text-white">
                                    <span class="text-xs mr-1"><i class="fas fa-trash"></i></span> Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4">Amisha B.</td>
            <td class="px-5 py-4">amishaB</td>
            <td class="px-5 py-4">
                <a href="mailto:b.amisha@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to b.amisha@example.com">b.amisha@example.com</a>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-red-200 text-red-800"><i class="fas fa-times"></i> Non-Verified</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(7)->format('dS M Y, h:i A') }}</time></td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4">Sonia S.</td>
            <td class="px-5 py-4">soniaS</td>
            <td class="px-5 py-4">
                <a href="mailto:sonias@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to sonias@example.com">sonias@example.com</a>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-times"></i> Verified</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(10)->format('dS M Y, h:i A') }}</time></td>
        </tr>
        <tr class="border-b border-gray-100 text-sm text-gray-600">
            <td class="px-5 py-4">Amit K.</td>
            <td class="px-5 py-4">kAmit</td>
            <td class="px-5 py-4">
                <a href="mailto:kamit@example.com" class="text-gray-500 hover:text-blue-500 focus:text-blue-800 focus:outline-none transition ease-in-out duration-150" title="Send E-Mail to kamit@example.com">kamit@example.com</a>
            </td>
            <td class="px-5 py-4 text-left"><span class="rounded-full shadow px-4 py-1 bg-green-200 text-green-800"><i class="fas fa-times"></i> Verified</span></td>
            <td class="px-5 py-4 text-left"><time datetime="{{ now()->timezone('Asia/Kolkata')->format('dS M Y, h:i A') }}">{{ now()->timezone('Asia/Kolkata')->subDays(12)->format('dS M Y, h:i A') }}</time></td>
        </tr> --}}
    </tbody>
</table>
