<div class="modal-header">
    <h4 class="modal-title"><i class="fa fa-eye"></i> Imagen de slider </h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
	<img src="{{ asset($sliderImage->url) }}" alt="{{ $sliderImage->text }}" class="img-fluid">
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
