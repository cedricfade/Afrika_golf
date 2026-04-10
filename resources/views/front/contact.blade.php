@extends('front.main', ['title' => 'Contactez-nous'])
@section('content')
    @include('pageContent.contact', [
        'bannerTitle' => 'Contactez-nous',
        'bannerImage' => asset('assets/images/contact/banner.png'),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush
