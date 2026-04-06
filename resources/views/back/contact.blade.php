@extends('back.main', ['title' => 'Contactez-nous'])
@section('content')
    @include('pageContent.contact', [
        'bannerTitle' => 'Contactez-nous',
        'bannerImage' => asset('assets/images/contact/banner.png'),
    ])

    @push('pageModal')
        <span>Teste</span>
    @endpush
@endsection

@push('css')
    @stack('css2')
@endpush
