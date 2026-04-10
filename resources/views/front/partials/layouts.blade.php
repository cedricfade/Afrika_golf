<div class="banner"
    @if (isset($bannerImage)) style='background-image: linear-gradient(rgba(0, 0, 0, 0.564), rgba(0, 0, 0, 0.444)), 
     url({{ $bannerImage ?? asset('assets/images/home/banner.png') }});'
    @elseif(isset($bannerColor))
          style='background-color: {{ $bannerColor }}' @endif>

    @include('front.partials.navbar')

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

            @if (isset($citation1) && isset($citation2))
                <div class="citation">
                    <h3 style="font-family: 'Avenir Next'; font-weight: 400 !important;">
                        {{ $citation1 }}
                    </h3>
                    <h3 style="font-family: 'Avenir Next'; font-weight: 400 !important;">
                        {{ $citation2 }}
                    </h3>

                    <br><br><br>

                    <img src="{{ $subImage }}" alt="" class="sub-image">
                </div>
            @endif
        </div>
    @endif

    @if (!empty($bannerContent))
        <div class="d-none d-md-block">
            <div
                style="
                    width: 100%;
                    background-color: #bbb;
                    color: white;
                    text-align: center;
                    padding: 10px 0px;
                    font-family: 'AveniNext';
                    margin-top: 20px;">
                {{ $bannerContent }}
            </div>
        </div>
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
        <img src="{{ $bottomImage }}" class="d-none d-md-block"
            style="display: block; width: 25%; margin: auto; margin-top: 50px;" alt="AFRICA GOLF CUP">
        {{-- Tablette (576px – 767px) --}}
        <img src="{{ $bottomImage }}" class="d-none d-sm-block d-md-none"
            style="display: block; width: 55%; margin: auto; margin-top: 50px;" alt="AFRICA GOLF CUP">
        {{-- Mobile (< 576px) --}}
        <img src="{{ $bottomImage }}" class="d-block d-sm-none"
            style="display: block; width: 90%; margin: auto; margin-top: 75px;" alt="AFRICA GOLF CUP">
    @endif


</div>
