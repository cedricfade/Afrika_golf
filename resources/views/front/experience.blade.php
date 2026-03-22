@extends('front.main', [
    'title' => 'REJOIGNEZ L\'EXPÉRIENCE',
    'bannerColor' => '#0A140F',
])
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

@section('content')
    <section class="experience">
        <div class="container-fluid ">
            <h1>REJOIGNEZ L’EXPERIENCE</h1>

            <div class="row">
                <div class="col-xl-4">
                    <div class="card" style="width: ;">
                        <img src="{{ asset('assets/images/packs/card1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">IMIGONGO</h3>
                            <h2>PARTENAIRE elégance: <br> 7.500 USD</h2>
                            <div class="card-text">
                                <b>Symbole:</b>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate 
                                </p>
                                <b>Valeur:</b>
                                <p>
                                    Créativité,patrimoine,esthétique.
                                </p>
                            </div>
                           <div class="button">
                             <a href="#" class="btn">Télécharger le formulaire</a>
                           </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="width: ;">
                        <img src="{{ asset('assets/images/packs/card2.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Gorille des montagnes</h3>
                            <h2>PARTENAIRE MAJESTUEUX: <br> 15.000 USD</h2>
                            <div class="card-text">
                                <b>Symbole:</b>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate 
                                </p>
                                <b>Valeur:</b>
                                <p>
                                    Créativité,patrimoine,esthétique.
                                </p>
                            </div>
                           <div class="button">
                             <a href="#" class="btn">Télécharger le formulaire</a>
                           </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="width: ;">
                        <img src="{{ asset('assets/images/packs/card3.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">KARISMBI</h3>
                            <h2>PARTENAIRE suprême: <br> 7.500 USD</h2>
                            <div class="card-text">
                                <b>Symbole:</b>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate 
                                </p>
                                <b>Valeur:</b>
                                <p>
                                    Créativité,patrimoine,esthétique.
                                </p>
                            </div>
                           <div class="button">
                             <a href="#" class="btn">Télécharger le formulaire</a>
                           </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="width: ;">
                        <img src="{{ asset('assets/images/packs/card4.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">IMIGONGO</h3>
                            <h2>PARTENAIRE elégance: 7.500 USD</h2>
                            <div class="card-text">
                                <b>Symbole:</b>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate 
                                </p>
                                <b>Valeur:</b>
                                <p>
                                    Créativité,patrimoine,esthétique.
                                </p>
                            </div>
                           <div class="button">
                             <a href="#" class="btn">Télécharger le formulaire</a>
                           </div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card" style="width: ;">
                        <img src="{{ asset('assets/images/packs/card5.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">IMIGONGO</h3>
                            <h2>PARTENAIRE elégance: 7.500 USD</h2>
                            <div class="card-text">
                                <b>Symbole:</b>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto voluptates soluta repudiandae obcaecati quaerat cupiditate 
                                </p>
                                <b>Valeur:</b>
                                <p>
                                    Créativité,patrimoine,esthétique.
                                </p>
                            </div>
                           <div class="button">
                             <a href="#" class="btn">Télécharger le formulaire</a>
                           </div>
                           
                        </div>
                    </div>
                </div>
  
            </div>
        </div>
    </section>

    @include('front.partials.footer')
@endsection
