@extends('front.main', [
    'title' => 'Blog',
    'description' => __('blog.meta_description'),
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
            <span>{{ __('blog.featured') }}</span>
            <h1>{{ __('blog.headline') }}</h1>
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
                        aria-controls="v-pills-technology" aria-selected="true">{{ __('blog.tab_technology') }}</button>
                    <button class="nav-link" id="v-pills-health-tab" data-bs-toggle="pill" data-bs-target="#v-pills-health"
                        type="button" role="tab" aria-controls="v-pills-health" aria-selected="false">{{ __('blog.tab_health') }}</button>
                    <button class="nav-link" id="v-pills-travel-tab" data-bs-toggle="pill" data-bs-target="#v-pills-travel"
                        type="button" role="tab" aria-controls="v-pills-travel" aria-selected="false">{{ __('blog.tab_travel') }}</button>
                    <button class="nav-link" id="v-pills-entrepreneurship-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-entrepreneurship" type="button" role="tab"
                        aria-controls="v-pills-entrepreneurship" aria-selected="false">{{ __('blog.tab_entrepreneurship') }}</button>
                    <button class="nav-link" id="v-pills-personal-development-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-personal-development" type="button" role="tab"
                        aria-controls="v-pills-personal-development" aria-selected="false">{{ __('blog.tab_personal_dev') }}</button>
                    <button class="nav-link" id="v-pills-education-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-education" type="button" role="tab" aria-controls="v-pills-education"
                        aria-selected="false">{{ __('blog.tab_education') }}</button>
                    <button class="nav-link" id="v-pills-finance-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-finance" type="button" role="tab" aria-controls="v-pills-finance"
                        aria-selected="false">{{ __('blog.tab_finance') }}</button>
                    <button class="nav-link" id="v-pills-environment-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-environment" type="button" role="tab"
                        aria-controls="v-pills-environment" aria-selected="false">{{ __('blog.tab_environment') }}</button>
                    <button class="nav-link" id="v-pills-lifestyle-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-lifestyle" type="button" role="tab" aria-controls="v-pills-lifestyle"
                        aria-selected="false">{{ __('blog.tab_lifestyle') }}</button>

                    <div class="follow">
                        <h4>{{ __('blog.follow_us') }}</h4>
                        <div class="social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                {{-- CONTENU --}}

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-technology" role="tabpanel"
                        aria-labelledby="v-pills-technology-tab" tabindex="0">

                        <p>
                            {{ __('blog.article_intro1') }}

                            <br><br>

                            {{ __('blog.article_intro2') }}
                        </p>
                        <br>
                        <h3>{{ __('blog.article_title_1') }}</h3>
                        <p>{{ __('blog.article_para_1') }}</p>

                        <br>
                        <h3>{{ __('blog.article_title_2') }}</h3>
                        <p>{{ __('blog.article_para_2') }}</p>

                    </div>
                    <div class="tab-pane fade" id="v-pills-health" role="tabpanel" aria-labelledby="v-pills-health-tab"
                        tabindex="0">
                        <p>
                            {{ __('blog.article_intro1') }}

                            <br><br>

                            {{ __('blog.article_intro2') }}
                        </p>
                        <br>
                        <h3>{{ __('blog.article_title_1') }}</h3>
                        <p>{{ __('blog.article_para_1') }}</p>

                        <br>
                        <h3>{{ __('blog.article_title_2') }}</h3>
                        <p>{{ __('blog.article_para_2') }}</p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-travel" role="tabpanel" aria-labelledby="v-pills-travel-tab"
                        tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-entrepreneurship" role="tabpanel"
                        aria-labelledby="v-pills-entrepreneurship-tab" tabindex="0">


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
