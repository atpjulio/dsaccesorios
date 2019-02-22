function fillProducts(search)
{
    $.get("/get-products/" + search, function (data, status) {
        $('#dynamic-products').html(data);
    });
}

$(document).ready(function() {
    $('#searching').on('change keyup', function (e) {
        if ($('#searching').val().length > 2) {
            fillProducts($('#searching').val());
        }
        if ($('#searching').val().length == 0) {
            window.location.href = '/products';
        }
    });
});


