    <section class="galerie-section">
        <div class="container" style="margin:0 auto; width:80%">
            <div class="galerie">
                <h2>Galerie</h2>
                <div class="separateur" style=""></div>
            </div>
            @if (($galleryImages ?? collect())->isNotEmpty())
                <div class="slider-wrapper">
                    <!-- Flèche gauche -->
                    <button class="prev">&#10094;</button>
                    <!-- Image Slider -->
                    <div class="slider-container">
                        <div class="slider">
                            @foreach ($galleryImages as $slide)
                                <div class="slide">
                                    <img src="{{ Storage::url($slide->content) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <!-- Indicateurs -->
                        <div class="indicators">
                            @foreach ($galleryImages as $i => $slide)
                                <span class="dot {{ $i === 0 ? 'active' : '' }}"
                                    data-slide="{{ $i }}"></span>
                            @endforeach
                        </div>
                    </div>
                    <!-- Flèche droite -->
                    <button class="next">&#10095;</button>
                </div>
            @endif
        </div>
    </section>
