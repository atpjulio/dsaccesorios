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
			    {!! Form::email('email', old('email', isset($user) ? $user->email : ''), ['class' => 'form-control underlined', 'placeholder' => 'Email', isset($user) ? 'readonly' : '']) !!}
			</div>
			<div class="form-group @if($errors->has('user_type')) has-error @endif">
			    {!! Form::label('user_type', 'Tipo de usuario', ['class' => 'control-label']) !!}
			    {!! Form::select('user_type', config('constants.userRolesFrontEnd'), old('user_type', isset($user) ? $user->user_type : ''), ['class' => 'form-control underlined']) !!}
			</div>
			<div class="form-group @if($errors->has('dni_type')) has-error @endif">
			    {!! Form::label('dni_type', 'Tipo de documento', ['class' => 'control-label']) !!}
			    {!! Form::select('dni_type', config('constants.documentTypes'), old('dni_type', isset($user) ? $user->dni_type : ''), ['class' => 'form-control underlined']) !!}
			</div>
			<div class="form-group @if($errors->has('dni')) has-error @endif">
			    {!! Form::label('dni', 'Número de documento', ['class' => 'control-label']) !!}
			    {!! Form::text('dni', old('dni', isset($user) ? $user->dni : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de documento']) !!}
			</div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-block">
			<div class="form-group @if($errors->has('purchases')) has-error @endif">
			    {!! Form::label('purchases', 'Compras realizadas', ['class' => 'control-label']) !!}
			    {!! Form::number('purchases', old('purchases', isset($user) ? $user->purchases : 0), ['class' => 'form-control underlined', 'placeholder' => 'Compras realizadas', 'min' => 0]) !!}
			</div>
            <div class="form-group @if($errors->has('address')) has-error @endif">
                {!! Form::label('address', 'Dirección', ['class' => 'control-label']) !!}
			    {!! Form::text('address', old('address', (isset($user) and $user->address) ? $user->address->address1 : ''), ['class' => 'form-control underlined', 'placeholder' => 'Dirección']) !!}
            </div>
            <div class="form-group @if($errors->has('address2')) has-error @endif)">
                {!! Form::label('address2', 'Dirección (continuación - opcional)', ['class' => 'control-label']) !!}
                {!! Form::text('address2', old('address2', (isset($user) and $user->address) ? $user->address->address2 : ''), ['class' => 'form-control underlined', 'placeholder' => 'Dirección - Continuación']) !!}
            </div>
            <div class="form-group @if($errors->has('city')) has-error @endif">
                {!! Form::label('city', 'Municipio', ['class' => 'control-label']) !!}
                {!! Form::text('city', old('city', (isset($user) and $user->address) ? $user->address->city : ''), ['class' => 'form-control underlined', 'placeholder' => 'Dirección - Continuación']) !!}
            </div>         
            <div class="form-group  @if($errors->has('state')) has-error @endif">
                {!! Form::label('state', 'Departamento', ['class' => 'control-label']) !!}
                {!! Form::select('state', \App\State::getStates(), old('state', (isset($user) and $user->address) ? $user->address->state : '08'), ['class' => 'form-control']) !!}
            </div>
            {{--  
			<div class="form-group @if($errors->has('zip')) has-error @endif">
			    {!! Form::label('zip', 'Código postal', ['class' => 'control-label']) !!}
			    {!! Form::text('zip', old('zip', (isset($user) and $user->address) ? $user->address->zip : ''), ['class' => 'form-control underlined', 'placeholder' => 'Notas']) !!}
			</div>
        	--}}
        </div>
    </div>
</div>
