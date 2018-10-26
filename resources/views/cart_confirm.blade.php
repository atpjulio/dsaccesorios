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
    <h1>Confirmación de su pedido</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
            <tr class="table-danger">
                <th scope="col" class=""><h5>Producto</h5></th>
                <th scope="col" style=""><h5>Cantidad</h5></th>
                <th scope="col" class=""><h5>Precio Unitario</h5></th>
                <th scope="col" style="width: 18%;"><h5>Monto</h5></th>
            </tr>
            </thead>
            <tbody id="dynamic-cart">
                @include('partials.shopping_cart_table')
            </tbody>
        </table>
    </div>

    @if (count($shoppingCart) > 0)
    {!! Form::open(['route' => 'pay.cart.process', 'method' => 'POST']) !!}
        <div class="text-right">
            <a href="{{ route('cart') }}" class="btn btn-outline-danger">
                Regresar
            </a>
            &nbsp;&nbsp;
            {!! Form::submit('Pagar el Pedido', ['class' => 'btn btn-secondary']) !!}
            <div class="form-check">
                <br>
                <label>
                    <input type="checkbox" name="terms_and_conditions" disabled checked>
                    <span class="label-text">
                    Aceptar términos y condiciones
                </span>
                </label>
            </div>
        </div>
    {!! Form::close() !!}
    @endif

</div>
<br><br>
@endsection

@push('scripts')
    <script src="{{ asset('js/cart/index.js') }}"></script>
@endpush