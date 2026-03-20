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
    <section class="blog">

        <div class="container text">
            <span>Lorem ipsum dolor sit amet.</span>
            <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, molestiae?</h1>
        </div>
        <div class="container mb-5">
            <div class="back-header">

            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-technology-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-technology" type="button" role="tab"
                        aria-controls="v-pills-technology" aria-selected="true">Technology</button>
                    <button class="nav-link" id="v-pills-health-tab" data-bs-toggle="pill" data-bs-target="#v-pills-health"
                        type="button" role="tab" aria-controls="v-pills-health" aria-selected="false">Health and
                        Wellness</button>
                    <button class="nav-link" id="v-pills-travel-tab" data-bs-toggle="pill" data-bs-target="#v-pills-travel"
                        type="button" role="tab" aria-controls="v-pills-travel" aria-selected="false">Travel</button>
                    <button class="nav-link" id="v-pills-entrepreneurship-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-entrepreneurship" type="button" role="tab"
                        aria-controls="v-pills-entrepreneurship" aria-selected="false">Entrepreneurship</button>
                    <button class="nav-link" id="v-pills-personal-development-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-personal-development" type="button" role="tab"
                        aria-controls="v-pills-personal-development" aria-selected="false">Personal Development</button>
                    <button class="nav-link" id="v-pills-education-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-education" type="button" role="tab" aria-controls="v-pills-education"
                        aria-selected="false">Education</button>
                    <button class="nav-link" id="v-pills-finance-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-finance" type="button" role="tab" aria-controls="v-pills-finance"
                        aria-selected="false">Finance</button>
                    <button class="nav-link" id="v-pills-environment-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-environment" type="button" role="tab"
                        aria-controls="v-pills-environment" aria-selected="false">Environment</button>
                    <button class="nav-link" id="v-pills-lifestyle-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-lifestyle" type="button" role="tab" aria-controls="v-pills-lifestyle"
                        aria-selected="false">Lifestyle</button>
                  
                    <div class="follow">
                        <h4>Suivez-nous :</h4>
                        <div class="social">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                {{-- CONTENUE --}}

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-technology" role="tabpanel"
                        aria-labelledby="v-pills-technology-tab" tabindex="0">

                        <p>
                            Shares his journey of founding a successful startup, offering valuable insights and lessons
                            learned along the way. From initial concei scaling the business, this blog provides aspiring
                            entrepreneurs with practical advice and inspiration. Michael Lee shares his journey of founding
                            a successful startup, offering valuable insights and lessons learned along the way. From initial
                            concept to scaling the business

                            <br><br>

                            Shares his journey of founding a successful startup, offering valuable insights and lessons
                            learned along the way. From initial concei scaling the business, this blog provides aspiring
                            entrepreneurs with practical advice and inspiration. Michael Lee shares his journey of founding
                            a successful startup, offering valuable insights and lessons learned along the way. From initial
                            concept to scaling the business
                        </p>
                        <br>
                        <h3>Building a Successful Startup</h3>
                        <p>Shares his journey of founding a successful startup, offering valuable insights and lessons
                            learned along the way. From initial concei scaling the business, this blog provides aspiring
                            entrepreneurs with practical advice and inspiration</p>

                        <br>
                        <h3>Lessons from the Trenches</h3>
                        <p>
                            Sarah Johnson takes you off the beaten path to discover ten lesser-known travel destinations.
                            From secluded beaches to charmi mountain villages, find out why these hidden gems deserve a spot
                            on your travel bucket list Sarah Johnson takes you off the beaten path to discover ten
                            lesser-known travel destinations. From secluded beaches to charming mountain villages
                        </p>

                    </div>
                    <div class="tab-pane fade" id="v-pills-health" role="tabpanel" aria-labelledby="v-pills-health-tab"
                        tabindex="0">
                        <p>
                            Shares his journey of founding a successful startup, offering valuable insights and lessons
                            learned along the way. From initial concei scaling the business, this blog provides aspiring
                            entrepreneurs with practical advice and inspiration. Michael Lee shares his journey of founding
                            a successful startup, offering valuable insights and lessons learned along the way. From initial
                            concept to scaling the business

                            <br><br>

                            Shares his journey of founding a successful startup, offering valuable insights and lessons
                            learned along the way. From initial concei scaling the business, this blog provides aspiring
                            entrepreneurs with practical advice and inspiration. Michael Lee shares his journey of founding
                            a successful startup, offering valuable insights and lessons learned along the way. From initial
                            concept to scaling the business
                        </p>
                        <br>
                        <h3>Building a Successful Startup</h3>
                        <p>Shares his journey of founding a successful startup, offering valuable insights and lessons
                            learned along the way. From initial concei scaling the business, this blog provides aspiring
                            entrepreneurs with practical advice and inspiration</p>

                        <br>
                        <h3>Lessons from the Trenches</h3>
                        <p>
                            Sarah Johnson takes you off the beaten path to discover ten lesser-known travel destinations.
                            From secluded beaches to charmi mountain villages, find out why these hidden gems deserve a spot
                            on your travel bucket list Sarah Johnson takes you off the beaten path to discover ten
                            lesser-known travel destinations. From secluded beaches to charming mountain villages
                        </p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-travel" role="tabpanel" aria-labelledby="v-pills-travel-tab"
                        tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-entrepreneurship" role="tabpanel"
                        aria-labelledby="v-pills-entrepreneurship-tab" tabindex="0">.


                    </div>
                    <div class="tab-pane fade" id="v-pills-personal-development" role="tabpanel"
                        aria-labelledby="v-pills-personal-development-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-education" role="tabpanel"
                        aria-labelledby="v-pills-education-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-finance" role="tabpanel"
                        aria-labelledby="v-pills-finance-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-environment" role="tabpanel"
                        aria-labelledby="v-pills-environment-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-lifestyle" role="tabpanel"
                        aria-labelledby="v-pills-lifestyle-tab" tabindex="0">...</div>
                </div>
            </div>
        </div>

    </section>
@endsection
