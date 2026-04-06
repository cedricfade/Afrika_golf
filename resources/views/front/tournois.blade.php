@extends('front.main', ['title' => 'Tournois'])

@section('content')
    @include('pageContent.tournois', [
        'bannerTitle' => 'Le tournois',
        'bannerImage' => asset('assets/images/tournois/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
