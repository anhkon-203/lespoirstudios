<style>
    .xoo-wsc-container, .xoo-wsc-slider {
        position: fixed;
        background-color: #fff;
        z-index: 999999;
        display: flex;
        flex-direction: column;
        width: 90%;
        transition: 0.5s;
    }

    .xoo-wsc-modal * {
        box-sizing: border-box;
    }

    .xoo-wsc-cart-active .xoo-wsc-opac {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #000;
        z-index: 999998;
        opacity: 0.7;
    }

    .xoo-wsc-body {
        flex-grow: 1;
        overflow: auto;
    }

    .xoo-wsc-loading .xoo-wsc-loader{
        display: block;
    }

    span.xoo-wsc-loader {
        display: none;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        opacity: 0.5;
        background-color: #eee;
    }


    body.xoo-wsc-cart-active, html.xoo-wsc-cart-active{
        overflow: hidden!important;
    }

    .xoo-wsc-basket {
        padding: 10px 12px;
        margin: 10px;
        z-index: 9999999;
        cursor: pointer;
        position: fixed;
        transition: 0.5s;
        display: none;
    }

    .xoo-wsc-items-count{
        border-radius: 50%;
        position: absolute;
        font-size: 13px;
        width: 28px;
        height: 28px;
        line-height: 28px;
        text-align: center;
        overflow: hidden;
    }

    .xoo-wsc-bki{
        position: relative;
        top: 2px;
    }

    .xoo-wsc-fly-animating{
        opacity: 1;
        position: absolute!important;
        height: 150px;
        width: 150px;
        z-index: 100;
    }


    .xoo-wsc-sc-cont .xoo-wsc-cart-trigger {
        display: flex;
        position: relative;
        cursor: pointer;
        align-items: center;
        justify-content: center;
    }

    .xoo-wsc-sc-bki{
        font-size: 30px;
    }

    span.xoo-wsc-sc-count {
        border-radius: 50%;
        height: 18px;
        line-height: 18px;
        width: 18px;
        display: inline-block;
        text-align: center;
        font-size: 13px;
    }

    .xoo-wsc-sc-cont .xoo-wsc-cart-trigger > * {
        margin-right: 3px;
    }


    /* Notices */
    .xoo-wsc-notice-container {
        z-index: 2;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        display: none;
    }

    ul.xoo-wsc-notices {
        margin: 0;
        list-style-type: none;
        padding: 0;
    }

    .xoo-wsc-notice-success {
        background-color: #DFF0D8;
        color: #3C763D;
    }
    .xoo-wsc-notice-error {
        color: #a94442;
        background-color: #f2dede;
    }

    ul.xoo-wsc-notices li {
        padding: 15px 20px;
        list-style-type: none;
    }

    ul.xoo-wsc-notices li span {
        margin-right: 6px;
    }

    span.xoo-wsc-undo-item {
        float: right;
        text-decoration: underline;
        cursor: pointer;
    }


    .xoo-wsc-notices a.button.wc-forward {
        display: none;
    }

    /* Basket */
    .xoo-wscb-icon {
        font-size: 37px;
    }

    .xoo-wscb-count {
        position: absolute;
        z-index: 1;
        background-color: transparent;
        font-size: 15px;
        height: 45px;
        line-height: 45px;
        text-align: center;
        left: 0;
        right: 0;
    }

    /* Header */
    .xoo-wsc-header {
        padding: 15px;
        color: #000;
    }

    span.xoo-wsch-close {
        position: absolute;
        cursor: pointer;
    }

    span.xoo-wsch-text {
        margin-left: 8px;
    }

    .xoo-wsch-top {
        align-items: center;
    }

    .xoo-wsch-top .xoo-wsch-basket {
        display: table;
        position: relative;
    }

    .xoo-wsch-top {
        display: flex;
        margin: 0 auto;
    }

    .xoo-wsc-sb-bar {
        height: 8px;
        width: 90%;
        background-color: #eeee;
        border-radius: 7px;
        display: table;
        margin: 0 auto;
        margin-top: 10px;
    }

    .xoo-wsc-sb-bar > span {
        display: block;
        z-index: 1;
        height: inherit;
    }

    .xoo-wsc-ship-bar-cont {
        width: 100%;
        text-align: center;
        margin-top: 10px;
    }

    /****** BODY ***********/

    /*** Product ***/
    .xoo-wsc-product {
        display: flex;
        border-bottom: 1px solid #eee;
    }

    .xoo-wsc-img-col {
        align-self: center;
    }

    .xoo-wsc-sum-col {
        flex-grow: 1;
        padding-left: 15px;
        display: flex;
        flex-direction: column;
    }

    .xoo-wsc-img-col img {
        width: 100%;
        height: auto;
    }

    .xoo-wsc-sm-left {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    .xoo-wsc-sm-right {
        align-items: flex-end;
        padding-left: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        max-width: 30px;
    }

    span.xoo-wsc-pname, span.xoo-wsc-pname a {
        font-weight: 600;
    }

    span.xoo-wsc-smr-del {
        cursor: pointer;
        margin-top: 5px;
    }

    .xoo-wsc-sm-info {
        display: flex;
        min-width: 0;
    }

    .xoo-wsc-sm-sales {
        text-transform: uppercase;
        border: 1px solid #333;
        padding: 2px 10px;
        display: block;
        margin-bottom: 5px;
        border-radius: 10px;
        font-size: 10px;
    }

    .xoo-wsc-sm-left > *:not(:last-child) {
        padding-bottom: 4px;
    }

    /* Qty Box */
    .xoo-wsc-qty-box {
        margin-top: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: 90px;
        width: 100%;
        flex-direction: row;
    }

    input[type="number"].xoo-wsc-qty {
        font-size: 14px;
        width: 100%;
        flex-grow: 1;
        padding: 6px;
        text-align: center;
        border: 0;
        box-shadow: none;
        background-color: transparent;
        height: 28px;
        line-height: 28px;
        min-width: 1%;
    }

    .xoo-wsc-qtb-square input[type="number"].xoo-wsc-qty{
        border-top-width: 0;
        border-bottom-width: 0;
    }

    span.xoo-wsc-chng {
        min-width: 18px;
        align-self: stretch;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        font-weight: 600;
        user-select: none;
    }


    .xoo-wsc-qtb-circle .xoo-wsc-chng {
        border-radius: 50%;
        height: 70%;
        align-self: center;
    }

    .xoo-wsc-qtb-circle input[type="number"].xoo-wsc-qty {
        margin: 0 5px;
    }

    input.xoo-wsc-qty::-webkit-outer-spin-button,
    input.xoo-wsc-qty::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input.xoo-wsc-qty[type=number] {
        -moz-appearance: textfield;
    }

    /* Variation */
    .xoo-wsc-product dl.variation dd, .xoo-wsc-product dl.variation dt {
        margin: 0 4px 0 0;
        display: inline-block;
        float: left;
        font-style: italic;
    }

    .xoo-wsc-product dl.variation dt {
        clear: left;
    }

    .xoo-wsc-product dl.variation, .xoo-wsc-product dl.variation p {
        margin: 0;
        font-size: 13px;
    }

    /** Slider **/

    .xoo-wsc-sl-content {
        display: none;
        overflow: auto;
        flex-direction: column;
    }

    .xoo-wsc-sl-content[style*='block'] {
        display: flex !important;
    }

    .xoo-wsc-sl-heading {
        display: flex;
        font-size: 20px;
        font-weight: 600;
        padding: 20px;
        align-items: center;
    }

    .xoo-wsc-slc-active.xoo-wsc-sl-content{
        display: block;
    }

    .xoo-wsc-sl-body {
        padding: 10px 20px;
        flex-grow: 1;
        overflow: auto;
    }

    span.xoo-wsc-slider-close {
        margin: 0 10px;
        cursor: pointer;
    }

    /** SLider Shipping */

    ul.xoo-wsc-shipping-methods {
        list-style-type: none;
        margin: 0 auto 20px;
        padding: 0;
        display: table;
    }


    input.xoo-wsc-shipping-method {
        margin-right: 5px;
    }

    ul.xoo-wsc-shipping-methods li {
        list-style-type: none;
        margin: 0 0 7px 0;
        padding: 0;
    }

    ul.xoo-wsc-shipping-methods li label {
        cursor: pointer;
    }

    .xoo-wsc-shipping-destination span:nth-child(1) {
        color: #777;
        font-weight: 600;
        margin-right: 8px;
        font-size: 16px;
    }

    .xoo-wsc-shipping-destination {
        display: table;
        margin: 0 auto;
        margin-bottom: 20px;
        font-size: 17px;
    }

    .select2-dropdown {
        z-index: 999999;
    }

    .xoo-wsc-slider section.shipping-calculator-form {
        display: block!important;
        margin: 0;
        padding: 0;
    }

    .xoo-wsc-slider a.shipping-calculator-button {
        display: none;
    }
    .woocommerce-checkout .xoo-wsc-sl-content.xoo-wsc-sl-shipping, .woocommerce-checkout .xoo-wsc-ft-amt-label .xoo-wsc-toggle-slider span {
        display: none!important;
    }


    .woocommerce-checkout .xoo-wsc-ft-amt{
        pointer-events: none;
    }

    .xoo-wsc-slider button[name="calc_shipping"] {
        display: table;
        margin: 0 auto;
    }

    .xoo-wsc-slider section.shipping-calculator-form > p{
        margin: 0 0 30px 0;
        padding: 0;
    }

    .xoo-wsc-slider section.shipping-calculator-form input, .xoo-wsc-slider section.shipping-calculator-form select {
        width: 100%;
    }

    .xoo-wsc-slider .woocommerce-shipping-calculator {
        padding: 0;
        margin: 0;
    }

    /** SLIDER Coupon **/
    .xoo-wsc-coupon-row > span {
        display: block;
        margin-bottom: 9px;
    }

    span.xoo-wsc-cr-code {
        display: inline-block;
        text-transform: uppercase;
        border: 1px solid;
        padding: 1px 20px;
    }

    .xoo-wsc-coupon-row {
        padding: 0 15px 30px;
        border-bottom: 1px dashed #afafaf;
        margin-bottom: 30px;
    }

    span.xoo-wsc-cr-off {
        color: #4CAF50;
        font-weight: 600;
        margin-bottom: 0;
    }

    form.xoo-wsc-sl-apply-coupon {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: stretch;
        margin: 20px 0;
        flex-wrap: wrap;
    }

    .xoo-wsc-sl-applied > div {
        display: flex;
        text-transform: uppercase;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    span.xoo-wsc-remove-coupon {
        text-transform: uppercase;
        cursor: pointer;
        font-size: 10px;
        margin-left: 2px;
    }

    .xoo-wsc-sl-applied {
        padding: 0 10px;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .xoo-wsc-sl-applied > div .xoo-wsc-slc-saved {
        color: #4CAF50;
        font-weight: 600;
    }

    span.xoo-wsc-slc-remove {
        font-weight: 600;
    }

    span.xoo-wsc-clist-label {
        text-transform: uppercase;
        color: #777;
        font-weight: bold;
        text-align: center;
        font-size: 12px;
        padding: 0 20px;
        display: inline-block;
        margin: 20px 0;
        text-align: center;
    }

    .xoo-wsc-clist-section {
        border: 1px solid #eee;
        margin-bottom: 35px;
        font-size: 13px;
        padding: 0 25px;
    }

    .xoo-wsc-coupon-row:last-child {
        border-bottom: 0;
        margin-bottom: 0;
    }

    .xoo-wsc-coupon-row > span:last-child {
        margin-bottom: 0;
    }

    span.xoo-wsc-slc-remove .xoo-wsc-remove-coupon {
        display: block;
        text-align: right;
    }


    /** Footer */
    .xoo-wsc-ftx-row {
        padding: 8px 0;
        border-top: 1px solid #f3f3f3;
        font-size: 14px;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #f3f3f3;
    }

    span.xoo-wsc-ftx-icon {
        margin-right: 5px;
        font-size: 17px;
    }


    .xoo-wsc-ftx-coups > div {
        flex-grow: 1;
    }

    .xoo-wsc-ftx-coups {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-grow: 1;
        margin-left: 7px;
    }

    .xoo-wsc-remove-coupon {
        display: inline-flex;
        align-items: center;
        text-transform: uppercase;
        cursor: pointer;
        margin-right: 3px;
    }

    .xoo-wsc-remove-coupon span {
        color: red;
        margin-left: 2px;
    }


    .xoo-wsc-ft-buttons-cont {
        display: grid;
        text-align: center;
        grid-column-gap: 10px;
        grid-row-gap: 10px;
    }

    a.xoo-wsc-ft-btn {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    a.xoo-wsc-ft-btn:not(.btn):not(.button) {
        padding: 10px;
    }


    .xoo-wsc-ft-buttons-cont a.xoo-wsc-ft-btn:only-child {
        grid-column: 1/-1;
    }


    /** FOOTER Totals **/
    .xoo-wsc-ft-totals {
        width: 100%;
        padding: 10px 0;
    }

    .xoo-wsc-ft-amt {
        padding: 3px;
        display: flex;
        justify-content: space-between;
    }

    .xoo-wsc-ft-amt-value .xoo-wsc-toggle-slider {
        cursor: pointer;
        margin-left: 5px;
    }

    span.xoo-wsc-ft-amt-label {
        font-weight: 600;
    }

    .xoo-wsc-toggle-slider {
        cursor: pointer;
    }

    .xoo-wsc-ft-amt-shipping .xoo-wsc-toggle-slider span {
        margin-left: 5px;
    }

    .xoo-wsc-ft-amt-label {
        flex-grow: 1;
        padding-right: 10px;
    }

    .xoo-wsc-ft-amt-value {
        text-align: right;
    }

    .xoo-wsc-ft-amt.less {
        color: #4CAF50;
    }

    .xoo-wsc-ft-amt-total {
        border-top: 1px dashed #9E9E9E;
        margin-top: 5px;
        padding-top: 5px;
    }

    /** SUGGESTED PRODUCTS **/
    span.xoo-wsc-sp-heading {
        text-align: center;
        display: block;
        padding-top: 5px;
        font-weight: 600;
    }

    .xoo-wsc-sp-product {
        padding: 0 15px;
    }

    .xoo-wsc-sp-container {
        margin: 10px 0;
    }


    .xoo-wsc-sp-left-col img {
        width: 100%;
        height: auto;
    }

    .xoo-wsc-sp-product {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        align-self: stretch;
    }

    .xoo-wsc-sp-right-col {
        padding-left: 20px;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex-grow: 1;
        justify-content: center;
    }

    .xoo-wsc-sp-right-col > span {
        display: block;
    }

    span.xoo-wsc-sp-atc a.button {
        text-transform: uppercase;
        font-size: 12px;
    }

    span.xoo-wsc-sp-atc a.button span {
        margin-right: 5px;
    }

    .xoo-wsc-sp-wide .xoo-wsc-sp-rc-bottom {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .xoo-wsc-sp-container .lSAction > .lSPrev {
        background-image: url(../images/arrow-left.png);
        background-position: center center;
        left: 0;
    }

    .xoo-wsc-sp-container .lSAction > .lSNext {
        background-image: url(../images/arrow-right.png);
        background-position: center center;
        right: 0;
    }

    .xoo-wsc-sp-container .lSAction > a {
        background-size: 50%;
        background-repeat: no-repeat;
        max-width: 22px;
    }

    .xoo-wsc-sp-narrow .xoo-wsc-sp-rc-bottom {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        flex-grow: 1;
    }

    .xoo-wsc-sp-container ul.lSPager.lSpg {
        display: none;
    }

    .xoo-wsc-sp-rc-top {
        padding-bottom: 6px;
    }

    .xoo-wsc-payment-btns {
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .xoo-wsc-payment-btns p {
        padding: 0!important;
        margin: 0!important;
        display: block;
    }

    .xoo-wsc-payment-btns > * {
        flex-grow: 1;
        margin-top: 8px!important;
    }

    .xoo-wsc-payment-btns .widget_shopping_cart {
        margin: 0;
        padding: 0;
    }

    /* Bundled product */

    .xoo-wsc-product.xoo-wsc-is-parent {
        border-bottom: 0;
        padding-bottom: 0;
    }

    .xoo-wsc-product.xoo-wsc-is-child img {
        max-width: 50px;
        margin-left: auto;
        float: right;
    }

    .xoo-wsc-product.xoo-wsc-is-child {
        padding-top: 5px;
    }

    .xoo-wsc-empty-cart {
        padding: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .xoo-wsc-empty-cart > * {
        margin-bottom: 20px;
    }


    span.xoo-wsc-ecl {
        font-size: 13px;
        cursor: pointer;
        display: table;
        padding: 10px;
        margin-left: auto;
    }
    a.xoo-wsc-ft-btn:nth-child(1){
        grid-column: 1/-1;
    }
    .xoo-wsc-sp-left-col img{
        max-width: 80px;
    }

    .xoo-wsc-sp-right-col{
        font-size: 14px;
    }

    .xoo-wsc-sp-container{
        background-color: #eee;
    }



    .xoo-wsc-ft-buttons-cont a.xoo-wsc-ft-btn {
        background-color: #000000;
        color: #ffffff;
        border: 1px solid #000;
    }



    .xoo-wsc-footer{
        background-color: #ffffff;
        color: #000000;
        padding: 10px 20px;
    }

    .xoo-wsc-footer, .xoo-wsc-footer a, .xoo-wsc-footer .amount{
        font-size: 12px;
    }

    .xoo-wsc-ft-buttons-cont{
        grid-template-columns: 2fr 2fr;
    }

    .xoo-wsc-basket{
        bottom: 12px;
        right: 0px;
        background-color: #ffffff;
        color: #000000;
        box-shadow: 0 1px 4px 0;
        border-radius: 50%}

    .xoo-wsc-bki{
        font-size: 30px}

    .xoo-wsc-items-count{
        top: -12px;
        left: -12px;
    }

    .xoo-wsc-items-count, .xoo-wsc-sc-count{
        background-color: #000000;
        color: #ffffff;
    }

    .xoo-wsc-container, .xoo-wsc-slider{
        max-width: 520px;
        right: -520px;
        top: 0;bottom: 0;
        bottom: 0;
        font-family: }


    .xoo-wsc-cart-active .xoo-wsc-container, .xoo-wsc-slider-active .xoo-wsc-slider{
        right: 0;
    }


    .xoo-wsc-cart-active .xoo-wsc-basket{
        right: 520px;
    }

    .xoo-wsc-slider{
        right: -520px;
    }

    span.xoo-wsch-close {
        font-size: 20px;
        right: 10px;
    }

    .xoo-wsch-top{
        justify-content: flex-start;
    }

    .xoo-wsch-text{
        font-size: 15px;
    }

    .xoo-wsc-header{
        color: #000000;
        background-color: #ffffff;
    }

    .xoo-wsc-sb-bar > span{
        background-color: #1e73be;
    }

    .xoo-wsc-body{
        background-color: #ffffff;
    }

    .xoo-wsc-body, .xoo-wsc-body span.amount, .xoo-wsc-body a{
        font-size: 10px;
        color: #000000;
    }

    .xoo-wsc-product{
        padding: 20px 15px;
    }

    .xoo-wsc-img-col{
        width: 30%;
    }
    .xoo-wsc-sum-col{
        width: 70%;
    }

    .xoo-wsc-sum-col{
        justify-content: center;
    }

    /***** Quantity *****/

    .xoo-wsc-qty-box{
        max-width: 75px;
    }

    .xoo-wsc-qty-box.xoo-wsc-qtb-square{
        border-color: #000000;
    }

    .xoo-wsc-header{padding-bottom:0;padding-top:50px;}

    input[type="number"].xoo-wsc-qty{
        border-color: #000000;
        background-color: #ffffff;
        color: #000000;
        height: 28px;
        line-height: 28px;
    }

    input[type="number"].xoo-wsc-qty, .xoo-wsc-qtb-square{
        border-width: px;
        border-style: solid;
    }
    .xoo-wsc-chng{
        background-color: #ffffff;
        color: #000000;
    }
</style>

<div class="xoo-wsc-modal ">
    <div class="xoo-wsc-container" style="opacity: 1;">
        <div class="xoo-wsc-header">
            <div class="xoo-wsch-top">
                <span class="xoo-wsch-text">SHOPPING CART</span>
                <span class="xoo-wsch-close xoo-wsc-icon-cross"></span>
            </div>
        </div>
        <div class="xoo-wsc-body">
            <div class="xoo-wsc-products">
                <div data-key="fde77ec9a06f5baa3b2d19bd1b4a3552" class="xoo-wsc-product">



                    <div class="xoo-wsc-img-col">

                        <a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=white&amp;attribute_pa_size=s"><img width="726" height="1038" src="https://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-673308-726x1038.jpeg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy"></a>

                    </div>


                    <div class="xoo-wsc-sum-col">



                        <div class="xoo-wsc-sm-info">

                            <div class="xoo-wsc-sm-left">

                                <span class="xoo-wsc-pname"><a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=white&amp;attribute_pa_size=s">Heli Bodysuit White</a></span>

                                <dl class="variation">
                                    <dt class="variation-Size">Size:</dt>
                                    <dd class="variation-Size"><p>S</p>
                                    </dd>

                                <div class="xoo-wsc-qty-box xoo-wsc-qtb-circle">


                                    <span class="xoo-wsc-minus xoo-wsc-chng">-</span>

                                    <input type="number" class="xoo-wsc-qty" step="1" min="0" max="" value="1" placeholder="" inputmode="numeric">


                                    <span class="xoo-wsc-plus xoo-wsc-chng">+</span>

                                </div>

                            </div>

                            <!-- End Quantity -->



                            <div class="xoo-wsc-sm-right">

                                <span class="xoo-wsc-smr-del xoo-wsc-icon-trash"></span>

                                <span class="xoo-wsc-smr-ptotal"><span class="woocommerce-Price-amount amount"><bdi>65&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>

                            </div>

                        </div>


                    </div>


                </div>
                <div data-key="55d46606c917d0cca40ba439ad0eb52b" class="xoo-wsc-product">



                    <div class="xoo-wsc-img-col">

                        <a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=white&amp;attribute_pa_size=l"><img width="726" height="1038" src="https://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-673308-726x1038.jpeg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy"></a>

                    </div>


                    <div class="xoo-wsc-sum-col">



                        <div class="xoo-wsc-sm-info">

                            <div class="xoo-wsc-sm-left">

                                <span class="xoo-wsc-pname"><a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=white&amp;attribute_pa_size=l">Heli Bodysuit White</a></span>

                                <dl class="variation">
                                    <dt class="variation-Size">Size:</dt>
                                    <dd class="variation-Size"><p>L</p>
                                    </dd>
                                </dl>


                                <!-- Quantity -->



                                <div class="xoo-wsc-qty-box xoo-wsc-qtb-circle">


                                    <span class="xoo-wsc-minus xoo-wsc-chng">-</span>

                                    <input type="number" class="xoo-wsc-qty" step="1" min="0" max="" value="1" placeholder="" inputmode="numeric">


                                    <span class="xoo-wsc-plus xoo-wsc-chng">+</span>

                                </div>

                            </div>

                            <!-- End Quantity -->



                            <div class="xoo-wsc-sm-right">

                                <span class="xoo-wsc-smr-del xoo-wsc-icon-trash"></span>

                                <span class="xoo-wsc-smr-ptotal"><span class="woocommerce-Price-amount amount"><bdi>65&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>

                            </div>

                        </div>


                    </div>


                </div>
                <div data-key="a44cbbdeb1ae92e36dfeb59c3b099e32" class="xoo-wsc-product">



                    <div class="xoo-wsc-img-col">

                        <a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=black&amp;attribute_pa_size=s"><img width="726" height="1038" src="https://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-673308-726x1038.jpeg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy"></a>

                    </div>


                    <div class="xoo-wsc-sum-col">



                        <div class="xoo-wsc-sm-info">

                            <div class="xoo-wsc-sm-left">

                                <span class="xoo-wsc-pname"><a href="https://lespoirstudios.com/product/heli-bodysuit-white/?attribute_pa_color=black&amp;attribute_pa_size=s">Heli Bodysuit White</a></span>

                                <dl class="variation">
                                    <dt class="variation-ColorPattern">Color/Pattern:</dt>
                                    <dd class="variation-ColorPattern"><p>Black</p>
                                    </dd>
                                    <dt class="variation-Size">Size:</dt>
                                    <dd class="variation-Size"><p>S</p>
                                    </dd>
                                </dl>


                                <!-- Quantity -->



                                <div class="xoo-wsc-qty-box xoo-wsc-qtb-circle">


                                    <span class="xoo-wsc-minus xoo-wsc-chng">-</span>

                                    <input type="number" class="xoo-wsc-qty" step="1" min="0" max="" value="1" placeholder="" inputmode="numeric">


                                    <span class="xoo-wsc-plus xoo-wsc-chng">+</span>

                                </div>

                            </div>

                            <!-- End Quantity -->



                            <div class="xoo-wsc-sm-right">

                                <span class="xoo-wsc-smr-del xoo-wsc-icon-trash"></span>

                                <span class="xoo-wsc-smr-ptotal"><span class="woocommerce-Price-amount amount"><bdi>65&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>

                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </div>
        <div class="xoo-wsc-footer">
            <div class="xoo-wsc-ft-extras">
                <div class="xoo-wsc-ftx-row xoo-wsc-ftx-coupon">
                    <span class="xoo-wsc-ftx-icon xoo-wsc-icon-coupon-8"></span>
                    <span class="xoo-wsc-toggle-slider" data-slider="coupon">Have a Promo Code?</span>
                </div>
            </div>
            <div class="xoo-wsc-ft-totals">
                <div class="xoo-wsc-ft-amt xoo-wsc-ft-amt-subtotal ">
                    <span class="xoo-wsc-ft-amt-label">Subtotal</span>
                    <span class="xoo-wsc-ft-amt-value"><span class="woocommerce-Price-amount amount"><bdi>195&nbsp;<span class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                </div>
            </div>
            <div class="xoo-wsc-ft-buttons-cont">
                <a href="/shop" class="xoo-wsc-ft-btn xoo-wsc-ft-btn-continue">Continue Shopping</a><a href="https://lespoirstudios.com/cart/" class="xoo-wsc-ft-btn xoo-wsc-ft-btn-cart">View Cart</a><a href="https://lespoirstudios.com/checkout/" class="xoo-wsc-ft-btn xoo-wsc-ft-btn-checkout">Checkout</a>
            </div>


            <div class="xoo-wsc-payment-btns">
            </div>

        </div>
        <span class="xoo-wsc-loader"></span>
    </div>
    <span class="xoo-wsc-opac">

</span></div>
<script>
    $(document).ready(function() {
        // Lấy dữ liệu từ localStorage
        var cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Hàm cập nhật hiển thị giỏ hàng
        function updateCartDisplay() {
            var $cartContainer = $('.xoo-wsc-products');
            $cartContainer.empty(); // Xóa các sản phẩm hiện có trong HTML

            var subtotal = 0;

            // Lặp qua từng sản phẩm trong giỏ hàng
            cart.forEach(function(item) {
                // Tính tổng tiền mỗi sản phẩm
                var totalPerItem = item.price * item.quantity_current;
                subtotal += totalPerItem;

                // Tạo HTML cho từng sản phẩm
                var productHTML = `
                <div class="xoo-wsc-product">
                    <div class="xoo-wsc-img-col">
                        <a href="${item.link}"><img src="${item.image}" alt="${item.name}" loading="lazy"></a>
                    </div>
                    <div class="xoo-wsc-sum-col">
                        <div class="xoo-wsc-sm-info">
                            <div class="xoo-wsc-sm-left">
                                <span class="xoo-wsc-pname"><a href="${item.link}">${item.name}</a></span>
                                <dl class="variation">
                                    <dt class="variation-Size">Size:</dt>
                                    <dd class="variation-Size"><p>${item.size}</p></dd>
                                    <dt class="variation-Color">Color:</dt>
                                    <dd class="variation-Color"><p>${item.color}</p></dd>
                                </dl>
                                <div class="xoo-wsc-qty-box xoo-wsc-qtb-circle">
                                    <span class="xoo-wsc-minus xoo-wsc-chng" data-id="${item.id}" data-size="${item.size}" data-color="${item.color}">-</span>
                                    <input type="number" class="xoo-wsc-qty" min="1" max="${item.max_quantity}" value="${item.quantity_current}">
                                    <span class="xoo-wsc-plus xoo-wsc-chng" data-id="${item.id}" data-size="${item.size}" data-color="${item.color}">+</span>
                                </div>
                            </div>
                            <div class="xoo-wsc-sm-right">
                                <span class="xoo-wsc-smr-del xoo-wsc-icon-trash" data-id="${item.id}" data-size="${item.size}" data-color="${item.color}"></span>
                                <span class="xoo-wsc-smr-ptotal"><bdi>${totalPerItem} $</bdi></span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                $cartContainer.append(productHTML);
            });

            // Cập nhật tổng phụ
            $('.xoo-wsc-ft-amt-value bdi').text(subtotal + ' $');
        }

        // Xử lý sự kiện tăng giảm số lượng
        $(document).on('click', '.xoo-wsc-minus, .xoo-wsc-plus', function() {
            var $btn = $(this);
            var id = $btn.data('id');
            var size = $btn.data('size');
            var color = $btn.data('color');
            var isIncrement = $btn.hasClass('xoo-wsc-plus');

            // Tìm sản phẩm trong giỏ hàng
            cart = cart.map(function(item) {
                if (item.id === id && item.size === size && item.color === color) {
                    if (isIncrement) {
                        item.quantity_current = Math.min(item.quantity_current + 1, item.max_quantity);
                    } else {
                        item.quantity_current = Math.max(item.quantity_current - 1, 1);
                    }
                }
                return item;
            });

            // Lưu lại giỏ hàng vào localStorage và cập nhật giao diện
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
        });

        // Xóa sản phẩm khỏi giỏ hàng
        $(document).on('click', '.xoo-wsc-smr-del', function() {
            var id = $(this).data('id');
            var size = $(this).data('size');
            var color = $(this).data('color');

            // Lọc bỏ sản phẩm được chọn
            cart = cart.filter(function(item) {
                return !(item.id === id && item.size === size && item.color === color);
            });

            // Cập nhật localStorage và giao diện
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartDisplay();
        });

        // Khởi chạy hiển thị giỏ hàng khi tải trang
        updateCartDisplay();
    });

</script>