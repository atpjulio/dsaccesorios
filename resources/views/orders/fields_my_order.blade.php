@if ($order->notes)
<div class="col-md-12">
    <div class="card">
	    <div class="card-block">
	    	<div class="title-block">
	    		<h3 class="title">Detalles del envío</h3>
				<div class="form-group @if($errors->has('notes')) has-error @endif">
				    {!! Form::textarea('notes', old('notes', isset($order) ? $order->notes : ''), ['class' => 'form-control underlined', 'placeholder' => 'Detalles del envío', 'rows' => '5']) !!}
				</div>
	    	</div>
	    </div>
	</div>
</div>
@endif
<div class="col-md-6">
    <div class="card">
	    <div class="card-block">
	    	<div class="title-block">
	    		<h3 class="title">Información del pedido</h3>
	    	</div>
			<div class="form-group @if($errors->has('sub_total')) has-error @endif">
    			{!! Form::label('sub_total', 'Sub-total', ['class' => 'control-label']) !!}
			    {!! Form::number('sub_total', old('sub_total', isset($order) ? $order->sub_total : ''), ['class' => 'form-control underlined', 'placeholder' => 'Sub-total', 'readonly', 'id' => 'sub_total']) !!}
			</div>
			<div class="form-group @if($errors->has('shipping')) has-error @endif">
    			{!! Form::label('shipping', 'Costos de envío', ['class' => 'control-label']) !!}
			    {!! Form::number('shipping', old('shipping', isset($order) ? $order->shipping : ''), ['class' => 'form-control underlined', 'placeholder' => 'Costos de envío', 'min' => 0,
			    'id' => 'shipping', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('total')) has-error @endif">
    			{!! Form::label('total', 'Monto', ['class' => 'control-label']) !!}
			    {!! Form::number('total', old('total', isset($order) ? $order->total : ''), ['class' => 'form-control underlined', 'placeholder' => 'Monto', 'readonly', 'id' => 'total']) !!}
			</div>
			<div class="form-group @if($errors->has('status')) has-error @endif">
    			{!! Form::label('status', 'Estado del pedido', ['class' => 'control-label']) !!}
    			{!! Form::select('status', config('constants.transactions.frontEnd'), old('status', isset($order) ? $order->status : ''), ['class' => 'form-control', 'disabled']) !!}
			</div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card">
	    <div class="card-block">
	    	<div class="title-block">
	    		<h3 class="title">Información de la entrega</h3>
	    	</div>
			<div class="form-group @if($errors->has('order_phone')) has-error @endif">
    			{!! Form::label('order_phone', 'Número de contacto', ['class' => 'control-label']) !!}
			    {!! Form::text('order_phone', old('order_phone', isset($order) ? $order->phone : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de contacto', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('full_address')) has-error @endif">
    			{!! Form::label('full_address', 'Dirección', ['class' => 'control-label']) !!}
			    {!! Form::text('full_address', old('full_address', (isset($order) and $order->address_1) ? $order->full_address : ''), ['class' => 'form-control underlined', 'placeholder' => 'Dirección', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('address_city')) has-error @endif">
    			{!! Form::label('address_city', 'Municipio', ['class' => 'control-label']) !!}
			    {!! Form::text('address_city', old('address_city', isset($order) ? $order->address_city : ''), ['class' => 'form-control underlined', 'placeholder' => 'Número de contacto', 'readonly']) !!}
			</div>
			<div class="form-group @if($errors->has('address_state')) has-error @endif">
    			{!! Form::label('address_state', 'Departamento', ['class' => 'control-label']) !!}
                {!! Form::select('address_state', \App\State::getStates(), old('address_state', isset($order) ? $order->address_state : ''), ['class' => 'form-control', 'disabled']) !!}
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

		    <div class="table-responsive">
		        <table class="table table-striped table-hover">
		            <thead>
		            <tr class="">
		                <th scope="col" class="">Producto</th>
		                <th scope="col" style="">Cantidad</th>
		                <th scope="col" class="">Precio Unitario</th>
		                <th scope="col" style="">Monto</th>
		            </tr>
		            </thead>
		            <tbody>
	            	@php
	            		$total = 0;
	            	@endphp
        		    @foreach(json_decode($order->products, true) as $article)     
				        @php
				            $product = \App\Product::getProductById(array_keys($article)[0]);
				            $total += $product->price * array_sum($article);
				        @endphp
				        <tr>
				        	<td>{!! $product->name !!}</td>
				            <td>{!! array_sum($article) !!}</td>
				            <td>$ {!! number_format($product->price, 2, ",", ".") !!}</td>
				            <td>
			                    $ {!! number_format($product->price * array_sum($article), 2, ",", ".") !!}
				            </td>
				        </tr>
				    @endforeach
					</tbody>
		        </table>
		    </div>
		</div>
	</div>
</div>