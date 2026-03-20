@extends('front.main', [
    'title' => 'MCN CGP',
    'bannerTitle' => 'Patrimoine culturel',
    'bannerImage' => asset('assets/images/patrimoine/banner.png'),
])
<style>
    .banner {
        margin: 0;
        padding: 30px;
        padding-bottom: 50px;
        height: 100vh;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
</style>

@section('content')

<section class="patrimoine">
    <div class="container">
        <h2>@lang('Un jeu réinventé')</h2>
        <p>
            L’Africa Art Golf Cup n’est pas qu’une simple exposition ; c’est une plateforme de valorisation et d’appréciation de la créativité africaine. Nous faisons le lien entre passion et investissement.

            <br><br>
             Chaque édition présente une sélection pointue d’artistes confirmés et émergents, offrant à nos invités un accès exclusif à des œuvres qui définissent le récit contemporain du continent.
        </p>
    </div>
</section>

    @include('front.galerie')
@endsection