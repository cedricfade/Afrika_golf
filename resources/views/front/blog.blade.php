@extends('front.main', [
    'title' => 'Blog',
    'description' => "Découvrez les dernières actualités, analyses et tendances du monde du golf en Afrique sur notre blog dédié. Plongez dans des articles captivants, des interviews exclusives et des conseils d'experts pour enrichir votre passion pour ce sport fascinant.",

    'bannerColor' => '#0A140F',
])
<style>
    .banner {
        margin: 0;
        padding: 30px;
        padding-bottom: 50px;
        height: 19vh;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }

    @media screen and (max-width: 799px) {
        .banner {
            height: 15vh !important;
        }
    }
</style>

@section('content')
    <section class="blog" style="border-top: 1px solid #B07F49; border-bottom: 1px solid #B07F49;">
        <div class="container mb-5">
            <h2 style="color: white;font-weight: bold;font-size: 2.3rem;text-align: center">Nos rendez-vous</h2>
            <p class="text-grey ff-avenir" style="font-size: 1.4rem;text-align: center">Lorem ipsum dolor sit amet
                consectetur
                adipisicing elit. Libero
                sunt labore laudantium
                totam tempora,
                accusamus dolorum nisi dolores necessitatibus eos a molestias possimus assumenda reprehenderit, aspernatur,
                dolorem voluptatibus minima laboriosam.</p>
        </div>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div style="background-color: white; height: 200px; width: 100%;"></div>
                    <div>
                        <div class="col text-color ff-mash">Lorem ipsum</div>
                        <div class="col text-white ff-avenir">20 février 26</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div style="background-color: white; height: 200px; width: 100%;"></div>
                    <div>
                        <h4 style="color: white">Lorem ipsum</h4>
                        <div>20 février 26</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div style="background-color: white; height: 200px; width: 100%;"></div>
                    <div>
                        <h4 style="color: white">Lorem ipsum</h4>
                        <div>20 février 26</div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @include('front.partials.footer')
@endsection
