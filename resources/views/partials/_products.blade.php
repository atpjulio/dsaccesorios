<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
        <thead>
        <th style="width: 50px;">Imagen</th>
        <th class="">Nombre</th>
        <th class="">Descripción</th>
        <th style="width: 60px;">Disponibles</th>
        <th style="width: 60px;">Vendidos</th>
        <th style="width: 103px;">Opciones</th>
        </thead>
        <tbody>
        @if(count($products) > 0)
        @foreach($products as $product)
        <tr>
            <td class="text-center">
                <a href="javascript:showModal('products/{{ $product->id }}')">
                    <img src="{{ Storage::url($product->picture) }}" alt="" class="rounded" width="50">
                </a>
            </td>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->description !!}</td>
            <td class="text-center">{!! $product->quantity !!}</td>
            <td class="text-center">{!! $product->counter !!}</td>
            <td>
            @role('admin')
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-pill-left btn-info btn-sm">
                    Editar
                </a>
                <a href="javascript:showModal('products-delete/{{ $product->id }}')" class="btn btn-pill-right btn-danger btn-sm">
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
@if (count($products) > 0)
<div class="float-right">
    {{ $products->links() }}
</div>
@endif
