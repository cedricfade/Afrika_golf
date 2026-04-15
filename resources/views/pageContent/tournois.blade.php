@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerTitle' => $bannerTitle ?? 'Le tournois',
    'bannerImage' => $bannerImage ?? asset('assets/images/tournois/banner.png'),
])

<!--section class="about-tournois">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <div class="contenu">
                    <h2>Un jeu réinventé</h2>
                    <p>
                        Ce tournoi prestigieux se déroule sur des parcours de championnat, offrant un cadre idéal pour
                        es rencontres professionnelles et sportives. Organisé sur des parcours de grande qualité, il
                        favorise les échanges et le réseautage, où les affaires se conjuguent harmonieusement avec le
                        jeu.
                    </p>
                </div>
            </div>
            <div class="col-lg-1 d-none d-lg-flex justify-content-center">
                <div class="separateur"></div>
            </div>
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
</section-->

<section class="programme">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-3 col-md-12 col-sm-12">
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
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="programme-infos-2">
                    <p>
                        <b class="text-white">AFRICA ART GOLF CUP</b>, c’est tout un programme orchestré pour satisfaire vos passions et enrichir votre carnet d’adresses.
                    </p>

                    <p>
                        <b class="text-white">Pour les Golfeurs </b>:<br>
                        Formule de jeu : Scramble à 2 joueurs
                        Le départ de la compétition se fera du Tee n°1 et du Tee n°10 et s’échelonnera de 7h30 à 10h00 toutes les 10 minutes.
                        Le palmarès récompensera les 3 meilleures équipes en Net et les 2 meilleures en Brut, plus les gagnants des concours de Drive et de Précision, soit 20 primés. Consultez le règlement sportif.<br>
                        <br>
                        <b class="text-white">Pour les non-golfeurs </b>:<br>
                        Initiation au golf<br>
                        Un programme d’initiation encadré par des Coachs du Kigali Golf Resort & Villas sera prévu en parallèle de la compétition. Practice, putting, approches et plus longs coups seront enseignés aux initiés. L’initiation se terminera par un concours de putting dont les 3 premiers seront primés. L’initiation durera environ 3 heures.<br>

                    </p>
                    @include('front.partials.info-participation')
                </div>
            </div>
        </div>
    </div>
</section>

@include('pageContent.galerie')

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')

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
        }
    </style>
@endpush
