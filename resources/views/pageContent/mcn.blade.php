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
                <p style="font-size: 1.3rem;">
                    {{ __('mcn.intro') }} <br>
                    â¢&nbsp;&nbsp;&nbsp;&nbsp; {{ __('mcn.bullet_admin') }}<br>
                    â¢&nbsp;&nbsp;&nbsp;&nbsp; {{ __('mcn.bullet_conseil') }}<br>
                    â¢&nbsp;&nbsp;&nbsp;&nbsp; {{ __('mcn.bullet_conservation') }}<br>
                    â¢&nbsp;&nbsp;&nbsp;&nbsp; {{ __('mcn.bullet_valorisation') }}<br>
                    {{ __('mcn.intro_closing') }}<br>
                    <a href="https://www.mcn-cgp.com/" style="text-decoration: none;">{{ __('mcn.learn_more') }}</a>
                </p>
            </div>
        </div>

        <!-- SERVICES -->
        <div class="row g-4 services-row mt-5">
            <div class="col-xl-6 d-flex">
                <div class="services w-100">
                    <h2 class="text-center">{{ __('mcn.actions_title') }}</h2>
                    <p style="font-size: 1.3rem;">
                        {{ __('mcn.actions_text') }}
                    </p>
                </div>
            </div>

            <div class="col-xl-6 d-flex">
                <div class="services w-100">
                    <h2 class="text-center">{{ __('mcn.value_title') }}</h2>
                    <p style="font-size: 1.3rem;">
                        {{ __('mcn.value_text1') }}
                        <br><br>
                        {{ __('mcn.value_text2') }}
                        <br><br>
                        {{ __('mcn.value_text3') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
