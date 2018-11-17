<div class="modal-header bg-danger">
    <h4 class="modal-title"><i class="fa fa-warning"></i> Borrar Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
<div class="modal-body">
    <p>Confirma que deseas borrar el producto: </p>
    <div class="text-center">
        {!! $product->name !!}
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Si</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
</div>
{!! Form::close() !!}
