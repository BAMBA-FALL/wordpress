document.addEventListener('DOMContentLoaded', function () {
    var cartLink = document.querySelector('.header-cart');

    document.body.addEventListener('added_to_cart', function () {
        if (cartLink) {
            cartLink.classList.add('cart-updated');
            setTimeout(function () {
                cartLink.classList.remove('cart-updated');
            }, 600);
        }
    });
});
