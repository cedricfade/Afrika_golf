@extends('front.main', [
    'title' => 'Contactez-nous',
    'bannerTitle' => 'Contactez-nous',
    'bannerImage' => asset('assets/images/contact/banner.png'),
])

<style>
    .banner {
        margin: 0;
        padding: 30px;
        padding-bottom: 50px;
        height: 100vh;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url({{ asset('assets/images/contat/banner.png') }});
    }
</style>

@section('content')
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <span>ENTRER EN CONTACT</span>
                    <br><br>
                    <h2 class="col-xl-8">Demander une Invitation</h2>
                    <br>
                    <p class="col-xl-9">
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
                <div class="col-xl-5">
                    @include('front.partials.form-reservation')
                </div>
            </div>
    </section>
    @include('front.partials.footer')
@endsection
