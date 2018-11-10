<aside class="sidebar">
    <div class="sidebar-container">

        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">
                    <a href="{{ route('welcome') }}">                
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid" style="margin-top: -50px;">
                    </a>
                    <!--
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                    -->
                </div>
                <a href="{{ route('welcome') }}"  style="text-decoration: none;">    
                    {!! config('constants.companyInfo.name') !!}
                </a>
            </div>
        </div>

        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">

                <li class="@if(Request::is('home*')) active @endif">
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i> Inicio
                    </a>
                </li>
                @role('admin')
                <li class="@if(Request::is('products*') or Request::is('category*')) open active @endif">
                    <a href="">
                        <i class="fa fa-th-large"></i> Productos
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="@if(Request::is('products/create')) active @endif" >
                            <a href="{{ route('products.create') }}">
                                <i class="fa fa-plus"></i>&nbsp;
                                Nuevo producto
                            </a>
                        </li>
                        <li class="@if(Request::is('products')) active @endif" >
                            <a href="{{ route('products.index') }}">
                                <i class="fas fa-cog"></i>&nbsp;
                                Administrar
                            </a>
                        </li>
                        <li class="@if(Request::is('products-solds')) active @endif" >
                            <a href="{{ route('products.solds') }}">
                                <i class="fas fa-hand-holding-usd"></i>&nbsp;
                                Vendidos
                            </a>
                        </li>
                        <li class="@if(Request::is('products-likes')) active @endif" >
                            <a href="{{ route('products.likes') }}">
                                <i class="fas fa-thumbs-up"></i>&nbsp;
                                Me gusta
                            </a>
                        </li>
                        <li class="@if(Request::is('category*')) active @endif" >
                            <a href="{{ route('category.index') }}">
                                <i class="fas fa-layer-group"></i>&nbsp;
                                Categorías
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@if(Request::is('slider*')) open active @endif">
                    <a href="">
                        <i class="fas fa-film"></i> Slider
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="@if(Request::is('slider/create')) active @endif" >
                            <a href="{{ route('slider.create') }}">
                                <i class="fa fa-plus"></i>&nbsp;
                                Nueva imagen
                            </a>
                        </li>
                    </ul>
                    <ul class="sidebar-nav">
                        <li class="@if(Request::is('slider')) active @endif" >
                            <a href="{{ route('slider.index') }}">
                                <i class="fas fa-list"></i>&nbsp;
                                Lista de imágenes
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="@if(Request::is('subs*') or Request::is('bulletin*')) open active @endif">
                    <a href="">
                        <i class="fas fa-user-friends"></i> Subscripciones
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="@if(Request::is('bulletin')) active @endif" >
                            <a href="{{ route('bulletin.index') }}">
                                <i class="far fa-newspaper"></i>&nbsp;
                                Boletines
                            </a>
                        </li>
                    </ul>
                    <ul class="sidebar-nav">
                        <li class="@if(Request::is('subscriptions')) active @endif" >
                            <a href="{{ route('subscription.index') }}">
                                <i class="fas fa-list"></i>&nbsp;
                                Lista de subscriptores
                            </a>
                        </li>
                    </ul>
                </li>
                @endrole
                <li class="@if(Request::is('orders*') or Request::is('my-order*')) open active @endif">
                    <a href="">
                        <i class="fas fa-cubes"></i> Pedidos
                        <i class="fa arrow"></i>
                    </a>
                    @role('admin')
                    <ul class="sidebar-nav">
                        <li class="@if(Request::is('orders')) active @endif" >
                            <a href="{{ route('orders.index') }}">
                                <i class="fas fa-cog"></i>&nbsp;
                                Administrar
                            </a>
                        </li>
                    </ul>
                    @endrole
                    <ul class="sidebar-nav">
                        <li class="@if(Request::is('my-order*')) active @endif" >
                            <a href="{{ route('my.orders') }}">
                                <i class="fas fa-cube"></i>&nbsp;
                                Mis Pedidos
                            </a>
                        </li>
                    </ul>
                </li>

                {{--
                <li class="active open" >
                    <a href="">
                        <i class="fa fa-area-chart"></i> Charts
                        <i class="fa arrow"></i>
                    </a>

                    <ul class="sidebar-nav">
                        <li class="active" >
                            <a href="charts-flot.html">
                                Flot Charts
                            </a>
                        </li>

                        <li class="active" >
                            <a href="charts-morris.html">
                                Morris Charts
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="active open" >
                    <a href="">
                        <i class="fa fa-table"></i> Tables
                        <i class="fa arrow"></i>
                    </a>

                    <ul class="sidebar-nav">
                        <li class="active" >
                            <a href="static-tables.html">
                                Static Tables
                            </a>
                        </li>

                        <li class="active" >
                            <a href="responsive-tables.html">
                                Responsive Tables
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="active" >
                    <a href="forms.html">
                        <i class="fa fa-pencil-square-o"></i> Forms
                    </a>
                </li>

                <li class="active open">
                    <a href="">
                        <i class="fa fa-desktop"></i> UI Elements
                        <i class="fa arrow"></i>
                    </a>

                    <ul class="sidebar-nav">
                        <li class="active">
                            <a href="buttons.html">
                                Buttons
                            </a>
                        </li>

                        <li class="active">
                            <a href="cards.html">
                                Cards
                            </a>
                        </li>

                        <li class="active">
                            <a href="typography.html">
                                Typography
                            </a>
                        </li>

                        <li class="active">
                            <a href="icons.html">
                                Icons
                            </a>
                        </li>

                        <li class="active">
                            <a href="grid.html">
                                Grid
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="active open">

                    <a href="">
                        <i class="fa fa-file-text-o"></i> Pages
                        <i class="fa arrow"></i>
                    </a>

                    <ul class="sidebar-nav">
                        <li class="active">
                            <a href="login.html">
                                Login
                            </a>
                        </li>

                        <li class="active">
                            <a href="signup.html">
                                Sign Up
                            </a>
                        </li>

                        <li class="active">
                            <a href="reset.html">
                                Reset
                            </a>
                        </li>

                        <li class="active">
                            <a href="error-404.html">
                                Error 404 App
                            </a>
                        </li>

                        <li class="active">
                            <a href="error-404-alt.html">
                                Error 404 Global
                            </a>
                        </li>

                        <li class="active">
                            <a href="error-500.html">
                                Error 500 App
                            </a>
                        </li>

                        <li class="active">
                            <a href="error-500-alt.html">
                                Error 500 Global
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-sitemap"></i> Menu Levels
                        <i class="fa arrow"></i>
                    </a>

                    <ul class="sidebar-nav">

                        <li>
                            <a href="#">
                                Second Level Item
                                <i class="fa arrow"></i>
                            </a>

                            <ul class="sidebar-nav">

                                <li>
                                    <a href="#">
                                        Third Level Item
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        Third Level Item
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                Second Level Item
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                Second Level Item
                                <i class="fa arrow"></i>
                            </a>

                            <ul class="sidebar-nav">

                                <li>
                                    <a href="#">
                                        Third Level Item
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        Third Level Item
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        Third Level Item
                                        <i class="fa arrow"></i>
                                    </a>

                                    <ul class="sidebar-nav">

                                        <li>
                                            <a href="#">
                                                Fourth Level Item
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                Fourth Level Item
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

                <li class="active" >
                    <a href="screenful.html">
                        <i class="fa fa-bar-chart"></i> Agile Metrics <span class="label label-screenful">by Screenful</span>
                    </a>
                </li>

                <li class="active" >
                    <a href="https://github.com/modularcode/modular-admin-html">
                        <i class="fa fa-github-alt"></i> Theme Docs
                    </a>
                </li>
                --}}

            </ul>
        </nav>

    </div>

    {{--> app/_common/sidebar/customize/customize--}}

</aside>
<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
