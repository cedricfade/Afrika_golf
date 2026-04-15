@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerImage' => $bannerImage ?? asset('assets/images/destination/banner.png'),
    'bannerTitle' => $bannerTitle ?? 'Kigali, Rwanda',
    'bannerDescription' =>
        "Le Rwanda offre des paysages époustouflants et une population chaleureuse et accueillante, pour une expérience unique dans l'un des pays les plus remarquables au monde. Doté d'une biodiversité extraordinaire, il abrite une faune incroyable qui peuple ses volcans, ses forêts tropicales de montagne et ses vastes plaines. Les voyageurs viennent de loin pour apercevoir les magnifiques gorilles, mais il y a tant d'autres choses à voir et à vivre.",
    'sousTitle' => $sousTitle ?? 'ÉDITION 2026',
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

        .banner .banner-titre {
            padding: 50px;
            justify-content: flex-start;
            text-align: left;
            align-items: center;
            display: block;
            flex-direction: row;
            height: 70vh;
            width: 100%;
            padding-right: 50px !important;
        }

        .banner .banner-titre .titre {
            width: 50%;
        }

        .banner .banner-titre .titre h1 {
            text-align: left;
        }

        @media screen and (max-width: 799px) {}
    </style>
@endpush


@include('pageContent.galerie', ['galleryImages' => $galleryImages ?? collect()])

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
