<div class="col-md-12">
    <div class="card">
        <div class="card-block">
			<div class="form-group @if($errors->has('title')) has-error @endif">
			    {!! Form::label('title', 'Título del boletín (no se verá en el correo)', ['class' => 'control-label']) !!}
			    {!! Form::text('title', old('title', isset($bulletin) ? $bulletin->title : ''), ['class' => 'form-control underlined', 'placeholder' => 'Título del boletín']) !!}
			</div>
			<div class="form-group @if($errors->has('subject')) has-error @endif">
			    <div class="float-left">
			    	{!! Form::label('subject', 'Asunto del correo', ['class' => 'control-label']) !!}
			    </div>
			    <div class="float-right">
				    {!! Form::submit('Hacer prueba', ['class' => 'btn btn-oval btn-primary-outline', 'name' => 'test']) !!}
			    </div>
			    {!! Form::text('subject', old('subject', isset($bulletin) ? $bulletin->subject : ''), ['class' => 'form-control underlined', 'placeholder' => 'Asunto']) !!}
			</div>
			<div class="form-group @if($errors->has('content')) has-error @endif">
			    {!! Form::label('content', 'Contenido del correo', ['class' => 'control-label']) !!}
			    {!! Form::textarea('content', old('content', isset($bulletin) ? $bulletin->content : ''), ['class' => 'ckeditor', 'placeholder' => 'Contenido']) !!}
			</div>
        </div>
    </div>
</div>



