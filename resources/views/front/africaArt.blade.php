@extends('front.main', [
    'title' => 'Bien plus qu’un Tournois !',
    'bannerTitle' => 'Bien plus qu’un Tournois !',
    'bannerImage' => asset('assets/images/africa_of_golf/banner.png'),
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
        background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url({{ asset('assets/images/diners/banner.png') }});
    }
</style>

@section('content')
    <section class="about-vision">
        <div class="container">
            <h2>La vision</h2>

            <p class="">
                Africa Art Golf Cup est un rendez-vous artistique et sportif qui ambitionne de réunir, sur un même lieu : un
                parcours de golf, les amateurs et collectionneurs d’art ainsi que les passionnés de golf. La première
                édition se tiendra à Ouidah au Bénin en novembre 2026. Africa Art Golf Cup est un événement annuel itinérant
                en Afrique dans un premier temps, et en Europe ensuite. L’AAGC se déroule en deux phases ; les dîners AAGC
                et la 1ère édition AAGC OUIDAH 26.
            </p>

        </div>
    </section>


    <section class="chronologie">
        <div class="container ">
            <div class="infos text-center">
                <span style="color: #B07F49; text-transform: uppercase;font-size: 18px;">LE VOYAGE</span>
                <h2>Chronologie de l’édition</h2>

      
            </div>

            <div class="date">
                <div class="timeline left">
                    <span>2024</span>
                <h4>Abidjan, Côte d'Ivoire</h4>
                <h5 style="text-transform: uppercase">Édition inaugurable</h5>
                <p>La genèse d’une légende à l’Ivoire Golf Club.</p>
                </div>
                <div class="timeline right">
                    <span>2025</span>
                <h4>Marrakech, Moroc</h4>
                <h5 style="text-transform: uppercase">L’EXPENSION</h5>
                <p>Bridging North and West Africa through art and sport.</p>
                </div>
                <div class="timeline left">
                    <span>2026</span>
                <h4 style="color: #B07F49">Kigali, Rwanda</h4>
                <h5 style="text-transform: uppercase">ÉDITION ACTUELLE</h5>
                <p>Innovation meets tradition in the heart of the continent.</p>
                </div>
                <div class="timeline right">
                    <span>2027</span>
                <h4>Cape Town, Afrique du Sud</h4>
                <h5 style="text-transform: uppercase">VISION FUTURE</h5>
                <p>Destination prévue pour la suite de notre voyage.</p>
                <p></p>
                </div>
            </div>

        </div>
    </section>

    @include('front.partials.footer')
@endsection
