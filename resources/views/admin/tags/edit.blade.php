@extends('admin.partials._layout')

@section('title')
    <title>Edit: Tag 1 | {{ config('app.name') }}</title>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
            <li><a href="{{ route('admin.tags') }}" class="text-indigo-600 text-sm tracking-wider hover:text-indigo-800 focus:text-indigo-800 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Tags</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Edit: Tag 1</h1>
    </div>
@endsection

@section('content')
    <section class="generalInformation px-10 mt-8 pt-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide">General Information</h2>

            @include('admin.tags._general_info')
        </div>
    </section>

    <section class="seoSection px-10 my-16">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide">SEO Details</h2>

            @include('admin.tags._seo_details')
        </div>
    </section>
@endsection

@section('pageScripts')
    <script>
        $('.btnEditTag').on('click', function (e) {
            e.preventDefault();

            var self = $(this)
                form = $(self.data('form'));

            form.find('span').removeClass('text-red-500 text-sm').html('');
            form.find('input').removeClass('border-red-500');

            self.addClass('opacity-50 cursor-not-allowed')
                .html('<i class="fa fa-spinner fa-spin"></i> Updating...');

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function (res) {
                    self.removeClass('opacity-50 cursor-not-allowed').html('Update');

                    jsNotify(res.status, res.message, res.title);
                },
                error: function (err) {
                    self.removeClass('opacity-50 cursor-not-allowed').html('Update');

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
