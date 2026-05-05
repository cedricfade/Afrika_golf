<div class="container">
    <div class="row align-items-center">
        <!-- IMAGE -->
        <div class="col-lg-5 col-md-12 about-image mb-5">
            <div class="image-about">
                <img data-home="about_image" src="{{ asset('assets/images/home/img1.png') }}" alt="">
            </div>
            <div class="year">
                <span data-home="about_year">2026</span>
            </div>
        </div>
        <!-- TEXTE -->
        <div class="col-lg-7 col-md-12 about-text">
            <div class="info">
                <h2 class="mb-4" data-home="concept_title" data-home-html="1">
                    {{ __('ajax_home.about_concept_title') }}
                </h2>
                <div class="trait mb-5"></div>
                <p data-home="concept_text" data-home-html="1">
                    {!! __('ajax_home.about_concept_text') !!}
                </p>
            </div>
            <div class="info">
                <h2 class="mb-4" data-home="mcn_title" data-home-html="1">
                    {!! __('ajax_home.about_mcn_title') !!}
                </h2>
                <div class="trait mb-5"></div>
                <p data-home="mcn_text">
                    {{ __('ajax_home.about_mcn_text') }}
                </p>
                <a href="{{ route('mcn-cgp') }}" data-home="mcn_link">{{ __('ajax_home.about_mcn_link') }} <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </div>
</div>
