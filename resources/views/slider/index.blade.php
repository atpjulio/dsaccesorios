@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
<div class="title-block">
    <div class="float-left">
        <h3 class="title"> Imágenes del Slider </h3>
        <p class="title-description"> Aquí puedes mostrar / ocultar / borrar las imágenes del slider </p>
    </div>
    <div class="float-right animated fadeInRight">
        <a href="{{ route('slider.create') }}" class="btn btn-pill-left btn-primary btn-lg">
            <i class="fa fa-plus"></i>
            Nueva Imagen
        </a>
    </div>

</div>

<section class="section">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title"> Imágenes guardadas en el sistema </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                             <thead>
                                <tr>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Texto que sale con la imagen</th>
                                    <th scope="col">Orden de salida</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliderImages as $sliderImage)
                                <tr>
                                    <td class="text-center">
                                        <a href="javascript:showModal('slider/{{ $sliderImage->id }}')">
                                            <img src="{{ $sliderImage->url }}" alt="" class="rounded" width="50">
                                        </a>
                                    </td>
                                    <td>{{ $sliderImage->text ?: '<< Sin texto >>' }}</td>
                                    <td>{{ $sliderImage->id }}</td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#text-modal-{{ $sliderImage->id }}" class="btn btn-pill-left btn-info btn-sm">
                                            Texto
                                        </a>
                                        @if ($sliderImage->status == config('constants.status.active'))
                                        <a href="" data-toggle="modal" data-target="#status-modal-{{ $sliderImage->id }}" class="btn btn-warning btn-sm">
                                            Ocultar
                                        </a>
                                        @else
                                        <a href="" data-toggle="modal" data-target="#status-modal-{{ $sliderImage->id }}" class="btn btn-secondary btn-sm">
                                            Mostrar
                                        </a>
                                        @endif
                                        <a href="" data-toggle="modal" data-target="#confirm-modal-{{ $sliderImage->id }}" class="btn btn-pill-right btn-danger btn-sm">
                                            Borrar
                                        </a>
                                        
                                    </td>
                                    {{--  
                                    <td class="text-center">
                                        <br><br>
                                        <div class="d-flex flex-column">
                                            <div class="p-2 bd-highlight">
                                                <a href="" data-toggle="modal" data-target="#text-modal-{{ $sliderImage->id }}">
                                                    <h1 class="text-success">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </h1>
                                                </a>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                @if ($sliderImage->status == config('constants.status.active'))
                                                <a href="" data-toggle="modal" data-target="#status-modal-{{ $sliderImage->id }}">
                                                    <h1 class="text-primary">
                                                        <i class="far fa-eye"></i>
                                                    </h1>
                                                </a>
                                                @else
                                                <a href="" data-toggle="modal" data-target="#status-modal-{{ $sliderImage->id }}">
                                                    <h1 class="text-warning">
                                                        <i class="far fa-eye-slash"></i>
                                                    </h1>
                                                </a>
                                                @endif
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <a href="" data-toggle="modal" data-target="#confirm-modal-{{ $sliderImage->id }}">
                                                    <h1 class="text-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </h1>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    --}}
                                    @include('slider.text_modal')
                                    @include('slider.status_modal')
                                    @include('slider.delete_modal')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection