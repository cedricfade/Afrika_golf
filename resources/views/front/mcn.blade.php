@extends('front.main', [
    'title' => 'MCN CGP',
    'bannerImage' => asset('assets/images/mcn/banner.png'),
    'imageHeader' => asset('assets/images/mcn/Image_logo_MCN.png'),
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
        background-image: linear-gradient(rgba(0, 0, 0, 0.049), rgba(0, 0, 0, 0.049)), url({{ asset('assets/images/mcn/banner.png') }});
    }
</style>

@section('content')
   <section class="about-mcn">

    <div class="container mx-auto" style="width:">

        <!-- INTRO -->
        <div class="row">
            <div class="col-xl-10 contenu">
                <h2>
                    <span class="text-uppercase">à</span> propos de 
                    <span class="highlight">MCN</span>
                </h2>

                <p>
                    Le cabinet MCN est l’aboutissement de nombreuses années d’expérience et d’interventions sur le marché de
                    l’art, de ventes et d’expositions organisées en Afrique et en Europe.
                    <br><br>
                    Nous incarnons la réponse jeune, moderne et dynamique pour la gestion et la constitution de collections d’art africain.
                    Nous vous accompagnons avec des conseils indépendants et professionnels lors de transactions sur le
                    marché de l’art dans la perspective de l’optimisation des collections.
                </p>
            </div>
        </div>

        <!-- SERVICES -->
        <div class="row g-4 services-row mt-5">

            <div class="col-xl-6 d-flex">
                <div class="services w-100">
                    <h2>Nos actions</h2>
                    <p>
                        Notre cabinet fournit des conseils spécialisés et des solutions sur mesure aux clients privés,
                        banques, sociétés de gestion, entreprises, institutions publiques et privées sur tous les
                        aspects de la gestion de patrimoine artistique.
                    </p>
                </div>
            </div>

            <div class="col-xl-6 d-flex">
                <div class="services w-100">
                    <h2>Notre valeur ajoutée</h2>
                    <p>
                        Le conseil en gestion de patrimoine artistique sur le marché de l’art africain.
                        <br><br>
                        La gestion et la sécurisation des collections qui va de l’inventaire physique et numérique à la souscription de police d’assurance.
                        <br><br>
                        Notre connaissance approfondie du marché de l’art s’étend des artistes aux professionnels de tous les corps de métier.
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>

@include('front.partials.footer')
@endsection
