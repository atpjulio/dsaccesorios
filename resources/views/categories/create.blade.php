@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Nueva Categoría </h3>
            <p class="title-description"> Añadiendo nueva categoría al sistema </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('category.index') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-cog"></i>
                Listado
            </a>
        </div>
    </div>
    {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        @include('categories.fields')
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-center">
                {!! Form::submit('Guardar', ['class' => 'btn btn-oval btn-primary']) !!}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection
