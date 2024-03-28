<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            <img src="/images/bicycle.png" alt="logo" width="64" height="64"/>
                Прокат велосипедов
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Велосипеды
                        </a>
                    
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('bicycle')}}">Все велосипеды</a></li>
                            <li><a class="dropdown-item" href="{{url('bicycle_create')}}">Добавить велосипед</a></li>
                            <li><hr class="dropdown-divider"></li>
                        </ul>
                    </li>

                    @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('rentals/'.Auth::user()->id) }}">Аренды </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout')}}">Выйти</a>
                    </li>

                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('login')}}">Войти</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('register')}}">Регистрация</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>