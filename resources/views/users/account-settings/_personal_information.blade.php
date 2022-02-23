<section class="personalInformation pt-16 mt-8 px-6">
    <div class="container mx-auto">
        <h2 class="text-xl font-medium tracking-wide">Personal Information</h2>

        <div class="w-full mt-3 bg-gray-50 rounded shadow overflow-hidden">
            <form action="{{ route('users.accountSettings.general') }}" method="POST" id="formUpdateGeneralInfo" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="bg-white px-4 py-4">
                    <div class="flex flex-col md:flex-row justify-center gap-4">
                        <div class="w-full">
                            <label for="first_name" class="text-gray-500">First Name:</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="John" />
                            <span data-name="first_name"></span>
                        </div>
                        <div class="w-full">
                            <label for="last_name" class="text-gray-500">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Doe" />
                            <span data-name="last_name"></span>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center gap-4 mt-5">
                        <div class="w-full">
                            <label for="username" class="text-gray-500">Username:</label>
                            <input type="text" name="username" id="username" value="{{ $user->username }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe" />
                            <span data-name="username"></span>
                        </div>
                        <div class="w-full">
                            <label for="email" class="text-gray-500">E-mail:</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="john@example.com" />
                            <span data-name="email"></span>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center gap-4 mt-5">
                        <div class="w-full">
                            <label for="username" class="text-gray-500">Gender:</label>
                            <select name="gender" id="gender" class="form-select block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400">
                                <option value="">Select</option>
                                @foreach(['Male', 'Female'] as $gender)
                                    <option value="{{ $gender }}" @if ($gender == $user->gender) selected @endif>{{ $gender }}</option>
                                @endforeach
                            </select>
                            <span data-name="gender"></span>
                        </div>
                        <div class="w-full">
                            <label for="contact_number" class="text-gray-500">Contact Number:</label>
                            <input type="text" name="contact_number" id="contact_number" value="{{ $user->contact_number }}" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="9876543210" />
                            <span data-name="contact_number"></span>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row justify-center items-center md:items-start gap-4 mt-5">
                        <div>
                            <img src="{{ $user->getAvatarPath() }}" alt="{{ $user->first_name . ' ' . $user->last_name }}" title="{{ $user->first_name . ' ' . $user->last_name }}" class="rounded w-24 h-24 border avatar" />

                            <div class="text-center mt-1 deleteAvatar @if (! $user->avatar) hidden @endif">
                                <button type="button" class="text-sm text-red-600 btnDeleteAvatarImage">Delete</button>
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="avatar_image_file" class="text-gray-500">Avatar Image:</label>
                            <input type="file" id="avatar_image_file" name="avatar_image_file" class="block px-2 py-2 w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" accept="image/jpeg, image/jpg, image/png">
                            <span data-name="avatar_image_file"></span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-4">
                    <button type="submit" class="w-36 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnUpdateGeneralInfo">Update</button>

                    <a href="{{ route('users.dashboard') }}" class="linkCancel ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
