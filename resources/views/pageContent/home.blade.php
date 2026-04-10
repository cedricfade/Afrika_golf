@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerImage' => $bannerImage ?? asset('assets/images/home/banner.png'),
    'middleImage' => $middleImage ?? asset('assets_custom/home/svg/aagc-kigali.svg'),
    'bottomImage' => $bottomImage ?? asset('assets_custom/home/svg/aagc-golfeur.svg'),
    'bannerContent' => $bannerContent ?? __('ACHETER UNE BALLE DE GOLF POUR ACCOMPAGNER LES AUTISTES ADULTES'),
])
<section class="about">
    @include('pageContent.ajaxContent.home.about')
</section>

{{-- FONDATIONS --}}
<section class="fondations">
    @include('pageContent.ajaxContent.home.fondations')
</section>

{{-- HOTE EDITION --}}
<section class="editionContent">
    @include('pageContent.ajaxContent.home.edition')
</section>

{{-- CONTACT --}}
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                @include('pageContent.partials.enter-contacts')
            </div>
            <div class="col-xl-5">
                @include('pageContent.partials.form-reservation')
            </div>
        </div>
    </div>
</section>

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
            background-image: linear-gradient(rgba(0, 0, 0, 0.049), rgba(0, 0, 0, 0.049)), url({{ $bannerImage ?? asset('assets/images/home/banner.png') }});
        }

        /*  BANNER*/
        .banner-titre {
            justify-content: center;
            text-align: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            height: 70vh;
            width: 50%;
        }

        .banner-titre h1 {
            font-size: clamp(2.5rem, 6vw, 7rem);
            color: #fff;
            margin-bottom: 70px;
            font-family: "AveniNextBold";
            line-height: 1;
        }

        .banner-titre a {
            padding: 17px 40px;
            background: #fff;
            text-transform: uppercase;
            color: #000;
            text-decoration: none;
            font-size: 1.3em;
            font-family: "MyArial";
            transition: 0.3s all ease-in;
        }

        .banner-titre a:hover {
            background: black;
            color: white;
        }

        @media screen and (max-width:799px) {

            .navbar {
                margin: 0 auto !important;
                width: 100%;
            }


            .banner-titre {
                justify-content: center;
                text-align: center;
                align-items: center;
                display: flex;
                flex-direction: column;
                height: 60vh;
                width: 100%;
            }

            .banner-titre a {
                padding: 7px 20px !important;
                background: #fff;
                text-transform: uppercase;
                color: #000;
                text-decoration: none;
                font-size: 15px;
                font-family: "MyArial";
                transition: 0.3s all ease-in;
                width: 7%;

            }
        }
    </style>
@endpush
