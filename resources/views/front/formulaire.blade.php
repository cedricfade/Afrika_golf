@extends('front.main', ['title' => 'FORMULAIRE'])
@section('content')
    @include('pageContent.formulaire', [
        'bannerColor' => '#0A140F',
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
