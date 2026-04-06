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
        <h1>Espace média</h1>
    </div>
    <div class="container-fluid" style="padding:0 85px;text-align:left">
        <div class="row">
            <div class="col-xl-6 presse mb-5">
                <h2>Sortie de presse</h2>
                <div class="separateur"></div>
                @php

                    $pressReleases = [
                        (object) [
                            'title' => 'AAGC 2026 Official Launch Press Release',
                            'date' => '20 février 2026',
                            'file_url' => '#',
                        ],
                        (object) [
                            'title' => 'AAGC 2026 Official Launch Press Release',
                            'date' => '20 février 2026',
                            'file_url' => '#',
                        ],
                        (object) [
                            'title' => 'AAGC 2026 Official Launch Press Release',
                            'date' => '20 février 2026',
                            'file_url' => '#',
                        ],
                    ];
                @endphp
                @foreach ($pressReleases as $pressRelease)
                    <div class='card'>
                        <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" style=""
                            class="doc">
                        <div class="text">
                            <p class="ff-mash fs-lg text-white">{{ $pressRelease->title }}</p>
                            <p>{{ $pressRelease->date }}</p>
                        </div>
                        <a href="{{ $pressRelease->file_url }}">
                            <img src="{{ asset('assets/images/medias/arrow.svg') }}" alt="" class="download">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-xl-6 kit-media mb-5">
                <h2>Kit média</h2>
                <div class="separateur"></div>
                @php
                    $mediaKits = [
                        (object) [
                            'title' => 'Official Brand Guidelines',
                            'date' => '20 février 2026',
                            'file_url' => '#',
                        ],
                        (object) [
                            'title' => 'Official Brand Guidelines',
                            'date' => '20 février 2026',
                            'file_url' => '#',
                        ],
                        (object) [
                            'title' => 'Official Brand Guidelines',
                            'date' => '20 février 2026',
                            'file_url' => '#',
                        ],
                        (object) [
                            'title' => 'Official Brand Guidelines',
                            'date' => '20 février 2026',
                            'file_url' => '#',
                        ],
                        (object) [
                            'title' => 'Official Brand Guidelines',
                            'date' => '20 février 2026',
                            'file_url' => '#',
                        ],
                    ];
                @endphp
                @foreach ($mediaKits as $mediaKit)
                    <div class='card'>
                        <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" class="doc">
                        <div class="text">
                            <p class="ff-mash fs-lg text-white">{{ $mediaKit->title }}</p>
                            <p>{{ $mediaKit->date }}</p>
                        </div>
                        <a href="{{ $mediaKit->file_url }}">
                            <img src="{{ asset('assets/images/medias/arrow.svg') }}" alt="" class="download">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
