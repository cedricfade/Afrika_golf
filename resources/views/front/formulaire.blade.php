@extends('front.main', ['title' => 'FORMULAIRE'])
@section('content')
    @include('pageContent.formulaire', [
        'bannerColor' => $bannerColor ?? '#0A140F',
        'pack'        => $pack ?? null,
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
