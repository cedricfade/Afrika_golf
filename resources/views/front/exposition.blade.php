@extends('front.main', ['title' => 'Exposition'])
@section('content')
    @include('pageContent.exposition', [
        'citation1' => 'QUAND L’ART RACONTE L’AFRIQUE',
        'citation2' => 'QUAND LE GOLF CRÉE LE LIEN.',
        'bannerColor' => '#FFFCF8',
        'subImage' => asset('assets/images/exposition/image.png'),
        'imageHeader' => asset('assets/images/exposition/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
