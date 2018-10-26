function fillCart(queryParameters)
{
    $.get("/set-to-cart?" + queryParameters, function (data, status) {
        $('#dynamic-cart').html(data);
    });
}

function showModal(url) {
    $.get('/' + url, function( data ) {
        // console.log(data);
        $("#show-modal-body").html(data);
        $('#show-modal').modal('show');
    });
};
