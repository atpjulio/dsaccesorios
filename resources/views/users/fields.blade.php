<div class="col-md-6">
    <div class="card">
        <div class="card-block">
			<div class="form-group @if($errors->has('first_name')) has-error @endif">
			    {!! Form::label('first_name', 'Nombre(s)', ['class' => 'control-label']) !!}
			    {!! Form::text('first_name', old('first_name', isset($user) ? $user->first_name : ''), ['class' => 'form-control underlined', 'placeholder' => 'Nombre(s)']) !!}
			</div>
			<div class="form-group @if($errors->has('last_name')) has-error @endif">
			    {!! Form::label('last_name', 'Apellido(s)', ['class' => 'control-label']) !!}
			    {!! Form::text('last_name', old('last_name', isset($user) ? $user->last_name : ''), ['class' => 'form-control underlined', 'placeholder' => 'Apellido(s)']) !!}
			</div>
			<div class="form-group @if($errors->has('email')) has-error @endif">
			    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
			    {!! Form::email('email', old('email', isset($user) ? $user->email : ''), ['class' => 'form-control underlined', 'placeholder' => 'Email', 'readonly']) !!}
			</div>
        </div>
    </div>
</div>
{{-- 

<div class="col-md-6">
    <div class="card">
        <div class="card-block">
			<div class="form-group @if($errors->has('first_name')) has-error @endif">
			    {!! Form::label('first_name', 'Nombre(s)', ['class' => 'control-label']) !!}
			    {!! Form::text('first_name', old('first_name', isset($user) ? $user->first_name : ''), ['class' => 'form-control underlined', 'placeholder' => 'Nombre(s)']) !!}
			</div>
			<div class="form-group @if($errors->has('last_name')) has-error @endif">
			    {!! Form::label('last_name', 'Apellido(s)', ['class' => 'control-label']) !!}
			    {!! Form::text('last_name', old('last_name', isset($user) ? $user->last_name : ''), ['class' => 'form-control underlined', 'placeholder' => 'Apellido(s)']) !!}
			</div>
			<div class="form-group @if($errors->has('email')) has-error @endif">
			    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
			    {!! Form::email('email', old('email', isset($user) ? $user->email : ''), ['class' => 'form-control underlined', 'placeholder' => 'Email', 'readonly']) !!}
			</div>
        </div>
    </div>
</div>

 --}}