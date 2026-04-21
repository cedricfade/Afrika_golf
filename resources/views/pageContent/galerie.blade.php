<section class="galerie-section">
    <div class="container" style="margin:0 auto; width:80%">
        <div class="galerie">
            <h2>{{ __('galerie.title') }}</h2>
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
    
@push('jsSlide')
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
