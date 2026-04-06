@extends('back.main', ['title' => 'MCN CGP'])
@section('content')
    @include('pageContent.tournois', [
        'bannerTitle' => 'Le tournois',
        'bannerImage' => asset('assets/images/tournois/banner.png'),
    ])

    @push('pageModal')
        <span>Teste</span>
    @endpush
@endsection

@push('css')
    @stack('css2')
@endpush
