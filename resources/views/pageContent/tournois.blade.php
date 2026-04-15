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
                    <h3>{{ __('pages.tournois_rendezvous') }}</h3>
                    <div class="boutton">
                        <a href="">@lang('CONSULTER LE PROGRAMME')</a>
                        <a href="">@lang('RESERVER')</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-1 col-lg-1 d-none d-lg-block"></div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="programme-infos-2">
                    <p>
                        <b class="text-white">AFRICA ART GOLF CUP</b>, {{ __('pages.tournois_intro') }}
                    </p>

                    <p>
                        <b class="text-white">{{ __('pages.pour_les_golfeurs') }}</b> :<br>
                        {!! nl2br(e(__('pages.tournois_golfers'))) !!}
                        <br>
                        <b class="text-white">{{ __('pages.pour_les_non_golfeurs') }}</b> :<br>
                        {!! nl2br(e(__('pages.tournois_non_golfers'))) !!}

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
