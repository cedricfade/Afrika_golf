@extends('front.main', ['title' => 'Dinners'])
@section('content')
    @include('pageContent.diners', [
        'bannerTitle' => 'Le diners',
        'bannerImage' => asset('assets/images/diners/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
