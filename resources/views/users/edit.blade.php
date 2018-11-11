@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Editar Usuario </h3>
            <p class="title-description"> Actualizando usuario del sistema </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('users.index') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-list"></i>
                Listado
            </a>
        </div>
    </div>
    {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}
    <section class="section">
        <div class="row justify-content-center">
            @include('users.fields')
            <div class="col-md-12 text-center">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-oval btn-warning']) !!}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection
