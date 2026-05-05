@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerImage' => $cfg['banner_image'] ?? asset('assets_custom/mcn-cgp/bg.jpg'),
    'rightImage' => $cfg['right_image'] ?? asset('assets_custom/mcn-cgp/logo-mcn-cgp.png'),
    'rightBottomImage' =>
        app()->getLocale() == 'fr'
            ? $cfg['right_bottom_image'] ?? asset('assets_custom/mcn-cgp/valoriser-votre-passion.png')
            : $cfg['right_bottom_image_en'] ?? asset('assets_custom/mcn-cgp/valoriser-votre-passion-en.png'),
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.049), rgba(0, 0, 0, 0.049)), url({{ $cfg['banner_image'] ?? asset('assets/images/mcn/banner.png') }});
        }

        .contenu li {
            color: #c6c6c6;
            font-family: "AveniNext";
            font-size: 1.3rem;
            line-height: .8;
        }
    </style>
@endpush

<section class="about-mcn">
    <div class="container mx-auto">

        <!-- INTRO -->
        <div class="row">
            <div class="col-lg-12 contenu" data-mcn="intro_text" data-mcn-html>
                <p style="font-size: 1.3rem;">{!! __('mcn.intro') !!}</p>
                <ul>
                    &nbsp;&nbsp;&nbsp;&nbsp; <li>{{ __('mcn.bullet_admin') }}</li>
                    &nbsp;&nbsp;&nbsp;&nbsp; <li>{{ __('mcn.bullet_conseil') }}</li>
                    &nbsp;&nbsp;&nbsp;&nbsp; <li>{{ __('mcn.bullet_conservation') }}</li>
                    &nbsp;&nbsp;&nbsp;&nbsp; <li>{{ __('mcn.bullet_valorisation') }}</li>
                </ul>
                <p style="font-size: 1.3rem;">{{ __('mcn.intro_closing') }}</p>
                <a href="https://www.mcn-cgp.com/" style="text-decoration: none;">{{ __('mcn.learn_more') }}</a>
            </div>
        </div>

        <!-- SERVICES -->
        <div class="row g-4 services-row mt-5">
            <div class="col-xl-6 d-flex">
                <div class="services w-100">
                    <h2 class="text-center" data-mcn="service1_title">{{ __('mcn.actions_title') }}</h2>
                    <div data-mcn="service1_text" data-mcn-html style="font-size: 1.3rem;color: #c6c6c6">
                        {!! __('mcn.actions_text') !!}
                    </div>
                </div>
            </div>

            <div class="col-xl-6 d-flex">
                <div class="services w-100">
                    <h2 class="text-center" data-mcn="service2_title">{{ __('mcn.value_title') }}</h2>
                    <div data-mcn="service2_text" data-mcn-html style="font-size: 1.3rem;color: #c6c6c6">
                        {!! __('mcn.value_text1') !!}
                        <br><br>
                        {!! __('mcn.value_text2') !!}
                        <br><br>
                        {!! __('mcn.value_text3') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
