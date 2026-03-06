@extends('front.main', [
    'title' => 'Destination KIGALI',
    'bannerImage' => asset('assets/images/destination/banner.png'),
    'bannerTitle' => 'Kigali, Rwanda',
    'bannerDescription' => "Ville de collines, d’innovation et d’élégance immaculée, Kigali offre un cadre idéal pour l’Africa Art Golf Cup, alliant infrastructures de classe mondiale et beauté naturelle à couper le souffle.",
    'sousTitle' => 'ÉDITION 2026',
    
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
    .banner .banner-titre{
        padding: 50px;
        justify-content: flex-start;
        text-align: left;
        align-items: center;
        display: block;
        flex-direction: row;
        height: 70vh;
        width: 100%;
        padding-right: 50px !important;
    }

    .banner .banner-titre .titre {
        width: 50%;
    }

    .banner .banner-titre .titre h1 {
        text-align: left;
    }

    @media screen and (max-width: 799px) {
        
    }
</style>

    @section('content')
   
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