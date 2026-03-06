<div class="banner" 
    @if (isset($bannerImage))
          style='background-image: linear-gradient(rgba(0, 0, 0, 0.564), rgba(0, 0, 0, 0.444)), 
     url({{ $bannerImage ?? asset('assets/images/home/banner.png') }});'
    @elseif(isset($bannerColor))
          style='background-color: {{ $bannerColor }}'
    @endif
   >

    @include('front.partials.navbar')

    @if(!empty($bannerTitle))
        <div class="container banner-titre">
            @if(!empty($sousTitle))
                <h4 style="color: #B07F49; font-family: 'AveniNext'; text-transform: uppercase; margin-bottom: 20px;">{{ $sousTitle }}</h4>
            <br>
                @endif
            <div class="titre">
                <h1>{{ $bannerTitle }}</h1>

                @if(!empty($bannerButton))
                    <a href="{{ $bannerButton['link'] }}">
                        {{ $bannerButton['text'] }}
                    </a>
                @endif
           
                @if(!empty($bannerDescription))
                    <p style="color: #fff; font-family: 'MyArial'; margin-top: 20px; font-size: 1.2em;">
                        {{ $bannerDescription }}
                    </p>
                    @endif
            </div>
        </div>
    @endif

    @if (!empty($imageHeader))
             <div class="container banner-titre">
                <img src="{{ $imageHeader }}" alt="" class="col-xl-5 col-7" >
        </div>
    @endif

    
</div>
