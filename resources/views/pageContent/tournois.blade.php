@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerSentenceTitle' => __('tournois.rendezvous'),
    'bannerImage' => $bannerImage ?? asset('assets/images/tournois/banner.png'),
])

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
                        <b class="text-white">AFRICA ART GOLF CUP</b>, {{ __('tournois.intro') }}
                    </p>

                    <p>
                        <b class="text-white">{{ __('tournois.golfers_title') }}</b> :<br>
                        {!! __('tournois.golfers_text') !!}
                    </p>

                    <p>
                        <b class="text-white">{{ __('tournois.non_golfers_title') }}</b> :<br>
                        {!! nl2br(e(__('tournois.non_golfers_text'))) !!}
                    </p>

                    <p>
                        <b class="text-white">{{ __('tournois.gourmets_title') }}</b> :<br>
                        {!! nl2br(e(__('tournois.gourmets_text'))) !!}
                    </p>

                    <p>
                        <b class="text-white">{{ __('tournois.esthete_title') }}</b> :<br>
                        {{ __('tournois.esthete_text') }}
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
