@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerTitle' => $bannerTitle ?? __('accompagnon.banner_title'),
    'bannerImage' => $bannerImage ?? asset('assets/images/accompagnon/banner.jpg'),
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
        }

        .banner-titre h1 {
            font-size: clamp(1.5em, 5vw, 7.8em) !important;
            color: #fff !important;
            font-family: "AveniNext" !important;
            font-weight: 100;
        }
    </style>
@endpush

<section class="accompagnon">
    <div class="container">
        <p class="fs-lg" data-acc="content_text" data-acc-html>
            {!! __('ajax_accompagnon.content_text') !!}
        </p>
        <div class="souscrire">
            <a href="{{ asset('assets/images/program-aagc.pdf') }}" data-acc="btn_programme">
                {{ __('ajax_accompagnon.content_btn_programme') }}
            </a>
            <a href="{{ route('reservations') }}" data-acc="btn_reserve">
                {{ __('ajax_accompagnon.content_btn_reserve') }}
            </a>
        </div>
    </div>
    <div id="formPage">
        @include('pageContent.ajaxContent.accompagnon.formPage')
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
