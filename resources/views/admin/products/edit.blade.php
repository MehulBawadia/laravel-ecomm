@extends('admin.partials._layout')

@section('title')
    <title>Edit: {{ $product->name }} | {{ config('app.name') }}</title>
@endsection

@section('pageStyles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.min.css" />
    <style>
        .selectize-control .selectize-input {
            z-index: 0;
        }

        .selectize-control.multi .selectize-input>div {
            background: #3b82f6;
            color: #fff;
            border-radius: .25rem;
        }

        .ck-editor__editable {
            min-height: 20rem;
        }
    </style>
@endsection

@section('pageTitle')
    <div class="flex items-end">
        <ul class="flex text-sm gap-2">
            <li><a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Dashboard</a></li>
            <li>/</li>
            <li><a href="{{ route('admin.products') }}" class="text-blue-500 hover:text-blue-600 focus:text-blue-600 focus:outline-none transition ease-in-out duration-150" title="Go to Dashboard Page">Products</a></li>
            <li>/</li>
        </ul>

        <h1 class="text-2xl font-Rubik font-bold uppercase tracking-wide leading-none ml-3">Edit: {{ $product->name }}</h1>
    </div>
@endsection

@section('content')
    <section class="generalInformation mt-8 pt-16 px-6">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mx-auto">General Information</h2>

            @include('admin.products._general_info')
        </div>
    </section>

    <section class="seoSection my-16 px-6">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mx-auto">Images</h2>

            @include('admin.products._images')
        </div>
    </section>

    <section class="seoSection my-16 px-6">
        <div class="container mx-auto">
            <h2 class="text-xl font-medium tracking-wide mx-auto">SEO Details</h2>

            @include('admin.products._seo_details')
        </div>
    </section>
@endsection

@section('pageScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script>
        var $categoriesSelectize = $('select#categories').selectize({
            openOnSelect: false,
            hideSelected: true,
            closeAfterSelect: false
        });
        $categoriesSelectize[0].selectize.setValue([1]);

        var $tagsSelectize = $('select#tags').selectize({
            openOnSelect: false,
            hideSelected: true,
            closeAfterSelect: false
        });
        $tagsSelectize[0].selectize.setValue([1, 2]);

        $('select#related_products').selectize({
            openOnSelect: false,
            hideSelected: true,
            closeAfterSelect: false
        });

        ClassicEditor.create(document.querySelector('#description'));

        $('.btnUpdateGeneralInfo').on('click', function (e) {
            e.preventDefault();

            var self = $(this),
                form = $('#formGeneralInfo');

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
