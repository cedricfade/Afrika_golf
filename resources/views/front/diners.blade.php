@extends('front.main', ['title' => 'Diner'])
@section('content')
    @include('pageContent.diners', [
        'bannerTitle'   => $bannerTitle ?? __('diners.banner_title'),
        'bannerImage'   => $bannerImage ?? asset('assets/images/diners/banner.png'),
        'introTitle'    => $introTitle ?? __('diners.intro_title'),
        'introText'     => $introText ?? '',
        'cities'        => $cities ?? [],
        'chefs'         => $chefs ?? collect(),
        'galleryImages' => $galleryImages ?? collect(),
    ])
@endsection

@push('css')
    @stack('css2')
    @stack('jsSlide')
@endpush
