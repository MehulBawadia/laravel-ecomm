@extends('admin.partials._layout')

@section('title')
    <title>Generate Administrator | {{ config('app.name') }}</title>
@endsection

@section('content')
    <section class="generateAdministrator">
        <div class="container mx-auto">
            <div class="flex justify-center items-center px-4 py-8">
                <div class="w-full md:w-4/5 lg:w-3/5 shadow rounded overflow-hidden">
                    <form action="{{ route('admin.generate.store') }}" method="POST" id="formGenerateAdmin">
                        @csrf

                        <div class="bg-white px-6 py-6">
                            <h1 class="font-Rubik font-bold text-2xl uppercase text-gray-900">Generate Administrator</h1>

                            <p class="text-sm text-gray-500 my-3 tracking-wider">The below form details will be emailed to the given E-Mail address.</p>

                            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                                <div class="w-full">
                                    <label for="first_name" class="text-gray-700">First Name:</label>
                                    <input type="text" name="first_name" id="first_name" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="John" autofocus />
                                    <span data-name="first_name"></span>
                                </div>

                                <div class="w-full">
                                    <label for="last_name" class="text-gray-700">Last Name:</label>
                                    <input type="text" name="last_name" id="last_name" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Doe" />
                                    <span data-name="last_name"></span>
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                                <div class="w-full">
                                    <label for="username" class="text-gray-700">Username:</label>
                                    <input type="text" name="username" id="username" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="johnDoe" />
                                    <span data-name="username"></span>
                                </div>

                                <div class="w-full">
                                    <label for="email" class="text-gray-700">E-mail:</label>
                                    <input type="email" name="email" id="email" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="john@example.com" />
                                    <span data-name="email"></span>
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row items-center justify-center gap-4 mt-5">
                                <div class="w-full">
                                    <label for="password" class="text-gray-700">Password:</label>
                                    <input type="password" name="password" id="password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                                    <span data-name="password"></span>
                                </div>

                                <div class="w-full">
                                    <label for="confirm_password" class="text-gray-700">Confirm Password:</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="block w-full mt-1 border border-gray-300 rounded bg-gray-100 text-gray-800 focus:outline-none focus:bg-white focus:border-blue-500 placeholder-gray-400" placeholder="Secret" />
                                    <span data-name="confirm_password"></span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 py-3 px-6">
                            <button type="submit" class="bg-blue-500 text-gray-50 py-2 px-3 rounded focus:outline-none focus:bg-blue-600 tracking-wider font-medium btnGenerateAdmin">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script>
        $('.btnGenerateAdmin').click(function (e) {
            e.preventDefault();

            var self = $(this)
                form = $('#formGenerateAdmin');

            form.find('span').removeClass('text-red-500 text-sm').html('');
            form.find('input').removeClass('border-red-500');

            self.addClass('opacity-50 cursor-not-allowed')
                .html('<i class="fa fa-spinner fa-spin"></i> Generating...');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (res) {
                    form[0].reset();

                    self.removeClass('opacity-50 cursor-not-allowed').html('Generate');

                    jsNotify('success', res.message, res.title);

                    setTimeout(function () {
                        window.location = res.location;
                    }, 2500);
                },
                error: function (err) {
                    self.removeClass('opacity-50 cursor-not-allowed').html('Generate');

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
