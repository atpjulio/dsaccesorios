@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Bienvenid@ {{ auth()->user()->full_name }} </h3>
            <p class="title-description"> Pantalla principal de tu sesión </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('cart') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-shopping-cart"></i>
                Carrito
                @if (is_array(session('shoppingCart')) and count(session('shoppingCart')) > 0)
                    ({!! count(session('shoppingCart')) !!})
                @endif                
            </a>
        </div>
    </div>
    
    <section class="section">
        <div class="row">
            @role('admin')
            <div class="col-xl-4">
                <div class="card card-pink">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Productos </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Verás un listado de los productos registrados en el sistema, aquí puedes añadir, modificar o eliminarlos productos del sistema</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('products.index') }}">
                            Ir a Productos
                        </a>
                    </div>
                </div>
            </div>
            @endrole
            @role('admin')
            <div class="col-xl-4">
                <div class="card card-pink">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Slider </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Aquí encontrarás las imágenes que se muestran en la página principal. Se recomienda colocar aquí las promociones y lo nuevo</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('slider.index') }}">
                            Ir a Slider
                        </a>
                    </div>
                </div>
            </div>
            @endrole
            @role('admin')
            <div class="col-xl-4">
                <div class="card card-pink">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Subscripciones </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Verás un listado de los boletínes que están creados y que serán o ya han sido enviados a los suscriptores de la página</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('bulletin.index') }}">
                            Ir a Subscripciones
                        </a>
                    </div>
                </div>
            </div>
            @endrole
            @role('admin')
            <div class="col-xl-4">
                <div class="card card-pink">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Usuarios Registrados </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Verás un listado de los usuarios registrados, así como tendrás acceso a información en más detalle de cada uno de ellos</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('users.index') }}">
                            Ir a Usuarios Registrados
                        </a>
                    </div>
                </div>
            </div>
            @endrole
            <div class="col-xl-4">
                <div class="card card-pink">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Pedidos </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Verás un listado de los pedidos que tienes guardados en el sistema y conocer el estado y detalle de cada uno de ellos</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('my.orders') }}">
                            Ir a Mis Pedidos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
