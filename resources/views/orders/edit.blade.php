@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Pedido: {!! $order->number !!} </h3>
            <p class="title-description"> Ver / actualizar pedido del sistema </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('orders.index') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-cog"></i>
                Listado
            </a>
        </div>
    </div>
    {!! Form::open(['route' => ['orders.update', $order->id], 'method' => 'PUT']) !!}
    <section class="section">
        <div class="row">
			@include('orders.fields')
            <div class="col-md-12 text-center">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-oval btn-warning']) !!}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection

@push('scripts')
    <script src="{{ asset('js/orders/edit.js') }}"></script>
@endpush