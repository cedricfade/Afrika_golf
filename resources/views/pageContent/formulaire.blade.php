@extends('front.main', [
    'title' => 'FORMULAIRE',
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
    <section class="formulaire">
        <div class="container">
            <h1>Remplissez ce formulaire pour recevoir le bulletin de sponsoring par mail.</h1>

            <div class="row info">
                <div class="col-xl-6">
                    <img src="{{ asset('assets/images/packs/card1.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-xl-1"></div>
                <div class="col-xl-5">
                    <h3>
                        IMIGONGO
                    </h3>
                    <h2>Partenaire elégance: <br>7.500 USD </h2>
                    <div class="card-text">
                        <b>Symbole:</b>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae expedita, architecto
                            voluptates soluta repudiandae obcaecati quaerat cupiditate
                        </p>
                        <b>Valeur:</b>
                        <p>
                            Créativité,patrimoine,esthétique.
                        </p>
                    </div>
                </div>
            </div>
            <div class="form">
                <form action="">
                    <div class="row">
                        <div class="form-group col-xl-6">
                            <label for="">Nom de l'entreprise</label>
                            <input type="text" class="form-control" name="company_name">
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">Personne à contacter</label>
                            <input type="text" class="form-control" name="contact_person">
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">Pays</label>
                            <input type="text" class="form-control" name="country">
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="">Secteur d'activité</label>
                            <input type="text" class="form-control" name="sector">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </section>

    @include('front.partials.footer')
@endsection
