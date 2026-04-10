@extends('front.main', ['title' => 'Destination KIGALI'])
@section('content')
    @include('pageContent.destination', [
        'bannerImage' => asset('assets/images/destination/banner.png'),
        'bannerTitle' => 'Kigali, Rwanda',
        'bannerDescription' =>
            'Ville de collines, d’innovation et d’élégance immaculée, Kigali offre un cadre idéal pour l’Africa Art Golf Cup, alliant infrastructures de classe mondiale et beauté naturelle à couper le souffle.',
        'sousTitle' => 'ÉDITION 2026',
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    @stack('jsSlide')
@endpush
