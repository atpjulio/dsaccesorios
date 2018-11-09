<div class="modal-header bg-danger">
    <h4 class="modal-title"><i class="fa fa-warning"></i> Borrar Boletína</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{!! Form::open(['route' => ['bulletin.destroy', $bulletin], 'method' => 'DELETE']) !!}
<div class="modal-body">
    <p>Confirma que deseas borrar el boletín: </p>
    <div class="text-center">
        {!! $bulletin->title !!}
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-danger-outline">Si</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
</div>
{!! Form::close() !!}
