@include((Auth::user() ? 'back' : 'front') . '.partials.layouts', [
    'bannerTitle' => $bannerTitle ?? __('diners.banner_title'),
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
                <h2>{{ $introTitle ?? __('diners.intro_title') }}</h2>
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
        @foreach ($chefs ?? [] as $chef)
            <div class="row g-4">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="image"
                        style="background-image: url('{{ $chef->image ? Storage::url($chef->image) : "" }}'); background-position:center">
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-12">
                    @if ($chef->nameLogo)
                        <div class="logo">
                            <img src="{{ Storage::url($chef->nameLogo) }}" alt="Logo {{ $chef->name }}">
                        </div>
                    @endif
                    <div>{!! $chef->content !!}</div>
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
