<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('title')

    <meta name="robots" content="nofollow, noindex">
    <meta name="theme-color" content="#3b82f6">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Rubik:wght@400;600;700&family=Roboto:wght@400;500;700&&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    @yield('pageStyles')
</head>
<body class="bg-gray-100 font-Roboto">
    {{-- @auth --}}
        <div class="flex">
            @include('admin.partials._navigation')

            <div class="w-5/6">
                @include('admin.partials._header')

                @yield('content')

                @include('admin.partials._footer')
            </div>
        </div>
    {{-- @endauth --}}

    {{-- @guest
        @yield('content')
    @endguest --}}

    <div id="backToTop" class="flex items-center justify-center bg-blue-500 rounded w-10 h-10 text-right fixed bottom-0 right-0 mr-8 my-8 cursor-pointer goToTop">
        <i class="fas fa-chevron-up text-white"></i>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script>
        $('#backToTop').hide();
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#backToTop').slideDown();
            } else {
                $('#backToTop').slideUp();
            }
        });
        $('#backToTop').click(function(){
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        });

        $(window).on('scroll', function () {
            $('.navigationMenu').addClass('h-auto');
            $('.navigationMenu').removeClass('h-screen');
        });

        $('.avatarNav').click(function (e) {
            e.preventDefault();

            var avatarNavList = $('.avatarNavList');

            if (avatarNavList.hasClass('hidden')) {
                avatarNavList.removeClass('hidden');
            } else {
                avatarNavList.addClass('hidden');
            }
        });
    </script>
    @yield('pageScripts')
</body>
</html>
