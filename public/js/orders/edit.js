$(document).ready(function() {
    $('#shipping').on('change', function (e) {
    	$('#shipping').val(parseFloat($('#shipping').val()).toFixed(2));
        $('#total').val( parseFloat(parseFloat($('#shipping').val()) + parseFloat($('#sub_total').val())).toFixed(2) );1
    });	
} );
