@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Listado de Boletines </h3>
            <p class="title-description"> Aquí puedes ver el listado de todos los boletines y crear, actualizar o eliminar cualquiera de ellos </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('bulletin.create') }}" class="btn btn-pill-left btn-primary btn-lg">
                <i class="fa fa-plus"></i>
                Nuevo Boletín
            </a>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Boletines registrados en el sistema </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
                                <thead>
                                <th class="">Título</th>    
                                <th style="">Asunto</th>
                                <th class=""># Correos</th>
                                <th style="width: 103px;">Opciones</th>
                                </thead>
                                <tbody>
                                @if(count($bulletins) > 0)
                                @foreach($bulletins as $bulletin)
                                <tr>
                                    <td>{!! $bulletin->title !!}</td>
                                    <td>{!! $bulletin->subject !!}</td>
                                    <td class="text-center">{!! $bulletin->amount !!}</td>
                                    <td>
                                    @role('admin')
                                        <a href="{{ route('bulletin.edit', $bulletin) }}" class="btn btn-pill-left btn-info btn-sm">
                                            Editar
                                        </a>
                                        <a href="javascript:showModal('bulletin-delete/{{ $bulletin->id }}')" class="btn btn-pill-right btn-danger btn-sm">
                                            Borrar
                                        </a>
                                    @endrole                                            
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/general/index.js') }}"></script>
@endpush