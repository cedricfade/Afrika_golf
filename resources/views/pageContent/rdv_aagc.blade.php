@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerColor' => $bannerColor ?? '#0A140F',
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

<section class="rdv">
    <div class="container text-center infos">
        <h1>{{ $sectionTitle ?? 'Nos rendez-vous' }}</h1>
        <p>{!! $sectionText ?? '' !!}</p>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">

            @forelse ($posts ?? [] as $post)
                @include('pageContent.partials.card-item', [
                    'image' => $post->image ? Storage::url($post->image) : null,
                    'title' => $post->title,
                    'description' => $post->content,
                    'date' => $post->formatted_date,
                ])
            @empty
                <p class="text-muted fst-italic text-center w-100">Aucun rendez-vous publié pour l'instant.</p>
            @endforelse

        </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
