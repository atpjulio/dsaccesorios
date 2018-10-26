@extends('layouts.frontend.template')

@section('content')
    {!! Form::open(['route' => 'add.to.cart', 'method' => 'POST']) !!}
    <div class="container">
            <br>
            <div class="row justify-content-center">            
                <div class="col-8 text-center">
                    @include('partials.messages_filled')
                </div>
            </div>
            <div class="row justify-content-center">            
                <div class="col-sm-4">
                    <img src="{{ Storage::url($product->picture) }}" class="w-100" style="height: 300px;">
                </div>
                <div class="col-sm-4">
                    <h4>{!! $product->name !!}</h4>
                    <h5>{!! $product->description !!}</h5>
                    <br>
                    <h3>
                        $ 
                        <span id="price">
                            {!! number_format($product->price, 0, ",", ".") !!}
                        </span>                            
                        {!! Form::hidden('amount', $product->price, ['id' => 'amount']) !!}
                        {!! Form::hidden('product_id', $product->id) !!}
                        <br>
                        <br>
                        <div class="form-group">
                            {!! Form::label('quantity', 'Cantidad', ['class' => 'control-label']) !!}
                            <br>
                            {!! Form::number('quantity', $cartQuantity > 0 ? $cartQuantity : 1, ['class' => 'control-label', 'min' => 1, 'maxlength' => 3, 'style' => 'max-width: 60px;', 'id' => 'quantity']) !!}
                        </div>
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-cart-plus"></i> Añadir al carrito
                        </button>
                        &nbsp;
                        <a href="{{ URL::previous() }}" class="btn btn-dark"><i class="fas fa-undo"></i> Regresar</a>
                    </h3>
                    <br>
                </div>
            </div>
    </div>
    {!! Form::close() !!}
    <br>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#quantity').on('keyup change', function (e) {
                var result = $('#amount').val() * $(this).val();
                $('#price').html(result.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            });
        } );
    </script>
@endpush