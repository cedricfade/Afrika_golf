<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('app.name') }} | {{ $title }} </title>
    <!-- SEO -->
    <meta name="title" content="{{ config('app.name') }} | {{ $title ?? '' }}">
    <meta name="description" content="{!! $description ?? '' !!}">
    <meta name="keywords" content="{!! $keywords ?? '' !!}">
    <meta name="author" content="{{ config('app.author') }}">

    <meta property="og:title" content="{{ config('app.name') }} | {{ $title ?? '' }}">
    <meta property="og:description" content="{!! $description ?? '' !!}">
    <meta property="og:image" content="{!! $image ?? '' !!}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/styles/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/styles.css') }}">
    @stack('css')
</head>

<body>

    <div id="pageContent">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const slider = document.querySelector('.slider');
            const slides = document.querySelectorAll('.slide');
            const next = document.querySelector('.next');
            const prev = document.querySelector('.prev');
            const dots = document.querySelectorAll('.dot');

            let index = 0;

            function showSlide(i) {
                if (i >= slides.length) index = 0;
                if (i < 0) index = slides.length - 1;

                slider.style.transform = `translateX(-${index * 100}%)`;

                dots.forEach(dot => dot.classList.remove('active'));
                dots[index].classList.add('active');
            }

            next.addEventListener('click', () => {
                index++;
                showSlide(index);
            });

            prev.addEventListener('click', () => {
                index--;
                showSlide(index);
            });

            dots.forEach(dot => {
                dot.addEventListener('click', function() {
                    index = parseInt(this.getAttribute('data-slide'));
                    showSlide(index);
                });
            });

        });
    </script>
    @stack('js')
</body>

</html>
