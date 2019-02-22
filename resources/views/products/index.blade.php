@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Administrar Productos </h3>
            <p class="title-description"> Aquí puedes ver el listado de todos los productos y crear, actualizar o eliminar cualquier producto </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('products.create') }}" class="btn btn-pill-left btn-primary btn-lg">
                <i class="fa fa-plus"></i>
                Nuevo Producto
            </a>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">                            
                            <div class="float-left">
                                <h3 class="title"> Productos registrados en el sistema </h3>
                              </div>
                              <div class="dataTables_filter float-right form-inline mb-3 mt-0">
                                    <label class="mr-2">Buscar:</label>
                                    <input type="search" class="form-control form-control-sm" placeholder="" id="searching">
                              </div>  
                        </div>
                        <div id="dynamic-products">
                            @include('partials._products')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ mix('js/products.js')}}"></script>
    {{-- 
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
                "order": [[1, "asc"]]
            });
        } );
    </script>
    --}}
@endpush