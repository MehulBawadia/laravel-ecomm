<div id="sectionAddNewUser" class="overflow-hidden hidden bg-white rounded-md shadow mt-3">
    <div class="bg-gray-50 px-4 py-2">
        <h2>Add New User</h2>
    </div>

    <div class="p-4">
        <p class="text-red-400 text-sm tracking-wider">You will be redirected to the Edit User page once you click on Add button.</p>

        <form action="{{ route('admin.users.store') }}" method="POST" id="formAddUser">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 mt-5 gap-x-4">
                <div class="w-full">
                    <label for="email" class="text-gray-500">E-Mail:</label>
                    <input type="email" name="email" id="email" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" required />
                    <span data-name="email"></span>
                </div>
                <div class="w-full">
                    <label for="username" class="text-gray-500">Username:</label>
                    <input type="text" name="username" id="username" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" required />
                    <span data-name="username"></span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 mt-5 gap-x-4">
                <div class="mt-5 sm:mt-0 w-full">
                    <label for="password" class="text-gray-500">Password:</label>
                    <input type="password" name="password" id="password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" required />
                    <span data-name="password"></span>
                </div>
                <div class="mt-5 sm:mt-0 w-full">
                    <label for="confirm_password" class="text-gray-500">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" required />
                    <span data-name="confirm_password"></span>
                </div>
            </div>

            <div class="mt-5">
                <button type="submit" class="w-36 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnAddUser">Add</button>

                <button class="linkCancel ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel">Cancel</button>
            </div>
        </form>
    </div>
</div>
