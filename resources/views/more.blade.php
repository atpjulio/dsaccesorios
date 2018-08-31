@extends('layouts.frontend.template')

@section('content')
    <div class="container">
        <div class="tab-pane fade show active" id="todos" role="tabpanel" aria-labelledby="todos-tab">
            <br>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <img src="{{ asset('img/products/lazo1.jpg') }}" class="w-100" style="height: 300px;">
                </div>
                <div class="col-sm-4">
                    <h4>Lazo negro con puntas rosas</h4>
                    <h3>
                        <img src="{{ asset('img/iconocompra.png') }}" height="20">
                        $ {!! number_format(10000, 0) !!}
                        <br>
                        <br>
                        <div class="form-group">
                            {!! Form::label('quantity', 'Cantidad', ['class' => 'control-label']) !!}
                            <br>
                            {!! Form::number('quantity', 1, ['class' => 'control-label', 'min' => 1, 'maxlength' => 3, 'style' => 'max-width: 60px;']) !!}
                        </div>
                        <a href="#" class="btn btn-secondary"><i class="fas fa-cart-plus"></i> Añadir al carrito</a>
                        <br><br>
                        <a href="#" class="btn btn-dark"><i class="fas fa-undo"></i> Regresar</a>
                    </h3>
                    <br>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
    <br>
@endsection