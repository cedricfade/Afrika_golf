@extends('front.main', [
    'title' => 'Exposition',
    'citation1' => 'QUAND L’ART RACONTE L’AFRIQUE',
    'citation2' => 'QUAND LE GOLF CRÉE LE LIEN.',
    'bannerColor' => '#FFFCF8',
    'subImage' => asset('assets/images/exposition/image.png'),
    'imageHeader' => asset('assets/images/exposition/banner.png'),
])

<style>
    .banner {
        margin: 0;
        padding: 30px;
        padding-bottom: 50px;
        height: 100vh;

        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        overflow: hidden;
      
    }
    .banner-titre .image-header{
        width: 20% !important;
        position: relative;
       
    }
.nav-primary .nav-item a {
    color: #0f0f0f !important;

}
.dropdown-menu li a {
    padding: 10px 0 !important;
    color: #0f0f0f !important;

}
.menu-top i {
    font-size: clamp(1.8em, 5vw, 3em);
    color: #0f0f0f !important;
    transition: all 0.3s ease;
}

.menu-top i:hover {
    color: #B07F49;
}

.menu-text {
    font-size: clamp(10px, 1.5vw, 12px);
    text-align: center;
    align-self: flex-end;
    color: #0f0f0f !important;
    font-family: "MyArial";
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-right: clamp(5px, 1vw, 9px);
}

.lang {
    color: #0f0f0f !important;
    font-family: "MyArial";
    font-size: clamp(12px, 2vw, 14px);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.menu-wrapper .trait {
    height: clamp(20px, 4vw, 30px);
    width: 2px;
    background: #0f0f0f !important;
}

.citation{
    position: relative;
 
   
}
.citation h3{
    
    font-size: clamp(1.1em, 3vw, 2em);
    text-align: center;
    letter-spacing: 2px
}
.sub-image {
   width: clamp(30px, 20vw, 70px) !important;
}
</style>

@section('content')

<section class="exposition">

    <div class="container">
        <p>
            Une Exposition-ventes mettra en valeur des œuvres d’art d’exception réalisées par des artistes originaires du Rwanda et de la sous-région Est-africaine. 
            
            <br><br>
            MERCREDI 28 OCTOBRE 2026 A partir de 18h30 : Vernissage de l’exposition Africa Art Golf Cup
            
            <br><br>
            Rendez-vous le 31 juillet 2026 pour télécharger le catalogue des oeuvres.
        </p>
        <div class="souscrire">
            <a href="">CONSULTER LE PROGRAMME</a>
            <a href="">RESERVER</a>
        </div>
    </div>
</section>
    @include('front.partials.footer')
@endsection
