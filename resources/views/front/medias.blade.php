@extends('front.main', [
    'title' => 'Espace média',

    'bannerColor' => '#0A140F',
])
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

@section('content')
<section class="medias">
    <div class="container-fluid">
        <h1>Espace média</h1>
    </div>
    <div class="container-fluid" style="padding:0 85px;text-align:left">
        <div class="row">
            <div class="col-xl-6 presse mb-5">
                <h2>Sortie de presse</h2>
                <div class="separateur"></div>
                <div class='card'>
                   <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" style="" class="doc">
                   <div class="text">
                         <h3>AAGC 2026 Official Launch Press Release</h3>
                     <p>20 février 2026</p>
                   </div>
                  <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
              

                </div>
                <div class='card'>
                   <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" style="" class="doc">
                   <div class="text">
                         <h3>AAGC 2026 Official Launch Press Release</h3>
                     <p>20 février 2026</p>
                   </div>
                  <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
              

                </div>
                <div class='card'>
                   <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" style="" class="doc">
                   <div class="text">
                         <h3>AAGC 2026 Official Launch Press Release</h3>
                     <p>20 février 2026</p>
                   </div>
                  <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
              

                </div>
                <div class='card'>
                   <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" style="" class="doc">
                   <div class="text">
                         <h3>AAGC 2026 Official Launch Press Release</h3>
                     <p>20 février 2026</p>
                   </div>
                  <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
              

                </div>
                <div class='card'>
                   <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" style="" class="doc">
                   <div class="text">
                         <h3>AAGC 2026 Official Launch Press Release</h3>
                     <p>20 février 2026</p>
                   </div>
                  <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
              

                </div>
                <div class='card'>
                   <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" style="" class="doc">
                   <div class="text">
                         <h3>AAGC 2026 Official Launch Press Release</h3>
                     <p>20 février 2026</p>
                   </div>
                  <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
              

                </div>
            </div>
            <div class="col-xl-6 kit-media mb-5">
                 <h2>Kit média</h2>
                <div class="separateur"></div>
                <div class='card'>
                    <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" class="doc">
                    <div class="text">
                        <h3>Official Brand Guidelines</h3>
                        <p>20 février 2026</p>
                    </div>
                    <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
                </div>
                <div class='card'>
                    <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" class="doc">
                    <div class="text">
                        <h3>Official Brand Guidelines</h3>
                        <p>20 février 2026</p>
                    </div>
                    <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
                </div>
                <div class='card'>
                    <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" class="doc">
                    <div class="text">
                        <h3>Official Brand Guidelines</h3>
                        <p>20 février 2026</p>
                    </div>
                    <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
                </div>
                <div class='card'>
                    <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" class="doc">
                    <div class="text">
                        <h3>Official Brand Guidelines</h3>
                        <p>20 février 2026</p>
                    </div>
                    <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
                </div>
                <div class='card'>
                    <img src="{{ asset('assets/images/medias/doc.svg') }}" alt="" class="doc">
                    <div class="text">
                        <h3>Official Brand Guidelines</h3>
                        <p>20 février 2026</p>
                    </div>
                    <a href="">
                        <img src="{{asset('assets/images/medias/arrow.svg')}}" alt="" class="download">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('front.partials.footer')
@endsection