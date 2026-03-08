@extends('front.main', [
    'title' => 'Accueil',
    'bannerImage' => asset('assets/images/home/banner.png'),
    'bannerTitle' => 'Africa Art Golf Cup',
    'bannerButton' => [
        'text' => "Découvrir l'expérience",
        'link' => '#',
    ],
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
        background-image: linear-gradient(rgba(0, 0, 0, 0.049), rgba(0, 0, 0, 0.049)), url({{ asset('assets/images/home/banner.png') }});
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
@section('content')
    <section class="about">
        <div class="container">
            <div class="row align-items-center">

                <!-- IMAGE -->
                <div class="col-xl-5 col-lg-6 col-md-12 about-image mb-5">
                    <div class="image-about">
                        <img src="{{ asset('assets/images/home/img1.png') }}" alt="">
                    </div>
                    <div class="year">
                        <span>2026</span>
                    </div>
                </div>

                <!-- TEXTE -->
                <div class="col-xl-6 col-lg-6 col-md-12 about-text">
                    <div class="info">
                        <h2 class="mb-4">
                            <span>à</span> propos de <span class="highlight">MCN</span>
                        </h2>

                        <div class="trait mb-5"></div>

                        <p>
                            MCN - CGP est spécialisée dans la gestion des patrimoines artistiques. Ses activités se
                            déclinent comme suit : Administration de collection - Valorisation des collections et promotion
                            des artistes les composant - Conseil en achat et vente d’œuvres d’art - Conservation et
                            restauration des œuvres. Africa Art Golf Cup est un événement conçu dans le sens de valoriser et
                            promouvoir les collections et leurs artistes.
                        </p>

                        <a href="">Découvrir MCN <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- FONDATIONS --}}
    <section class="fondations">
        <div class="container text-center">
            <span style="color: #B07F49; font-family: 'AveniNext">LA FONDATION</span>
            <br><br>
            <h2 style="font-family: 'mashRegular';font-size:2em; color:#C6C6C6" class="mb-5">LES TROIS PILIERS</h2>

            <div class="row">
                <div class="col-xl-4">
                    <img src="{{ asset('assets/images/home/img4.png') }}" alt="" class="col-xl-12 col-12 mb-4">
                </div>
                <div class="col-xl-4">
                    <img src="{{ asset('assets/images/home/img3.png') }}" alt="" class="col-xl-12 col-12 mb-4">
                </div>
                <div class="col-xl-4">
                    <img src="{{ asset('assets/images/home/img5.png') }}" alt="" class="col-xl-12 col-12 mb-4">
                </div>
            </div>

        </div>
    </section>

    {{-- HOTE EDITION --}}
    <section class="edition"
        style="height:; background-position: center; background-size: cover;background-image: url({{ asset('assets/images/home/img6.png') }});">
        <div class="container">
            <div class="col-xl-6">
                <span class="">HÔTE DE L’ÉDITION 2026</span>
                <h2 style="font" class="mt-4">Kigali</h2>
                <p>
                    Découvrez le Pays des Mille Collines. Ville marquée par une transformation remarquable, l’innovation et
                    une beauté immaculée, elle offre un cadre idéal à l’édition de cette année.
                </p>

                <a href="" class="">EXPLORER LA DESTINATION</a>
            </div>
        </div>
    </section>

    {{-- CONTACT --}}

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
                    <div class="info">
                        <h3 style="font-family: 'mashRegular'; font-size: 40px; color:#C6C6C6;">MCN</h3>
                        <address style="color: #C6C6C6; font-family: 'AveniNext';font-size: 20px; ">Abidjan Plateau, Côte
                            d’Ivoire</address>
                        <h3 style="font-family: 'mashRegular'; font-size: 40px; color:#C6C6C6">Concierge</h3>
                        <a href=""
                            style="color: #C6C6C6; text-decoration:none; font-family: 'AveniNext';font-size: 20px; "
                            class="mb-5">Concierge@africaartgolfcup.com</a>
                        <br>
                        <a href=""
                            style="color: #C6C6C6;  text-decoration:none; font-family: 'AveniNext';font-size: 20px; "
                            class="">+225 27 20 00 00 00</a>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="formulaire">
                        <form action="">
                            <div class="form-group">
                                <label for="">Nom & prénoms</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Adresse Email</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Objet</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Message</label>

                                <textarea name="" id="" cols="25" rows="6" class="form-control"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn">ENVOYER</button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>

    @include('front.partials.footer')
@endsection
