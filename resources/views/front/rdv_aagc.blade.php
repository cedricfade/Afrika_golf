@extends('front.main', ['title' => 'Nos rendez-vous'])
@section('content')
    @include('pageContent.rdv_aagc', [
        'bannerColor' => '#0A140F',
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
