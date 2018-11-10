<div class="col-md-6">
    <div class="card">
	    <div class="card-block">
	    	<div class="title-block">
	    		<h3 class="title">Datos del usuario</h3>
	    	</div>
			<div class="form-group @if($errors->has('name')) has-error @endif">
    			{!! Form::label('name', 'Nombre completo', ['class' => 'control-label']) !!}
			    {!! Form::text('name', old('name', isset($order) ? $order->user->full_name : ''), ['class' => 'form-control underlined', 'placeholder' => 'Nombre del usuario', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('email')) has-error @endif">
    			{!! Form::label('email', 'Correo electrónico', ['class' => 'control-label']) !!}
			    {!! Form::text('email', old('email', isset($order) ? $order->user->email : ''), ['class' => 'form-control underlined', 'placeholder' => 'Correo electrónico', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('dni_type')) has-error @endif">
    			{!! Form::label('dni_type', 'Tipo de documento', ['class' => 'control-label']) !!}
			    {!! Form::text('dni_type', old('dni_type', isset($order) ? $order->user->dni_type : ''), ['class' => 'form-control underlined', 'placeholder' => 'Tipo de documento', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('dni')) has-error @endif">
    			{!! Form::label('dni', 'Número de documento', ['class' => 'control-label']) !!}
			    {!! Form::text('dni', old('dni', isset($order) ? $order->user->dni : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de documento', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('phone')) has-error @endif">
    			{!! Form::label('phone', 'Número de contacto', ['class' => 'control-label']) !!}
			    {!! Form::text('phone', old('phone', (isset($order) and $order->user->phone) ? $order->user->phone->phone : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de contacto', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('address')) has-error @endif">
    			{!! Form::label('address', 'Dirección', ['class' => 'control-label']) !!}
			    {!! Form::text('address', old('address', (isset($order) and $order->user->address) ? $order->user->address->full_address : ''), ['class' => 'form-control underlined', 'placeholder' => 'Dirección', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('city')) has-error @endif">
    			{!! Form::label('city', 'Municipio', ['class' => 'control-label']) !!}
			    {!! Form::text('city', old('city', (isset($order) and $order->user->address) ? $order->user->address->city : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de contacto', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('state')) has-error @endif">
    			{!! Form::label('state', 'Departamento', ['class' => 'control-label']) !!}
			    {!! Form::text('state', old('state', (isset($order) and $order->user->address) ? $order->user->address->state : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de contacto', 'readonly']) !!}
			</div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
	    <div class="card-block">
	    	<div class="title-block">
	    		<h3 class="title">Datos del pedido</h3>
	    	</div>
			<div class="form-group @if($errors->has('sub_total')) has-error @endif">
    			{!! Form::label('sub_total', 'Sub-total', ['class' => 'control-label']) !!}
			    {!! Form::text('sub_total', old('sub_total', isset($order) ? $order->sub_total : ''), ['class' => 'form-control underlined', 'placeholder' => 'Sub-total', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('shipping')) has-error @endif">
    			{!! Form::label('shipping', 'Costos de envío', ['class' => 'control-label']) !!}
			    {!! Form::text('shipping', old('shipping', isset($order) ? $order->shipping : ''), ['class' => 'form-control underlined', 'placeholder' => 'Costos de envío']) !!}
			</div>
			<div class="form-group @if($errors->has('total')) has-error @endif">
    			{!! Form::label('total', 'Monto', ['class' => 'control-label']) !!}
			    {!! Form::text('total', old('total', isset($order) ? $order->total : ''), ['class' => 'form-control underlined', 'placeholder' => 'Monto']) !!}
			</div>
			<div class="form-group @if($errors->has('status')) has-error @endif">
    			{!! Form::label('status', 'Estado del pedido', ['class' => 'control-label']) !!}
    			{!! Form::select('status', config('constants.transactions.frontEnd'), old('status', isset($order) ? $order->status : ''), ['class' => 'form-control']) !!}
			</div>
			<div class="form-group @if($errors->has('order_phone')) has-error @endif">
    			{!! Form::label('order_phone', 'Número de contacto', ['class' => 'control-label']) !!}
			    {!! Form::text('order_phone', old('order_phone', isset($order) ? $order->phone : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de contacto']) !!}
			</div>
			<div class="form-group @if($errors->has('full_address')) has-error @endif">
    			{!! Form::label('full_address', 'Dirección', ['class' => 'control-label']) !!}
			    {!! Form::text('full_address', old('full_address', (isset($order) and $order->address_1) ? $order->full_address : ''), ['class' => 'form-control underlined', 'placeholder' => 'Dirección']) !!}
			</div>
			<div class="form-group @if($errors->has('address_city')) has-error @endif">
    			{!! Form::label('address_city', 'Municipio', ['class' => 'control-label']) !!}
			    {!! Form::text('address_city', old('address_city', isset($order) ? $order->address_city : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de contacto']) !!}
			</div>
			<div class="form-group @if($errors->has('address_state')) has-error @endif">
    			{!! Form::label('address_state', 'Departamento', ['class' => 'control-label']) !!}
			    {!! Form::text('address_state', old('address_state', isset($order) ? $order->address_state : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de contacto']) !!}
			</div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
	    <div class="card-block">
	    	<div class="title-block">
	    		<h3 class="title">Productos en el pedido</h3>
	    	</div>
		</div>
	</div>
</div>