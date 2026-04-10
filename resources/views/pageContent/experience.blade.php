@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerColor' => '#0A140F',
])

@push('css2')
    <style>
        .banner {
            margin: 0;
            padding: 30px;
            padding-bottom: 50px;
            height: 19vh;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        @media screen and (max-width: 799px) {
            .banner {
                height: 15vh !important;
            }
        }
    </style>
@endpush

<section class="experience">
    <div class="container-fluid ">
        <h1>REJOIGNEZ L’EXPERIENCE</h1>
        <div class="row">
            @forelse ($packs ?? [] as $pack)
                <div class="col-xl-4">
                    @include((Auth::user() ? 'back' : 'front') . '.partials.pack-item', [
                        'link' => route('formulaire.pack', ['pack' => $pack->id]),
                        'image' => Storage::url($pack->image),
                        'title' => $pack->title,
                        'subtitle' => $pack->space . ': ' . number_format($pack->price, 0, ',', ' ') . ' USD',
                        'content' => $pack->symbole,
                        'brochure' => $pack->brochure ? Storage::url($pack->brochure) : null,
                    ])
                </div>
            @empty
                <p class="text-muted fst-italic">Aucun pack disponible pour le moment.</p>
            @endforelse
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')

@push('js')
    <script>
        function clickLink(link) {
            window.location.href = link;
        }
    </script>
@endpush
