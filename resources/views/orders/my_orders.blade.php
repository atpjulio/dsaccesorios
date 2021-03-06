@extends('layouts.backend.template')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">
@endpush

@section('content')
    <div class="title-block">
        <div class="float-left">
            <h3 class="title"> Mis Pedidos </h3>
            <p class="title-description"> Listado de tus pedidos donde podrás ver los detalles de cada uno </p>
        </div>
        <div class="float-right animated fadeInRight">
            <a href="{{ route('store') }}" class="btn btn-pill-left btn-primary btn-lg">
                <i class="fas fa-shopping-cart"></i>
                Ir a la tienda
            </a>
        </div>        
    </div>

    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Mis pedidos guardados en el sistema </h3>
                        </div>
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
                                    <thead>
                                    <th style="width: 90px;">N° Pedido</th>
                                    <th class="">Productos</th>
                                    <th style="width: 120px;">Monto</th>
                                    <th style="width: 60px;">Fecha</th>
                                    <th style="width: 60px;">Estado</th>
                                    </thead>
                                    <tbody>
                                    @if(count($orders) > 0)
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('my.order', $order->id) }}">
                                                {!! $order->number !!}
                                            </a>
                                        </td>
                                        <td>{!! \App\Utilities::humanProducts($order->products) !!}</td>
                                        <td class="text-center">{!! \App\Utilities::currency($order->total) !!}</td>
                                        <td class="text-center">{!! \App\Utilities::humanDate($order->created_at) !!}</td>
                                        <td>
                                            {!! config('constants.transactions.frontEnd.'.$order->status) !!}
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
                "order": [[0, "desc"]]
            });
        } );
    </script>
@endpush