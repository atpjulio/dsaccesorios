<div class="modal fade" id="text-modal-{{ $sliderImage->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title"><i class="fa fa-warning"></i> Cambiar Texto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => ['slider.update', $sliderImage->id], 'method' => 'PATCH']) !!}
            <div class="modal-body">
                <p>Por favor ingrese el nuevo texto para la imagen </p>
            </div>

            <div class="form-group mx-3">
                {!! Form::text('text', $sliderImage->text, ['class' => 'form-control', 'placeholder' => 'Texto mostrado en la parte baja de la imagen']) !!}
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cambiar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
