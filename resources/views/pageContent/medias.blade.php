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


<section class="medias">
    <div class="container-fluid">
        <h1>@lang('Espace média')</h1>
    </div>
    <div class="container-fluid" style="padding:0 85px;text-align:left">
        <div class="row">
            <div class="col-xl-6 presse mb-5">
                <h2>@lang('Sortie de presse')</h2>
                <div class="separateur"></div>
                @forelse ($pressReleases ?? [] as $pressRelease)
                    <div class='card'>
                        <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" style=""
                            class="doc">
                        <div class="text">
                            <p class="ff-mash fs-lg text-white">{{ $pressRelease->title }}</p>
                            <p>{{ $pressRelease->formatted_date }}</p>
                        </div>
                        @php
                            if ($pressRelease->form == 'lien') {
                                $href = filter_var($pressRelease->file, FILTER_VALIDATE_URL)
                                    ? $pressRelease->file  // URL externe → on l'utilise directement
                                    : str_replace('/storage/', '', $pressRelease->file); // chemin local
                            } else {
                                $href = Storage::url($pressRelease->file); // fichier uploadé
                            }
                        @endphp
                        
                        <a href="{{ $href }}" target="_blank">
                            <img src="{{ asset('assets/images/medias/arrow.svg') }}" alt="" class="download">
                        </a>
                    </div>
                @empty
                    <p class="text-muted fst-italic mb-3">@lang('Aucune sortie de presse pour l\'instant.')</p>
                @endforelse
            </div>
            <div class="col-xl-6 kit-media mb-5">
                <h2>@lang('Kit média')</h2>
                <div class="separateur"></div>
                @forelse ($mediaKits ?? [] as $mediaKit)
                    <div class='card'>
                        <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" class="doc">
                        <div class="text">
                            <p class="ff-mash fs-lg text-white">{{ $mediaKit->title }}</p>
                            <p>{{ $mediaKit->formatted_date }}</p>
                        </div>
                        @php
                            if ($mediaKit->form == 'lien') {
                                $href = filter_var($mediaKit->file, FILTER_VALIDATE_URL)
                                    ? $mediaKit->file  // URL externe → on l'utilise directement
                                    : str_replace('/storage/', '', $mediaKit->file); // chemin local
                            } else {
                                $href = Storage::url($mediaKit->file); // fichier uploadé
                            }
                        @endphp
                        
                        <a href="{{ $href }}" target="_blank">
                            <img src="{{ asset('assets/images/medias/arrow.svg') }}" alt="" class="download">
                        </a>
                    </div>
                @empty
                    <p class="text-muted fst-italic mb-3">@lang('Aucun kit média pour l\'instant.')</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
