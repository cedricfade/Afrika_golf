@extends('front.main', [
    'title' => 'MCN CGP',
    'bannerTitle' => 'Le tournois',
    'bannerImage' => asset('assets/images/tournois/banner.png'),
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
    <section class="about-tournois">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- TEXTE GAUCHE -->
                <div class="col-lg-5">
                    <div class="contenu">
                        <h2>Un jeu réinventé</h2>
                        <p>
                            Ce tournoi prestigieux se déroule sur des parcours de championnat, offrant un cadre idéal pour
                            les
                            rencontres professionnelles et sportives. Organisé sur des parcours de grande qualité, il
                            favorise
                            les échanges et le réseautage, où les affaires se conjuguent harmonieusement avec le jeu.
                        </p>
                    </div>
                </div>

                <!-- SEPARATEUR (visible desktop seulement) -->
                <div class="col-lg-1 d-none d-lg-flex justify-content-center">
                    <div class="separateur"></div>
                </div>

                <!-- INFOS DROITE -->
                <div class="col-lg-6">
                    <div class="tournois-infos">
                        <div class="info-item">
                            <h3>Format</h3>
                            <p>
                                Tournoi en équipe avec formule adaptée favorisant compétition et convivialité.
                            </p>
                        </div>

                        <div class="info-item">
                            <h3>Participants</h3>
                            <p>Plus de 000 participants</p>
                        </div>

                        <div class="info-item">
                            <h3>Remise des prix</h3>
                            <p>Cérémonie lors du dîner de gala</p>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </section>

    <section class="programme">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <div class="programme-infos-1 text-center">
                        <h3>Un rendez-vous d’exception ou la gastronomie fine, l’Art, le Luxe à l’Africaine et le Golf
                            fusionnent.</h3>
                        <div class="boutton">
                            <a href="">CONSULTER LE PROGRAMME</a>
                            <a href="">RESERVER</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 d-none d-lg-block"></div>

                <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">

                    <div class="programme-infos-2">
                        <h2>Offrez-vous l’expérience Africa Art Golf Cup</h2>
                        <p>
                            Africa Art Golf Cup est un rendez-vous artistique et sportif qui ambitionne de réunir, sur un
                            même lieu — parcours de golf — les amateurs et collectionneurs d’art ainsi que les passionnés de
                            golf. Il est annuel, itinérant en Afrique et hors du continent dans les villes à fort potentiel
                            culturel, favorisant ainsi le rayonnement de l’art et du sport.

                            <br><br>
                            Participer à Africa Art Golf Cup, c’est Vivre une expérience artistique, gastronomique et
                            golfique unique dans la cinquième meilleure destination à visiter selon Forbes, le Rwanda ; sur
                            un magnifique golf, pensé dans une démarche écologiquement responsable par Gary Player.
                        </p>

                        <div class="info-participation">
                            <h3>Participation :</h3>
                            <span class="info">Golfeurs Locaux : 1400 $ </span>
                            <span class="info">Golfeurs venant de l’étranger : 1750 $ </span>
                            <a href="">Découvrez nos offres de partenariat</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

        @include('front.galerie')

    @include('front.partials.footer')

@endsection

