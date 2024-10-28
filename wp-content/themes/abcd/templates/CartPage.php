<?php
/* Template Name: Cart */
get_header(); ?>
<style>
    /** Cart page **/
    .woocommerce-cart-form {
        max-width: 440px;
        margin: 0 auto;
    }

    .cart_item {
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid black;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .cart_item .product-details, .cart_item .product-actions {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .cart_item .product-thumbnail {
        max-width: 115px;
    }

    .cart_item .product-details h3 {
        margin-top: 0;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: 500;
        margin-top: -2px;
    }

    .cart_item .product-actions {
        text-align: right;
        font-size: 12px;
    }

    .cart_item:first-child {
        border-top: 1px solid black;
        padding-top: 20px;
    }

    .cart_item .product-thumbnail img {
        width: auto;
    }

    .product-remove a {
        color: black !important;
        text-decoration: none;
        font-size: 15px;
        margin-top: -2px;
        display: block;
    }

    button[name="update_cart"] {
        display: none;
    }

    label.cart-label {
        text-transform: uppercase;
        font-weight: 400;
        letter-spacing: 0.5px;
        font-size: 10px;
        line-height: 17px;
        padding-right: 5px;
    }

    span.cart-value {
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 12px;
    }

    .cart-quantity {
        margin-bottom: 5px;
    }

    .woocommerce-cart-form .actions {
        margin-bottom: 20px;
    }

    .cart-subtotal {
        margin-bottom: 40px;
    }

    .cart-go-to-checkout a {
        background: black;
        width: 100%;
        display: block;
        text-align: center;
        color: white !important;
        text-decoration: none;
        padding: 12px 15px;
        font-size: 12px;
    }

    .cart-subtotal label.cart-label, .cart-total label.cart-label {
        font-size: 16px;
        font-weight: 500;
    }

    .woocommerce-cart-form .actions input, .preview-order-heading .actions input {
        border-color: black;
        border-top: none;
        border-left: navajowhite;
        border-right: none;
        border-radius: 0;
        font-size: 10px;
        width: 50%;
    }

    .woocommerce-cart-form .actions button, .preview-order-heading .actions button {
        background: transparent;
        border: none;
        font-weight: 600;
        padding-right: 0;
        padding-left: 10px;
        padding-bottom: 0;
        cursor: pointer;
        font-size: 12px;
        margin-bottom: 3px;
    }

    .woocommerce-cart .woocommerce-notices-wrapper {
        text-align: center;
        margin-bottom: 20px;
    }

    .woocommerce-cart .woocommerce-error {
        background-color: transparent;
        list-style: none;
        margin: 0;
        padding: 0;
        color: red;
    }

    .woocommerce-cart .woocommerce-message {
        background-color: transparent;
        font-size: 12px;
    }

    .woocommerce-cart .woocommerce-message a {
        color: black;
        font-weight: 500;
    }

    input.qty::-webkit-outer-spin-button, input.qty::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input.qty[type=number] {
        -moz-appearance: textfield;
        border: none;
        width: 35px;
        text-align: center;
        color: black;
        font-size: 10px;
        padding: 5px;
    }

    span.quantity-icon {
        color: black;
        cursor: pointer;
        padding: 0 5px;
        font-size: 10px;
    }

    .cart_item .product-details a {
        text-decoration: none;
        color: black;
        font-weight: 400;
        font-size: 10px;
        line-height: 15px;
        display: block;
    }

    .cart_item .product-details {
        width: 45%;
    }

    .cart-item-attributes {
        text-transform: capitalize;
        color: black;
        font-weight: 400;
        font-size: 10px;
    }

    .cart-empty.woocommerce-info {
        background: transparent;
        color: black;
        margin-top: 100px;
        text-align: center;
    }

    .return-to-shop a.button.wc-backward {
        background-color: black;
        color: white;
        text-decoration: none;
        padding: 10px 50px;
        margin: 50px auto 0;
        display: block;
        width: fit-content;
    }

    .list-coupons-applied {
        font-size: 10px;
    }

    input#coupon_code {
        border: none;
        line-height: 1em;
    }

    @media screen and (max-width: 480px) {
        .cart_item .product-details {
            padding-left: 10px;
        }

        .cart_item .product-details h3 {
            margin-top: -3px;
        }

        .cart_item .product-thumbnail {
            max-width: 80px;
        }
    }
</style>
<main id="primary" class="site-main">
    <div class="container">
        <article id="post-14" class="post-14 page type-page status-publish hentry">
            <header class="entry-header">
                <h1 class="entry-title">Cart</h1></header><!-- .entry-header -->
            <div class="entry-content">
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper"></div>
                    <form class="woocommerce-cart-form" action="https://lespoirstudios.com/cart/" method="post">
                        <div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                            <div class="list-product">
                                <div class="woocommerce-cart-form__cart-item cart_item">
                                    <div class="product-thumbnail"><a
                                                href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=white&amp;attribute_pa_size=s"><img
                                                    width="726" height="1038"
                                                    src="https://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-673308-726x1038.jpeg"
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                    alt="" decoding="async"></a></div>
                                    <div class="product-details">
                                        <h3>
                                            <a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=white&amp;attribute_pa_size=s">Heli
                                                Bodysuit White</a>
                                            <div class="cart-item-attributes"><span
                                                        class="attribute-value">white,s</span><br></div>
                                        </h3>
                                        <div class="product-quantity row middle"><span class="quantity-icon quantity-minus">-</span>
                                            <div class="quantity">
                                                <label class="screen-reader-text"
                                                       for="quantity_67153de48164e">Quantity</label>
                                                <input type="number" id="quantity_67153de48164e" class="input-text qty text"
                                                       name="cart[fde77ec9a06f5baa3b2d19bd1b4a3552][qty]" value="1"
                                                       aria-label="Product quantity" size="4" min="0" max="" step="1"
                                                       placeholder="" inputmode="numeric" autocomplete="off">
                                            </div>
                                            <span class="quantity-icon quantity-plus">+</span></div>
                                    </div>
                                    <div class="product-actions">
                                        <div class="product-remove"><a
                                                    href="https://lespoirstudios.com/cart/?remove_item=fde77ec9a06f5baa3b2d19bd1b4a3552&amp;_wpnonce=a19cdb0de7"
                                                    class="remove" aria-label="Remove Heli Bodysuit White from cart"
                                                    data-product_id="2627" data-product_sku=""><span
                                                        class="xoo-wsc-icon-trash"></span></a></div>
                                        <span class="product-price"><span class="woocommerce-Price-amount amount"><bdi>65&nbsp;<span
                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                    </div>
                                </div>
                                <div class="woocommerce-cart-form__cart-item cart_item">
                                    <div class="product-thumbnail"><a
                                                href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=white&amp;attribute_pa_size=l"><img
                                                    width="726" height="1038"
                                                    src="https://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-673308-726x1038.jpeg"
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                    alt="" decoding="async"></a></div>
                                    <div class="product-details">
                                        <h3>
                                            <a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=white&amp;attribute_pa_size=l">Heli
                                                Bodysuit White</a>
                                            <div class="cart-item-attributes"><span
                                                        class="attribute-value">white,l</span><br></div>
                                        </h3>
                                        <div class="product-quantity row middle"><span class="quantity-icon quantity-minus">-</span>
                                            <div class="quantity">
                                                <label class="screen-reader-text"
                                                       for="quantity_67153de481b22">Quantity</label>
                                                <input type="number" id="quantity_67153de481b22" class="input-text qty text"
                                                       name="cart[55d46606c917d0cca40ba439ad0eb52b][qty]" value="1"
                                                       aria-label="Product quantity" size="4" min="0" max="" step="1"
                                                       placeholder="" inputmode="numeric" autocomplete="off">
                                            </div>
                                            <span class="quantity-icon quantity-plus">+</span></div>
                                    </div>
                                    <div class="product-actions">
                                        <div class="product-remove"><a
                                                    href="https://lespoirstudios.com/cart/?remove_item=55d46606c917d0cca40ba439ad0eb52b&amp;_wpnonce=a19cdb0de7"
                                                    class="remove" aria-label="Remove Heli Bodysuit White from cart"
                                                    data-product_id="2627" data-product_sku=""><span
                                                        class="xoo-wsc-icon-trash"></span></a></div>
                                        <span class="product-price"><span class="woocommerce-Price-amount amount"><bdi>65&nbsp;<span
                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                    </div>
                                </div>
                                <div class="woocommerce-cart-form__cart-item cart_item">
                                    <div class="product-thumbnail"><a
                                                href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=black&amp;attribute_pa_size=s"><img
                                                    width="726" height="1038"
                                                    src="https://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-673308-726x1038.jpeg"
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                    alt="" decoding="async"></a></div>
                                    <div class="product-details">
                                        <h3>
                                            <a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=black&amp;attribute_pa_size=s">Heli
                                                Bodysuit White</a>
                                            <div class="cart-item-attributes"><span
                                                        class="attribute-value">black,s</span><br></div>
                                        </h3>
                                        <div class="product-quantity row middle"><span class="quantity-icon quantity-minus">-</span>
                                            <div class="quantity">
                                                <label class="screen-reader-text"
                                                       for="quantity_67153de481e3b">Quantity</label>
                                                <input type="number" id="quantity_67153de481e3b" class="input-text qty text"
                                                       name="cart[a44cbbdeb1ae92e36dfeb59c3b099e32][qty]" value="1"
                                                       aria-label="Product quantity" size="4" min="0" max="" step="1"
                                                       placeholder="" inputmode="numeric" autocomplete="off">
                                            </div>
                                            <span class="quantity-icon quantity-plus">+</span></div>
                                    </div>
                                    <div class="product-actions">
                                        <div class="product-remove"><a
                                                    href="https://lespoirstudios.com/cart/?remove_item=a44cbbdeb1ae92e36dfeb59c3b099e32&amp;_wpnonce=a19cdb0de7"
                                                    class="remove" aria-label="Remove Heli Bodysuit White from cart"
                                                    data-product_id="2627" data-product_sku=""><span
                                                        class="xoo-wsc-icon-trash"></span></a></div>
                                        <span class="product-price"><span class="woocommerce-Price-amount amount"><bdi>65&nbsp;<span
                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-quantity">
                                <div class="row space-between">
                                    <label class="cart-label">Quanity</label>
                                    <span class="cart-value">3 pieces</span>
                                </div>
                            </div>
                            <div class="actions">
                                <div class="coupon">
                                    <div class="row space-between bottom">
                                        <label class="cart-label" for="coupon_code">Promotion code:</label>
                                        <input type="text" name="coupon_code" class="input-text" id="coupon_code"
                                               value="" placeholder="Add Coupon code">
                                        <button type="submit" class="button" name="apply_coupon" value="Apply coupon">
                                            Apply
                                        </button>
                                    </div>
                                </div>
                                <button type="submit" class="button" name="update_cart" value="Update cart" disabled="">
                                    Update cart
                                </button>
                                <input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce"
                                       value="a19cdb0de7"><input type="hidden" name="_wp_http_referer" value="/cart/">
                            </div>
                            <div class="cart-subtotal">
                                <div class="row space-between">
                                    <label class="cart-label">Subtotal</label>
                                    <span class="cart-value"><span class="woocommerce-Price-amount amount"><bdi>195&nbsp;<span
                                                        class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                </div>
                            </div>
                            <div class="cart-go-to-checkout">
                                <a class="checkout-button button alt wc-forward"
                                   href="https://lespoirstudios.com/checkout/">
                                    Checkout </a>
                            </div>
                        </div>
                    </form>
                    <div class="cart-collaterals">
                    </div>

                </div>
            </div>
        </article>
    </div>
</main>

<?php get_footer() ?>
<script>
    $(document).ready(function() {
        // Lấy dữ liệu giỏ hàng từ localStorage
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];

        // Tạo HTML cho các mục trong giỏ hàng
        var cartHTML = '';
        $.each(cartItems, function(index, item) {
            cartHTML += `
      <div class="woocommerce-cart-form__cart-item cart_item">
        <div class="product-thumbnail">
          <a href="${item.link}">
            <img src="${item.image}" alt="${item.name}">
          </a>
        </div>
        <div class="product-details">
          <h3><a href="${item.link}">${item.name}</a></h3>
          <div class="cart-item-attributes">
            <span class="attribute-value">${item.color}, ${item.size}</span>
          </div>
          <div class="product-quantity row middle">
            <span class="quantity-icon quantity-minus" data-index="${index}">-</span>
            <div class="quantity">
              <input type="number" class="input-text qty text" name="cart[${index}][qty]" value="${item.quantity_current}" aria-label="Product quantity" size="4" min="0" max="${item.max_quantity}" step="1" placeholder="" inputmode="numeric" autocomplete="off">
            </div>
            <span class="quantity-icon quantity-plus" data-index="${index}">+</span>
          </div>
        </div>
        <div class="product-actions">
          <div class="product-remove">
            <a href="#" class="remove" aria-label="Remove item from cart" data-product-id="${item.id}" data-index="${index}">
              <span class="xoo-wsc-icon-trash">X</span>
            </a>
          </div>
          <span class="product-price">
            <span class="woocommerce-Price-amount amount">
              <bdi>${item.price.toFixed(2)}&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></bdi>
            </span>
          </span>
        </div>
      </div>
    `;
        });

        // Thêm HTML vào phần tử đại diện cho giỏ hàng
        $('.list-product').html(cartHTML);
        countQuantity();
        // Sự kiện khi nhấn nút xóa sản phẩm
        $('.product-remove a.remove').click(function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            var index = $(this).data('index');
            removeFromCart(index);
            countQuantity();
        });

        // Sự kiện khi nhấn nút tăng/giảm số lượng sản phẩm
        $('.quantity-icon').click(function() {
            var index = $(this).data('index');
            var currentQuantity = parseInt($(`input[name="cart[${index}][qty]"]`).val());
            if ($(this).hasClass('quantity-minus')) {
                updateCartQuantity(index, currentQuantity - 1);
            } else {
                updateCartQuantity(index, currentQuantity + 1);
            }
        });

        // Cập nhật tổng tiền
        updateCartTotal();
        countQuantity();
    });

    // Hàm xóa sản phẩm khỏi giỏ hàng
    function removeFromCart(index) {
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        cartItems.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cartItems));
        $(`[data-index="${index}"]`).closest('.woocommerce-cart-form__cart-item').remove();
        updateCartTotal();
        countQuantity();
    }

    // Hàm cập nhật số lượng sản phẩm trong giỏ hàng
    function updateCartQuantity(index, newQuantity) {
        if (newQuantity < 0) return;
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        cartItems[index].quantity_current = newQuantity;
        localStorage.setItem('cart', JSON.stringify(cartItems));
        $(`input[name="cart[${index}][qty]"]`).val(newQuantity);
        updateCartTotal();
        countQuantity();
    }

    // Hàm cập nhật tổng tiền trong giỏ hàng
    function updateCartTotal() {
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        var total = 0;
        $.each(cartItems, function(index, item) {
            total += item.price * item.quantity_current;
        });
        $('.cart-subtotal .cart-value').html(`<span class="woocommerce-Price-amount amount"><bdi>${total.toFixed(2)}&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></bdi></span>`);
    }

    function countQuantity() {
        var cartItems = JSON.parse(localStorage.getItem('cart')) || [];
        var totalQuantity = 0;
        $.each(cartItems, function(index, item) {
            totalQuantity += item.quantity_current;
        });
        $('.cart-quantity .cart-value').text(`${totalQuantity} pieces`);
    }
</script>
