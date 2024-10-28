<?php
/* Template Name: Checkout */
get_header(); ?>
<style>
    .checkout-col__right .woocommerce-cart-form {
        max-width: 440px;
        margin: 0 auto
    }

    .cart_item {
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid black;
        padding-bottom: 20px;
        margin-bottom: 20px
    }

    .cart_item .product-details, .cart_item .product-actions {
        display: flex;
        flex-direction: column;
        justify-content: space-between
    }

    .cart_item .product-thumbnail {
        max-width: 115px
    }

    .cart_item .product-details h3 {
        margin-top: 0;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: 500
    }

    .cart_item .product-actions {
        text-align: right;
        font-size: 12px
    }

    .cart_item .product-thumbnail img {
        width: auto
    }

    .product-remove a {
        color: black !important;
        text-decoration: none;
        font-size: 15px;
        margin-top: -2px;
        display: block
    }

    button[name="update_cart"] {
        display: none
    }

    label.cart-label {
        text-transform: uppercase;
        font-weight: 400;
        letter-spacing: 0.5px;
        font-size: 10px
    }

    span.cart-value {
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 12px
    }

    .cart-quantity {
        margin-bottom: 5px
    }

    .woocommerce-cart-form .actions {
        margin-bottom: 20px
    }

    .cart-subtotal {
        margin-bottom: 40px
    }

    .cart-go-to-checkout a {
        background: black;
        width: 100%;
        display: block;
        text-align: center;
        color: white !important;
        text-decoration: none;
        padding: 12px 15px;
        font-size: 12px
    }

    .cart-subtotal label.cart-label, .cart-total label.cart-label {
        font-size: 16px;
        font-weight: 500
    }

    .woocommerce-cart-form .actions input, .review-order-heading .actions input {
        border-color: black;
        border-top: none;
        border-left: navajowhite;
        border-right: none;
        border-radius: 0;
        font-size: 10px;
        width: 50%
    }

    .woocommerce-cart-form .actions button, .review-order-heading .actions button {
        background: transparent;
        border: none;
        font-weight: 600;
        padding-right: 0;
        padding-left: 10px;
        padding-bottom: 0;
        cursor: pointer;
        font-size: 12px;
        margin-bottom: 4px
    }

    .woocommerce-cart .woocommerce-notices-wrapper {
        text-align: center;
        margin-bottom: 20px
    }

    .woocommerce-cart .woocommerce-error {
        background-color: transparent;
        list-style: none;
        margin: 0;
        padding: 0;
        color: red
    }

    .woocommerce-cart .woocommerce-message {
        background-color: transparent;
        font-size: 12px
    }

    .woocommerce-cart .woocommerce-message a {
        color: black;
        font-weight: 500
    }

    input.qty::-webkit-outer-spin-button, input.qty::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0
    }

    input.qty[type=number] {
        -moz-appearance: textfield;
        border: none;
        width: 35px;
        text-align: center;
        color: black;
        font-size: 10px;
        padding: 5px
    }

    span.quantity-icon {
        color: black;
        cursor: pointer;
        padding: 0 5px;
        font-size: 10px
    }

    .cart_item .product-details a {
        text-decoration: none;
        color: black;
        font-weight: 400;
        font-size: 10px
    }

    .cart_item .product-details {
        width: 45%
    }

    .cart-item-attributes {
        text-transform: capitalize;
        color: black;
        font-weight: 400;
        font-size: 10px
    }

    .cart-empty.woocommerce-info {
        background: transparent;
        color: black;
        margin-top: 100px;
        text-align: center
    }

    .return-to-shop a.button.wc-backward {
        background-color: black;
        color: white;
        text-decoration: none;
        padding: 10px 50px;
        margin: 50px auto 0;
        display: block;
        width: fit-content
    }

    .list-coupons-applied {
        font-size: 10px
    }

    .woocommerce-checkout h1.entry-title {
        text-align: center;
        font-size: 10px;
        font-weight: 400;
        text-transform: uppercase;
        margin: 70px 0
    }

    .checkout-heading {
        text-transform: uppercase;
        font-weight: 400;
        font-size: 10px;
        color: black;
        margin-bottom: 40px;
        margin-top: 0
    }

    .checkout-login-form label {
        display: block;
        color: black;
        font-size: 10px
    }

    .checkout-login-form input {
        border-left: 0 !important;
        border-right: 0 !important;
        border-top: 0 !important;
        border-bottom: 1px solid black !important;
        width: 100%;
        border-radius: 0 !important
    }

    .wrap-checkout-page {
        max-width: 1041px;
        margin: 0 auto
    }

    .checkout-login-form .woocommerce-form-login__rememberme {
        display: flex;
        justify-content: left
    }

    .checkout-login-form .woocommerce-form-login__rememberme input {
        width: 17px;
        margin-right: 10px
    }

    .checkout-login-form p.lost_password {
        order: 3;
        position: relative;
        margin: 0
    }

    .checkout-login-form .woocommerce-form-login {
        display: flex !important;
        flex-flow: wrap;
        margin-bottom: -1.5em
    }

    .checkout-login-form .woocommerce-form-login > * {
        width: 100%
    }

    .checkout-login-form .woocommerce-form-login .form-row {
        order: 4;
        margin-top: 0
    }

    .checkout-login-form .woocommerce-form-login .form-row.form-row-last {
        order: 2
    }

    .checkout-login-form .woocommerce-form-login .form-row.form-row-first {
        order: 1
    }

    .checkout-login-form p.lost_password a {
        position: absolute;
        right: 0;
        color: black;
        text-transform: uppercase;
        text-decoration: none;
        font-size: 10px
    }

    .checkout-login-form {
        margin-bottom: 100px
    }

    .checkout-register-form {
        margin-bottom: 90px
    }

    .woocommerce-checkout .woocommerce-notices-wrapper {
        text-align: center
    }

    .woocommerce-checkout .woocommerce-notices-wrapper ul {
        margin: 0 auto 50px;
        padding: 0;
        width: fit-content
    }

    .woocommerce-checkout .woocommerce-notices-wrapper ul.woocommerce-error {
        color: red
    }

    .checkout-col__left {
        padding-right: 40px
    }

    .checkout-col__right {
        padding-left: 40px
    }

    .checkout-col__right .actions {
        margin-bottom: 20px
    }

    .checkout-col__right .cart-subtotal {
        margin-bottom: 20px
    }

    .checkout-col__right .woocommerce-info {
        position: absolute;
        left: 0;
        right: 0;
        margin: 0 auto;
        top: -40px;
        text-align: center
    }

    .woocommerce-checkout .woocommerce-notices-wrapper .woocommerce-message {
        margin-bottom: 45px
    }

    .wrap-checkout-fields {
        max-width: 478px;
        margin: 0 auto
    }

    .wrap-checkout-fields .cart-total.no-shipping-fee {
        display: block !important
    }

    .woocommerce-billing-fields h3 {
        display: none
    }

    .woocommerce-billing-fields span.optional {
        display: none
    }

    .woocommerce-billing-fields .form-row label {
        display: block;
        font-size: 10px
    }

    .woocommerce-billing-fields .form-row input {
        border-left: 0;
        border-top: 0;
        border-right: 0;
        border-color: black;
        border-radius: 0;
        width: 100%;
        font-size: 12px;
        color: black
    }

    .woocommerce-billing-fields .checkout-title label {
        margin: 50px 0
    }

    .checkout-continue-btn label {
        max-width: 180px;
        background-color: black;
        color: white;
        margin: 0 auto;
        padding: 7px;
        cursor: pointer;
        transition: all .3s;
        border: 1px solid black
    }

    .woocommerce-billing-fields .form-row {
        display: none;
        width: 100%
    }

    .woocommerce-billing-fields .form-row.active {
        display: block !important;
        float: none !important
    }

    .checkout-results p {
        margin-top: 0;
        margin-bottom: 10px;
        color: black
    }

    .checkout-results {
        background-color: #FCFCFA;
        padding: 28px;
        margin: 0
    }

    .checkout-step-title {
        margin: 50px 0 35px
    }

    .woocommerce-billing-fields .form-row select {
        width: 100% !important;
        padding: 7px 0px !important;
        border-top: 0 !important;
        border-left: 0 !important;
        border-radius: 0 !important;
        border-right: 0 !important;
        border-color: black;
        height: auto !important;
        position: relative !important;
        border-bottom: 1px solid black !important;
        font-size: 10px
    }

    span.select2-selection.select2-selection--single {
        padding: 5px 0;
        height: auto;
        border-left: 0;
        border-right: 0;
        border-top: 0;
        border-radius: 0;
        border-color: black
    }

    .select2-selection__rendered {
        padding: 0 !important
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px
    }

    span.select2.select2-container {
        display: none !important
    }

    .woocommerce-billing-fields .form-row:not(.active) {
        display: none !important
    }

    .form-row.step {
        background-color: transparent;
        text-align: center
    }

    #billing_shipping_info_results_field.active p.step-result__title {
        font-weight: 400
    }

    .step p.step-result__content {
        font-size: 10px
    }

    .text-uppercase {
        text-transform: uppercase
    }

    form.woocommerce-checkout ul[role="alert"] {
        list-style: none;
        padding: 0;
        margin: 10px auto 20px;
        text-align: center
    }

    .wrap-checkout-fields .review-order-heading div.cart-subtotal {
        margin-bottom: 15px;
        border-top: 1px solid black;
        margin-top: 10px;
        padding-top: 10px
    }

    span.edit-cart {
        text-transform: uppercase;
        cursor: pointer;
        font-size: 10px
    }

    .wrap-checkout-fields .review-order-heading > div {
        margin-bottom: 10px
    }

    .wrap-checkout-fields .review-order-heading > div.cart-quantity {
        margin-bottom: 0
    }

    .only-show-products .checkout-col__left {
        display: none
    }

    .only-show-products > .row {
        justify-content: center
    }

    .only-show-products .review-order-heading {
        display: none
    }

    div#payment {
        background-color: #f9f9f9;
        padding: 0 28px 28px;
        display: none
    }

    .billing-payment-results.active ~ #payment {
        display: block
    }

    #payment ul {
        list-style: none;
        margin: 0 auto;
        color: black;
        padding: 0
    }

    #payment p {
        margin-bottom: 0
    }

    .billing-payment-results.step {
        background-color: #f9f9f9;
        padding-bottom: 10px
    }

    .cta-btn-black.update-cart-btn {
        width: 100%;
        text-align: center;
        max-width: 440px;
        margin-top: 30px
    }

    .only-show-products .cart_item {
        border-top: 1px solid black;
        padding-top: 20px;
        border-bottom: none;
        padding-bottom: 0
    }

    .only-show-products .update-cart-btn {
        display: block !important
    }

    .checkout-col__right .cart-shipping-fee, .checkout-col__right .cart-shipping-method {
        display: none
    }

    ul.wc_payment_methods.payment_methods.methods li label {
        text-transform: uppercase;
        position: relative;
        top: -3px
    }

    ul.wc_payment_methods.payment_methods.methods li {
        margin-bottom: 10px;
        border: 1px solid #606060;
        padding: 10px 15px;
        background-color: white;
        font-size: 10px
    }

    ul.wc_payment_methods.payment_methods.methods li p {
        margin-top: 0
    }

    ul.wc_payment_methods.payment_methods.methods li:last-child {
        margin-bottom: 0
    }

    .wrap-checkout-fields .cart-total {
        margin-top: 20px
    }

    .show-shipping-fee .cart-total.no-shipping-fee {
        display: none !important
    }

    .show-shipping-fee .cart-total.included-shipping-fee {
        display: block !important
    }

    .show-tax .cart-tax {
        display: block !important
    }

    .review-order-heading + .woocommerce-message {
        display: none
    }

    .show-shipping-fee .cart-shipping-fee, .show-shipping-fee .cart-shipping-method {
        display: block !important
    }

    .wrap-checkout-lander.only-show-products .checkout-col__right {
        display: block !important
    }

    ul.wc_payment_methods.payment_methods.methods li label img {
        width: 60px;
        position: relative;
        top: 6px
    }

    p.checkout-sub-heading {
        font-size: 10px
    }

    a.cta-btn-border:hover {
        background-color: black;
        color: white
    }

    .checkout-continue-btn label:hover {
        background-color: white;
        color: black
    }

    .wrap-step-result {
        font-size: 10px
    }

    p#billing_country_field {
        order: 4;
    }

    .cart_item .product-details a {
        line-height: 17px
    }

    .cart_item .product-details h3 {
        margin-top: -5px
    }

    ul#shipping_method {
        list-style: none;
        margin: 0;
        border: 1px solid #606060;
        padding: 10px 15px;
        background-color: white;
        font-size: 10px
    }

    ul#shipping_method li {
        display: flex;
        border-bottom: 1px solid #dcdcdc;
        margin-bottom: 5px;
        padding-bottom: 5px;
        text-align: left;
        line-height: 1.5em
    }

    ul#shipping_method li input {
        width: 13px;
        margin-right: 5px
    }

    #billing_shipping_info_results_field {
        background-color: #f9f9f9
    }

    ul#shipping_method label {
        text-transform: uppercase
    }

    .woocommerce-billing-fields__field-wrapper {
        display: flex;
        flex-wrap: wrap
    }

    .woocommerce-billing-fields__field-wrapper > * {
        width: 100%;
        order: 1
    }

    p#billing_first_name_field {
        order: 2
    }

    p#billing_last_name_field {
        order: 3
    }

    p#billing_phone_field {
        order: 4
    }

    p#billing_state_field {
        order: 5
    }

    p#billing_city_field {
        order: 6
    }

    p#billing_address_2_field {
        order: 7
    }

    p#billing_address_1_field {
        order: 8
    }

    p#billing_postcode_field {
        order: 9
    }

    p#billing_customer_note_field {
        order: 10
    }

    p#billing_shipping_details_continue_btn_field {
        order: 11
    }

    p#billing_shipping_details_results_field {
        order: 12
    }

    p#billing_shipping_info_title_field {
        order: 13
    }

    p#billing_shipping_info_results_field {
        order: 14
    }

    p#billing_shipping_info_continue_btn_field {
        order: 15
    }

    p#billing_payment_title_field {
        order: 16
    }

    p#billing_payment_results_field {
        order: 17
    }

    div#payment {
        order: 18
    }

    p#billing_payment_continue_btn_field {
        order: 19
    }

    .wrap-checkout-fields .review-order-products {
        display: none
    }

    .woocommerce-NoticeGroup.woocommerce-NoticeGroup-updateOrderReview {
        display: none
    }

    .body-review-order ~ .woocommerce-message {
        display: none
    }

    ul#shipping_method li:last-child {
        border: none;
        margin-bottom: 0;
        padding-bottom: 0
    }

    input#coupon_code {
        border: none;
        line-height: 1em;
        padding-top: 0;
        position: relative;
        top: -1px;
        color: black;
        width: 100%
    }

    .actions label {
        margin-top: 8px
    }

    .wrap-input {
        width: 53%;
        position: relative
    }

    .actions label.cart-label {
        width: 25%
    }

    .actions span.cart-value {
        width: 23%;
        text-align: right
    }

    span.coupon-msg {
        position: absolute;
        bottom: -15px;
        left: 3px
    }

    .coupon-error-msg {
        background-image: url(../images/close-icon.svg);
        background-repeat: no-repeat;
        background-position: left;
        padding-left: 14px;
        background-size: 13px;
        cursor: pointer
    }

    .woocommerce-order-received .woocommerce-order {
        max-width: 478px;
        margin: 0 auto;
        text-align: center;
        font-size: 10px
    }

    ul.woocommerce-order-overview.woocommerce-thankyou-order-details.order_details {
        margin: 0 0 20px 0;
        padding: 0;
        list-style: none;
        text-align: center
    }

    .woocommerce-order-received .woocommerce-cart-form__cart-item.cart_item {
        text-align: left
    }

    ul.woocommerce-order-overview.woocommerce-thankyou-order-details.order_details + h1 {
        margin-bottom: 30px;
        margin-top: 45px
    }

    .woocommerce-order-received .woocommerce-cart-form__cart-item.cart_item:last-child {
        border-bottom: none
    }

    .woocommerce-order-received .woocommerce-cart-form__cart-item.cart_item:first-child {
        border-top: 1px solid black;
        padding-top: 15px
    }

    ul.woocommerce-order-overview.woocommerce-thankyou-order-details.order_details + h1 {
        display: none
    }

    .body-review-order + .woocommerce-error {
        display: none
    }

    @media screen and (max-width: 1024px) {
        .woocommerce-checkout h1.entry-title {
            margin-top: 40px;
            margin-bottom: 40px
        }
    }

    @media screen and (max-width: 870px) {
        .cart_item .product-details {
            padding-left: 5px
        }
    }

    @media screen and (max-width: 768px) {
        .checkout-col__right {
            display: none
        }

        .checkout-col__left {
            padding: 0;
            max-width: 480px;
            margin: 0 auto;
            display: flex;
            flex-flow: wrap
        }

        body:not(.logged-in) .woocommerce-checkout h1.entry-title {
            display: none
        }

        .checkout-login-form {
            order: 2
        }

        .checkout-as-guest.text-center {
            order: 1;
            margin-bottom: 60px;
            padding-top: 15px
        }

        .checkout-register-form {
            order: 3
        }

        .checkout-col__left > div {
            width: 100%
        }

        .wrap-checkout-fields .review-order-products {
            display: block
        }

        .cart-total.no-shipping-fee.desktop {
            display: none !important
        }

        .wrap-checkout-fields .review-order-heading div.cart-subtotal {
            border-top: none
        }

        .wrap-checkout-fields .cart-total {
            margin-top: 0
        }

        .review-order-bar {
            text-transform: uppercase;
            font-weight: 500;
            font-size: 14px;
            background-color: #FCFCFA;
            padding: 15px;
            letter-spacing: 1.4px;
            margin-bottom: 60px
        }

        .review-order-bar span.cart-value {
            font-size: 14px;
            letter-spacing: 1.4px
        }

        .review-order-heading {
            border-top: 1px solid black;
            padding-top: 15px
        }

        .wrap-checkout-fields .review-order-heading > div.line {
            margin-top: 15px;
            margin-bottom: 15px
        }

        span.toggle-order-summary {
            background-image: url(../images/back-icon.svg);
            background-repeat: no-repeat;
            width: 20px;
            height: 15px;
            display: inline-block;
            transform: rotate(-90deg);
            background-size: contain;
            background-position: 3px
        }

        .wrap-review-order {
            display: none;
            padding: 0 15px;
            position: absolute;
            width: 100%;
            background-color: white;
            z-index: 1;
            top: 50px
        }

        .woocommerce-billing-fields {
        }

        .body-review-order {
            position: relative
        }

        .review-order-products .product-thumbnail {
            width: 15%
        }

        .review-order-products .product-details {
            width: 63%
        }

        .active span.toggle-order-summary {
            transform: rotate(90deg);
            background-position: 7px
        }

        #billing_email_title_field {
            margin-top: 0
        }

        .wrap-review-order .cart-total.desktop {
            display: none !important
        }

        .review-order-products .cart_item {
            border: none;
            padding-bottom: 0;
            margin-bottom: 15px
        }

        .cart_item .product-thumbnail img {
            height: auto
        }

        .review-order-bar__label {
            white-space: nowrap
        }

        .woocommerce-checkout h1.entry-title {
            margin-top: 0;
            padding-top: 25px
        }

        .woocommerce-checkout h1.entry-title.active {
            display: block;
            padding-top: 30px;
            margin-top: 0
        }
    }

    @media screen and (max-width: 480px) {
        .wrap-checkout-fields .review-order-heading > div.line {
            margin-top: 10px;
            margin-bottom: 15px
        }

        .wrap-checkout-fields .review-order-heading div.cart-subtotal {
            margin-bottom: 5px
        }

        .review-order-products .cart_item {
            margin-bottom: 5px
        }

        .review-order-products .product-thumbnail {
            min-width: 66px
        }

        .review-order-products .cart_item .product-actions {
            font-size: 10px
        }

        .wrap-review-order {
            padding: 0
        }

        .woocommerce-cart-form .actions input, .review-order-heading .actions input {
            width: 45%
        }

        .review-order-bar {
            margin: 0 -15px 50px
        }
    }

    @media screen and (max-width: 375px) {
        .review-order-bar {
            font-size: 12px
        }

        .review-order-bar span.cart-value {
            font-size: 14px
        }

        span.toggle-order-summary {
            height: 12px;
            width: 13px;
            background-position: 1px
        }

        .active span.toggle-order-summary {
            background-position: 5px
        }
    }
</style>
<main id="primary" class="site-main">
    <div class="container">
        <article id="post-15" class="post-15 page type-page status-publish hentry">
            <header class="entry-header">
                <h1 class="entry-title">Checkout</h1></header><!-- .entry-header -->
            <div class="entry-content">
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="wrap-checkout-page">
                        <div class="wrap-checkout-lander">
                            <div class="row">
                                <div class="checkout-col__left col-6">
                                    <div class="checkout-login-form">
                                        <h3 class="checkout-heading text-center">Log in to existing account</h3>
                                        <form class="woocommerce-form woocommerce-form-login login" method="post"
                                              style="display:none;">

                                            <p class="form-row form-row-first">
                                                <label for="username">Username or email&nbsp;<span
                                                            class="required">*</span></label>
                                                <input type="text" class="input-text" name="username" id="username"
                                                       autocomplete="username">
                                            </p>
                                            <p class="form-row form-row-last">
                                                <label for="password">Password&nbsp;<span
                                                            class="required">*</span></label>
                                                <span class="password-input"><input class="input-text woocommerce-Input"
                                                                                    type="password" name="password"
                                                                                    id="password"
                                                                                    autocomplete="current-password"><span
                                                            class="show-password-input"></span></span>
                                            </p>
                                            <div class="clear"></div>

                                            <p class="form-row">
                                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                                           name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"> <span>Remember me</span>
                                                </label>
                                                <input type="hidden" id="woocommerce-login-nonce"
                                                       name="woocommerce-login-nonce" value="b224f029df"><input
                                                        type="hidden" name="_wp_http_referer" value="/checkout/"> <input
                                                        type="hidden" name="redirect"
                                                        value="https://lespoirstudios.com/checkout/">
                                                <button type="submit"
                                                        class="woocommerce-button button woocommerce-form-login__submit"
                                                        name="login" value="Login">Login
                                                </button>
                                            </p>
                                            <p class="lost_password">
                                                <a href="https://lespoirstudios.com/my-account/lost-password/">Lost your
                                                    password?</a>
                                            </p>
                                            <div class="clear"></div>
                                        </form>
                                    </div>

                                    <div class="checkout-register-form text-center">
                                        <h3 class="checkout-heading">Become our customers</h3>
                                        <p class="checkout-sub-heading">Creating an account is easy. Just fill in the
                                            form and enjoy the benefits of having an account</p>
                                        <a href="/register" class="cta-btn-border">Register</a>
                                    </div>

                                    <div class="checkout-as-guest text-center">
                                        <h3 class="checkout-heading">Checkout As Guest</h3>
                                        <span class="cta-btn-black">Checkout</span>
                                    </div>
                                </div>
                                <div class="checkout-col__right body-review-order col-6" style="">
                                    <div class="woocommerce-cart-form">
                                        <div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">

                                            <div class="review-order-bar mobile">
                                                <div class="row middle space-between">
                                                    <div class="review-order-bar__label p-l-0 col-xs-6 col-6">
                                                        order summary <span class="toggle-order-summary"></span>
                                                    </div>
                                                    <div class="review-order-bar__price p-r-0 col-xs-6 col-6 text-right">
                                                        <div class="cart-total no-shipping-fee" style="display: none;">
                                                            <span class="cart-value"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                        </div>

                                                        <div class="cart-total included-shipping-fee"
                                                             style="display: none;">
                                                            <span class="cart-value"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wrap-review-order">
                                                <div class="review-order-heading">
                                                    <div class="cart-subtotal desktop">
                                                        <div class="row space-between">
                                                            <label class="cart-label">Subtotal</label>
                                                            <span class="cart-value"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                        </div>
                                                    </div>


                                                    <div class="cart-quantity">
                                                        <div class="row space-between">
                                                            <label class="cart-label">Quanity</label>
                                                            <span class="cart-value">6 pieces</span>
                                                        </div>
                                                    </div>

                                                    <div class="actions">
                                                        <div class="coupon">
                                                            <div class="row space-between bottom">
                                                                <label class="cart-label" for="coupon_code">Promotion
                                                                    code:</label>
                                                                <div class="wrap-input">
                                                                    <input type="text" name="coupon_code"
                                                                           class="input-text" id="coupon_code" value=""
                                                                           placeholder="Add Coupon code">
                                                                </div>
                                                                <button type="submit" class="button" name="apply_coupon"
                                                                        value="Apply coupon">Apply
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="button" name="update_cart"
                                                                value="Update cart">Update cart
                                                        </button>


                                                        <input type="hidden" id="woocommerce-cart-nonce"
                                                               name="woocommerce-cart-nonce" value="59e49e7c7d"><input
                                                                type="hidden" name="_wp_http_referer"
                                                                value="/wp-admin/admin-ajax.php">
                                                    </div>

                                                    <div class="cart-shipping-fee" style="display: none;">
                                                        <div class="row space-between">
                                                            <label class="cart-label">SHIPPING FEE</label>
                                                            <span class="cart-value">Free!</span>
                                                        </div>
                                                    </div>

                                                    <div class="cart-shipping-method" style="display: none;">
                                                        <div class="row space-between">
                                                            <label class="cart-label">SHIPPING METHOD</label>
                                                            <span class="cart-value">Standard (7-9 working days)</span>
                                                        </div>
                                                    </div>

                                                    <div class="cart-tax" style="display: none;">
                                                        <div class="row space-between">
                                                            <label class="cart-label">TAX</label>
                                                            <span class="cart-value">INCLUDED</span>
                                                        </div>
                                                    </div>

                                                    <div class="cart-total no-shipping-fee desktop"
                                                         style="display: none;">
                                                        <div class="row space-between">
                                                            <label class="cart-label">Total</label>
                                                            <span class="cart-value"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                        </div>
                                                    </div>

                                                    <div class="cart-total included-shipping-fee desktop"
                                                         style="display: none;">
                                                        <div class="row space-between">
                                                            <label class="cart-label">Total</label>
                                                            <span class="cart-value"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                        </div>
                                                    </div>

                                                    <div class="cart-subtotal mobile">
                                                        <div class="row space-between">
                                                            <label class="cart-label">Subtotal</label>
                                                            <span class="cart-value"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                        </div>
                                                    </div>

                                                    <div class="line"></div>
                                                </div>
                                                <div class="review-order-products">
                                                    <div class="woocommerce-cart-form__cart-item cart_item">
                                                        <div class="product-thumbnail"><a
                                                                    href="https://lespoirstudios.com/product/dessy-dress/?attribute_pa_size=l&amp;attribute_pa_color=black"><img
                                                                        width="640" height="915"
                                                                        src="http://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-672813-726x1038.jpeg"
                                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                        alt="" decoding="async" loading="lazy"></a>
                                                        </div>
                                                        <div class="product-details">
                                                            <h3>
                                                                <a href="https://lespoirstudios.com/product/dessy-dress/?attribute_pa_size=l&amp;attribute_pa_color=black">Dessy
                                                                    Dress</a>
                                                                <div class="cart-item-attributes"><span
                                                                            class="attribute-value">l,black</span><br>
                                                                </div>
                                                            </h3>
                                                            <div class="product-quantity row middle"><span
                                                                        class="quantity-icon quantity-minus">-</span>
                                                                <div class="quantity">
                                                                    <label class="screen-reader-text"
                                                                           for="quantity_671fba68c3bc9">Quantity</label>
                                                                    <input type="number" id="quantity_671fba68c3bc9"
                                                                           class="input-text qty text"
                                                                           name="cart[7abed2392449bb11cdf03d3bec4e49c9][qty]"
                                                                           value="6" aria-label="Product quantity"
                                                                           size="4" min="0" max="" step="1"
                                                                           placeholder="" inputmode="numeric"
                                                                           autocomplete="off">
                                                                </div>
                                                                <span class="quantity-icon quantity-plus">+</span></div>
                                                        </div>
                                                        <div class="product-actions">
                                                            <div class="product-remove"><a
                                                                        href="https://lespoirstudios.com/cart/?remove_item=7abed2392449bb11cdf03d3bec4e49c9&amp;_wpnonce=59e49e7c7d"
                                                                        class="remove"
                                                                        aria-label="Remove Dessy Dress from cart"
                                                                        data-product_id="2665" data-product_sku=""><span
                                                                            class="xoo-wsc-icon-trash"></span></a></div>
                                                            <span class="product-price"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="cta-btn-black update-cart-btn"
                                          style="display: none;">Update cart</span>
                                </div>
                            </div>
                        </div><!-- end .wrap-checkout-lander -->

                        <div class="wrap-checkout-fields" style="display: none;">
                            <span class="edit-cart desktop">Edit / view cart</span>

                            <div class="body-review-order">
                                <div class="woocommerce-cart-form">

                                    <div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">

                                        <div class="review-order-bar mobile">
                                            <div class="row middle space-between">
                                                <div class="review-order-bar__label p-l-0 col-xs-6 col-6">
                                                    order summary <span class="toggle-order-summary"></span>
                                                </div>
                                                <div class="review-order-bar__price p-r-0 col-xs-6 col-6 text-right">
                                                    <div class="cart-total no-shipping-fee" style="display: none;">
                                                        <span class="cart-value"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                    </div>

                                                    <div class="cart-total included-shipping-fee"
                                                         style="display: none;">
                                                        <span class="cart-value"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wrap-review-order">
                                            <div class="review-order-heading">
                                                <div class="cart-subtotal desktop">
                                                    <div class="row space-between">
                                                        <label class="cart-label">Subtotal</label>
                                                        <span class="cart-value"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                    </div>
                                                </div>


                                                <div class="cart-quantity">
                                                    <div class="row space-between">
                                                        <label class="cart-label">Quanity</label>
                                                        <span class="cart-value">6 pieces</span>
                                                    </div>
                                                </div>

                                                <div class="actions">
                                                    <div class="coupon">
                                                        <div class="row space-between bottom">
                                                            <label class="cart-label" for="coupon_code">Promotion
                                                                code:</label>
                                                            <div class="wrap-input">
                                                                <input type="text" name="coupon_code" class="input-text"
                                                                       id="coupon_code" value=""
                                                                       placeholder="Add Coupon code">
                                                            </div>
                                                            <button type="submit" class="button" name="apply_coupon"
                                                                    value="Apply coupon">Apply
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="button" name="update_cart"
                                                            value="Update cart">Update cart
                                                    </button>


                                                    <input type="hidden" id="woocommerce-cart-nonce"
                                                           name="woocommerce-cart-nonce" value="59e49e7c7d"><input
                                                            type="hidden" name="_wp_http_referer"
                                                            value="/wp-admin/admin-ajax.php">
                                                </div>

                                                <div class="cart-shipping-fee" style="display: none;">
                                                    <div class="row space-between">
                                                        <label class="cart-label">SHIPPING FEE</label>
                                                        <span class="cart-value">Free!</span>
                                                    </div>
                                                </div>

                                                <div class="cart-shipping-method" style="display: none;">
                                                    <div class="row space-between">
                                                        <label class="cart-label">SHIPPING METHOD</label>
                                                        <span class="cart-value">Standard (7-9 working days)</span>
                                                    </div>
                                                </div>

                                                <div class="cart-tax" style="display: none;">
                                                    <div class="row space-between">
                                                        <label class="cart-label">TAX</label>
                                                        <span class="cart-value">INCLUDED</span>
                                                    </div>
                                                </div>

                                                <div class="cart-total no-shipping-fee desktop" style="display: none;">
                                                    <div class="row space-between">
                                                        <label class="cart-label">Total</label>
                                                        <span class="cart-value"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                    </div>
                                                </div>

                                                <div class="cart-total included-shipping-fee desktop"
                                                     style="display: none;">
                                                    <div class="row space-between">
                                                        <label class="cart-label">Total</label>
                                                        <span class="cart-value"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                    </div>
                                                </div>

                                                <div class="cart-subtotal mobile">
                                                    <div class="row space-between">
                                                        <label class="cart-label">Subtotal</label>
                                                        <span class="cart-value"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                    </div>
                                                </div>

                                                <div class="line"></div>
                                            </div>
                                            <div class="review-order-products">
                                                <div class="woocommerce-cart-form__cart-item cart_item">
                                                    <div class="product-thumbnail"><a
                                                                href="https://lespoirstudios.com/product/dessy-dress/?attribute_pa_size=l&amp;attribute_pa_color=black"><img
                                                                    width="640" height="915"
                                                                    src="http://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-672813-726x1038.jpeg"
                                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                    alt="" decoding="async" loading="lazy"></a></div>
                                                    <div class="product-details">
                                                        <h3>
                                                            <a href="https://lespoirstudios.com/product/dessy-dress/?attribute_pa_size=l&amp;attribute_pa_color=black">Dessy
                                                                Dress</a>
                                                            <div class="cart-item-attributes"><span
                                                                        class="attribute-value">l,black</span><br></div>
                                                        </h3>
                                                        <div class="product-quantity row middle"><span
                                                                    class="quantity-icon quantity-minus">-</span>
                                                            <div class="quantity">
                                                                <label class="screen-reader-text"
                                                                       for="quantity_671fba68c3bc9">Quantity</label>
                                                                <input type="number" id="quantity_671fba68c3bc9"
                                                                       class="input-text qty text"
                                                                       name="cart[7abed2392449bb11cdf03d3bec4e49c9][qty]"
                                                                       value="6" aria-label="Product quantity" size="4"
                                                                       min="0" max="" step="1" placeholder=""
                                                                       inputmode="numeric" autocomplete="off">
                                                            </div>
                                                            <span class="quantity-icon quantity-plus">+</span></div>
                                                    </div>
                                                    <div class="product-actions">
                                                        <div class="product-remove"><a
                                                                    href="https://lespoirstudios.com/cart/?remove_item=7abed2392449bb11cdf03d3bec4e49c9&amp;_wpnonce=59e49e7c7d"
                                                                    class="remove"
                                                                    aria-label="Remove Dessy Dress from cart"
                                                                    data-product_id="2665" data-product_sku=""><span
                                                                        class="xoo-wsc-icon-trash"></span></a></div>
                                                        <span class="product-price"><span
                                                                    class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                            class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="cta-btn-black update-cart-btn" style="display: none;">Update cart</span>
                            </div>

                            <form name="checkout" method="post"
                                  class="checkout woocommerce-checkout"
                                  action="https://lespoirstudios.com/checkout/"
                                  enctype="multipart/form-data" novalidate="novalidate">
                                <div id="order_review" class="woocommerce-checkout-review-order hidden">
                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                Dessy Dress&nbsp; <strong class="product-quantity">×&nbsp;6</strong>
                                                <dl class="variation">
                                                    <dt class="variation-Size">Size:</dt>
                                                    <dd class="variation-Size"><p>L</p>
                                                    </dd>
                                                    <dt class="variation-ColorPattern">Color/Pattern:</dt>
                                                    <dd class="variation-ColorPattern"><p>Black</p>
                                                    </dd>
                                                </dl>
                                            </td>
                                            <td class="product-total">
                                                <span class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>

                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span>
                                            </td>
                                        </tr>


                                        <tr class="woocommerce-shipping-totals shipping">
                                            <th>Shipping</th>
                                            <td data-title="Shipping">
                                                <ul id="shipping_method" class="woocommerce-shipping-methods">
                                                    <li>
                                                        <input type="hidden" name="shipping_method[0]" data-index="0"
                                                               id="shipping_method_0_free_shipping17"
                                                               value="free_shipping:17" class="shipping_method"><label
                                                                for="shipping_method_0_free_shipping17">Free
                                                            shipping</label></li>
                                                </ul>


                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="woocommerce-Price-amount amount"><bdi>780&nbsp;<span
                                                                    class="woocommerce-Price-currencySymbol">$</span></bdi></span></strong>
                                            </td>
                                        </tr>


                                        </tfoot>
                                    </table>


                                </div>


                                <div id="customer_details">
                                    <div class="woocommerce-billing-fields">

                                        <h3>Billing details</h3>


                                        <div class="woocommerce-billing-fields__field-wrapper">
                                            <p class="form-row form-row-wide billing-email-title active checkout-step-title text-center"
                                               id="billing_email_title_field" data-priority="10"><label
                                                        for="billing_email_title" class="">CONTACT
                                                    INFORMATION&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_email_title"
                                                                                                 id="billing_email_title"
                                                                                                 value=""></span></p>
                                            <p class="form-row active validate-required validate-email woocommerce-validated"
                                               id="billing_email_field" data-priority="20"><label for="billing_email"
                                                                                                  class="">Your email
                                                    address&nbsp;<abbr class="required"
                                                                       title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><input type="email"
                                                                                                 class="input-text "
                                                                                                 name="billing_email"
                                                                                                 id="billing_email"
                                                                                                 placeholder="Type your email"
                                                                                                 value=""
                                                                                                 autocomplete="email username"></span>
                                            </p>
                                            <p class="form-row form-row-wide email-continue-btn active checkout-continue-btn text-center"
                                               id="billing_email_continue_btn_field" data-priority="30"><label
                                                        for="billing_email_continue_btn" class="">Continue&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_email_continue_btn"
                                                                                                 id="billing_email_continue_btn"
                                                                                                 value=""></span></p>
                                            <p class="form-row form-row-wide billing-email-results checkout-results"
                                               id="billing_email_results_field" data-priority="40"><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_email_results"
                                                                                                 id="billing_email_results"
                                                                                                 value=""></span></p>
                                            <p class="form-row hidden validate-required validate-state form-row-first devvn-address-field"
                                               id="billing_state_field" data-priority="90"
                                               data-o_class="form-row hidden validate-required validate-state"
                                               style="display: block;"><label for="billing_state" class="">Province/City&nbsp;<abbr
                                                            class="required" title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><select name="billing_state"
                                                                                                  id="billing_state"
                                                                                                  class="state_select "
                                                                                                  autocomplete="address-level1"
                                                                                                  data-placeholder="Select Province/City"
                                                                                                  data-input-classes=""
                                                                                                  data-label="State"
                                                                                                  placeholder="Select Province/City"><option
                                                                value="">Select an option…</option><option
                                                                value="HANOI">Hà Nội</option><option value="HOCHIMINH">Tp. Hồ Chí Minh</option><option
                                                                value="ANGIANG">An Giang</option><option
                                                                value="BACGIANG">Bắc Giang</option><option
                                                                value="BACKAN">Bắc Kạn</option><option value="BACLIEU">Bạc Liêu</option><option
                                                                value="BACNINH">Bắc Ninh</option><option
                                                                value="BARIAVUNGTAU">Bà Rịa - Vũng Tàu</option><option
                                                                value="BENTRE">Bến Tre</option><option value="BINHDINH">Bình Định</option><option
                                                                value="BINHDUONG">Bình Dương</option><option
                                                                value="BINHPHUOC">Bình Phước</option><option
                                                                value="BINHTHUAN">Bình Thuận</option><option
                                                                value="CAMAU">Cà Mau</option><option value="CANTHO">Cần Thơ</option><option
                                                                value="CAOBANG">Cao Bằng</option><option value="DAKLAK">Đắk Lắk</option><option
                                                                value="DAKNONG">Đắk Nông</option><option value="DANANG">Đà Nẵng</option><option
                                                                value="DIENBIEN">Điện Biên</option><option
                                                                value="DONGNAI">Đồng Nai</option><option
                                                                value="DONGTHAP">Đồng Tháp</option><option
                                                                value="GIALAI">Gia Lai</option><option value="HAGIANG">Hà Giang</option><option
                                                                value="HAIDUONG">Hải Dương</option><option
                                                                value="HAIPHONG">Hải Phòng</option><option
                                                                value="HANAM">Hà Nam</option><option value="HATINH">Hà Tĩnh</option><option
                                                                value="HAUGIANG">Hậu Giang</option><option
                                                                value="HOABINH">Hòa Bình</option><option
                                                                value="HUNGYEN">Hưng Yên</option><option
                                                                value="KHANHHOA">Khánh Hòa</option><option
                                                                value="KIENGIANG">Kiên Giang</option><option
                                                                value="KONTUM">Kon Tum</option><option value="LAICHAU">Lai Châu</option><option
                                                                value="LAMDONG">Lâm Đồng</option><option
                                                                value="LANGSON">Lạng Sơn</option><option value="LAOCAI">Lào Cai</option><option
                                                                value="LONGAN">Long An</option><option value="NAMDINH">Nam Định</option><option
                                                                value="NGHEAN">Nghệ An</option><option value="NINHBINH">Ninh Bình</option><option
                                                                value="NINHTHUAN">Ninh Thuận</option><option
                                                                value="PHUTHO">Phú Thọ</option><option value="PHUYEN">Phú Yên</option><option
                                                                value="QUANGBINH">Quảng Bình</option><option
                                                                value="QUANGNAM">Quảng Nam</option><option
                                                                value="QUANGNGAI">Quảng Ngãi</option><option
                                                                value="QUANGNINH">Quảng Ninh</option><option
                                                                value="QUANGTRI">Quảng Trị</option><option
                                                                value="SOCTRANG">Sóc Trăng</option><option
                                                                value="SONLA">Sơn La</option><option value="TAYNINH">Tây Ninh</option><option
                                                                value="THAIBINH">Thái Bình</option><option
                                                                value="THAINGUYEN">Thái Nguyên</option><option
                                                                value="THANHHOA">Thanh Hóa</option><option
                                                                value="THUATHIENHUE">Thừa Thiên Huế</option><option
                                                                value="TIENGIANG">Tiền Giang</option><option
                                                                value="TRAVINH">Trà Vinh</option><option
                                                                value="TUYENQUANG">Tuyên Quang</option><option
                                                                value="VINHLONG">Vĩnh Long</option><option
                                                                value="VINHPHUC">Vĩnh Phúc</option><option
                                                                value="YENBAI">Yên Bái</option></select></span></p>
                                            <p class="form-row form-row-wide billing-shipping-details-title checkout-step-title text-center"
                                               id="billing_shipping_details_title_field" data-priority="50"><label
                                                        for="billing_shipping_details_title" class="">SHIPPING DETAILS&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_shipping_details_title"
                                                                                                 id="billing_shipping_details_title"
                                                                                                 value=""></span></p>
                                            <p class="form-row hidden validate-required form-row-last address-field update_totals_on_change"
                                               id="billing_city_field" data-priority="100"
                                               data-o_class="form-row hidden validate-required" style="display: block;">
                                                <label for="billing_city" class="">District&nbsp;<abbr class="required"
                                                                                                       title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><select id="billing_city"
                                                                                                  name="billing_city"
                                                                                                  class="state_select"
                                                                                                  placeholder="Select District"
                                                                                                  data-placeholder="Select District"><option
                                                                value="">Select District</option><option value="271">Huyện Ba Vì</option><option
                                                                value="277">Huyện Chương Mỹ</option><option value="018">Huyện Gia Lâm</option><option
                                                                value="274">Huyện Hoài Đức</option><option value="250">Huyện Mê Linh</option><option
                                                                value="282">Huyện Mỹ Đức</option><option value="272">Huyện Phúc Thọ</option><option
                                                                value="280">Huyện Phú Xuyên</option><option value="275">Huyện Quốc Oai</option><option
                                                                value="016">Huyện Sóc Sơn</option><option value="278">Huyện Thanh Oai</option><option
                                                                value="020">Huyện Thanh Trì</option><option value="279">Huyện Thường Tín</option><option
                                                                value="276">Huyện Thạch Thất</option><option
                                                                value="273">Huyện Đan Phượng</option><option
                                                                value="017">Huyện Đông Anh</option><option value="281">Huyện Ứng Hòa</option><option
                                                                value="001">Quận Ba Đình</option><option value="021">Quận Bắc Từ Liêm</option><option
                                                                value="005">Quận Cầu Giấy</option><option value="007">Quận Hai Bà Trưng</option><option
                                                                value="008">Quận Hoàng Mai</option><option value="002">Quận Hoàn Kiếm</option><option
                                                                value="268">Quận Hà Đông</option><option value="004">Quận Long Biên</option><option
                                                                value="019">Quận Nam Từ Liêm</option><option
                                                                value="009">Quận Thanh Xuân</option><option value="003">Quận Tây Hồ</option><option
                                                                value="006">Quận Đống Đa</option><option value="269">Thị xã Sơn Tây</option></select></span>
                                            </p>
                                            <p class="form-row form-row-first validate-required"
                                               id="billing_first_name_field" data-priority="60"><label
                                                        for="billing_first_name" class="">First name&nbsp;<abbr
                                                            class="required" title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><input type="text"
                                                                                                 class="input-text "
                                                                                                 name="billing_first_name"
                                                                                                 id="billing_first_name"
                                                                                                 placeholder="" value=""
                                                                                                 autocomplete="given-name"></span>
                                            </p>
                                            <p class="form-row devvn-address-field validate-required form-row-first active woocommerce-validated"
                                               id="billing_address_2_field" data-priority="110" style="display: block;">
                                                <label for="billing_address_2" class="screen-reader-text">Commune/Ward/Town&nbsp;<abbr
                                                            class="required" title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><select id="billing_address_2"
                                                                                                  name="billing_address_2"
                                                                                                  class="state_select"
                                                                                                  placeholder="Select Commune/Ward/Town"
                                                                                                  data-placeholder="Select Commune/Ward/Town"><option
                                                                value="">Select Commune/Ward/Town</option><option
                                                                value="00565">Thị trấn Trâu Quỳ</option><option
                                                                value="00526">Thị trấn Yên Viên</option><option
                                                                value="00583">Xã Bát Tràng</option><option
                                                                value="00553">Xã Cổ Bi</option><option value="00541">Xã Dương Hà</option><option
                                                                value="00568">Xã Dương Quang</option><option
                                                                value="00571">Xã Dương Xá</option><option value="00586">Xã Kim Lan</option><option
                                                                value="00562">Xã Kim Sơn</option><option value="00580">Xã Kiêu Kỵ</option><option
                                                                value="00550">Xã Lệ Chi</option><option value="00535">Xã Ninh Hiệp</option><option
                                                                value="00544">Xã Phù Đổng</option><option value="00559">Xã Phú Thị</option><option
                                                                value="00547">Xã Trung Mầu</option><option
                                                                value="00589">Xã Văn Đức</option><option value="00529">Xã Yên Thường</option><option
                                                                value="00532">Xã Yên Viên</option><option value="00577">Xã Đa Tốn</option><option
                                                                value="00538">Xã Đình Xuyên</option><option
                                                                value="00574">Xã Đông Dư</option><option value="00556">Xã Đặng Xá</option></select></span>
                                            </p>
                                            <p class="form-row form-row-last validate-required"
                                               id="billing_last_name_field" data-priority="70"><label
                                                        for="billing_last_name" class="">Last name&nbsp;<abbr
                                                            class="required" title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><input type="text"
                                                                                                 class="input-text "
                                                                                                 name="billing_last_name"
                                                                                                 id="billing_last_name"
                                                                                                 placeholder="" value=""
                                                                                                 autocomplete="family-name"></span>
                                            </p>
                                            <p class="form-row hidden validate-required form-row-last address-field"
                                               id="billing_address_1_field" data-priority="120" style="display: block;">
                                                <label for="billing_address_1" class="">Address&nbsp;<abbr
                                                            class="required" title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><input type="text"
                                                                                                 class="input-text "
                                                                                                 name="billing_address_1"
                                                                                                 id="billing_address_1"
                                                                                                 placeholder="Ex: No. 20, 90 Alley"
                                                                                                 value=""
                                                                                                 autocomplete="address-line1"
                                                                                                 data-placeholder="Ex: No. 20, 90 Alley"></span>
                                            </p>
                                            <p class="form-row form-row-first validate-required validate-phone"
                                               id="billing_phone_field" data-priority="80"><label for="billing_phone"
                                                                                                  class="">Phone number&nbsp;<abbr
                                                            class="required" title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><input type="tel"
                                                                                                 class="input-text "
                                                                                                 name="billing_phone"
                                                                                                 id="billing_phone"
                                                                                                 placeholder="Type your phone number"
                                                                                                 value=""
                                                                                                 autocomplete="tel"></span>
                                            </p>
                                            <p class="form-row address-field validate-postcode form-row-wide"
                                               id="billing_postcode_field" data-priority="140"
                                               data-o_class="form-row form-row-wide address-field validate-postcode"
                                               style="display: none;"><label for="billing_postcode" class="">Postcode /
                                                    ZIP&nbsp;<span class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="text"
                                                                                                 class="input-text "
                                                                                                 name="billing_postcode"
                                                                                                 id="billing_postcode"
                                                                                                 placeholder="" value=""
                                                                                                 autocomplete="postal-code"></span>
                                            </p>
                                            <p class="form-row form-row-wide address-field update_totals_on_change validate-required"
                                               id="billing_country_field" data-priority="130"><label
                                                        for="billing_country" class="">Country&nbsp;<abbr
                                                            class="required" title="required">*</abbr></label><span
                                                        class="woocommerce-input-wrapper"><select name="billing_country"
                                                                                                  id="billing_country"
                                                                                                  class="country_to_state country_select "
                                                                                                  autocomplete="country"
                                                                                                  data-placeholder="Select a country / region…"
                                                                                                  data-label="Country"><option
                                                                value="">Select a country / region…</option><option
                                                                value="AF">Afghanistan</option><option value="AX">Åland Islands</option><option
                                                                value="AL">Albania</option><option
                                                                value="DZ">Algeria</option><option value="AS">American Samoa</option><option
                                                                value="AD">Andorra</option><option
                                                                value="AO">Angola</option><option
                                                                value="AI">Anguilla</option><option value="AQ">Antarctica</option><option
                                                                value="AG">Antigua and Barbuda</option><option
                                                                value="AR">Argentina</option><option
                                                                value="AM">Armenia</option><option
                                                                value="AW">Aruba</option><option
                                                                value="AU">Australia</option><option
                                                                value="AT">Austria</option><option
                                                                value="AZ">Azerbaijan</option><option
                                                                value="BS">Bahamas</option><option
                                                                value="BH">Bahrain</option><option
                                                                value="BD">Bangladesh</option><option value="BB">Barbados</option><option
                                                                value="BY">Belarus</option><option
                                                                value="PW">Belau</option><option
                                                                value="BE">Belgium</option><option
                                                                value="BZ">Belize</option><option
                                                                value="BJ">Benin</option><option
                                                                value="BM">Bermuda</option><option
                                                                value="BT">Bhutan</option><option
                                                                value="BO">Bolivia</option><option value="BQ">Bonaire, Saint Eustatius and Saba</option><option
                                                                value="BA">Bosnia and Herzegovina</option><option
                                                                value="BW">Botswana</option><option value="BV">Bouvet Island</option><option
                                                                value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option
                                                                value="BN">Brunei</option><option
                                                                value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option
                                                                value="BI">Burundi</option><option
                                                                value="KH">Cambodia</option><option
                                                                value="CM">Cameroon</option><option
                                                                value="CA">Canada</option><option
                                                                value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option
                                                                value="CF">Central African Republic</option><option
                                                                value="TD">Chad</option><option
                                                                value="CL">Chile</option><option
                                                                value="CN">China</option><option value="CX">Christmas Island</option><option
                                                                value="CC">Cocos (Keeling) Islands</option><option
                                                                value="CO">Colombia</option><option
                                                                value="KM">Comoros</option><option value="CG">Congo (Brazzaville)</option><option
                                                                value="CD">Congo (Kinshasa)</option><option value="CK">Cook Islands</option><option
                                                                value="CR">Costa Rica</option><option
                                                                value="HR">Croatia</option><option
                                                                value="CU">Cuba</option><option
                                                                value="CW">Curaçao</option><option
                                                                value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option
                                                                value="DK">Denmark</option><option
                                                                value="DJ">Djibouti</option><option
                                                                value="DM">Dominica</option><option value="DO">Dominican Republic</option><option
                                                                value="EC">Ecuador</option><option
                                                                value="EG">Egypt</option><option
                                                                value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option
                                                                value="ER">Eritrea</option><option
                                                                value="EE">Estonia</option><option
                                                                value="SZ">Eswatini</option><option
                                                                value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option
                                                                value="FO">Faroe Islands</option><option
                                                                value="FJ">Fiji</option><option
                                                                value="FI">Finland</option><option
                                                                value="FR">France</option><option value="GF">French Guiana</option><option
                                                                value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option
                                                                value="GA">Gabon</option><option
                                                                value="GM">Gambia</option><option
                                                                value="GE">Georgia</option><option
                                                                value="DE">Germany</option><option
                                                                value="GH">Ghana</option><option
                                                                value="GI">Gibraltar</option><option
                                                                value="GR">Greece</option><option
                                                                value="GL">Greenland</option><option
                                                                value="GD">Grenada</option><option
                                                                value="GP">Guadeloupe</option><option
                                                                value="GU">Guam</option><option
                                                                value="GT">Guatemala</option><option
                                                                value="GG">Guernsey</option><option
                                                                value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option
                                                                value="GY">Guyana</option><option
                                                                value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option
                                                                value="HN">Honduras</option><option
                                                                value="HK">Hong Kong</option><option
                                                                value="HU">Hungary</option><option
                                                                value="IS">Iceland</option><option
                                                                value="IN">India</option><option
                                                                value="ID">Indonesia</option><option
                                                                value="IR">Iran</option><option value="IQ">Iraq</option><option
                                                                value="IE">Ireland</option><option value="IM">Isle of Man</option><option
                                                                value="IL">Israel</option><option
                                                                value="IT">Italy</option><option
                                                                value="CI">Ivory Coast</option><option value="JM">Jamaica</option><option
                                                                value="JP">Japan</option><option
                                                                value="JE">Jersey</option><option
                                                                value="JO">Jordan</option><option
                                                                value="KZ">Kazakhstan</option><option
                                                                value="KE">Kenya</option><option
                                                                value="KI">Kiribati</option><option
                                                                value="KW">Kuwait</option><option
                                                                value="KG">Kyrgyzstan</option><option
                                                                value="LA">Laos</option><option
                                                                value="LV">Latvia</option><option
                                                                value="LB">Lebanon</option><option
                                                                value="LS">Lesotho</option><option
                                                                value="LR">Liberia</option><option
                                                                value="LY">Libya</option><option value="LI">Liechtenstein</option><option
                                                                value="LT">Lithuania</option><option value="LU">Luxembourg</option><option
                                                                value="MO">Macao</option><option
                                                                value="MG">Madagascar</option><option
                                                                value="MW">Malawi</option><option
                                                                value="MY">Malaysia</option><option
                                                                value="MV">Maldives</option><option
                                                                value="ML">Mali</option><option
                                                                value="MT">Malta</option><option value="MH">Marshall Islands</option><option
                                                                value="MQ">Martinique</option><option value="MR">Mauritania</option><option
                                                                value="MU">Mauritius</option><option
                                                                value="YT">Mayotte</option><option
                                                                value="MX">Mexico</option><option
                                                                value="FM">Micronesia</option><option
                                                                value="MC">Monaco</option><option
                                                                value="MN">Mongolia</option><option value="ME">Montenegro</option><option
                                                                value="MS">Montserrat</option><option
                                                                value="MA">Morocco</option><option
                                                                value="MZ">Mozambique</option><option
                                                                value="MM">Myanmar</option><option
                                                                value="NA">Namibia</option><option
                                                                value="NR">Nauru</option><option
                                                                value="NP">Nepal</option><option
                                                                value="NL">Netherlands</option><option value="NC">New Caledonia</option><option
                                                                value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option
                                                                value="NE">Niger</option><option
                                                                value="NG">Nigeria</option><option
                                                                value="NU">Niue</option><option value="NF">Norfolk Island</option><option
                                                                value="KP">North Korea</option><option value="MK">North Macedonia</option><option
                                                                value="MP">Northern Mariana Islands</option><option
                                                                value="NO">Norway</option><option
                                                                value="OM">Oman</option><option
                                                                value="PK">Pakistan</option><option value="PS">Palestinian Territory</option><option
                                                                value="PA">Panama</option><option value="PG">Papua New Guinea</option><option
                                                                value="PY">Paraguay</option><option
                                                                value="PE">Peru</option><option
                                                                value="PH">Philippines</option><option value="PN">Pitcairn</option><option
                                                                value="PL">Poland</option><option
                                                                value="PT">Portugal</option><option value="PR">Puerto Rico</option><option
                                                                value="QA">Qatar</option><option
                                                                value="RE">Reunion</option><option
                                                                value="RU">Russia</option><option
                                                                value="RW">Rwanda</option><option value="ST">São Tomé and Príncipe</option><option
                                                                value="BL">Saint Barthélemy</option><option value="SH">Saint Helena</option><option
                                                                value="KN">Saint Kitts and Nevis</option><option
                                                                value="LC">Saint Lucia</option><option value="SX">Saint Martin (Dutch part)</option><option
                                                                value="MF">Saint Martin (French part)</option><option
                                                                value="PM">Saint Pierre and Miquelon</option><option
                                                                value="VC">Saint Vincent and the Grenadines</option><option
                                                                value="WS">Samoa</option><option
                                                                value="SM">San Marino</option><option value="SA">Saudi Arabia</option><option
                                                                value="SN">Senegal</option><option
                                                                value="RS">Serbia</option><option
                                                                value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option
                                                                value="SG">Singapore</option><option
                                                                value="SK">Slovakia</option><option
                                                                value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option
                                                                value="SO">Somalia</option><option value="ZA">South Africa</option><option
                                                                value="GS">South Georgia/Sandwich Islands</option><option
                                                                value="KR">South Korea</option><option value="SS">South Sudan</option><option
                                                                value="ES">Spain</option><option
                                                                value="LK">Sri Lanka</option><option
                                                                value="SD">Sudan</option><option
                                                                value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option
                                                                value="SE">Sweden</option><option
                                                                value="CH">Switzerland</option><option
                                                                value="SY">Syria</option><option
                                                                value="TW">Taiwan</option><option
                                                                value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option
                                                                value="TH">Thailand</option><option value="TL">Timor-Leste</option><option
                                                                value="TG">Togo</option><option
                                                                value="TK">Tokelau</option><option
                                                                value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option
                                                                value="TN">Tunisia</option><option
                                                                value="TR">Turkey</option><option value="TM">Turkmenistan</option><option
                                                                value="TC">Turks and Caicos Islands</option><option
                                                                value="TV">Tuvalu</option><option
                                                                value="UG">Uganda</option><option
                                                                value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option
                                                                value="GB">United Kingdom (UK)</option><option
                                                                value="US">United States (US)</option><option
                                                                value="UM">United States (US) Minor Outlying Islands</option><option
                                                                value="UY">Uruguay</option><option
                                                                value="UZ">Uzbekistan</option><option
                                                                value="VU">Vanuatu</option><option
                                                                value="VA">Vatican</option><option
                                                                value="VE">Venezuela</option><option value="VN"
                                                                                                     selected="selected">Vietnam</option><option
                                                                value="VG">Virgin Islands (British)</option><option
                                                                value="VI">Virgin Islands (US)</option><option
                                                                value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option
                                                                value="YE">Yemen</option><option
                                                                value="ZM">Zambia</option><option
                                                                value="ZW">Zimbabwe</option></select><noscript><button
                                                                type="submit" name="woocommerce_checkout_update_totals"
                                                                value="Update country / region">Update country / region</button></noscript></span>
                                            </p>
                                            <p class="form-row form-row-wide notes" id="billing_customer_note_field"
                                               data-priority="150"><label for="billing_customer_note" class="">Note&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="text"
                                                                                                 class="input-text "
                                                                                                 name="billing_customer_note"
                                                                                                 id="billing_customer_note"
                                                                                                 placeholder=""
                                                                                                 value=""></span></p>
                                            <p class="form-row form-row-wide billing-shipping-details-continue-btn checkout-continue-btn text-center"
                                               id="billing_shipping_details_continue_btn_field" data-priority="160">
                                                <label for="billing_shipping_details_continue_btn" class="">Continue&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_shipping_details_continue_btn"
                                                                                                 id="billing_shipping_details_continue_btn"
                                                                                                 value=""></span></p>
                                            <p class="form-row form-row-wide billing-shipping-details-results checkout-results"
                                               id="billing_shipping_details_results_field" data-priority="170"><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_shipping_details_results"
                                                                                                 id="billing_shipping_details_results"
                                                                                                 value=""></span></p>
                                            <p class="form-row form-row-wide billing-shipping-info-title checkout-step-title text-center"
                                               id="billing_shipping_info_title_field" data-priority="180"><label
                                                        for="billing_shipping_info_title" class="">SHIPPING INFORMATION&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_shipping_info_title"
                                                                                                 id="billing_shipping_info_title"
                                                                                                 value=""></span></p>
                                            <p class="form-row form-row-wide billing-shipping-info-results step checkout-results"
                                               id="billing_shipping_info_results_field" data-priority="190"><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_shipping_info_results"
                                                                                                 id="billing_shipping_info_results"
                                                                                                 value=""></span></p>
                                            <p class="form-row form-row-wide billing-shipping-info-continue-btn checkout-continue-btn text-center"
                                               id="billing_shipping_info_continue_btn_field" data-priority="200"><label
                                                        for="billing_shipping_info_continue_btn" class="">Continue&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_shipping_info_continue_btn"
                                                                                                 id="billing_shipping_info_continue_btn"
                                                                                                 value=""></span></p>
                                            <p class="form-row form-row-wide billing-payment-title checkout-step-title text-center"
                                               id="billing_payment_title_field" data-priority="210"><label
                                                        for="billing_payment_title" class="">PAYMENT&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_payment_title"
                                                                                                 id="billing_payment_title"
                                                                                                 value=""></span></p>
                                            <p class="form-row form-row-wide billing-payment-results step checkout-results"
                                               id="billing_payment_results_field" data-priority="220"><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_payment_results"
                                                                                                 id="billing_payment_results"
                                                                                                 value=""></span></p>
                                            <div id="payment" class="woocommerce-checkout-payment">
                                                <ul class="wc_payment_methods payment_methods methods">
                                                    <li class="wc_payment_method payment_method_onepayus">
                                                        <input id="payment_method_onepayus" type="radio"
                                                               class="input-radio" name="payment_method"
                                                               value="onepayus" checked="checked"
                                                               data-order_button_text="Pay now">

                                                        <label for="payment_method_onepayus">
                                                            Credit Card <img
                                                                    src="https://lespoirstudios.com/wp-content/plugins/onepay-payment-gateway-for-woocommerce-paygate-us/logo.png"
                                                                    alt="Credit Card"> </label>
                                                        <div class="payment_box payment_method_onepayus">
                                                            <p>Click place order and you will be directed to the OnePAY
                                                                website in order to make payment</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="form-row place-order">
                                                    <noscript>
                                                        Since your browser does not support JavaScript, or it is
                                                        disabled, please ensure you click the <em>Update Totals</em>
                                                        button before placing your order. You may be charged more than
                                                        the amount stated above if you fail to do so. <br/>
                                                        <button type="submit" class="button alt"
                                                                name="woocommerce_checkout_update_totals"
                                                                value="Update totals">Update totals
                                                        </button>
                                                    </noscript>

                                                    <div class="woocommerce-terms-and-conditions-wrapper">
                                                        <div class="woocommerce-privacy-policy-text"><p>Your personal
                                                                data will be used to process your order, support your
                                                                experience throughout this website, and for other
                                                                purposes described in our <a
                                                                        href="https://lespoirstudios.com/privacy-policy/"
                                                                        class="woocommerce-privacy-policy-link"
                                                                        target="_blank">privacy policy</a>.</p>
                                                        </div>
                                                        <div class="woocommerce-terms-and-conditions"
                                                             style="display: none; max-height: 200px; overflow: auto;">
                                                            <h2>L’ESPOIR PRODUCTS EXCHANGE POLICY</h2>
                                                            <h3>1. General terms</h3>
                                                            <ul style="padding: 0">
                                                                <li>Brand new with full tag on, unused, unwashed, no
                                                                    scent.
                                                                </li>
                                                                <li>Exchange 1 time only for each invoice (except
                                                                    products with manufacturer defects).
                                                                </li>
                                                                <li>With the higher price exchange item, customers
                                                                    please pay for the difference. With the lower price
                                                                    exchange item, L’espoir will not refund the
                                                                    difference.
                                                                </li>
                                                            </ul>
                                                            <h3>2. Exchange conditions</h3>
                                                            <ul style="padding: 0">
                                                                <li>Delivered products were wrong about sizes, colors,
                                                                    designs.
                                                                </li>
                                                                <li>Products with manufacturer defects.</li>
                                                            </ul>
                                                            <h3>3. Exchange policies</h3>
                                                            <ul style="padding: 0">
                                                                <li>Customers please contact L’espoir for exchanging
                                                                    within 3 days (from the moment the order is
                                                                    delivered).
                                                                </li>
                                                                <li>Exchange order processing time: 7-12 days (from the
                                                                    moment L’espoir receives customer’s return).
                                                                </li>
                                                                <li>L’espoir does not apply for a refund for any
                                                                    circumstances.
                                                                </li>
                                                            </ul>
                                                            <h3>4. Exchange delivery fee</h3>
                                                            <ul style="padding: 0">
                                                                <li>Customers please pay for products’ exchange delivery
                                                                    fee.
                                                                </li>
                                                            </ul>
                                                            <h3>5. Contacts &amp; Support for orders on Website</h3>
                                                            <ul style="padding: 0">
                                                                <li>Customers please contact L’espoir on<span
                                                                            style="color: #000000"> <a
                                                                                style="color: #000000"
                                                                                href="https://www.facebook.com/profile.php?id=100064836965069"
                                                                                target="_blank"
                                                                                rel="noopener">Facebook</a>, <a
                                                                                style="color: #000000"
                                                                                href="https://lespoirstudios.com/contact-us/"
                                                                                target="_blank" rel="noopener">Email</a>, <a
                                                                                style="color: #000000"
                                                                                href="https://www.instagram.com/lespoir.studios/"
                                                                                target="_blank"
                                                                                rel="noopener">Instagram</a></span> if
                                                                    they haven’t got feedback from L’espoir after
                                                                    requesting for product exchange.
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <p class="form-row validate-required">
                                                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                                <input type="checkbox"
                                                                       class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                                                                       name="terms" id="terms">
                                                                <span class="woocommerce-terms-and-conditions-checkbox-text">I have read and agree to the website <a
                                                                            href="https://lespoirstudios.com/terms-conditions/"
                                                                            class="woocommerce-terms-and-conditions-link"
                                                                            target="_blank">terms and conditions</a></span>&nbsp;<abbr
                                                                        class="required" title="required">*</abbr>
                                                            </label>
                                                            <input type="hidden" name="terms-field" value="1">
                                                        </p>
                                                    </div>


                                                    <button type="submit" class="button alt"
                                                            name="woocommerce_checkout_place_order" id="place_order"
                                                            value="Place order" data-value="Place order">Pay now
                                                    </button>

                                                    <input type="hidden" id="woocommerce-process-checkout-nonce"
                                                           name="woocommerce-process-checkout-nonce" value="703e01d73f"><input
                                                            type="hidden" name="_wp_http_referer"
                                                            value="/?wc-ajax=update_order_review"></div>
                                            </div>
                                            <p class="form-row form-row-wide billing-payment-continue-btn checkout-continue-btn text-center"
                                               id="billing_payment_continue_btn_field" data-priority="230"><label
                                                        for="billing_payment_continue_btn" class="">Process payment&nbsp;<span
                                                            class="optional">(optional)</span></label><span
                                                        class="woocommerce-input-wrapper"><input type="hidden"
                                                                                                 class="input-hidden "
                                                                                                 name="billing_payment_continue_btn"
                                                                                                 id="billing_payment_continue_btn"
                                                                                                 value=""></span></p>
                                        </div>

                                    </div>


                                    <div id="payment" class="woocommerce-checkout-payment">
                                        <ul class="wc_payment_methods payment_methods methods">
                                            <li class="wc_payment_method payment_method_onepayus">
                                                <input id="payment_method_onepayus" type="radio" class="input-radio"
                                                       name="payment_method" value="onepayus" checked="checked"
                                                       data-order_button_text="Pay now">

                                                <label for="payment_method_onepayus">
                                                    Credit Card <img
                                                            src="https://lespoirstudios.com/wp-content/plugins/onepay-payment-gateway-for-woocommerce-paygate-us/logo.png"
                                                            alt="Credit Card"> </label>
                                                <div class="payment_box payment_method_onepayus">
                                                    <p>Click place order and you will be directed to the OnePAY website
                                                        in order to make payment</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="form-row place-order">
                                            <noscript>
                                                Since your browser does not support JavaScript, or it is disabled,
                                                please ensure you click the <em>Update Totals</em> button before placing
                                                your order. You may be charged more than the amount stated above if you
                                                fail to do so. <br/>
                                                <button type="submit" class="button alt"
                                                        name="woocommerce_checkout_update_totals" value="Update totals">
                                                    Update totals
                                                </button>
                                            </noscript>

                                            <div class="woocommerce-terms-and-conditions-wrapper">
                                                <div class="woocommerce-privacy-policy-text"><p>Your personal data will
                                                        be used to process your order, support your experience
                                                        throughout this website, and for other purposes described in our
                                                        <a href="https://lespoirstudios.com/privacy-policy/"
                                                           class="woocommerce-privacy-policy-link" target="_blank">privacy
                                                            policy</a>.</p>
                                                </div>
                                                <div class="woocommerce-terms-and-conditions"
                                                     style="display: none; max-height: 200px; overflow: auto;"><h2>
                                                        L’ESPOIR PRODUCTS EXCHANGE POLICY</h2>
                                                    <h3>1. General terms</h3>
                                                    <ul style="padding: 0">
                                                        <li>Brand new with full tag on, unused, unwashed, no scent.</li>
                                                        <li>Exchange 1 time only for each invoice (except products with
                                                            manufacturer defects).
                                                        </li>
                                                        <li>With the higher price exchange item, customers please pay
                                                            for the difference. With the lower price exchange item,
                                                            L’espoir will not refund the difference.
                                                        </li>
                                                    </ul>
                                                    <h3>2. Exchange conditions</h3>
                                                    <ul style="padding: 0">
                                                        <li>Delivered products were wrong about sizes, colors,
                                                            designs.
                                                        </li>
                                                        <li>Products with manufacturer defects.</li>
                                                    </ul>
                                                    <h3>3. Exchange policies</h3>
                                                    <ul style="padding: 0">
                                                        <li>Customers please contact L’espoir for exchanging within 3
                                                            days (from the moment the order is delivered).
                                                        </li>
                                                        <li>Exchange order processing time: 7-12 days (from the moment
                                                            L’espoir receives customer’s return).
                                                        </li>
                                                        <li>L’espoir does not apply for a refund for any
                                                            circumstances.
                                                        </li>
                                                    </ul>
                                                    <h3>4. Exchange delivery fee</h3>
                                                    <ul style="padding: 0">
                                                        <li>Customers please pay for products’ exchange delivery fee.
                                                        </li>
                                                    </ul>
                                                    <h3>5. Contacts &amp; Support for orders on Website</h3>
                                                    <ul style="padding: 0">
                                                        <li>Customers please contact L’espoir on<span
                                                                    style="color: #000000"> <a style="color: #000000"
                                                                                               href="https://www.facebook.com/profile.php?id=100064836965069"
                                                                                               target="_blank"
                                                                                               rel="noopener">Facebook</a>, <a
                                                                        style="color: #000000"
                                                                        href="https://lespoirstudios.com/contact-us/"
                                                                        target="_blank" rel="noopener">Email</a>, <a
                                                                        style="color: #000000"
                                                                        href="https://www.instagram.com/lespoir.studios/"
                                                                        target="_blank"
                                                                        rel="noopener">Instagram</a></span> if they
                                                            haven’t got feedback from L’espoir after requesting for
                                                            product exchange.
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p class="form-row validate-required">
                                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                        <input type="checkbox"
                                                               class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                                                               name="terms" id="terms">
                                                        <span class="woocommerce-terms-and-conditions-checkbox-text">I have read and agree to the website <a
                                                                    href="https://lespoirstudios.com/terms-conditions/"
                                                                    class="woocommerce-terms-and-conditions-link"
                                                                    target="_blank">terms and conditions</a></span>&nbsp;<abbr
                                                                class="required" title="required">*</abbr>
                                                    </label>
                                                    <input type="hidden" name="terms-field" value="1">
                                                </p>
                                            </div>
                                            <button type="submit" class="button alt"
                                                    name="woocommerce_checkout_place_order" id="place_order"
                                                    value="Place order" data-value="Place order">Place order
                                            </button>
                                            <input type="hidden" id="woocommerce-process-checkout-nonce"
                                                   name="woocommerce-process-checkout-nonce" value="703e01d73f"><input
                                                    type="hidden" name="_wp_http_referer"
                                                    value="/?wc-ajax=update_order_review"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- end .wrap-checkout-page -->
                    <style type="text/css">
                        .woocommerce-form-login {
                            display: block !important
                        }
                    </style>
                </div>
            </div><!-- .entry-content -->

        </article><!-- #post-15 -->
    </div>
</main>
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function ($) {
        function loadCartFromLocalStorage() {
            const cartData = localStorage.getItem('cart');
            if (!cartData) return;

            const cartItems = JSON.parse(cartData);
            updateOrderReview(cartItems);
            updateMiniCart(cartItems);
        }

        function updateOrderReview(cartItems) {
            $('.review-order-products').empty();

            let subtotal = 0;
            let totalQuantity = 0;

            cartItems.forEach(item => {
                const itemTotal = parseFloat(item.price) * parseInt(item.quantity_current);
                subtotal += itemTotal;
                totalQuantity += parseInt(item.quantity_current);

                const productHtml = `
                <div class="woocommerce-cart-form__cart-item cart_item">
                    <div class="product-thumbnail">
                        <a href="${item.link}">
                            <img width="640" height="915" src="${item.image}"
                                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                alt="${item.name}" decoding="async" loading="lazy">
                        </a>
                    </div>
                    <div class="product-details">
                        <h3>
                            <a href="${item.link}">${item.name}</a>
                            <div class="cart-item-attributes">
                                <span class="attribute-value">${item.size},${item.color}</span><br>
                            </div>
                        </h3>
                        <div class="product-quantity row middle">
                            <span class="quantity-icon quantity-minus" data-product-id="${item.id}">-</span>
                            <div class="quantity">
                                <label class="screen-reader-text">Quantity</label>
                                <input type="number" class="input-text qty text"
                                    data-product-id="${item.id}"
                                    value="${item.quantity_current}"
                                    aria-label="Product quantity"
                                    size="4" min="1" max="${item.max_quantity}"
                                    step="1" inputmode="numeric">
                            </div>
                            <span class="quantity-icon quantity-plus" data-product-id="${item.id}">+</span>
                        </div>
                    </div>
                    <div class="product-actions">
                        <div class="product-remove">
                            <a href="#" class="remove" data-product-id="${item.id}">
                                <span class="xoo-wsc-icon-trash"></span>
                            </a>
                        </div>
                        <span class="product-price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>${itemTotal.toFixed(2)}&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></bdi>
                            </span>
                        </span>
                    </div>
                </div>
            `;

                $('.review-order-products').append(productHtml);
            });

            // Update all summary sections
            updateOrderSummary(subtotal, totalQuantity);
        }

        function updateOrderSummary(subtotal, totalQuantity) {
            const formattedSubtotal = `
            <span class="woocommerce-Price-amount amount">
                <bdi>${subtotal.toFixed(2)}&nbsp;
                    <span class="woocommerce-Price-currencySymbol">$</span>
                </bdi>
            </span>
        `;

            $('.cart-quantity .cart-value').text(`${totalQuantity} pieces`);

            $('.cart-subtotal .cart-value').html(formattedSubtotal);
            $('.cart-subtotal.mobile .cart-value').html(formattedSubtotal);
            $('.cart-subtotal.desktop .cart-value').html(formattedSubtotal);

            $('.cart-total .cart-value').html(formattedSubtotal);
            $('.cart-total.desktop .cart-value').html(formattedSubtotal);
            $('.cart-total.included-shipping-fee .cart-value').html(formattedSubtotal);
            $('.cart-total.no-shipping-fee .cart-value').html(formattedSubtotal);

            $('#order_review .cart-subtotal td').html(formattedSubtotal);
            $('#order_review .order-total td strong').html(formattedSubtotal);
        }

        function updateMiniCart(cartItems) {
            const totalQuantity = cartItems.reduce((sum, item) => sum + parseInt(item.quantity_current), 0);
            const subtotal = cartItems.reduce((sum, item) => sum + (parseFloat(item.price) * parseInt(item.quantity_current)), 0);

            $('.cart-contents-count').text(totalQuantity);

            $('.mini-cart-subtotal .amount').html(`
            <span class="woocommerce-Price-amount amount">
                <bdi>${subtotal.toFixed(2)}&nbsp;
                    <span class="woocommerce-Price-currencySymbol">$</span>
                </bdi>
            </span>
        `);
        }

        function updateQuantity(productId, newQuantity) {
            const cartData = localStorage.getItem('cart');
            if (!cartData) return;

            let cartItems = JSON.parse(cartData);

            cartItems = cartItems.map(item => {
                if (item.id === productId) {
                    const quantity = Math.min(
                        Math.max(1, parseInt(newQuantity)),
                        parseInt(item.max_quantity)
                    );
                    return {...item, quantity_current: quantity};
                }
                return item;
            });

            // Save updated cart and refresh display
            localStorage.setItem('cart', JSON.stringify(cartItems));
            updateOrderReview(cartItems);
            updateMiniCart(cartItems);
        }

        function removeItem(productId) {
            const cartData = localStorage.getItem('cart');
            if (!cartData) return;

            let cartItems = JSON.parse(cartData);

            cartItems = cartItems.filter(item => item.id !== productId);

            localStorage.setItem('cart', JSON.stringify(cartItems));
            updateOrderReview(cartItems);
            updateMiniCart(cartItems);
            if (cartItems.length === 0) {
                $('.wrap-checkout-page').html('<p class="cart-empty">Your cart is currently empty.</p>');
            }
        }

        $(document).on('click', '.quantity-plus', function (e) {
            e.preventDefault();
            const productId = $(this).data('product-id');
            const currentQty = parseInt($(this).siblings('.quantity').find('.qty').val());
            updateQuantity(productId, currentQty + 1);
        });

        $(document).on('click', '.quantity-minus', function (e) {
            e.preventDefault();
            const productId = $(this).data('product-id');
            const currentQty = parseInt($(this).siblings('.quantity').find('.qty').val());
            updateQuantity(productId, currentQty - 1);
        });

        $(document).on('change', '.qty', function () {
            const productId = $(this).data('product-id');
            const newQty = parseInt($(this).val());
            updateQuantity(productId, newQty);
        });

        $(document).on('click', '.remove', function (e) {
            e.preventDefault();
            const productId = $(this).data('product-id');
            removeItem(productId);
        });

        $('.update-cart-btn').click(function (e) {
            e.preventDefault();
            loadCartFromLocalStorage();
        });

        $('#coupon_code').on('keyup', function (e) {
            if (e.keyCode === 13) {
                applyCoupon($(this).val());
            }
        });

        $('button[name="apply_coupon"]').click(function (e) {
            e.preventDefault();
            applyCoupon($('#coupon_code').val());
        });

        function applyCoupon(couponCode) {
            alert('Coupon');
        }

        // Handle shipping calculation
        $('.shipping-calculator-form').on('submit', function (e) {
            e.preventDefault();
            calculateShipping();
        });

        function calculateShipping() {
            console.log('Shipping')
        }

        loadCartFromLocalStorage();

        $('.checkout-continue-btn').click(function () {
            const currentSection = $(this).closest('.checkout-step');
            const nextSection = currentSection.next('.checkout-step');

            if (validateSection(currentSection)) {
                currentSection.hide();
                nextSection.show();
            }
        });

        function validateSection(section) {
            let isValid = true;

            section.find('input[required], select[required]').each(function () {
                if (!$(this).val()) {
                    $(this).addClass('error');
                    isValid = false;
                } else {
                    $(this).removeClass('error');
                }
            });

            if (!isValid) {
                alert('Please fill in all required fields');
            }

            return isValid;
        }

        $('#billing_country').change(function () {
            const country = $(this).val();
            updateStateField(country);
        });

        function updateStateField(country) {
        }
    });
</script>