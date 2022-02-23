<section class="changePassword py-8 mt-8 px-6">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide">Change Password</h2>

            <div class="mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="{{ route('users.accountSettings.changePassword') }}" method="POST" id="formChangePassword">
                    @csrf
                    @method('PATCH')

                    <div class="bg-white px-4 py-4">
                        <div>
                            <label for="current_password" class="text-gray-500">Current Password:</label>
                            <input type="password" name="current_password" id="current_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Password" />
                            <span data-name="current_password"></span>
                        </div>

                        <div class="flex flex-col md:flex-row justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="new_password" class="text-gray-500">New Password:</label>
                                <input type="password" name="new_password" id="new_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                                <span data-name="new_password"></span>
                            </div>
                            <div class="w-full">
                                <label for="repeat_new_password" class="text-gray-500">Repeat New Password:</label>
                                <input type="password" name="repeat_new_password" id="repeat_new_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                                <span data-name="repeat_new_password"></span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="w-36 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnChangePassword">Change</button>

                        <a href="{{ route('users.dashboard') }}" class="linkCancel ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
