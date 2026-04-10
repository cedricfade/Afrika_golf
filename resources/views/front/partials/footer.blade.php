<footer class="footer">
    <div class="container">
        <div class="row align-items-start text-center text-md-start">

            <div class="col-12 col-md-6 col-xl-3 mb-4">
                <img src="{{ asset('assets/images/Image_logo_MCN.png') }}" alt="" class="img-fluid footer-logo">
            </div>

            <div class="col-6 col-md-3 col-xl-3 mb-4">
                <ul>
                    <span>@lang('EVENT')</span>
                    <li><a href="">Concept</a></li>
                    <li><a href="">Golf</a></li>
                    <li><a href="">Art</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 col-xl-3 mb-4">
                <ul>
                    <span>@lang('CONNEXION')</span>
                    <li><a href="{{ route('partenaires') }}">Partenaires</a></li>
                    <li><a href="{{ route('medias') }}">Espace média</a></li>
                    <li><a href="{{ route('contact') }}">Contacts</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-6 col-xl-3">
                <ul>
                    <span>@lang('légale')</span>
                    <li><a href="">Politique de confidentialité</a></li>
                    <li><a href="">Conditions d’utilisation</a></li>
                    <li class="signature">© 2026 MCN. tous droits réservés</li>
                </ul>
            </div>

        </div>
    </div>
</footer>
