<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('title')

    <meta name="theme-color" content="#3b82f6">

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Rubik:wght@400;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    @yield('pageStyles')
</head>
<body class="bg-white font-Lato">
    @include('partials._topHeader')

    @include('partials._logo_and_search')

    @include('partials._navigation')

    @yield('content')

    @include('partials._footer')

    <div id="backToTop" class="flex items-center justify-center bg-blue-500 rounded w-10 h-10 text-right text-3xl fixed bottom-0 right-0 mr-8 my-8 cursor-pointer goToTop">
        <i class="fas fa-arrow-up text-white"></i>
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

    </script>
    @yield('pageScripts')
</body>
</html>
