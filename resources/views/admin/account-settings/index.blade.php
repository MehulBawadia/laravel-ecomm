@extends('admin.partials._layout')

@section('title')
    <title>Account Settings | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Account Settings</h1>
    </div>
@endsection

@section('content')
    <section class="personalInformation px-10 pt-16 mt-8">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide">Personal Information</h2>

            <div class="w-full mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="{{ route('admin.accountSettings.general') }}" method="POST" id="formUpdateGeneralInfo" enctype="multipart/form-data">
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

                        <div class="flex flex-col md:flex-row justify-center gap-4 mt-5">
                            <div>
                                <img src="{{ $user->getAvatarPath() }}" alt="{{ $user->first_name . ' ' . $user->last_name }}" title="{{ $user->first_name . ' ' . $user->last_name }}" class="rounded w-24 h-24 avatar" />

                                <div class="deleteAvatar @if (! $user->avatar) hidden @endif">
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

                        <button class="linkCancel ml-3 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider" title="Cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="changePassword mt-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mt-8 ml-64 mx-auto">Change Password</h2>

            <div class="w-2/3 mx-auto mt-3 bg-gray-50 rounded shadow overflow-hidden">
                <form action="#" method="POST" id="formChangePassword">
                    @csrf

                    <div class="bg-white px-4 py-4">
                        <div>
                            <label for="current_passworde" class="text-gray-500">Current Password:</label>
                            <input type="password" name="current_passworde" id="current_passworde" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                        </div>

                        <div class="flex flex-col md:flex-row justify-center gap-4 mt-5">
                            <div class="w-full">
                                <label for="new_password" class="text-gray-500">New Password:</label>
                                <input type="password" name="new_password" id="new_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe" />
                            </div>
                            <div class="w-full">
                                <label for="repeat_new_password" class="text-gray-500">Repeat New Password:</label>
                                <input type="password" name="repeat_new_password" id="repeat_new_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-4">
                        <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none focus:bg-blue-600 tracking-wider font-medium">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script>
        $("form[id='formUpdateGeneralInfo']").submit(function(e) {
            e.preventDefault();

            $(this).find('input').removeClass('border-red-500');
            $(this).find('select').removeClass('border-red-500');
            $(this).find('span').removeClass('text-xs text-red-500').html('');

            var inputData = new FormData($(this)[0]),
                button = $('.btnUpdateGeneralInfo');

            button.addClass('opacity-50 cursor-not-allowed')
                .html('<i class="fa fa-spinner fa-spin"></i> Updating...');

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: inputData,
                async: true,
                success: function(res) {
                    button.removeClass('opacity-50 cursor-not-allowed').html('Update');

                    jsNotify(res.status, res.message, res.title);

                    if (res.avatar) {
                        $('.avatar').attr('src', res.avatar_path);
                        $('.deleteAvatar').removeClass('hidden').html(
                            '<button type="button" class="text-sm text-red-600 btnDeleteAvatarImage">Delete</button>'
                        );
                    }
                },
                error: function (err) {
                    button.removeClass('opacity-50 cursor-not-allowed').html('Update');

                    var errors = null;

                    if (err.status == 422) {
                        errors = err.responseJSON.errors;
                    }

                    if (errors != null) {
                        $.each(errors, function (index, value) {
                            $('input[id="'+index+'"]').first().addClass('border-red-500');
                            $('select[id="'+index+'"]').first().addClass('border-red-500');
                            $('span[data-name="'+index+'"]').first().addClass('text-xs text-red-500').html('<i class="fas fa-times-circle"></i> ' + value);
                        });
                    } else {
                        alert('Something went wrong!');
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        });

        $('.btnDeleteAvatarImage').on('click', function (e) {
            e.preventDefault();

            var self = $(this);

            self.addClass('opacity-50 cursor-not-allowed')
                .attr('disabled', true)
                .html('<i class="fa fa-spinner fa-spin"></i> Deleting...');

            $.ajax({
                url: '{{ route('admin.accountSettings.deleteAvatar') }}',
                method: 'DELETE',
                data: {'_token': '{{csrf_token()}}'},
                success: function (res) {
                    jsNotify(res.status, res.message, res.title);

                    if (res.defaultAvatar) {
                        $('.avatar').attr('src', res.defaultAvatar);

                        self.remove();
                    }
                },
                error: function (err) {
                    console.log(err);
                },
            });

            return false;
        });
    </script>
@endsection
