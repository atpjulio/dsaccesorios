<div class="modal fade" id="status-modal-{{ $sliderImage->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if ($sliderImage->status == config('constants.status.active'))
                <div class="modal-header bg-info">
            @else
                <div class="modal-header bg-warning">
            @endif
                <h4 class="modal-title"><i class="fa fa-warning"></i> Cambiar Visibilidad de Imagen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => ['slider.update', $sliderImage->id], 'method' => 'PATCH']) !!}
            <div class="modal-body">
                <p>¿Confirma que deseas hacer {!! $sliderImage->status == config('constants.status.active') ? 'invisible' : 'visible' !!} la imagen? </p>
            </div>

            {!! Form::hidden('status', $sliderImage->status) !!}

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Si</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
