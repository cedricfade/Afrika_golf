@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerColor' => $bannerColor ?? '#0A140F',
])
@push('css2')
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

        /* ── Responsive section reservation ── */
        @media (max-width: 767px) {
            .reservation {
                padding: 30px 0 !important;
            }

            .reservation .container-fluid {
                width: 95% !important;
            }

            .reservation h2 {
                font-size: 1.6rem;
            }

            .reservation p {
                font-size: 16px !important;
            }

            .reservation hr {
                width: 100% !important;
            }
        }
    </style>
@endpush


<section class="reservation"
    style="padding: 50px 0;background: {{ $bannerColor ?? '#0a140f' }};border-top: 2px solid #57432d;">
    <div class="container-fluid" style="margin: 0 auto;width: 87%;">
        <div class="row">
            <div class="col-lg-6">
                @include('front.partials.info-participation')
            </div>
            <div class="col-lg-6">
                @include('front.partials.info-reservation')
            </div>
        </div>
        <div class="col-lg-12">
            @include('front.partials.form-reservation')
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
