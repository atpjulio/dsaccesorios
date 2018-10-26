@extends('layouts.frontend.template')

@push('styles')
    <style type="text/css">
        td a {
            text-decoration: none;
            color: black;
        }
        td a:hover {
            color: black;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <h1>Pedido</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="table-danger">
                <th scope="col" class=""><h5>Producto</h5></th>
                <th scope="col" style=""><h5>Cantidad</h5></th>
                <th scope="col" class=""><h5>Precio Unitario</h5></th>
                <th scope="col" style="width: 18%;"><h5>Monto</h5></th>
                <th scope="col" style="width: 12%;" class="text-center"><h5>Opciones</h5></th>
            </tr>
            </thead>
            <tbody id="dynamic-cart">
                @include('partials.shopping_cart_table')
            </tbody>
        </table>
    </div>

    @if (count($shoppingCart) > 0)
    {!! Form::open(['route' => 'pay.cart', 'method' => 'POST']) !!}
        <div class="text-right">
            <a href="" data-toggle="modal" data-target="#empty-cart-modal" class="btn btn-outline-danger">
                Vaciar carrito
            </a>
            &nbsp;&nbsp;
            {!! Form::submit('Confirmar el Pedido', ['class' => 'btn btn-secondary']) !!}
            <div class="form-check">
                <br>
                <label>
                    <input type="checkbox" name="terms_and_conditions">
                    <span class="label-text">
                    <a href="{{ route('tac') }}" target="_blank">
                        Aceptar términos y condiciones
                    </a>
                </span>
                </label>
            </div>
        </div>
    {!! Form::close() !!}
    @endif

    @guest
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h2>Registrarse</h2>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                Para registrarse y poder pagar tus pedidos y tener beneficios adicionales como cupones de descuento y ofertas especiales, haz clic &nbsp;&nbsp;<a href="{{ route('register') }}" class="btn btn-secondary">Aquí</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Ingresar a tu cuenta</h2>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                Si ya eres usuario y quieres procesar tu pedido, haz clic &nbsp;&nbsp;<a href="{{ route('login') }}" class="btn btn-secondary">Aquí</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
</div>
<br><br>
@include('empty_cart_modal')
@endsection

@push('scripts')
    <script src="{{ asset('js/cart/index.js') }}"></script>
@endpush