@extends('front.main', [
    'title' => 'Partenaires',
    'bannerTitle' => 'Partenaires',
    'bannerImage' => asset('assets/images/partenaire/banner.png'),
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
        background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url({{ asset('assets/images/partenaire/banner.png') }});
    }
</style>

@section('content')

    <section class="partenaires">
            <div class="container">
                <h2>Partenaires distingués</h2>
                <p>Nous sommes fiers de collaborer avec des institutions et des marques prestigieuses qui partagent notre engagement envers l’excellence, l’innovation et la célébration du patrimoine africain.</p>


                  <div class="clients">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                       <div class="card">
                        <span>Logo1</span>
                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                       <div class="card">
                        <span>Logo2</span>
                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                       <div class="card">
                        <span>Logo3</span>
                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                       <div class="card">
                        <span>Logo4</span>
                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                       <div class="card">
                        <span>Logo5</span>
                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                       <div class="card">
                        <span>Logo6</span>
                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                       <div class="card">
                        <span>Logo7</span>
                       </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                       <div class="card">
                        <span>Logo8</span>
                       </div>
                    </div>
                </div>
                
            </div>
            </div>
            
    </section>


    @include('front.partials.footer')
@endsection