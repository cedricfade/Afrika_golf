@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerSentenceTitle' => $bannerSentenceTitle ?? __("Un rendez-vous d'exception où la gastronomie fine, l'art, le luxe à l'africaine et le golf fusionnent ."),
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
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="programme-infos-1 text-center">
                    <img src="{{ asset('assets/images/logo-kigali-resort-blanc.png') }}" style="width:60%">
                    <div class="boutton">
                        <a href="{{ asset('assets/images/program-aagc.pdf') }}">@lang('CONSULTER LE PROGRAMME')</a>
                        <a href="{{ route('reservations') }}">@lang('RESERVER')</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="programme-infos-2">
                    <p>
                        <b class="text-white">AFRICA ART GOLF CUP</b>, {{ __('pages.tournois_intro') }}
                    </p>

                    <p>
                        <b class="text-white">{{ __('pages.pour_les_golfeurs') }}</b> :<br>
                        {!! nl2br(e(__('pages.tournois_golfers'))) !!}

                    <p>
                        <b class="text-white">{{ __('pages.pour_les_non_golfeurs') }}</b> :<br>
                        {!! nl2br(e(__('pages.tournois_non_golfers'))) !!}
                    </p>

                    <p>
                        <b class="text-white">Pour les fins gourmets </b> :<br>
                        Expériences culinaires signées Dieuveil Malonga
                        Les fourneaux de l’Atelier des vins seront un véritable laboratoire de découvertes des saveurs issues des produits locaux et des épices les plus insolites d’Afrique. 
                        Tamsir NDir, le Chef-DJ pour qui les plats et les platines n’ont pas de secrets, vous offrira un brunch des plus branchés sur les belles rives du lac Muhazi.
                    </p>

                    <p>
                        <b class="text-white">Pour l’oeil d’esthète  </b> :<br>
                        Tout est fait pour vous faire baigner dans un équilibre entre raffinement et Art. Du 28 au 30 octobre 2026, une exposition vous fera découvrir des oeuvres d’art d’exception.
                    </p>
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
