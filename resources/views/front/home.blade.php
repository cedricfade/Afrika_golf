@extends('front.main', ['title' => 'Accueil'])

@section('content')
    @include(‘pageContent.home’, [
        ‘bannerImage’   => $bannerImage,
        ‘middleImage’   => $middleImage,
        ‘bottomImage’   => $bottomImage,
        ‘bannerContent’ => $bannerContent,
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    @stack('js2')
@endpush
