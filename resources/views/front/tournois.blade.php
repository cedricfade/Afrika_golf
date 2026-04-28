@extends('front.main', ['title' => 'Tournoi'])

@section('content')
    @include('pageContent.tournois', [
        'bannerSentenceTitle' => __('tournois.rendezvous'),
        'bannerImage' => asset('assets/images/tournois/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
    @stack('jsSlide')
@endpush
