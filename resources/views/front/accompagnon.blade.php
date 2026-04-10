@extends('front.main', ['title' => 'ACCOMPAGNEMENT'])
@section('content')
    @include('pageContent.accompagnon', [
        'bannerTitle' => 'MENER UNE VIE PLEINE ET RICHE AVEC L’AUTISME',
        'bannerImage' => asset('assets/images/accompagnon/banner.jpg'),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    @stack('js2')
    @stack('jsAccompagnon')
@endpush
