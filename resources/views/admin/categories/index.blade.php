@extends('admin.partials._layout')

@section('title')
    <title>Categories | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Categories</h1>
    </div>
@endsection

@section('content')
    <section class="latestOrders mt-8 pt-16 px-6">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-medium tracking-wide">All Categories</h2>

                <div>
                    <button class="linkAddNewCategory bg-indigo-500 text-sm text-gray-50 py-2 px-3 rounded focus:outline-none hover:bg-indigo-600 focus:bg-indigo-600 tracking-wider font-medium"><i class="fas fa-plus text-xs"></i> Add New</button>
                </div>
            </div>

            @include('admin.categories._create')

            <div class="bg-white rounded-md shadow mt-3 overflow-x-auto categoriesTable">
                @include('admin.categories._table')
            </div>
        </div>
    </section>
@endsection

@section('pageScripts')
    <script>
        $('body').on('click', '.btnAction', function (e) {
            e.preventDefault();

            $(this).addClass('bg-transparent outline-none border-0 focus:outline-none focus:border-0');

            var category = $(this).attr('data-category');

            $(category).toggleClass('hidden');

            return false;
        });

        $('.linkAddNewCategory').on('click', function (e) {
            e.preventDefault();

            $('#sectionAddNewCategory').slideDown().removeClass('hidden').addClass('transition ease-in-out duration-150');

            return false;
        });

        $('.linkCancel').on('click', function(e) {
            e.preventDefault();

            $('#sectionAddNewCategory').slideUp().addClass('hidden').removeClass('transition ease-in-out duration-150');

            return false;
        });

        $('.btnAddCategory').click(function (e) {
            e.preventDefault();

            var self = $(this)
                form = $('#formAddCategory');

            form.find('span').removeClass('text-red-500 text-sm').html('');
            form.find('input').removeClass('border-red-500');

            self.addClass('opacity-50 cursor-not-allowed')
                .html('<i class="fa fa-spinner fa-spin"></i> Adding...');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (res) {
                    self.removeClass('opacity-50 cursor-not-allowed').html('Add');

                    jsNotify(res.status, res.message, res.title);

                    setTimeout(function () {
                        window.location = res.location;
                    }, 2500);
                },
                error: function (err) {
                    self.removeClass('opacity-50 cursor-not-allowed').html('Add');

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

        $('body').on('click', '.btnDeleteActions', function (e) {
            e.preventDefault();

            var self = $(this);
            var prevHtml = self.html();
            self.addClass('cursor-not-allowed opacity-50').html('<i class="fas fa-spinner fa-spin"></i>');

            var actionForm = $(self.data('actionform'));
            $.ajax({
                url: actionForm.attr('action'),
                type: actionForm.find('input[name="_method"]').val(),
                data: actionForm.serialize(),
                success: function (res) {
                    self.removeClass('opacity-50 cursor-not-allowed');

                    jsNotify(res.status, res.message, res.title);

                    if (res.table) {
                        $('.categoriesTable').html(res.table);
                    }
                },
                error: function (err) {
                    self.removeClass('opacity-50 cursor-not-allowed').html(prevHtml);

                    jsNotify(err.responseJSON.status, err.responseJSON.message, err.responseJSON.title);
                },
            });

            return false;
        });
    </script>
@endsection
