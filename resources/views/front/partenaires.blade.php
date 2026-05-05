@extends('front.main', ['title' => 'Nos rendez-vous'])
@section('content')
    @include('pageContent.partenaires', [
        'bannerTitle'  => $bannerTitle ?? 'Partenaires',
        'bannerImage'  => $bannerImage ?? asset('assets/images/partenaire/banner.png'),
        'sectionTitle' => $sectionTitle ?? 'Partenaires distingués',
        'sectionIntro' => $sectionIntro ?? '',
        'partners'     => $partners ?? collect(),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
