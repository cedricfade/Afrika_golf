@extends('front.main', ['title' => 'Espace média'])
@section('content')
    @include('pageContent.medias', [
        'bannerColor' => '#0A140F',
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
