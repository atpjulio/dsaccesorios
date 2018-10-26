@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Editar Categoría </h3>
            <p class="title-description"> Actualizando categoría del sistema </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('category.index') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-cog"></i>
                Listado
            </a>
        </div>
    </div>
    {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}
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
                {!! Form::submit('Actualizar', ['class' => 'btn btn-oval btn-warning']) !!}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection
