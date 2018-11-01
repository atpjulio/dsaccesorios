<div class="social-icons" style="position: absolute; right: 25px;">
    <a href="{{ config('constants.companyInfo.facebook') }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
    &nbsp;&nbsp;&nbsp;
    <a href="{{ config('constants.companyInfo.instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a>
</div>
<img src="{{ asset('img/Header.png') }}" class="img-fluid">
<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="navbarCollapse">
        <ul class="navbar-nav mx-auto text-center">
            <li class="nav-item @if(Request::is('/')) active @endif">
                <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item @if(Request::is('store')) active @endif">
                <a class="nav-link" href="{{ route('store') }}">Tienda</a>
            </li>
            <li class="nav-item @if(Request::is('who-are-we')) active @endif">
                <a class="nav-link" href="{{ route('who.are.we') }}">Quiénes Somos</a>
            </li>
            <li class="nav-item @if(Request::is('contactus')) active @endif">
                <a class="nav-link" href="{{ route('contactus') }}">Contacto</a>
            </li>
            <li class="nav-item @if(Request::is('work')) active @endif">
                <a class="nav-link" href="{{ route('work') }}">Trabaja con Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://www.enviacolvanes.com.co" target="_blank">Rastrea tu Envío</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModal">Suscribirse</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            @guest
            <a class="btn btn-outline-secondary my-2 my-sm-0" href="{{ route('login') }}">
                <i class="fas fa-user"></i>
                Ingresar
            </a>
            &nbsp;&nbsp;
            @endguest
            @auth
            <a class="btn btn-outline-secondary my-2 my-sm-0" href="{{ route('home') }}">
                <i class="fa fa-home"></i>
                Home
            </a>
            &nbsp;&nbsp;
            @endauth
            <a class="btn btn-outline-secondary my-2 my-sm-0" href="{{ route('cart') }}">
                <i class="fas fa-shopping-cart"></i>
                Carrito 
                @if (is_array(session('shoppingCart')) and count(session('shoppingCart')) > 0)
                    ({!! count(session('shoppingCart')) !!})
                @endif
            </a>
        </form>
    </div>
</nav>
