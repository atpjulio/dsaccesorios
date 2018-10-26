<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('name', old('name', isset($category) ? $category->name : ''), ['class' => 'form-control underlined', 'placeholder' => 'Nombre de la categoría']) !!}
</div>
