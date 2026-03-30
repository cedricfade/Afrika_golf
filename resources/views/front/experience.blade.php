@extends('front.main', [
    'title' => 'REJOIGNEZ L\'EXPÉRIENCE',
    'bannerColor' => '#0A140F',
])
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

@section('content')
    <section class="experience">
        <div class="container-fluid ">
            <h1>REJOIGNEZ L’EXPERIENCE</h1>
            <div class="row">
                <div class="col-xl-4">
                    @include('front.partials.pack-item', [
                        'link' => route('formulaire'),
                        'image' => asset('assets/images/packs/card1.png'),
                        'title' => 'IMIGONGO',
                        'subtitle' => '<h2>PARTENAIRE elégance: <br> 7.500 USD</h2>',
                        'content' =>
                            '<b>Symbole:</b><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate </p><b>Valeur:</b><p>Créativité, patrimoine, esthétique.</p>',
                    ])
                </div>
                <div class="col-xl-4">
                    @include('front.partials.pack-item', [
                        'link' => route('formulaire'),
                        'image' => asset('assets/images/packs/card2.png'),
                        'title' => 'Gorille des montagnes',
                        'subtitle' => 'PARTENAIRE MAJESTUEUX: 15.000 USD',
                        'content' =>
                            '<b>Symbole:</b><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate </p><b>Valeur:</b><p>Créativité, patrimoine, esthétique.</p>',
                    ])
                </div>
                <div class="col-xl-4">
                    @include('front.partials.pack-item', [
                        'link' => route('formulaire'),
                        'image' => asset('assets/images/packs/card3.png'),
                        'title' => 'KARISMBI',
                        'subtitle' => 'PARTENAIRE suprême: 30.000 USD',
                        'content' =>
                            '<b>Symbole:</b><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate </p><b>Valeur:</b><p>Créativité, patrimoine, esthétique.</p>',
                    ])
                </div>
                <div class="col-xl-4">
                    @include('front.partials.pack-item', [
                        'link' => route('formulaire'),
                        'image' => asset('assets/images/packs/card4.png'),
                        'title' => 'IMIGONGO',
                        'subtitle' => '<h2>PARTENAIRE elégance: <br> 7.500 USD</h2>',
                        'content' =>
                            '<b>Symbole:</b><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate </p><b>Valeur:</b><p>Créativité, patrimoine, esthétique.</p>',
                    ])
                </div>
                <div class="col-xl-4">
                    @include('front.partials.pack-item', [
                        'link' => route('formulaire'),
                        'image' => asset('assets/images/packs/card5.png'),
                        'title' => 'IMIGONGO',
                        'subtitle' => '<h2>PARTENAIRE elégance: <br> 7.500 USD</h2>',
                        'content' =>
                            '<b>Symbole:</b><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate </p><b>Valeur:</b><p>Créativité, patrimoine, esthétique.</p>',
                    ])
                </div>
            </div>
        </div>
    </section>

    @include('front.partials.footer')
@endsection
@push('js')
    <script>
        function clickLink(link) {
            window.location.href = link;
        }
    </script>
@endpush
