<div class="modal fade" id="confirm-modal-{{ $sliderImage->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title"><i class="fa fa-warning"></i> Borrar Imagen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => ['slider.destroy', $sliderImage->id], 'method' => 'DELETE']) !!}
            <div class="modal-body">
                <p>¿Confirma que deseas borrar la imagen? </p>
            </div>

            {!! Form::hidden('name', $sliderImage->url) !!}

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Si</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
