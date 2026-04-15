    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets_custom/home/svg/logo.svg') }}" alt="AFRICA GOLF" class="logo">
            </a>

            <!-- Menu principal - visible sur desktop -->
            <ul class="navbar-nav nav-primary d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#sectionAbout">
                        @lang('LE CONCEPT')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mcn-cgp') }}">
                        @lang('MCN-CGP')
                    </a>
                </li>
                <li class="nav-item" style="border: 1px solid white; padding: 0px 5px">
                    <a class="nav-link" href="{{ route('reservations') }}">
                        @lang('RESERVER')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: yellow" href="{{ route('accompagnon') }}">
                        @lang('ACCOMPAGNONS LES AUTISTES ADULTES')
                    </a>
                </li>
            </ul>

            <!-- Menu hamburger -->
            <div class="nav-menu-toggle">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="menu-wrapper">
                            <div class="menu-top">
                                <span class="lang">FR</span>
                                <div class="trait"></div>
                                <div>
                                    <i class="fa-solid fa-bars"></i>
                                    <div class="menu-text" style="padding-top: 5px">&nbsp;&nbsp;MENU</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('home') }}">
                                @lang('accueil')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('mcn-cgp') }}">
                                @lang('MCN')
                            </a>
                        </li>
                        <li class="d-block d-sm-block d-lg-none d-xl-none d-md-none d-xxl-none">
                            <a class="dropdown-item" href="{{ route('tournois') }}">
                                @lang('LE TOURNOI')
                            </a>
                        </li>
                        <li class="d-block d-sm-block d-lg-none d-xl-none d-md-none d-xxl-none">
                            <a class="dropdown-item" href="{{ route('diners') }}">
                                @lang('LE DÎNER')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('exposition') }}">
                                @lang('EXPOSITION')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('rendez-vous') }}">
                                @lang('LES RENDEZ-VOUS AAGC')
                            </a>
                        </li>
                        <li class="d-block d-sm-block d-lg-none d-xl-none d-md-none d-xxl-none">
                            <a class="dropdown-item" href="{{ route('accompagnon') }}">
                                @lang('ACCOMPAGNON')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('reservations') }}">
                                @lang('RESERVATIONS')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('experience') }}">
                                @lang('PACKS SPONSOR')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('destination') }}">
                                @lang('DESTINATION KIGALI')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('partenaires') }}">
                                @lang('PARTENAIRES')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('medias') }}">
                                @lang('ESPACE MEDIA')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('contact') }}">
                                @lang('CONTACT')
                            </a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>
