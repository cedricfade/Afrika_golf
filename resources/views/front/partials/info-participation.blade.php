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
                    {{ __('partials.participation_heading') }}
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
            <h3>{{ __('partials.package_title') }}<h3>
            • <span class="spanDetail">{{ __('partials.package_item1') }}</span> <br>
            • <span class="spanDetail">{{ __('partials.package_item2') }}</span>  <br>
            • <span class="spanDetail">{{ __('partials.package_item3') }}</span>  <br>
            • <span class="spanDetail">{{ __('partials.package_item4') }}</span> <br>
            <br>
            <a href="{{ route('tournois') }}" style="text-decoration: none;color: #b07f49;"><span class="spanDetail">{{ __('partials.package_details') }}</span></a>
        </div>
    </div>
</div>
