<footer class="footer">
    <div class="container">
        <div class="row align-items-start text-center text-md-start">
            
            <div class="col-12 col-md-6 col-xl-3 mb-4">
                <img src="{{ asset('assets/images/Image_logo_MCN.png') }}" alt="" class="img-fluid footer-logo">
            </div>

            <div class="col-6 col-md-3 col-xl-3 mb-4">
                <ul>
                    <span>@lang('EVENT')</span>
                    <li><a href="">{{ __('partials.footer_concept') }}</a></li>
                    <li><a href="">{{ __('partials.footer_golf') }}</a></li>
                    <li><a href="">{{ __('partials.footer_art') }}</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 col-xl-3 mb-4">
                <ul>
                    <span>@lang('CONNEXION')</span>
                    <li><a href="">{{ __('partials.footer_partenaires') }}</a></li>
                    <li><a href="">{{ __('partials.footer_media') }}</a></li>
                    <li><a href="">{{ __('partials.footer_contacts') }}</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <ul>
                    <span>@lang('légale')</span>
                    <li><a href="">{{ __('partials.footer_privacy') }}</a></li>
                    <li><a href="">{{ __('partials.footer_terms') }}</a></li>
                    <li class="signature">{{ __('partials.footer_copyright') }}</li>
                </ul>
            </div>

        </div>
    </div>
</footer>
