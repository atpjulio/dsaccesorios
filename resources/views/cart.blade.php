@extends('layouts.frontend.template')

@section('content')
    <div class="container">
        <h1>Pedido</h1>

        <table class="table table-striped table-hover">
            <thead>
            <tr class="table-danger">
                <th scope="col"><h5>Producto</h5></th>
                <th scope="col"><h5>Cantidad</h5></th>
                <th scope="col"><h5>Precio Unitario</h5></th>
                <th scope="col"><h5>Monto</h5></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Lazo negro con puntos rosas</td>
                <td>x2</td>
                <td>$ 20.000</td>
                <td>$ 40.000</td>
            </tr>
            <tr>
                <td>Lazo negro con puntos rosas</td>
                <td>x3</td>
                <td>$ 20.000</td>
                <td>$ 60.000</td>
            </tr>
            <tr>
                <td>Lazo negro con puntos rosas</td>
                <td>x1</td>
                <td>$ 20.000</td>
                <td>$ 20.000</td>
            </tr>
            <tr>
                <td colspan="3">
                    <h5>Sub Total</h5>
                </td>
                <td>$ 120.000</td>
            </tr>
            <tr>
                <td colspan="3">
                    <h5>Costo de envío</h5>
                </td>
                <td>$ 10.000</td>
            </tr>
            <tr>
                <td colspan="3">
                    <h5>Total a pagar</h5>
                </td>
                <td>$ 120.000</td>
            </tr>
            </tbody>
        </table>
        <div class="text-right">
            {!! Form::submit('Pagar el Pedido', ['class' => 'btn btn-secondary']) !!}
            <div class="form-check">
                <label>
                    <input type="checkbox" name="terms_and_conditions">
                    <span class="label-text">
                    <a href="{{ route('tac') }}" target="_blank">
                        Aceptar términos y condiciones
                    </a>
                </span>
                </label>
            </div>
        </div>
        <hr>
        <h2>Ingresar a tu cuenta</h2>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Si ya eres usuario, ingresa con tus datos
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('email', 'Correo', ['class' => 'control-label']) !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'correo@ejemplo.com']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '******']) !!}
                            <small>Al menos 6 caracteres</small>
                        </div>
                        {!! Form::submit('Entrar', ['class' => 'btn btn-secondary']) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-5"></div>
        </div>
        <hr>
        <h2>Registrarse</h2>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        Si aún no estás en el sistema, por favor llena los siguientes campos para poder procesar tu pedido
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('first_name')) is-invalid @endif">
                                    {!! Form::label('first_name', 'Nombre (s)', ['class' => 'control-label']) !!}
                                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => 'Nombre(s)']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('last_name')) is-invalid @endif)">
                                    {!! Form::label('last_name', 'Apellido (s)', ['class' => 'control-label']) !!}
                                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => 'Apellido(s)']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('address')) is-invalid @endif">
                                    {!! Form::label('address', 'Dirección', ['class' => 'control-label']) !!}
                                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('address2')) is-invalid @endif)">
                                    {!! Form::label('address2', 'Dirección (continuación - opcional)', ['class' => 'control-label']) !!}
                                    {!! Form::text('address2', old('address2'), ['class' => 'form-control', 'placeholder' => 'Dirección - Continuación']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('city')) is-invalid @endif">
                                    {!! Form::label('city', 'Municipio', ['class' => 'control-label']) !!}
                                    {!! Form::text('city', old('city'), ['class' => 'form-control', 'placeholder' => 'Municipio']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group  @if($errors->has('state')) is-invalid @endif">
                                    {!! Form::label('state', 'Departamento', ['class' => 'control-label']) !!}
                                    {!! Form::select('state', \App\State::getStates(), old('state'), ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('zip')) is-invalid @endif)">
                                    {!! Form::label('zip', 'Código Postal', ['class' => 'control-label']) !!}
                                    {!! Form::text('zip', old('zip'), ['class' => 'form-control', 'placeholder' => 'Código Postal', 'maxlength' => 5]) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('phone')) is-invalid @endif)">
                                    {!! Form::label('phone', 'Número de celular', ['class' => 'control-label']) !!}
                                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'Celular', 'maxlength' => 15]) !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('email')) is-invalid @endif)">
                                    {!! Form::label('email', 'Correo', ['class' => 'control-label']) !!}
                                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'correo@ejemplo.com']) !!}
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('password')) is-invalid @endif)">
                                    {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
                                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => '******']) !!}
                                    <small>Al menos 6 caracteres</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('password_confirmation')) is-invalid @endif)">
                                    {!! Form::label('password_confirmation', 'Confirmar Contraseña', ['class' => 'control-label']) !!}
                                    {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'placeholder' => '******']) !!}
                                    <small>Al menos 6 caracteres</small>
                                </div>
                            </div>
                        </div>
                        {!! Form::submit('Entrar', ['class' => 'btn btn-secondary']) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <br>
@endsection