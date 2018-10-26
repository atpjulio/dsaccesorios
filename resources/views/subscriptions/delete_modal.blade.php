<div class="modal-header bg-danger">
    <h4 class="modal-title"><i class="fa fa-warning"></i> Borrar Subscriptor</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{!! Form::open(['route' => ['subscriber.destroy', $subscriber->id], 'method' => 'DELETE']) !!}
<div class="modal-body">
    <p>Confirma que deseas borrar al subscriptor: </p>
    <div class="text-center">
        {!! $subscriber->company !!}
    </div>
</div>

{!! Form::hidden('id', $subscriber->id) !!}

<div class="modal-footer">
    <button type="submit" class="btn btn-danger-outline">Si</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
</div>
{!! Form::close() !!}
