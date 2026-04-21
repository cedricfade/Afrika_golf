@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerImage' => $bannerImage ?? asset('assets/images/destination/banner.png'),
    'bannerTitle' => $bannerTitle ?? __('destination.banner_title'),
    'bannerDescription' => __('destination.description'),
    'sousTitle' => $sousTitle ?? __('destination.edition'),
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

        @media screen and (max-width: 799px) {
            
            .banner .banner-titre {
                padding-top: 0px !important;
                padding-bottom: 0px !important;
                padding-right: 0px !important;
                padding-left: 30px !important;
            }
            
            .banner .banner-titre .titre {
                width: 100%;
            }
            
            .banner .banner-titre .titre h1 {
                width: 50%;
            }
            
            .banner .banner-titre .titre {
                font-size: 13px;
            }
        }
    </style>
@endpush


@include('pageContent.galerie', ['galleryImages' => $galleryImages ?? collect()])

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
