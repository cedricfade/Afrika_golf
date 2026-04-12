@extends('front.main', ['title' => 'Tournoi'])

@section('content')
    @include('pageContent.tournois', [
        'bannerTitle' => 'Le tournoi',
        'bannerImage' => asset('assets/images/tournois/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
