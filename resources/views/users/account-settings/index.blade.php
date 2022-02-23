@extends('users.partials._layout')

@section('title')
    <title>Account Settings | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('users.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Account Settings</h1>
    </div>
@endsection

@section('content')
    @include('users.account-settings._personal_information')

    @include('users.account-settings._change_password')
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
                url: '{{ route('users.accountSettings.deleteAvatar') }}',
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

        $('.btnChangePassword').click(function (e) {
            e.preventDefault();

            var self = $(this)
                form = $('#formChangePassword');

            form.find('span').removeClass('text-red-500 text-sm').html('');
            form.find('input').removeClass('border-red-500');

            self.addClass('opacity-50 cursor-not-allowed')
                .html('<i class="fa fa-spinner fa-spin"></i> Changing...');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (res) {
                    self.removeClass('opacity-50 cursor-not-allowed').html('Change');

                    jsNotify(res.status, res.message, res.title);

                    form[0].reset();
                },
                error: function (err) {
                    self.removeClass('opacity-50 cursor-not-allowed').html('Change');

                    var errors = null;

                    if (err.status == 422) {
                        errors = err.responseJSON.errors;
                    }

                    if (errors != null) {
                        $.each(errors, function (index, value) {
                            $('input[id="'+index+'"]').first().addClass('border-red-500');
                            $('span[data-name="'+index+'"]').first().addClass('text-xs text-red-500').html('<i class="fas fa-times-circle"></i> ' + value);
                        });
                    } else {
                        alert('Something went wrong!');
                    }
                }
            });

            return false;
        });
    </script>
@endsection
