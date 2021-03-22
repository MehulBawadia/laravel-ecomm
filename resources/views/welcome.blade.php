@extends('partials._layout')

@section('title')
    <title>Home Page | {{ config('app.name') }}</title>
@endsection

@section('pageStyles')
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css" />
@endsection

@section('content')
    <section class="sliderImages">
        <div>
            <img src="{{ asset('/images/slider/image-1.jpg') }}" alt="Slider 1" title="Slider 1" class="border-0" />
        </div>
        <div>
            <img src="{{ asset('/images/slider/image-2.jpg') }}" alt="Slider 2" title="Slider 2" class="border-0" />
        </div>
    </section>
@endsection

@section('pageScripts')
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script>
        $('.sliderImages').bxSlider({
            auto: true,
            pager: false
        });
    </script>
@endsection
