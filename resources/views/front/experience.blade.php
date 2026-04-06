@extends('front.main', ['title' => 'Expérience'])
@section('content')
    @include('pageContent.experience', [
        'bannerColor' => '#0A140F',
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
