@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Mi cuenta: {{ auth()->user()->full_name }} </h3>
            <p class="title-description"> Cambiar información personal </p>
        </div>
    </div>
    
    {!! Form::open(['route' => 'update.profile', 'method' => 'POST']) !!}
    <section class="section">
        <div class="row">
            @auth
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Información personal </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            {!! Form::label('password', 'Nueva contraseña', ['class' => 'control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control underlined', 'placeholder' => 'Nueva contraseña']) !!}
                        </div>
                        <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                            {!! Form::label('password_confirmation', 'Confirmar contraseña', ['class' => 'control-label']) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control underlined', 'placeholder' => 'Confirmar contraseña']) !!}
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-oval btn-warning']) !!}
                </div>
            </div>
            @endauth
        </div>
    </section>
    {!! Form::close() !!}
@endsection
