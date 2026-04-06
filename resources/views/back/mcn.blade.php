@extends('back.main', ['title' => 'MCN CGP'])
@section('content')
    @include('pageContent.mcn', [
        'bannerImage' => asset('assets_custom/mcn-cgp/bg.jpg'),
        'rightImage' => asset('assets_custom/mcn-cgp/logo-mcn-cgp.png'),
        'rightBottomImage' => asset('assets_custom/mcn-cgp/valoriser-votre-passion.png'),
    ])

    @push('pageModal')
        <span>Teste</span>
    @endpush
@endsection

@push('css')
    @stack('css2')
@endpush
