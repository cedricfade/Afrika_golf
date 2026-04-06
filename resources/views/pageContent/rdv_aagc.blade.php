@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerColor' => $bannerColor ?? '#0A140F',
])

@push('css2')
    <style>
        .banner {
            margin: 0;
            padding: 30px;
            padding-bottom: 50px;
            height: 19vh;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        @media screen and (max-width: 799px) {
            .banner {
                height: 15vh !important;
            }
        }
    </style>
@endpush

<section class="rdv">
    <div class="container text-center infos">
        <h1>Nos rendez-vous</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum dolore.</p>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">

            @include('pageContent.partials.card-item')
            @include('pageContent.partials.card-item')
            @include('pageContent.partials.card-item')

            @include('pageContent.partials.card-item')
            @include('pageContent.partials.card-item')
            @include('pageContent.partials.card-item')

            @include('pageContent.partials.card-item')
            @include('pageContent.partials.card-item')
            @include('pageContent.partials.card-item')

        </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
