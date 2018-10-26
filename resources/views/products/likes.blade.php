@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Productos con Me Gusta </h3>
            <p class="title-description"> Aquí puedes ver el listado solamente de los productos a los que le han dado me gusta </p>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Listado de productos con Me Gusta <i class="fas fa-thumbs-up"></i></h3>
                        </div>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
                                    <thead>
                                    <th style="width: 50px;">Imagen</th>
                                    <th class="">Nombre</th>
                                    <th style=""><i class="fas fa-thumbs-up"></i></th>
                                    <th style="">Vendidos</th>
                                    <th style="width: 110px;">Se vende con</th>
                                    {{-- <th style="width: 103px;">Opciones</th> --}}
                                    </thead>
                                    <tbody>
                                    @if(count($products) > 0)
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ Storage::url($product->picture) }}" alt="" class="rounded" width="50">
                                        </td>
                                        <td>{!! $product->description !!}</td>
                                        <td class="text-center">{!! $product->likes !!}</td>
                                        <td class="text-center">{!! $product->counter !!}</td>
                                        <td class="text-center">
                                            @if ($product->purchases > 0)
                                                {!! number_format($product->likes / $product->purchases, 2, ",", ".") !!} &nbsp;
                                                <i class="fas fa-thumbs-up"></i>
                                            @else
                                                --
                                            @endif
                                        </td>
                                        {{--  
                                        <td>
                                        @role('admin')
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-pill-left btn-info btn-sm">
                                                Editar
                                            </a>
                                            <a href="" data-toggle="modal" data-target="#confirm-modal-{{ $product->id }}" class="btn btn-pill-right btn-danger btn-sm">
                                                Borrar
                                            </a>
                                        @endrole                                            
                                        </td>
                                        --}}
                                    </tr>
                                    @include('products.delete_modal')
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
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
                "order": [[3, "desc"]]
            });
        } );
    </script>
@endpush