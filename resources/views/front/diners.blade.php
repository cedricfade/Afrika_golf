@extends('front.main', ['title' => 'Diner'])
@section('content')
    @include('pageContent.diners', [
        'bannerTitle' => 'Le diner',
        'bannerImage' => asset('assets/images/diners/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
    @stack('jsSlide')
@endpush
