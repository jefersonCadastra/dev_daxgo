<nav class="navbar navbar-expand-lg customNavbar">
    <div class="container">
        <a class="navbar-brand" href="#"><img class="login" src="{{ asset('img/logo-invert.svg') }}" width="110"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a href="{{ route('wizard.step', ['step' => 1]) }}" class="nav-link">
                            Wizard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('goals.index') }}" class="nav-link">
                            Metas
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Configurações
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Parâmetros Metas</a></li>
                        </ul>
                      </li>
                    <li class="nav-item align-self-center">
                        <a class="" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit()">{{ __('Logout') }}</a>

                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>