@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Administrar Subscriptores </h3>
            <p class="title-description"> Aquí puedes ver el listado de todos los subscriptores y el estado de cada uno </p>
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
                            <h3 class="title"> Subscriptores registrados en el sistema </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
                                <thead>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                                </thead>
                                <tbody>
                                @if(count($subscribers) > 0)
                                @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>{!! $subscriber->email !!}</td>
                                    <td>{!! $subscriber->status ? 'Activo' : 'Inactivo' !!}</td>
                                    <td>
                                    @role('admin')
                                        <a href="#" class="btn btn-pill-left btn-info btn-sm">
                                            Enviar correo
                                        </a>
                                        <a href="javascript:showModal('subscriber-delete/{{ $subscriber->id }}')" class="btn btn-pill-right btn-danger btn-sm">
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
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "No se encontró ningún resultado",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay información disponible",
                    "infoFiltered": "(filtrando de un total de _MAX_ registros)",
                    "search":         "Buscar:",
                    "paginate": {
                        "first":      "Primera",
                        "last":       "Última",
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    }
                },
                "order": [[0, "asc"]]
            });
        } );
    </script>
@endpush