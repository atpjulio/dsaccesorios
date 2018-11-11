@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Nuevo Usuario </h3>
            <p class="title-description"> Añadiendo nuevo usuario al sistema </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('users.index') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-list"></i>
                Listado
            </a>
        </div>
    </div>
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
    <section class="section">
        <div class="row justify-content-center">
            @include('users.fields')
            <div class="col-md-12 text-center">
                {!! Form::submit('Guardar', ['class' => 'btn btn-oval btn-primary']) !!}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection
