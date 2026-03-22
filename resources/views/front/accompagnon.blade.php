@extends('front.main', [
    'title' => 'ACCOMPAGNEMENT',
    'bannerTitle' => 'MENER UNE VIE PLEINE ET RICHE AVEC L’AUTISME',
    'bannerImage' => asset('assets/images/accompagnon/banner.jpg'),
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

    }

    .banner-titre h1 {
        font-size: clamp(1.5em, 5vw, 7.8em) !important;
        color: #fff !important;
        font-family: "AveniNext" !important;
        font-weight: 100;

    }
</style>

@section('content')
    <section class='accompagnon'>
        <div class="container">
            <p>
                L’engagement de Bright Future Foundation, ONG d’origine américaine, à donner aux personnes en situation de
                handicap - notamment les autistes adultes - les moyens de vivre de manière autonome et de s’épanouir chez
                elles, est fortement partage par MCN-CGP. Ainsi, à travers les fonds recueillis à chaque édition de Africa
                Art Golf Cup, MCN-CGP ambitionne d’offrir un soutien personnalisé, adapté aux besoins spécifiques de chaque
                personne, en veillant à ce qu’elle dispose des outils et de l’aide nécessaires pour mener une vie pleine et
                riche. Une Organisation locale spécialisée dans la prise en charge des autistes sera le partenaire technique
                rwandais en charge de mettre en oeuvre cet engagement avec l’appui de A bright Future Foundation. Manifestez
                votre solidarité à travers une contribution de 150$ pour l’acquisition d’une balle de golf.
            </p>

            <div class="souscrire">
                <a href="">CONSULTER LE PROGRAMME</a>
                <a href="">RESERVER</a>
            </div>
        </div>
        <div class="container">
          
            <div class="form">
                
                <form action="">
                      
                    <div class="row">
                        <h2>INTERVENTION D'ACHAT DE BALLE</h2>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Prénom</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>

                            <div class="form-group">
                                <label for="">Téléphone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>

                        </div>
                        <div class="col-xl-6">
                             <div class="form-group ">
                            <label for="">Adresse Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>


                        <div class="form-group">
                            <label for="">Nombre de balles</label>
                            <input type="text" class="form-control" name="balls">
                        </div>

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
