<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-black transition">
    <div class="container-fluid d-flex justify-content-between">
        <a href="{{ route('homepage') }}" class="d-md-none d-block">
            <img src="/media/logodt3.png" class="logo" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-flex justify-content-center d-md-block d-none">
                <a href="{{ route('homepage') }}">
                    <img src="/media/logodt3.png" class="logo" alt="">
                </a>
            </div>
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item px-3 ">
                    <a class="nav-link" aria-current="page" href="{{ route('homepage') }}"><i
                            class="fa-solid fa-house"></i>{{__('ui.home')}}</a>
                </li>
                <li class="nav-item px-3 ">
                    <a class="nav-link" href="{{ route('article.index') }}"><i class="fa-solid fa-newspaper"></i>{{__('ui.Articles')}}</a>
                </li>
                <li class="nav-item px-3 ">
                    <a class="nav-link" href="{{ route('careers') }}"><i class="bi bi-pc-display"></i>{{__('ui.lavora con noi')}}</a>
                </li>
                <li class="nav-item px-3 ">
                    <a class="nav-link" href="{{ route('staff') }}"><i class="bi bi-person-vcard"></i>{{__('ui.staff')}}</a>
                </li>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                      <button class="btn dropdown-toggle nav-link mx-2 " data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-globe2"></i>{{__('ui.lingua')}}</button>
                        <ul class="dropdown-menu bg-black mt-2 text-center ">
                            <li class="nav-item px-3 ">
                                <x-_locale lang="it" />
                            </li>
                            <li class="nav-item px-3 ">
                                <x-_locale lang="en" />
                            </li>
                            <li class="nav-item px-3 ">
                                <x-_locale lang="es" />
                            </li>
                        </ul>
                    </li>
                </ul>
               
                @guest
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn dropdown-toggle nav-link" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fa-solid fa-lock"></i> Area Riservata
                                </button>
                                <ul class="dropdown-menu bg-black mt-2 text-center ">
                                    <li class="nav-item px-3 ">
                                        <a class="nav-link" href="{{ route('register') }}"> <i
                                                class="fa-solid fa-right-to-bracket"></i> Registrati</a>
                                    </li>
                                    <li class="nav-item px-3 ">
                                        <a class="nav-link" href="{{ route('login') }}"><i
                                                class="fa-solid fa-right-to-bracket"></i> Accedi</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @endguest
                @auth
                    <li>
                        <div>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu bg-black mt-2 px-2 text-center ">

                                        @if (Auth::user()->is_admin)
                                            <li><a class="dropdown-item nav-link  my-3"
                                                    href="{{ route('admin.dashboard') }}"><i
                                                        class="fa-solid fa-user-tie"></i> Dashboard Admin</a></li>
                                        @endif

                                        @if (Auth::user()->is_revisor)
                                            <li><a class="dropdown-item nav-link  my-3"
                                                    href="{{ route('revisor.dashboard') }}"><i
                                                        class="fa-solid fa-user-tie"></i> Dashboard del Revisore</a></li>
                                        @endif

                                        @if (Auth::user()->is_writer)
                                            <li>
                                                <a class="dropdown-item nav-link  my-3"
                                                    href="{{ route('writer.dashboard') }}"><i
                                                        class="fa-solid fa-user-tie"></i>Dashboard del Redattore</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item nav-link  my-3"
                                                    href="{{ route('article.create') }}"><i
                                                        class="bi bi-plus-lg"></i>Articolo</a>
                                            </li>
                                        @endif


                                        <li>
                                            <form action="{{ route('logout') }}" method="POST"
                                                class="d-flex justify-content-center ">
                                                @csrf
                                                <button type="submit" class="btn btn-danger text-center mb-2 ">Logout<i
                                                        class="bi bi-box-arrow-right px-2"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endauth
            </ul>
            <form class="d-flex" method="GET" action="{{ route('article.search') }}">
                <input class="form-control me-2" type="search" placeholder="Cosa stai cercando?" aria-label="Search"
                    name="query">
                <button class="btn mybtn" type="submit">Cerca</button>
            </form>
        </div>
    </div>
</nav>
