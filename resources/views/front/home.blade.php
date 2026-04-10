@extends('front.main', ['title' => 'Accueil'])

@section('content')
    @include('pageContent.home', [
        'description' =>
            'Découvrez l\'Africa Art Golf Cup, un événement unique qui allie l\'art et le golf pour soutenir les autistes adultes. Rejoignez-nous pour une expérience inoubliable de sport, culture et solidarité.',
        'keywords' => 'Africa Art Golf Cup, golf, art, autisme, événement caritatif, soutien aux autistes adultes',
        'image' => asset('assets/images/home/banner.png'),
        'bannerImage' => asset('assets/images/home/banner.png'),
        'middleImage' => asset('assets_custom/home/svg/aagc-kigali.svg'),
        'bottomImage' => asset('assets_custom/home/png/aagc-golfeur.png'),
        'bannerContent' => __('ACHETER UNE BALLE DE GOLF POUR ACCOMPAGNER LES AUTISTES ADULTES'),
    ])
@endsection

@push('css')
    @stack('css2')
@endpush

@push('js')
    @stack('js2')
@endpush
