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

            {{-- PARTICIPANT --}}
            <div class="col-lg-3">
                <div style="background:#0f1c15;min-height:120px;padding:30px;color:#fff;border:0.5px solid #707070;">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <h3 class="text-white" style="font-size:18px;font-family:'AveniNext'" data-res="participation_title">
                                {{ __('reservation.participation_title') }}
                            </h3>
                        </div>
                        <div class="col-lg-12">
                            <span style="color:#C6C6C6;font-family:'AveniNext';font-size:14px;" data-res="national_golfers">{{ __('reservation.national_golfers') }}</span>
                            <b style="font-size:14px;" class="text-white" data-res="national_price">1400$</b><br>
                            <span style="color:#C6C6C6;font-family:'AveniNext';font-size:14px;" data-res="international_golfers">{{ __('reservation.international_golfers') }}</span>
                            <b style="font-size:14px;" class="text-white" data-res="international_price">1750$</b>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PACKAGE --}}
            <div class="col-lg-6">
                <div style="background:#0f1c15;min-height:120px;padding:30px;margin-bottom:10px;color:#fff;border:0.5px solid #707070;">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <h3 style="color:white;font-family:'AveniNext';font-size:18px;" data-res="package_title">
                                {{ __('reservation.package_title') }}
                            </h3>
                        </div>
                        <div class="col-lg-12" data-res-list="package_items">
                            <span style="color:#c6c6c6;font-size:14px;font-family:'AveniNext'">- {{ __('reservation.package_transport') }}</span><br>
                            <span style="color:#c6c6c6;font-size:14px;font-family:'AveniNext'">- {{ __('reservation.package_tournament') }}</span><br>
                            <span style="color:#c6c6c6;font-size:14px;font-family:'AveniNext'">- {{ __('reservation.package_dinner') }}</span><br>
                            <span style="color:#c6c6c6;font-size:14px;font-family:'AveniNext'">- {{ __('reservation.package_brunch') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CONTACTS --}}
            <div class="col-lg-3">
                <div style="background:#0f1c15;min-height:120px;padding:30px;color:#fff;border:0.5px solid #707070;">
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <h3 class="text-white" style="font-size:18px;font-family:'AveniNext'" data-res="contacts_title">
                                {{ __('reservation.contacts_title') }}
                            </h3>
                        </div>
                        <div class="col-lg-12">
                            <span style="color:#C6C6C6;font-family:'AveniNext';font-size:14px;">
                                <a style="text-decoration:none;color:#c6c6c6" data-res-mailto="contact_email" href="mailto:cmangoua@mcn-cgp.com">cmangoua@mcn-cgp.com</a>
                            </span><br>
                            <span style="color:#C6C6C6;font-family:'AveniNext';font-size:14px;">
                                <a style="text-decoration:none;color:#c6c6c6" data-res-tel="contact_phone" href="tel:+225 07 87 05 03 15">+225 07 87 05 03 15</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-12">
            @include('front.partials.form-reservation')
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
