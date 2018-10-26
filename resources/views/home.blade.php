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
                        <p>Verás un listado de los Productos registrados en el sistema, aquí puedes añadir, modificar o eliminarlos productos del sistema</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('products.index') }}">
                            Ir a Productos
                        </a>
                    </div>
                </div>
            </div>
            @endrole
        </div>
    </section>
@endsection
