<div class="banner"
    @if (isset($bannerImage)) style='background-image: linear-gradient(rgba(0, 0, 0, 0.564), rgba(0, 0, 0, 0.444)), 
     url({{ $bannerImage ?? asset('assets/images/home/banner.png') }});'
    @elseif(isset($bannerColor))
          style='background-color: {{ $bannerColor }}' @endif>

    @include('back.partials.navbar')

    @if (!empty($bannerTitle))
        <div class="container banner-titre">
            @if (!empty($sousTitle))
                <h4 style="color: #B07F49; font-family: 'AveniNext'; text-transform: uppercase; margin-bottom: 20px;">
                    {{ $sousTitle }}</h4>
                <br>
            @endif
            <div class="titre">
                <h1>{{ $bannerTitle }}</h1>

                @if (!empty($bannerButton))
                    <a href="{{ $bannerButton['link'] }}">
                        {{ $bannerButton['text'] }}
                    </a>
                @endif

                @if (!empty($bannerDescription))
                    <p style="color: #fff; font-family: 'MyArial'; margin-top: 20px; font-size: 1.2em;">
                        {{ $bannerDescription }}
                    </p>
                @endif
            </div>
        </div>
    @endif

    @if (!empty($imageHeader))
        <div class="container banner-titre">
            <img src="{{ $imageHeader }}" alt="" class="col-xl-5 col-7 image-header">

            @if (!empty($citation1))
                <div class="citation">
                    {!! $citation1 !!}
                    <br><br><br>
                    <img src="{{ $subImage }}" alt="" class="sub-image">
                </div>
            @endif
        </div>
    @endif

    @if (!empty($bannerContent))
        <div class="d-none d-md-block"
            style="width:100%; overflow:hidden; background-color:#bbb; padding:5px 0; margin-top:20px;">
            <div class="banner-ticker">
                <span>{{ $bannerContent }} <a href="{{ route('accompagnon') }}#formPage">CLIQUEZ
                        ICI</a></span>
                <span aria-hidden="true">{{ $bannerContent }}</span>
            </div>
        </div>
        <style>
            .banner-ticker {
                display: flex;
                white-space: nowrap;
                animation: bannerScroll 10s linear infinite;
                color: white;
                font-family: 'AveniNext';
                text-align: center;
            }

            .banner-ticker span {
                flex-shrink: 0;
                min-width: 100%;
                padding: 0 2rem;
            }

            @keyframes bannerScroll {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }
        </style>
    @endif

    @if (!empty($middleImage))
        {{-- Desktop (≥ 768px) --}}
        <img src="{{ $middleImage }}" class="d-none d-md-block"
            style="display: block; width: 20%;margin: auto;margin-top: 50px;" alt="AFRICA GOLF CUP">
        {{-- Tablette (576px – 767px) --}}
        <img src="{{ $middleImage }}" class="d-md-none d-block"
            style="display: block; width: 65%;margin: auto;margin-top: 70px;" alt="AFRICA GOLF CUP">
    @endif

    @if (!empty($rightImage))
        <div style="float: right;width: 30%;margin-right: 10%;">
            <img src="{{ $rightImage }}" class="w-100" alt="AFRICA GOLF CUP">
            @if (!empty($rightBottomImage))
                <img src="{{ $rightBottomImage }}" class="w-100" alt="AFRICA GOLF CUP">
            @endif
        </div>
    @endif

    @if (!empty($bottomImage))
        {{-- Desktop (≥ 768px) --}}
        <a href="{{ route('tournois') }}">
            <img src="{{ $bottomImage }}" class="d-none d-md-block"
                style="display: block; width: 25%; margin: auto; margin-top: 50px;" alt="AFRICA GOLF CUP">
        </a>
        {{-- Tablette (576px – 767px) --}}
        <a href="{{ route('tournois') }}">
            <img src="{{ $bottomImage }}" class="d-none d-sm-block d-md-none"
                style="display: block; width: 55%; margin: auto; margin-top: 50px;" alt="AFRICA GOLF CUP">
        </a>
        {{-- Mobile (< 576px) --}}
        <a href="{{ route('tournois') }}">
            <img src="{{ $bottomImage }}" class="d-block d-sm-none"
                style="display: block; width: 90%; margin: auto; margin-top: 75px;" alt="AFRICA GOLF CUP">
        </a>
    @endif
</div>
