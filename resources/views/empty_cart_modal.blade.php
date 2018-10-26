<div class="modal fade" id="empty-cart-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header table-danger">
                <h4 class="modal-title"><i class="fa fa-warning"></i> Vaciar carrito</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => 'empty.cart', 'method' => 'GET']) !!}
            <div class="modal-body">
                <p>¿Confirma que deseas vaciar el carrito de compras? </p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Si</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
