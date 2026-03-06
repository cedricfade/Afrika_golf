@extends('front.main', [
    'title' => 'MCN CGP',
    'bannerTitle' => 'Le tournois',
    'bannerImage' => asset('assets/images/tournois/banner.png'),
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
</style>
@section('content')
    <section class="about-tournois">
        <div class="container">
            <div class="row align-items-center g-5">

                <!-- TEXTE GAUCHE -->
                <div class="col-lg-5">
                    <div class="contenu">
                        <h2>Un jeu réinventé</h2>
                        <p>
                            Ce tournoi prestigieux se déroule sur des parcours de championnat, offrant un cadre idéal pour
                            les
                            rencontres professionnelles et sportives. Organisé sur des parcours de grande qualité, il
                            favorise
                            les échanges et le réseautage, où les affaires se conjuguent harmonieusement avec le jeu.
                        </p>
                    </div>
                </div>

                <!-- SEPARATEUR (visible desktop seulement) -->
                <div class="col-lg-1 d-none d-lg-flex justify-content-center">
                    <div class="separateur"></div>
                </div>

                <!-- INFOS DROITE -->
                <div class="col-lg-6">
                    <div class="tournois-infos">
                        <div class="info-item">
                            <h3>Format</h3>
                            <p>
                                Tournoi en équipe avec formule adaptée favorisant compétition et convivialité.
                            </p>
                        </div>

                        <div class="info-item">
                            <h3>Participants</h3>
                            <p>Plus de 000 participants</p>
                        </div>

                        <div class="info-item">
                            <h3>Remise des prix</h3>
                            <p>Cérémonie lors du dîner de gala</p>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </section>

    <section class="galerie-section">
        <div class="container" style="margin:0 auto; width:80%">
            <div class="galerie">
                <h2>Galerie</h2>
                <div class="separateur" style=""></div>
            </div>
            <div class="slider-wrapper">
                <!-- Flèche gauche -->
                <button class="prev">&#10094;</button>
                <!-- Image Slider -->
                <div class="slider-container">
                    <div class="slider">
                        <div class="slide">
                            <img src="{{ asset('assets/images/tournois/galerie1.png') }}" alt="">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('assets/images/tournois/galerie1.png') }}" alt="">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('assets/images/tournois/galerie1.png') }}" alt="">
                        </div>
                    </div>
                    <!-- Indicateurs -->
                    <div class="indicators">
                        <span class="dot active" data-slide="0"></span>
                        <span class="dot" data-slide="1"></span>
                        <span class="dot" data-slide="2"></span>
                    </div>
                </div>
                <!-- Flèche droite -->
                <button class="next">&#10095;</button>
            </div>

        </div>
    </section>

    @include('front.partials.footer')
    @push('js')
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                const slider = document.querySelector('.slider');
                const slides = document.querySelectorAll('.slide');
                const next = document.querySelector('.next');
                const prev = document.querySelector('.prev');
                const dots = document.querySelectorAll('.dot');

                let index = 0;

                function showSlide(i) {
                    if (i >= slides.length) index = 0;
                    if (i < 0) index = slides.length - 1;

                    slider.style.transform = `translateX(-${index * 100}%)`;

                    dots.forEach(dot => dot.classList.remove('active'));
                    dots[index].classList.add('active');
                }

                next.addEventListener('click', () => {
                    index++;
                    showSlide(index);
                });

                prev.addEventListener('click', () => {
                    index--;
                    showSlide(index);
                });

                dots.forEach(dot => {
                    dot.addEventListener('click', function() {
                        index = parseInt(this.getAttribute('data-slide'));
                        showSlide(index);
                    });
                });

            });
        </script>
    @endpush
@endsection
