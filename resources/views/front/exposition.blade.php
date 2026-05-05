@extends('front.main', ['title' => 'Exposition'])
@section('content')
    @include('pageContent.exposition', [
        'citation1'      => $citation1 ?? '<h3>QUAND L\'ART RACONTE L\'AFRIQUE</h3><h3>QUAND LE GOLF CRÉE LE LIEN.</h3>',
        'bannerColor'    => $bannerColor ?? '#FFFCF8',
        'subImage'       => $subImage ?? asset('assets/images/exposition/image.png'),
        'imageHeader'    => $imageHeader ?? asset('assets/images/exposition/banner.png'),
        'expoText'       => $expoText ?? '',
        'dateVernissage' => $dateVernissage ?? '',
        'dateCatalogue'  => $dateCatalogue ?? '',
        'galleryImages'  => $galleryImages ?? collect(),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    @stack('jsSlide')
@endpush
