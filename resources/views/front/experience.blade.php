@extends('front.main', ['title' => 'Expérience'])
@section('content')
    @include('pageContent.experience', [
        'bannerColor' => $bannerColor ?? '#0A140F',
        'packs'       => $packs ?? collect(),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
