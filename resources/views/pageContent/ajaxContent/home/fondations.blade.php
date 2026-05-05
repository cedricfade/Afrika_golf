@php
    $c    = $cfg ?? [];
    $isEn = app()->getLocale() === 'en';
    $f1   = $isEn ? ($c['fondation_img1_en'] ?? ($c['fondation_img1'] ?? asset('assets/images/home/img-2.jpeg'))) : ($c['fondation_img1'] ?? asset('assets/images/home/img-2.jpeg'));
    $f2   = $isEn ? ($c['fondation_img2_en'] ?? ($c['fondation_img2'] ?? asset('assets/images/home/img-3.jpeg'))) : ($c['fondation_img2'] ?? asset('assets/images/home/img-3.jpeg'));
    $f3   = $isEn ? ($c['fondation_img3_en'] ?? ($c['fondation_img3'] ?? asset('assets/images/home/img-1.jpeg'))) : ($c['fondation_img3'] ?? asset('assets/images/home/img-1.jpeg'));
@endphp
<div class="container text-center" style="margin-top:40px; margin-bottom:40px">
    <div class="row">
        <div class="col-xl-4">
            <a href="{{ route('exposition') }}">
                <img data-home="fondation_img1" src="{{ $f1 }}" alt="" class="col-xl-12 col-12 mb-4">
            </a>
        </div>
        <div class="col-xl-4">
            <a href="{{ route('tournois') }}">
                <img data-home="fondation_img2" src="{{ $f2 }}" alt="" class="col-xl-12 col-12 mb-4">
            </a>
        </div>
        <div class="col-xl-4">
            <a href="{{ route('diners') }}">
                <img data-home="fondation_img3" src="{{ $f3 }}" alt="" class="col-xl-12 col-12 mb-4">
            </a>
        </div>
    </div>
</div>
