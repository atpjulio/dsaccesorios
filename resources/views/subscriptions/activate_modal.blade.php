<div class="modal-header bg-success">
    <h4 class="modal-title"><i class="fa fa-warning"></i> Activar Subscriptor</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{!! Form::open(['route' => ['subscriber.activate.process', $subscriber], 'method' => 'PATCH']) !!}
<div class="modal-body">
    <p>Confirma que deseas activar al subscriptor: </p>
    <div class="text-center">
        {!! $subscriber->email !!}
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success-outline">Si</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
</div>
{!! Form::close() !!}
