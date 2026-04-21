@extends('front.main', ['title' => 'Tournoi'])

@section('content')
    @include('pageContent.tournois', [
        'bannerSentenceTitle' => __("Un rendez-vous d'exception où la gastronomie fine, l'art, le luxe à l'africaine et le golf fusionnent ."),
        'bannerImage' => asset('assets/images/tournois/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
    @stack('jsSlide')
@endpush
