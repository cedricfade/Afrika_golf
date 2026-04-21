@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerTitle' => $bannerTitle ?? __('partenaires.banner_title'),
    'bannerImage' => $bannerImage ?? asset('assets/images/partenaire/banner.png'),
])

@push('css2')
    <style>
        .banner {
            margin: 0;
            padding: 30px;
            padding-bottom: 50px;
            height: 100vh;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url({{ asset('assets/images/partenaire/banner.png') }});
        }
    </style>
@endpush

<section class="partenaires">
    <div class="container">
        <h2>{{ $sectionTitle ?? __('partenaires.section_title') }}</h2>
        {!! $sectionIntro ?? '<p>' . e(__('partenaires.section_intro')) . '</p>' !!}
        <div class="clients">
            <div class="row">
                @foreach ($partners ?? [] as $partner)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="card p-0">
                            <img src="{{ Storage::url($partner->image) }}" alt="{{ $partner->libelle }}"
                                style="width:100%; object-fit:contain;">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
