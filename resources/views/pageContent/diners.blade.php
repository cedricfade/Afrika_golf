@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerTitle' => 'Le diners',
    'bannerImage' => asset('assets/images/diners/banner.png'),
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.049), rgba(0, 0, 0, 0.049)), url({{ asset('assets/images/diners/banner.png') }});
        }
    </style>
@endpush


<section class="about-diners">

    <div class="container about-diners-container">
        <div class="row">
            <div class="col-xl-10 col-lg-11 col-md-12">
                <h2>Un diner sur mesure</h2>
                <p>
                    Une série de diners itinérants dans 6 villes africaines et européennes. Elle vise à faire connaître
                    et promouvoir le rendez-vous AAGC OUIDAH 26 autour de diners intimistes privés réunissant une ou des
                    marques de prestige et des personnalités. Les RDV des diners AAGC sont les suivants :

                <ul>
                    <li>Marrakech (Maroc) : Décembre 2025</li>
                    <li>Kinshasa (RD Congo) : Février 2026</li>
                    <li>Abidjan (Côte d’Ivoire) : Mars 2026</li>
                    <li>Abuja (Nigeria) : Mars 2026</li>
                    <li>Kigali (Rwanda) : Mai 2026</li>
                    <li>Paris/Genève : Juin 2026</li>
                </ul>


                </p>
            </div>
        </div>

    </div>
</section>

<section class="cuisiniers">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-5 col-lg-6 col-md-12">
                <div class="image"
                    style="background-image: url({{ asset('assets/images/diners/dieuveilmalonga.jpg') }}); background-position:center">
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-12">
                <div class="logo">
                    <img src="{{ asset('assets/images/diners/logo1.png') }}" alt="Logo Chef Malonga">
                </div>
                <p>
                    L’expérience culinaire afro-fusion se déplace de Musanze à Kigali avec le talentueux Chef Dieuveil
                    Malonga. Véritable laboratoire culinaire, la cuisine de Malonga met en valeur les produits locaux et
                    les épices du continent africain. Ce Champion du changement vous fera découvrir l’inattendu.
                </p>
            </div>
        </div>

        <div class="separateur" style="background:#b07f49; height: 1px; margin: 40px auto; width: 80%;"></div>

        <div class="row g-4">
            <div class="col-xl-5 col-lg-6 col-md-12">
                <div class="image"
                    style="background-image: url({{ asset('assets/images/diners/Chef-tamsirvf.jpg') }}); background-position: ">
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-12">
                <div class="logo">

                    <img src="{{ asset('assets/images/diners/logo2.png') }}" alt="Logo Chef Tamsir">
                </div>
                <p>
                    Chef cuisinier - DJ, Chef Tamsir NDir a l’art de mixer les mélodies et les saveurs des horizons
                    africains. Partager un instant avec Chef Tamsir est un véritable voyage culinaire et musical. Chaque
                    met concocté par lui, est une exception.
                </p>
                <div class="lien">
                    <a href="">PARTICIPER À L’EXPÉRIENCE</a>
                    <a href="">SPONSORISER LE DINER OU LE BRUNCH</a>
                    <div class="lien">
                    </div>
                </div>

            </div>
            <div class="souscrire">
                <a href="" class="btn">CONSULTER LE PROGRAMME</a>
                <a href="" class="btn">RESERVER</a>
            </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.galerie')

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
