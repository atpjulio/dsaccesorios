<div class="form-group @if($errors->has('category_id')) has-error @endif">
    {!! Form::label('category_id', 'Categoría', ['class' => 'control-label']) !!}
    {!! Form::select('category_id', $categories, old('category_id', isset($product) ? $product->category_id : ''), ['class' => 'form-control']) !!}
</div>
<div class="form-group @if($errors->has('quantity')) has-error @endif">
    {!! Form::label('quantity', 'Cantidad', ['class' => 'control-label']) !!}
    {!! Form::number('quantity', old('quantity', isset($product) ? $product->quantity : ''), ['class' => 'form-control underlined', 'placeholder' => 'Cantidad inicial disponible', 'min' => '0']) !!}
</div>
<div class="form-group @if($errors->has('price')) has-error @endif">
    {!! Form::label('price', 'Precio', ['class' => 'control-label']) !!}
    {!! Form::number('price', old('price', isset($product) ? $product->price : ''), ['class' => 'form-control underlined', 'placeholder' => 'Precio sin envío', 'min' => '0']) !!}
</div>
<div class="form-group @if($errors->has('show')) has-error @endif">
    {!! Form::label('show', '¿Mostrar en la tienda?', ['class' => 'control-label']) !!}
    {!! Form::select('show', config('constants.yesNo'), old('show', isset($product) ? $product->show : ''), ['class' => 'form-control']) !!}
</div>
