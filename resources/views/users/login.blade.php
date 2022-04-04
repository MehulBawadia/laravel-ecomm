@extends('partials._layout')

@section('title')
    <title>Login User | {{ config('app.name') }}</title>
@endsection

@section('pageStyles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
@endsection

@section('content')
    <section class="bg-gray-150 loginUser">
        <div class="container mx-auto">
            <h1 class="font-Roboto font-semibold text-2xl uppercase text-gray-900 text-center mt-6">Login User</h1>

                <div class="flex items-center justify-center my-6 px-4">
                    <div class="w-full bg-white md:w-4/5 lg:w-1/2 rounded overflow-hidden shadow shadow-zinc-700/50">
                        <form action="{{ route('users.login.check') }}" method="POST" id="formLoginUser">
                            @csrf

                            <div class="mt-3 bg-white px-6 py-6 rounded-tr rounded-tl">
                                <div class="w-full">
                                    <label for="usernameOrEmail" class="text-gray-500">Username / E-Mail:</label>
                                    <input type="text" name="usernameOrEmail" id="usernameOrEmail" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe / john@example.com" required autofocus />
                                    <span data-name="usernameOrEmail"></span>
                                </div>

                                <div class="mt-5 w-full">
                                    <label for="password" class="text-gray-500">Password:</label>
                                    <input type="password" name="password" id="password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" required />
                                    <span data-name="password"></span>
                                </div>
                            </div>

                            <div class="bg-gray-100 py-3 px-6">
                                <button type="submit" class="w-full sm:w-48 bg-indigo-600 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-700 focus:bg-indigo-700 tracking-wider font-medium btnLoginUser">Login</button>

                                <a href="{{ route('users.register') }}" class="ml-4 text-indigo-600 focus:outline-none hover:text-indigo-800 focus:text-indigo-800 tracking-wider font-medium transition ease-in-out duration-150">Don't have an account? Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    <script>
        function jsNotify(type, message, title = "Success !")
        {
            iziToast.show({
                message: message ?? "Message not found",
                title: title,
                position: 'topRight',
                theme: 'light',
                color: type == 'success' ? 'green' : 'red',
                timeout: 2500,
                icon: type == 'success' ? 'fas fa-check' : 'fas fa-times'
            });
        }
    </script>

    <script>
        $('.btnLoginUser').click(function (e) {
            e.preventDefault();

            var self = $(this)
                form = $('#formLoginUser');

            form.find('span').removeClass('text-red-500 text-sm').html('');
            form.find('input').removeClass('border-red-500');

            self.addClass('opacity-50 cursor-not-allowed')
                .html('<i class="fa fa-spinner fa-spin"></i> Logging in...');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (res) {
                    form[0].reset();

                    self.removeClass('opacity-50 cursor-not-allowed').html('Login');

                    jsNotify(res.status, res.message, res.title);

                    if (res.status == 'success') {
                        setTimeout(function () {
                            window.location = res.location;
                        }, 2500);
                    }
                },
                error: function (err) {
                    self.removeClass('opacity-50 cursor-not-allowed').html('Login');

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
