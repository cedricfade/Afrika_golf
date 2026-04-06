@extends('back.main', ['title' => 'Expérience'])
@section('content')
    @include('pageContent.experience', [
        'bannerColor' => '#0A140F',
    ])

    @push('pageModal')
        <span>Teste</span>
    @endpush
@endsection

@push('css')
    @stack('css2')
@endpush
