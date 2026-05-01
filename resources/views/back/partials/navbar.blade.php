    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('back.home') }}">
                <img src="{{ asset('assets/images/logo-aagc-by-mcn.svg') }}" alt="AFRICA GOLF" class="logo">
            </a>

            <!-- Menu principal - visible sur desktop -->
            <ul class="navbar-nav nav-primary d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('back.home') }}#sectionAbout">
                        @lang('LE CONCEPT')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('back.mcn-cgp') }}">
                        @lang('MCN-CGP')
                    </a>
                </li>
                <li class="nav-item" style="border: 1px solid white; padding: 0px 5px">
                    <a class="nav-link" href="{{ route('back.reservations') }}">
                        @lang('RESERVER')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: yellow" href="{{ route('back.accompagnon') }}">
                        @lang('ACCOMPAGNONS LES AUTISTES ADULTES')
                    </a>
                </li>
            </ul>

            <!-- Menu hamburger -->
            <ul class="navbar-nav ms-auto">
                <div class="lang-switcher">
                    <a href="{{ route('locale.switch', 'fr') }}"
                        class="lang {{ app()->getLocale() === 'fr' ? 'lang-active' : '' }} fs">
                        FR
                    </a>
                    <span class="lang-sep text-white fs-lg">|</span>
                    <a href="{{ route('locale.switch', 'en') }}"
                        class="lang {{ app()->getLocale() === 'en' ? 'lang-active' : '' }} fs">
                        EN
                    </a>
                </div>
            </ul>
            <div class="nav-menu-toggle">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle-custom" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="menu-wrapper">
                            <div class="menu-top">
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
                            <a class="dropdown-item" href="{{ route('back.home') }}">
                                @lang('accueil')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.mcn-cgp') }}">
                                {{-- @lang('MCN') --}}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.tournois') }}">
                                @lang('LE TOURNOI')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.diners') }}">
                                @lang('LE DÎNER')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.exposition') }}">
                                {{-- @lang('EXPOSITION') --}}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.rendez-vous') }}">
                                @lang('LES RENDEZ-VOUS AAGC')
                            </a>
                        </li>
                        <li class="d-block d-sm-block d-lg-none d-xl-none d-md-none d-xxl-none">
                            <a class="dropdown-item" href="{{ route('back.accompagnon') }}">
                                {{-- @lang('ACCOMPAGNON') --}}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.reservations') }}">
                                @lang('RESERVATIONS')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.experience') }}">
                                @lang('PACKS SPONSOR')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.destination') }}">
                                @lang('DESTINATION KIGALI')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.partenaires') }}">
                                {{-- @lang('PARTENAIRES') --}}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.medias') }}">
                                @lang('ESPACE MEDIA')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('back.contact') }}">
                                @lang('CONTACT')
                            </a>
                        </li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>
