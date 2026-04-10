@extends('front.main', ['title' => 'Réservations'])
@section('content')
    @include('pageContent.reservation', [
        'bannerColor' => '#0A140F',
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
