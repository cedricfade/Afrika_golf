<div class="container">
    <div class="row align-items-center">
        <!-- IMAGE -->
        <div class="col-lg-5 col-md-12 about-image mb-5">
            <div class="image-about">
                <img src="{{ asset('assets/images/home/img1.png') }}" alt="">
            </div>
            <div class="year">
                <span>2026</span>
            </div>
        </div>
        <!-- TEXTE -->
        <div class="col-lg-7 col-md-12 about-text">
            <div class="info">
                <h2 class="mb-4">
                    {{ __('ajax_home.about_concept_title') }}
                </h2>
                <div class="trait mb-5"></div>
                <p>
                    {!! __('ajax_home.about_concept_text') !!}
                </p>
            </div>
            <div class="info">
                <h2 class="mb-4">
                    <span>à</span> {!! __('ajax_home.about_mcn_title') !!}
                </h2>
                <div class="trait mb-5"></div>
                <p>
                    {{ __('ajax_home.about_mcn_text') }}
                </p>
                <a href="{{ route('mcn-cgp') }}">{{ __('ajax_home.about_mcn_link') }} <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
</div>
