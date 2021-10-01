@extends('admin.partials._layout')

@section('title')
    <title>Login Administrator | {{ config('app.name') }}</title>
@endsection

@section('content')
    <section class="loginAdministrator">
        <div class="container mx-auto">
            <div class="flex justify-center items-center px-4 py-8">
                <div class="w-full md:w-4/5 lg:w-1/2 rounded overflow-hidden">
                    <form action="{{ route('admin.login.check') }}" method="POST" id="formLoginAdmin">
                        @csrf

                        <div class="text-center text-indigo-600 my-8 font-bold text-2xl">
                            <span class="text-2xl"><i class="fas fa-shopping-cart"></i></span>
                            {{ config('app.name') }}
                        </div>

                        <h1 class="font-Rubik font-bold text-2xl uppercase text-gray-900">Login Administrator</h1>

                        <div class="mt-3 bg-white px-6 py-6 rounded-tr rounded-tl shadow">
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

                        <div class="bg-gray-50 py-3 px-6 shadow">
                            <button type="submit" class="w-full sm:w-48 bg-indigo-500 text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium btnLoginAdmin">Login</button>

                            <a href="{{ route('homePage') }}" class="block w-full text-center sm:inline sm:w-auto sm:ml-3 mt-5 sm:mt-0 border border-gray-300 bg-transparent text-gray-500 py-2 px-3 rounded hover:text-gray-600 hover:border-gray-600 focus:text-gray-600 focus:border-gray-600 focus:outline-none focus:bg-white tracking-wider">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script>
        $('.btnLoginAdmin').click(function (e) {
            e.preventDefault();

            var self = $(this)
                form = $('#formLoginAdmin');

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
