<style>
    @media (max-width: 767px) {
        .info-participation span {
            font-size: 16px !important;
        }
        .spanDetail  {
            font-size: 16px !important;
            color: white !important;
        }
    }
</style>

<div class="info-participation mb-3">
    <div
        style="
            background: #0f1c15; 
            min-height: 170px; 
            padding: 30px; 
            color: #fff; 
            border: 0.5px solid #707070;">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h3 class="text-white" style="font-size: 30px">
                    Participation
                </h3>
            </div>
            <div class="col-lg-5 d">
                <span
                    style="
                    color: #C6C6C6; 
                    text-decoration:none; 
                    font-family: 'AveniNext'; font-size: 22px;">@lang('Nationaux :')
                    <b class="text-white">1400$</b> </span>
            </div>
            <div class="col-lg-7">
                <span
                    style="
                        color: #C6C6C6; 
                        text-decoration:none; 
                        font-family: 'AveniNext'; font-size: 22px;">@lang('Non-nationaux :')
                    <b class="text-white">1750$</b> </span>
            </div>
        </div>
        <!--a href="{{ route('experience') }}" target="__blank"
            class="text-color ff-avenir mt-3 fs-lg lh">@lang('Découvrez nos offres de partenariat')</a-->
        <div>
            <h3>PACKAGE AFRICA ART GOLF CUP<h3>
            • <span class="spanDetail">Déplacement pendant l'événement</span> <br>
            • <span class="spanDetail">Participation au tournoi (caddie personnel, location de matériels)</span>  <br>
            • <span class="spanDetail">Dîner</span>  <br>
            • <span class="spanDetail">Brunch</span> <br>
            <br>
            <a href="{{ route('tournois') }}" style="text-decoration: none;color: #b07f49;"><span class="spanDetail">Plus de détails</span></a>
        </div>
    </div>
</div>
