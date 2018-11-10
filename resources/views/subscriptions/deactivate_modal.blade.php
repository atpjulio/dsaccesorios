<div class="modal-header bg-warning">
    <h4 class="modal-title"><i class="fa fa-warning"></i> Desactivar Subscriptor</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{!! Form::open(['route' => ['subscriber.deactivate.process', $subscriber], 'method' => 'PATCH']) !!}
<div class="modal-body">
    <p>Confirma que deseas desactivar al subscriptor: </p>
    <div class="text-center">
        {!! $subscriber->email !!}
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-warning-outline">Si</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
</div>
{!! Form::close() !!}
