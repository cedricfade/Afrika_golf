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
                    <div class="info">
                        <h3 style="font-family: 'mashRegular'; font-size: 40px; color:#C6C6C6;">MCN</h3>
                        <address style="color: #C6C6C6; font-family: 'AveniNext';font-size: 20px; ">Abidjan Plateau, Côte d’Ivoire</address>
                        <h3 style="font-family: 'mashRegular'; font-size: 40px; color:#C6C6C6">Concierge</h3>
                        <a href="" style="color: #C6C6C6; text-decoration:none; font-family: 'AveniNext';font-size: 20px; "
                            class="mb-5">Concierge@africaartgolfcup.com</a>
                        <br>
                        <a href="" style="color: #C6C6C6;  text-decoration:none; font-family: 'AveniNext';font-size: 20px; "
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