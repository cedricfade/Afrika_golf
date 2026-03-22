    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/logo/logo.png') }}" alt="AFRICA GOLF" class="logo">
            </a>
            
            <!-- Menu principal - visible sur desktop -->
            <ul class="navbar-nav nav-primary d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mcn-cgp') }}">@lang('MCN CGP')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tournois') }}">@lang('LE TOURNOIS')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('diners') }}">@lang('DINERS')</a>
                </li>
            </ul>

            <!-- Menu hamburger -->
            <div class="nav-menu-toggle">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="menu-wrapper">
                            <div class="menu-top">
                                <span class="lang">FR</span>
                                <div class="trait"></div>
                                <i class="fa-solid fa-bars"></i>
                            </div>
                            <span class="menu-text">MENU</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('home') }}">@lang('accueil')</a></li>
                        <li><a class="dropdown-item" href="{{ route('africa-art') }}">@lang('AFRICA ART OF GOLF CUP')</a></li>
                        <li class="d-block d-sm-block d-lg-none d-xl-none d-md-none d-xxl-none"><a class="dropdown-item " href="{{ route('mcn-cgp') }}">MCN CGP</a></li>
                        <li class="d-block d-sm-block d-lg-none d-xl-none d-md-none d-xxl-none"><a class="dropdown-item" href="{{ route('tournois') }}">LE TOURNOIS</a></li>
                        <li class="d-block d-sm-block d-lg-none d-xl-none d-md-none d-xxl-none"><a class="dropdown-item" href="{{ route('diners') }}">DINERS</a></li>
                        <li><a class="dropdown-item" href="{{ route('patrimoine') }}">@lang('PATRIMOINE CULTUREL')</a></li>
                        <li><a class="dropdown-item" href="{{ route('blog') }}">@lang('BLOG')</a></li>
                        <li><a class="dropdown-item" href="{{ route('exposition') }}">@lang('EXPOSITION')</a></li>
                        <li><a class="dropdown-item" href="{{ route('experience') }}">@lang('PACKS')</a></li>

                        <li><a class="dropdown-item" href="{{ route('accompagnon') }}">@lang('ACCOMPAGNON')</a></li>
                        <li><a class="dropdown-item" href="{{ route('formulaire') }}">@lang('FORMULAIRE')</a></li>
                        <li><a class="dropdown-item" href="{{ route('reservations') }}">@lang('RESERVATIONS')</a></li>
                        <li><a class="dropdown-item" href="{{ route('destination') }}">@lang('DESTINATION KIGALI')</a></li>
                        <li><a class="dropdown-item" href="{{ route('partenaires') }}">@lang('PARTENAIRES')</a></li>
                        <li><a class="dropdown-item" href="{{ route('rendez-vous') }}">@lang('LES RENDEZ-VOUS AAGC')</a></li>
                        <li><a class="dropdown-item" href="{{ route('medias') }}">@lang('espace média')</a></li>
                        <li><a class="dropdown-item" href="{{route('contact')}}">@lang('contact')</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>