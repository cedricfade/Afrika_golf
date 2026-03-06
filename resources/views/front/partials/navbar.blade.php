    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}" style="margin-right: 5em">
                <img src="{{ asset('assets/logo/logo.png') }}" alt="AFRICA GOLF" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('mcn-cgp') }}">MCN CGP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('tournois') }}">LE TOURNOIS</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('diners') }}">DINERS</a>
                    </li>



                </ul>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        <div class="menu-wrapper">
                            <div class="menu-top">
                                <span class="lang">FR</span>
                                <div class="trait"></div>
                                <i class="fa-solid fa-bars" style="font-size: 2.5em"></i>
                            </div>
                            <span class="menu-text">MENU</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('home') }}">@lang('accueil')</a></li>
                        <li><a class="dropdown-item" href="{{ route('africa-art') }}">@lang('AFRICA ART OF GOLF CUP')</a></li>
                        <li><a class="dropdown-item" href="{{ route('reservations') }}">@lang('RESERVATIONS')</a></li>
                        <li><a class="dropdown-item" href="{{ route('destination') }}">@lang('DESTINATION KIGALI')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('PARTENAIRES')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('LES RENDEZ-VOUS AAGC')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('espace média')</a></li>
                        <li><a class="dropdown-item" href="#">@lang('contact')</a></li>

                    </ul>
                </li>

                {{-- <form class="d-flex" role="search">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> --}}
            </div>
        </div>
    </nav>