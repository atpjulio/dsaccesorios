@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Añadir imagen al Slider </h3>
            <p class="title-description"> Aquí puedes añadir una imagen al slider </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('slider.index') }}" class="btn btn-pill-left btn-secondary btn-lg">
                <i class="fas fa-list"></i>
                Listado
            </a>
        </div>        
    </div>

    {!! Form::open(['route' => 'slider.store', 'method' => 'POST', 'autocomplete' => 'off', 'files' => true]) !!}
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Subir imagen </h3>
                        </div>
                        <p>Las imágenes deben tener un tamaño de 1160 x 400 (ancho x largo) y extensión png, jpg, gif para poder ser mostradas apropiadamente en la página de inicio</p>
                        <div class="custom-file" style="margin-bottom: 15px;">
                            <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="image">
                            <label class="custom-file-label form-control-file" for="customFileLang">Seleccionar imagen</label>
                        </div>
                        <div class="form-group">
                            {!! Form::label('text', 'Texto adicional (opcional)', ['class' => 'control-label']) !!}
                            {!! Form::text('text', old('text'), ['class' => 'form-control', 'placeholder' => 'Texto mostrado en la parte baja de la imagen']) !!}
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    {!! Form::submit('Subir imagen', ['class' => 'btn btn-oval btn-primary']) !!}
                </div>
            </div>
        </div>
    </section>
{!! Form::close() !!}
@endsection

@push('scripts')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $('.custom-file-input').on('change', function () {
                $(this).next('.form-control-file').addClass("selected").html($(this)[0].files[0].name);
            });
        });
    </script>
@endpush
