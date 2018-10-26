@if(isset($product) and $product->picture)
<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('current_picture', 'Imagen actual', ['class' => 'control-label']) !!}
    <div class="text-center">
	    <img src="{{ Storage::url($product->picture) }}" class="img-thumbnail" style="height: 200px;">	
    </div>
</div>
@endif
<div class="form-group @if($errors->has('picture')) has-error @endif">
    {!! Form::label('picture', 'Imagen', ['class' => 'control-label']) !!}
	<div class="custom-file">
	    <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="picture">
	    <label class="custom-file-label form-control-file" for="customFileLang">Seleccionar archivo</label>
	</div>
</div>
<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('name', old('name', isset($product) ? $product->name : ''), ['class' => 'form-control underlined', 'placeholder' => 'Nombre del producto']) !!}
</div>
<div class="form-group @if($errors->has('description')) has-error @endif">
    {!! Form::label('description', 'Descripción', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', old('description', isset($product) ? $product->description : ''), ['class' => 'form-control underlined', 'placeholder' => 'Descripción del producto', 'rows' => '5']) !!}
</div>
