@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Pedido: {!! $order->number !!} </h3>
            <p class="title-description"> Ver mi pedido </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('my.orders') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-cog"></i>
                Mis Pedidos
            </a>
        </div>
    </div>
    <section class="section">
        <div class="row">
			@include('orders.fields_my_order')
            <div class="col-md-12 text-center">
            	<a href="{{ route('my.orders') }}" class="btn btn-oval btn-success-outline">
            		Regresar
            	</a>
            </div>
        </div>
    </section>
@endsection
