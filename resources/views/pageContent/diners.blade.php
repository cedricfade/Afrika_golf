@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerTitle' => __('diners.banner_title'),
    'bannerImage' => $bannerImage ?? asset('assets/images/diners/banner.png'),
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.049), rgba(0, 0, 0, 0.049)), url('{{ $bannerImage ?? asset("assets/images/diners/banner.png") }}');
        }
    </style>
@endpush

<section class="about-diners">
    <div class="container about-diners-container">
        <div class="row">
            <div class="col-xl-10 col-lg-11 col-md-12">
                <h2>{{ __('diners.intro_title') }}</h2>
                <div>{!! $introText ?? '' !!}</div>
                @if (!empty($cities))
                    <ul>
                        @foreach ($cities as $city)
                            <li>{{ $city['name'] }} : {{ $city['date'] }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="cuisiniers">
    <div class="container">
        @php 
        
            $database = [
                'fr' => [
                    'DIEUVEIL MALONGA' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Helvetica Neue&quot;;\"><span style=\"font-size: 18px;\">L'expérience culinaire afro-fusion se déplace de Musanze à Kigali avec le talentueux Chef Dieuveil Malonga. Véritable laboratoire culinaire, la cuisine de Malonga met en valeur les produits locaux et les épices du continent africain. Ce Champion du changement vous fera découvrir l'inattendu.</span></p>",
                    'CHEF TAMSIR NDIR' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Helvetica Neue&quot;;\"><span style=\"font-size: 18px;\">L'expérience culinaire afro-fusion se déplace de Musanze à Kigali avec le talentueux Chef Dieuveil Malonga. Véritable laboratoire culinaire, la cuisine de Malonga met en valeur les produits locaux et les épices du continent africain. Ce Champion du changement vous fera découvrir l'inattendu.</span></p>",
                ],
                'en' => [
                    'DIEUVEIL MALONGA' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Helvetica Neue&quot;;\"><span style=\"font-size: 18px;\">The afro-fusion culinary experience moves from Musanze to Kigali with the talented Chef Dieuveil Malonga. A true culinary laboratory, Malonga's cuisine showcases local produce and spices from the African continent. This Champion of Change will make you discover the unexpected.</span></p>",
                    'CHEF TAMSIR NDIR' => "<p class=\"p1\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 13px; line-height: normal; font-family: &quot;Helvetica Neue&quot;;\"><span style=\"font-size: 18px;\">Chef cook - DJ, Chef Tamsir NDir has the art of mixing melodies and flavors from African horizons. Sharing a moment with Chef Tamsir is a true culinary and musical journey. Every dish he creates is an exception.</span></p>",
                ],
            ];
        
        @endphp
        @foreach ($chefs ?? [] as $chef)
            <div class="row g-4">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="image"
                        style="background-image: url('{{ $chef->image ? Storage::url($chef->image) : "" }}'); background-position:top">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-12">
                    @if ($chef->nameLogo)
                        <div class="logo">
                            <img src="{{ Storage::url($chef->nameLogo) }}" alt="Logo {{ $chef->name }}">
                        </div>
                    @endif
                    <div>{!! utf8_encode($database[app()->getLocale()][$chef->name]) !!}</div>
                </div>
            </div>
            @if (!$loop->last)
                <div class="separateur" style="background:#b07f49; height: 1px; margin: 40px auto; width: 80%;"></div>
            @endif
        @endforeach

        <div class="souscrire">
            <a href="{{ asset('assets/images/program-aagc.pdf') }}" class="btn">@lang('CONSULTER LE PROGRAMME')</a>
            <a href="{{ route('reservations') }}" class="btn">@lang('RESERVER')</a>
        </div>
    </div>
</section>

@include('pageContent.galerie')

@include((Auth::user() ? 'back' : 'front') . '.partials.footer')
