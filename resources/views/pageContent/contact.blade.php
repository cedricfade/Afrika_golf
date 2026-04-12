@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'title' => 'Contactez-nous',
    'bannerTitle' => $bannerTitle ?? 'Contactez-nous',
    'bannerImage' => $bannerImage ?? asset('assets/images/contact/banner.png'),
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
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url({{ $bannerImage ?? asset('assets/images/contact/banner.png') }});
        }
    </style>
@endpush

<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <span>ENTRER EN CONTACT</span>
                <br><br>
                <div class="row">
                    <div class="col-lg-12">
                        @include('front.partials.info-participation')
                    </div>
                    <div class="col-lg-12">
                        @include('front.partials.info-reservation')
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                @include('pageContent.partials.form-reservation')
            </div>
        </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
