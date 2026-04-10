@extends('back.main', ['title' => 'Réservations'])
@section('content')
    @include('pageContent.reservation', [
        'bannerColor' => '#0A140F',
    ])

    @push('pageModal')
        <span>Teste</span>
    @endpush
@endsection

@push('css')
    @stack('css2')
@endpush
