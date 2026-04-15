@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerImage' => $bannerImage ?? asset('assets_custom/mcn-cgp/bg.jpg'),
    'rightImage' => $rightImage ?? asset('assets_custom/mcn-cgp/logo-mcn-cgp.png'),
    'rightBottomImage' => $rightBottomImage ?? asset('assets_custom/mcn-cgp/valoriser-votre-passion.png'),
])

@push('css2')
    <style>
        .banner {
            margin: 0;
            padding: 30px;
            padding-bottom: 50px;
            height: 100vh;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: linear-gradient(rgba(0, 0, 0, 0.049), rgba(0, 0, 0, 0.049)), url({{ $bannerImage ?? asset('assets/images/mcn/banner.png') }});
        }
    </style>
@endpush

<section class="about-mcn">

    <div class="container mx-auto" style="width:">

        <!-- INTRO -->
        <div class="row">
            <div class="col-lg-12 contenu">
                <h2>
                    <span class="text-uppercase">à</span> propos de
                    <span class="highlight">MCN</span>
                </h2>
                <p style="font-size: 1.3rem;">
                    Tel est l’engagement de notre cabinet à vos côtés. Notre objectif est de vous accompagner dans la
                    gestion et la valorisation de vos collections d’art et autres actifs alternatifs. Spécialisé en
                    gestion et valorisation de patrimoine, le cabinet-conseil vous accompagne dans : <br>
                    •&nbsp;&nbsp;&nbsp;&nbsp; ⁠L’administration de votre collection : inventaire, catalogage et mise à
                    jour documentaire ;<br>
                    •&nbsp;&nbsp;&nbsp;&nbsp;⁠ ⁠Le conseil à l’achat et à la vente d’œuvres d’art : accompagnement et
                    représentation lors de ventes publiques et privées ;<br>
                    •&nbsp;&nbsp;&nbsp;&nbsp;⁠ ⁠La conservation et la restauration des œuvres ;<br>
                    •&nbsp;&nbsp;&nbsp;&nbsp;⁠ ⁠La valorisation des collections et la promotion des artistes dont les
                    œuvres composent vos collections.<br>
                    C’est dans le cadre de cette activité de valorisation et de promotion que nous avons conçu Africa
                    Art Golf Cup, un événement premium à la croisée de l’art et du golf.<br>
                    <a href="a href="https://www.mcn-cgp.com/" target="_blan">EN SAVOIR PLUS</a>
                </p>
            </div>
        </div>

        <!-- SERVICES -->
        <div class="row g-4 services-row mt-5">
            <div class="col-xl-6 d-flex">
                <div class="services w-100">
                    <h2 class="text-center">Nos actions</h2>
                    <p>
                        Notre cabinet fournit des conseils spécialisés et des solutions sur mesure aux clients privés,
                        banques, sociétés de gestion, entreprises, institutions publiques et privées sur tous les
                        aspects de la gestion de patrimoine artistique.
                    </p>
                </div>
            </div>

            <div class="col-xl-6 d-flex">
                <div class="services w-100">
                    <h2 class="text-center">Notre valeur ajoutée</h2>
                    <p>
                        Le conseil en gestion de patrimoine artistique sur le marché de l’art africain.
                        <br><br>
                        La gestion et la sécurisation des collections qui va de l’inventaire physique et numérique à la
                        souscription de police d’assurance.
                        <br><br>
                        Notre connaissance approfondie du marché de l’art s’étend des artistes aux professionnels de
                        tous les corps de métier.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
