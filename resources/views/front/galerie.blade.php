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