function setToCart(productId) {
    var quantity = $('#quantity' + productId).val();

    fillCart("quantity=" + quantity + "&product_id=" + productId);
}
