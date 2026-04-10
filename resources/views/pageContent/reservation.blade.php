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
    </style>
@endpush


<section class="reservation"
    style="padding: 50px 0;background: {{ $bannerColor ?? '#0a140f' }};border-top: 2px solid #57432d;">
    <div class="container-fluid" style="margin: 0 auto;width: 87%;">
        <div class="row">
            <div class="col-xl-7">
                <span class="text-color ff-avenir">RÉSERVATION</span>
                <br><br>
                <h2 class="col-xl-6 text-grey ff-mash">Réserver maintenant</h2>
                <br>
                <p class="col-xl-7 text-grey ff-avenir" style="font-size: 20px; line-height: 1.8;">
                    L’Africa Art Golf Cup est un événement exclusif, sur invitation uniquement. Veuillez contacter notre
                    service de conciergerie pour toute question relative à la participation, aux partenariats ou à
                    l’accréditation presse.
                </p>
                <hr style=" width:80%; height:2px; background:#707070; border:none;">
                <div class="row">
                    <div class="col">
                        @include('front.partials.info-reservation')
                    </div>
                    <div class="col">
                        @include('front.partials.info-participation')
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                @include('front.partials.form-reservation')
            </div>
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
