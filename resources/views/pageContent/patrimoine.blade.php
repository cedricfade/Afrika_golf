@extends('front.main', [
    'bannerTitle' => $bannerTitle ?? __('patrimoine.banner_title'),
    'bannerImage' => $bannerImage ?? asset('assets/images/patrimoine/banner.png'),
])
<style>
    .banner {
        margin: 0;
        padding: 30px;
        padding-bottom: 50px;
        height: 100vh;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
</style>

@section('content')
    <section class="patrimoine">
        <div class="container">
            <h2>{{ __('patrimoine.title') }}</h2>
            <p>{!! nl2br(e(__('patrimoine.intro'))) !!}</p>
        </div>
    </section>

    @include((Auth::user() ? 'back' : 'front') . '.galerie')
@endsection
