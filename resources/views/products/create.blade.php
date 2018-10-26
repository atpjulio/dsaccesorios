@extends('layouts.backend.template')

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Nuevo Producto </h3>
            <p class="title-description"> Añadiendo nuevo producto al sistema </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('products.index') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-cog"></i>
                Listado
            </a>
        </div>
    </div>
    {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        @include('products.fields')
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-block">
                        @include('products.fields2')
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                {!! Form::submit('Guardar', ['class' => 'btn btn-oval btn-primary']) !!}
            </div>
        </div>
    </section>
    {!! Form::close() !!}
@endsection

@push('scripts')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $('.custom-file-input').on('change', function () {
                // console.log($(this)[0].files[0].name);
                $(this).next('.form-control-file').addClass("selected").html($(this)[0].files[0].name);
            });
        });
    </script>
@endpush
