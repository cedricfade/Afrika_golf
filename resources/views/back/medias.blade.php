@extends('back.main', ['title' => 'Espace média'])
@section('content')
    @include('pageContent.medias', [
        'bannerColor' => '#0A140F',
    ])

    @push('pageModal')
        <span>Teste</span>
    @endpush
@endsection

@push('css')
    @stack('css2')
@endpush
