@extends('front.main', [
    'title' => 'Blog',
    'description' => "Découvrez les dernières actualités, analyses et tendances du monde du golf en Afrique sur notre blog dédié. Plongez dans des articles captivants, des interviews exclusives et des conseils d'experts pour enrichir votre passion pour ce sport fascinant.",

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
    <section class="blog">

        <div class="container text">
            <span>À la une</span>
            <h1>Actualités, tendances et analyses du golf africain</h1>
        </div>
        <div class="container mb-5">
            <div class="back-header">

            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-technology-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-technology" type="button" role="tab"
                        aria-controls="v-pills-technology" aria-selected="true">Technologie</button>
                    <button class="nav-link" id="v-pills-health-tab" data-bs-toggle="pill" data-bs-target="#v-pills-health"
                        type="button" role="tab" aria-controls="v-pills-health" aria-selected="false">Santé et
                        Bien-être</button>
                    <button class="nav-link" id="v-pills-travel-tab" data-bs-toggle="pill" data-bs-target="#v-pills-travel"
                        type="button" role="tab" aria-controls="v-pills-travel" aria-selected="false">Voyage</button>
                    <button class="nav-link" id="v-pills-entrepreneurship-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-entrepreneurship" type="button" role="tab"
                        aria-controls="v-pills-entrepreneurship" aria-selected="false">Entrepreneuriat</button>
                    <button class="nav-link" id="v-pills-personal-development-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-personal-development" type="button" role="tab"
                        aria-controls="v-pills-personal-development" aria-selected="false">Développement personnel</button>
                    <button class="nav-link" id="v-pills-education-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-education" type="button" role="tab" aria-controls="v-pills-education"
                        aria-selected="false">Éducation</button>
                    <button class="nav-link" id="v-pills-finance-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-finance" type="button" role="tab" aria-controls="v-pills-finance"
                        aria-selected="false">Finance</button>
                    <button class="nav-link" id="v-pills-environment-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-environment" type="button" role="tab"
                        aria-controls="v-pills-environment" aria-selected="false">Environnement</button>
                    <button class="nav-link" id="v-pills-lifestyle-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-lifestyle" type="button" role="tab" aria-controls="v-pills-lifestyle"
                        aria-selected="false">Mode de vie</button>

                    <div class="follow">
                        <h4>Suivez-nous :</h4>
                        <div class="social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                {{-- CONTENUE --}}

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-technology" role="tabpanel"
                        aria-labelledby="v-pills-technology-tab" tabindex="0">

                        <p>
                            Il partage son parcours pour créer et développer une entreprise prospère, offrant des
                            perspectives précieuses et des leçons apprises en chemin. De l'idée initiale à la croissance,
                            ce blog guide les entrepreneurs en herbe avec des conseils pratiques et des sources
                            d'inspiration. Il partage son parcours pour créer et développer une entreprise prospère,
                            offrant des perspectives précieuses et des leçons apprises en chemin. De l'idée initiale
                            à la croissance.

                            <br><br>

                            Il partage son parcours pour créer et développer une entreprise prospère, offrant des
                            perspectives précieuses et des leçons apprises en chemin. De l'idée initiale à la croissance,
                            ce blog guide les entrepreneurs en herbe avec des conseils pratiques et des sources
                            d'inspiration. Il partage son parcours pour créer et développer une entreprise prospère,
                            offrant des perspectives précieuses et des leçons apprises en chemin.
                        </p>
                        <br>
                        <h3>Créer une startup qui réussit</h3>
                        <p>Il partage son parcours pour créer et développer une entreprise prospère, offrant des
                            perspectives précieuses et des leçons apprises en chemin. De l'idée initiale à la
                            croissance, ce blog guide les entrepreneurs en herbe avec des conseils pratiques.</p>

                        <br>
                        <h3>Leçons du terrain</h3>
                        <p>
                            Elle vous emmène hors des sentiers battus à la découverte de destinations de voyage
                            méconnues. Des plages isolées aux charmants villages de montagne, découvrez pourquoi
                            ces joyaux cachés méritent une place sur votre liste de voyages à faire.
                        </p>

                    </div>
                    <div class="tab-pane fade" id="v-pills-health" role="tabpanel" aria-labelledby="v-pills-health-tab"
                        tabindex="0">
                        <p>
                            Il partage son parcours pour créer et développer une entreprise prospère, offrant des
                            perspectives précieuses et des leçons apprises en chemin. De l'idée initiale à la croissance,
                            ce blog guide les entrepreneurs en herbe avec des conseils pratiques et des sources
                            d'inspiration. Il partage son parcours pour créer et développer une entreprise prospère,
                            offrant des perspectives précieuses et des leçons apprises en chemin. De l'idée initiale
                            à la croissance.

                            <br><br>

                            Il partage son parcours pour créer et développer une entreprise prospère, offrant des
                            perspectives précieuses et des leçons apprises en chemin. De l'idée initiale à la croissance,
                            ce blog guide les entrepreneurs en herbe avec des conseils pratiques et des sources
                            d'inspiration. Il partage son parcours pour créer et développer une entreprise prospère,
                            offrant des perspectives précieuses et des leçons apprises en chemin.
                        </p>
                        <br>
                        <h3>Créer une startup qui réussit</h3>
                        <p>Il partage son parcours pour créer et développer une entreprise prospère, offrant des
                            perspectives précieuses et des leçons apprises en chemin. De l'idée initiale à la
                            croissance, ce blog guide les entrepreneurs en herbe avec des conseils pratiques.</p>

                        <br>
                        <h3>Leçons du terrain</h3>
                        <p>
                            Elle vous emmène hors des sentiers battus à la découverte de destinations de voyage
                            méconnues. Des plages isolées aux charmants villages de montagne, découvrez pourquoi
                            ces joyaux cachés méritent une place sur votre liste de voyages à faire.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-travel" role="tabpanel" aria-labelledby="v-pills-travel-tab"
                        tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-entrepreneurship" role="tabpanel"
                        aria-labelledby="v-pills-entrepreneurship-tab" tabindex="0">.


                    </div>
                    <div class="tab-pane fade" id="v-pills-personal-development" role="tabpanel"
                        aria-labelledby="v-pills-personal-development-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-education" role="tabpanel"
                        aria-labelledby="v-pills-education-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-finance" role="tabpanel"
                        aria-labelledby="v-pills-finance-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-environment" role="tabpanel"
                        aria-labelledby="v-pills-environment-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-lifestyle" role="tabpanel"
                        aria-labelledby="v-pills-lifestyle-tab" tabindex="0">...</div>
                </div>
            </div>
        </div>

    </section>
    @include('front.partials.footer')
@endsection
