@extends('layouts.frontend.template')

@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.messages_filled')
            <div class="card">
                <div class="card-header">
                    Registrarse en {!! config('constants.companyInfo.name') !!}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('first_name', 'Nombre (s)', ['class' => 'control-label']) !!}
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" placeholder="Nombre(s)" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label('last_name', 'Apellido (s)', ['class' => 'control-label']) !!}
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Nombre(s)" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('address')) is-invalid @endif">
                                    {!! Form::label('address', 'Dirección', ['class' => 'control-label']) !!}
                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="Dirección" required>
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
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" placeholder="Municipio" required>
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
                                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="Celular" required maxlength="15">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('email')) is-invalid @endif)">
                                    {!! Form::label('email', 'Correo', ['class' => 'control-label']) !!}
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com" required>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('password')) is-invalid @endif)">
                                    {!! Form::label('password', 'Contraseña', ['class' => 'control-label']) !!}
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="******" required>
                                    <small>Al menos 6 caracteres</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group @if($errors->has('password_confirmation')) is-invalid @endif)">
                                    {!! Form::label('password_confirmation', 'Confirmar Contraseña', ['class' => 'control-label']) !!}
                                    <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="******" required>
                                    <small>Al menos 6 caracteres</small>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            {!! Form::submit('Registrarse', ['class' => 'btn btn-secondary']) !!}
                        </div>                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
