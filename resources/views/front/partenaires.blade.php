@extends('front.main', ['title' => 'Nos rendez-vous'])
@section('content')
    @include('pageContent.partenaires', [
        'bannerTitle' => $bannerTitle ?? 'Partenaires',
        'bannerImage' => $bannerImage ?? asset('assets/images/partenaire/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
