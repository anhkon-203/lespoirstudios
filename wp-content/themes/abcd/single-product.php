<?php
get_header();
$brand = get_field('brand');
$gallery_product = get_field('gallery_product');
$group_variations = get_field('group_variations');
$colors = [];
$sizes = [];
$variations_data = []; // Lưu trữ thông tin cho từng kết hợp color-size
if ($group_variations) {
  $price = $group_variations['price'];
  $re_variations = $group_variations['re_variations'];

  if ($re_variations) {
    foreach ($re_variations as $variation) {
      if (!empty($variation['pick_color']) && !empty($variation['name_color'])) {
        $color = $variation['pick_color'];
        $color_name = $variation['name_color'];
        $colors[$color] = $color_name;

        if (!empty($variation['re_sizes'])) {
          foreach ($variation['re_sizes'] as $size_data) {
            if (!empty($size_data['size']) && isset($size_data['quantity'])) {
              $size = strtoupper($size_data['size']);
              $quantity = $size_data['quantity'];
              $sizes[$size] = $size; // Thu thập size duy nhất

              // Lưu thông tin quantity cho từng color-size
              $variations_data[sanitize_title($color_name)][strtolower($size)] = $quantity;
            }
          }
        }
      }
    }
  }
}
$sizes = array_unique($sizes);
$re_size_guide = get_field('re_size_guide');
$desc_product = get_field('desc_product');
$care_desc_product = get_field('care_desc_product');
?>
<style>
    /** Single Product **/
    .custom-product-images {
        .summary.entry-summary {
            width: 48%;
            height: 78vh;
            overflow-x: hidden;
            overflow-y: auto;
            cursor: pointer;
        }

        .single-product .summary.entry-summary {
            width: 48%;
            margin-left: 4%;
            margin-top: 0;
            display: flex;
            flex-flow: wrap;
            align-content: baseline;
            position: sticky;
            top: 100px;
            height: fit-content;
        }

        .single-product div.product {
            max-width: 1054px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            position: relative;
            z-index: 2
        }

        .custom-product-images::-webkit-scrollbar {
            width: 0.5em;
        }

        .custom-product-images::-webkit-scrollbar-thumb {
            background-color: transparent;
        }

        .custom-product-images::-webkit-scrollbar-track {
            background-color: transparent;
        }

        .single-product nav.woocommerce-breadcrumb {
            opacity: 0;
        }

        .single-product main {
            padding-top: 100px;
        }

        .single-product h1.entry-title {
            margin-top: 0;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: normal;
            letter-spacing: 1.6px;
            text-transform: uppercase;
            width: 100%;
            color: black;
            text-align: left;
            margin-bottom: 0;
            order: 0;
        }

        .single-product .summary.entry-summary .entry-title + .price {
            margin-top: 50px;
            font-size: 16px;
            height: auto;
            line-height: normal;
            display: flex;
            width: 100%;
            text-align: right;
            color: black;
            letter-spacing: 1.6px;
            font-weight: 500;
            order: 1;
            margin-bottom: 0;
        }

        .single-product table.variations tr {
            display: flex;
            flex-flow: wrap;
            margin-bottom: 50px;
            position: relative;
        }

        .single-product table.variations tr > * {
            width: 100%;
            text-align: left;
        }

        .single-product table.variations tr th {
            font-weight: 400;
            margin-bottom: 5px;
            color: black;
            font-size: 12px;
            letter-spacing: 0.24px;
        }

        .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.radio-variable-item) {
            border-radius: 0;
            padding: 1px;
            box-shadow: none !important;
            border: 1px solid #d8d7d7;
            width: 20px;
            height: 20px;
            margin-left: 0;
            margin-right: 10px;
        }

        .button-variable-items-wrapper .variable-item-contents {
            border: none !important;
        }

        .single-product ul.variable-items-wrapper.button-variable-items-wrapper .button-variable-item {
            border: none !important;
            margin-left: -5px !important;
            text-align: center;
            margin-right: 10px !important;
        }

        .single-product ul.variable-items-wrapper.button-variable-items-wrapper .button-variable-item span {
            font-size: 10px;
        }

        .single-product form.cart {
            margin-top: 50px;
            width: 100%;
            position: relative;
            order: 2;
        }

        .single-product table.variations tr:last-child {
            margin-bottom: 0;
        }

        .single-product form.cart .quantity {
            display: none !important;
        }

        .single-product button.single_add_to_cart_button {
            background-color: black;
            color: white;
            border-radius: 0;
            max-width: 320px;
            width: 100%;
            display: block;
            padding: 11px;
            cursor: pointer;
            font-size: 12px;
            border: 1px solid black;
            transition: .3s;
        }

        .single-product .product_meta {
            display: none;
        }

        .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).button-variable-item.selected:not(.no-stock) span {
            font-weight: 500;
        }

        .single-product a.reset_variations {
            position: absolute;
            right: 0;
            bottom: 4px;
            font-size: 10px;
        }

        ul.tabs.wc-tabs {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
        }

        ul.tabs.wc-tabs a {
            text-transform: capitalize;
            color: #868686 !important;
            cursor: pointer !important;
            padding: 0 !important;
        }

        ul.tabs.wc-tabs li {
            margin-right: 30px !important;
            font-size: 12px;
        }

        .woocommerce-tabs.wc-tabs-wrapper {
            margin-top: 60px;
            order: 3;
        }

        ul.tabs.wc-tabs li.active a {
            color: black !important;
            padding-bottom: 0;
            border-bottom: 1px solid black;
        }

        section.related.products .products {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        section.related.products > h2 {
            font-weight: 400;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            text-align: center;
            font-size: 10px;
            margin: 0 0 60px;
        }

        section.related.products {
            margin-top: 150px;
        }

        .single-product .woocommerce-message {
            display: none;
        }

        .woocommerce-Tabs-panel {
            font-size: 12px;
        }

        .single-product button.single_add_to_cart_button:hover {
            background-color: white;
            color: black;
        }

        .product-sub-title {
            margin-top: 5px;
            margin-bottom: 0;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 166.667% */
            letter-spacing: 0.24px;
        }

        ol.flex-control-nav.flex-control-thumbs {
            display: none;
        }

        .woocommerce-product-gallery .flex-viewport::-webkit-scrollbar {
            width: 0.5em;
        }

        .woocommerce-product-gallery .flex-viewport::-webkit-scrollbar-thumb {
            background-color: transparent;
        }

        .woocommerce-product-gallery .flex-viewport::-webkit-scrollbar-track {
            background-color: transparent;
        }

        .woocommerce-variation-price span.price {
            font-size: 12px;
        }

        .single-product .summary.entry-summary .entry-title + .price > * {
            margin: 0 3px;
        }

        .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled .variable-item-contents:before, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover .variable-item-contents:before {
            background-size: 30px;
            background-position: center;
            filter: grayscale(1);
        }

        span.onsale {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 1;
            font-size: 10px;
            background-color: black;
            color: white;
            padding: 5px 10px;
            text-transform: capitalize;
        }

        ins {
            background: white;
        }

        /** Size guide **/

        ul.sg-table__head-units {
            list-style: none;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        ul.sg-table__head-units a {
            color: black;
            text-decoration: none;
            color: #868686;
        }

        ul.sg-table__head-units li.active a {
            font-weight: 500;
            color: black;
        }

        ul.sg-table__head-units li {
            margin-right: 30px;
        }

        .sg-table__head .row {
            align-items: center;
        }

        .sg-table__body-content {
            display: none;
        }

        .sg-table__body-content.active {
            display: flex;
        }

        .sg-table__cols .row {
            justify-content: space-between;
        }

        .sg-table__head .row {
            border-bottom: 1px solid black;
            padding: 12px 0;
            position: relative;
        }

        .size-guide-table {
            max-width: 835px;
            background: #FCFCFA;
            margin: 0 auto;
            position: fixed;
            z-index: 9999999;
            top: 15%;
            left: 0;
            right: -500%;
            padding: 160px 64px 64px;
            opacity: 1;
            transition: all .7s;
        }

        .size-guide-table.active {
            opacity: 1;
            right: 0;
        }

        .sg-table__head .row div:first-child {
            padding-left: 0;
            font-size: 16px;
            letter-spacing: 1.6px;
            font-weight: 500;
        }

        .sg-table__head .row div:last-child {
            padding-right: 0;
        }

        .sg-table__measurement {
            padding-left: 0;
            text-transform: uppercase;
        }

        .sg-table__cols {
            padding-right: 0;
        }

        .sg-table__col p:first-child {
            font-weight: 500;
        }

        .sg-table__measurement p:last-child, .sg-table__col p:last-child {
            margin-bottom: 0;
        }

        span.view-size-guide {
            position: absolute;
            bottom: 71px;
            left: 45%;
            cursor: pointer;
            z-index: 1;
            padding: 3px 1px;
            line-height: 1em;
            border-bottom: 1px solid transparent;
            transition: all .3s;
        }

        .single-product table.variations {
            margin-bottom: 30px;
        }

        .close-size-guide {
            background-image: url(https://lespoirstudios.com/wp-content/themes/lespoir/assets/images/plus-icon.svg);
            background-repeat: no-repeat;
            width: 25px;
            height: 25px;
            position: absolute;
            right: 0;
            cursor: pointer;
            transform: rotate(45deg);
            background-size: cover;
            background-position: center;
        }

        .single_variation_wrap .woocommerce-variation-price {
            position: absolute;
            bottom: 40px;
        }

        .single_variation_wrap .woocommerce-variation-price span.price {
            font-size: 14px;
        }

        .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.radio-variable-item).selected {
            border-color: black;
        }

        .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).color-variable-item.selected:not(.no-stock) .variable-item-contents:before, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).image-variable-item.selected:not(.no-stock) .variable-item-contents:before {
            content: none !important;
        }

        .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled .variable-item-contents, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled img, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled span, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover .variable-item-contents, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover img, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover span {
            opacity: .8;
        }

        .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.color-variable-item):first-child {
            margin-left: -12px !important;
        }

        span.view-size-guide.active {
            border-bottom: 1px solid;
        }

        span.view-size-guide:hover {
            border-color: black;
        }

        .sg-table__body p {
            line-height: 20px;
            margin-top: 12px;
            margin-bottom: 0;
        }

        p.sg-bottom-text {
            font-weight: 300;
            line-height: 16px;
            margin-top: 12px;
            margin-bottom: 0;
        }

        .product-type-simple span.view-size-guide {
            bottom: 85px;
        }

        @media screen and (max-width: 1024px) {
            .single-product main {
                padding-top: 0;
            }
        }

        @media screen and (max-width: 900px) {
            .size-guide-table {
                max-width: calc(100% - 30px);
                padding: 64px;
            }
        }

        @media screen and (min-width: 768px) {
            .woocommerce-product-gallery .flex-viewport {
                overflow: visible !important;
            }

            .woocommerce-product-gallery__wrapper {
                transform: none !important;
                width: 100% !important;
            }

            .woocommerce-product-gallery.woocommerce-product-gallery--with-images {
                width: 48%;
                overflow-x: hidden;
                overflow-y: auto;
                cursor: pointer;
            }
        }

        @media screen and (max-width: 767px) {
            .woocommerce-product-gallery {
                width: 100%;
                margin-bottom: 50px;
            }

            .single-product .summary.entry-summary {
                width: 100%;
                margin-left: 0;
            }

            .single-product form.variations_form.cart {
                margin-top: 50px;
            }

            span.view-size-guide {
                left: auto;
                right: 0;
                bottom: 35px;
                padding: 5px 2px 5px 5px;
            }

            .single_variation_wrap .woocommerce-variation-add-to-cart {
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 9;
                background-color: white;
                left: 0;
                padding: 10px 15px;
                border-top: 1px solid black;
            }

            .single-product button.single_add_to_cart_button {
                max-width: none;
                position: relative;
            }

            .single-product button.single_add_to_cart_button {
                background-color: black !important;
                color: white !important;
            }

            .woocommerce-tabs.wc-tabs-wrapper {
                margin-top: 15px;
            }

            section.related.products {
                margin-top: 100px;
            }

            .single-product a.reset_variations {
                left: 160px;
                bottom: 5px;
                width: fit-content;
            }

            .single_variation_wrap .woocommerce-variation-price {
                bottom: 5px;
            }

            .single_variation_wrap .woocommerce-variation-price span.price {
                font-size: 12px;
            }
        }

        @media screen and (max-width: 480px) {
            .sg-table__head .row div:first-child {
                font-size: 10px;
                white-space: nowrap;
            }

            .sg-table__body-content {
                font-size: 8px;
            }

            .sg-table__cols {
                padding-left: 0;
            }

            .sg-table__head .row div {
                padding-left: 0;
            }

            .size-guide-table {
                padding: 15px;
            }

            .sg-table__body-content p {
                margin-bottom: 0;
                margin-top: 8px;
                line-height: 15px;
            }

            .sg-table__head .row {
                padding-top: 0;
            }

            .single-product .summary.entry-summary .entry-title + .price {
                width: 100%;
                justify-content: left;
                padding-left: 0;
                order: 2;
                margin-top: 10px;
            }

            .single-product .summary.entry-summary .entry-title + .price span:first-child {
                margin-left: 0;
            }

            .single-product h1.entry-title {
                font-size: 14px;
                order: 0;
            }

            .product-sub-title {
                order: 1;
                width: 100%;
                font-size: 10px;
            }

            .single-product form.variations_form.cart {
                order: 3;
            }

            .woocommerce-tabs.wc-tabs-wrapper {
                order: 4;
            }

            .woocommerce-product-gallery {
                margin-bottom: 20px;
            }

            .single-product form.variations_form.cart {
                margin-top: 30px;
            }

            .single-product table.variations tr {
                margin-bottom: 30px;
            }

            .single-product table.variations {
                margin-bottom: 25px;
            }

            span.view-size-guide {
                bottom: 29px;
                padding-right: 0;
            }

            .single-product form.cart:not(.variations_form) button {
                position: fixed;
                bottom: 10px;
                width: calc(100% - 30px);
                z-index: 9;
                background-color: white;
                left: 0;
                right: 0;
                padding: 10px 15px;
                border-top: 1px solid black;
                margin: auto;
            }

            .product-type-simple .woocommerce-tabs.wc-tabs-wrapper {
                margin-top: 50px;
            }

            .single-product form.cart:not(.variations_form) button:after {
                content: "";
                position: fixed;
                width: 100vw;
                height: 10px;
                left: 0;
                border-top: 1px solid black;
                bottom: 44px;
                background-color: white;
                z-index: 1; /** Single Product **/

                .custom-product-images {
                    width: 48%;
                    height: 78vh;
                    overflow-x: hidden;
                    overflow-y: auto;
                    cursor: pointer;
                }

                .single-product .summary.entry-summary {
                    width: 48%;
                    margin-left: 4%;
                    margin-top: 0;
                    display: flex;
                    flex-flow: wrap;
                    align-content: baseline;
                    position: sticky;
                    top: 100px;
                    height: fit-content;
                }

                .single-product div.product {
                    max-width: 1054px;
                    margin: 0 auto;
                    display: flex;
                    flex-wrap: wrap;
                    position: relative;
                    z-index: 2
                }

                .custom-product-images::-webkit-scrollbar {
                    width: 0.5em;
                }

                .custom-product-images::-webkit-scrollbar-thumb {
                    background-color: transparent;
                }

                .custom-product-images::-webkit-scrollbar-track {
                    background-color: transparent;
                }

                .single-product nav.woocommerce-breadcrumb {
                    opacity: 0;
                }

                .single-product main {
                    padding-top: 100px;
                }

                .single-product h1.entry-title {
                    margin-top: 0;
                    font-size: 16px;
                    font-style: normal;
                    font-weight: 500;
                    line-height: normal;
                    letter-spacing: 1.6px;
                    text-transform: uppercase;
                    width: 100%;
                    color: black;
                    text-align: left;
                    margin-bottom: 0;
                    order: 0;
                }

                .single-product .summary.entry-summary .entry-title + .price {
                    margin-top: 50px;
                    font-size: 16px;
                    height: auto;
                    line-height: normal;
                    display: flex;
                    width: 100%;
                    text-align: right;
                    color: black;
                    letter-spacing: 1.6px;
                    font-weight: 500;
                    order: 1;
                    margin-bottom: 0;
                }

                .single-product table.variations tr {
                    display: flex;
                    flex-flow: wrap;
                    margin-bottom: 50px;
                    position: relative;
                }

                .single-product table.variations tr > * {
                    width: 100%;
                    text-align: left;
                }

                .single-product table.variations tr th {
                    font-weight: 400;
                    margin-bottom: 5px;
                    color: black;
                    font-size: 12px;
                    letter-spacing: 0.24px;
                }

                .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.radio-variable-item) {
                    border-radius: 0;
                    padding: 1px;
                    box-shadow: none !important;
                    border: 1px solid #d8d7d7;
                    width: 20px;
                    height: 20px;
                    margin-left: 0;
                    margin-right: 10px;
                }

                .button-variable-items-wrapper .variable-item-contents {
                    border: none !important;
                }

                .single-product ul.variable-items-wrapper.button-variable-items-wrapper .button-variable-item {
                    border: none !important;
                    margin-left: -5px !important;
                    text-align: center;
                    margin-right: 10px !important;
                }

                .single-product ul.variable-items-wrapper.button-variable-items-wrapper .button-variable-item span {
                    font-size: 10px;
                }

                .single-product form.cart {
                    margin-top: 50px;
                    width: 100%;
                    position: relative;
                    order: 2;
                }

                .single-product table.variations tr:last-child {
                    margin-bottom: 0;
                }

                .single-product form.cart .quantity {
                    display: none !important;
                }

                .single-product button.single_add_to_cart_button {
                    background-color: black;
                    color: white;
                    border-radius: 0;
                    max-width: 320px;
                    width: 100%;
                    display: block;
                    padding: 11px;
                    cursor: pointer;
                    font-size: 12px;
                    border: 1px solid black;
                    transition: .3s;
                }

                .single-product .product_meta {
                    display: none;
                }

                .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).button-variable-item.selected:not(.no-stock) span {
                    font-weight: 500;
                }

                .single-product a.reset_variations {
                    position: absolute;
                    right: 0;
                    bottom: 4px;
                    font-size: 10px;
                }

                ul.tabs.wc-tabs {
                    margin: 0;
                    padding: 0;
                    list-style: none;
                    display: flex;
                }

                ul.tabs.wc-tabs a {
                    text-transform: capitalize;
                    color: #868686 !important;
                    cursor: pointer !important;
                    padding: 0 !important;
                }

                ul.tabs.wc-tabs li {
                    margin-right: 30px !important;
                    font-size: 12px;
                }

                .woocommerce-tabs.wc-tabs-wrapper {
                    margin-top: 60px;
                    order: 3;
                }

                ul.tabs.wc-tabs li.active a {
                    color: black !important;
                    padding-bottom: 0;
                    border-bottom: 1px solid black;
                }

                section.related.products .products {
                    list-style: none;
                    margin: 0;
                    padding: 0;
                }

                section.related.products > h2 {
                    font-weight: 400;
                    letter-spacing: 0.5px;
                    text-transform: uppercase;
                    text-align: center;
                    font-size: 10px;
                    margin: 0 0 60px;
                }

                section.related.products {
                    margin-top: 150px;
                }

                .single-product .woocommerce-message {
                    display: none;
                }

                .woocommerce-Tabs-panel {
                    font-size: 12px;
                }

                .single-product button.single_add_to_cart_button:hover {
                    background-color: white;
                    color: black;
                }

                .product-sub-title {
                    margin-top: 5px;
                    margin-bottom: 0;
                    font-size: 12px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: 20px;
                    /* 166.667% */
                    letter-spacing: 0.24px;
                }

                ol.flex-control-nav.flex-control-thumbs {
                    display: none;
                }

                .woocommerce-product-gallery .flex-viewport::-webkit-scrollbar {
                    width: 0.5em;
                }

                .woocommerce-product-gallery .flex-viewport::-webkit-scrollbar-thumb {
                    background-color: transparent;
                }

                .woocommerce-product-gallery .flex-viewport::-webkit-scrollbar-track {
                    background-color: transparent;
                }

                .woocommerce-variation-price span.price {
                    font-size: 12px;
                }

                .single-product .summary.entry-summary .entry-title + .price > * {
                    margin: 0 3px;
                }

                .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled .variable-item-contents:before, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover .variable-item-contents:before {
                    background-size: 30px;
                    background-position: center;
                    filter: grayscale(1);
                }

                span.onsale {
                    position: absolute;
                    left: 0;
                    top: 0;
                    z-index: 1;
                    font-size: 10px;
                    background-color: black;
                    color: white;
                    padding: 5px 10px;
                    text-transform: capitalize;
                }

                ins {
                    background: white;
                }

                /** Size guide **/

                ul.sg-table__head-units {
                    list-style: none;
                    display: flex;
                    align-items: center;
                    margin: 0;
                    padding: 0;
                }

                ul.sg-table__head-units a {
                    color: black;
                    text-decoration: none;
                    color: #868686;
                }

                ul.sg-table__head-units li.active a {
                    font-weight: 500;
                    color: black;
                }

                ul.sg-table__head-units li {
                    margin-right: 30px;
                }

                .sg-table__head .row {
                    align-items: center;
                }

                .sg-table__body-content {
                    display: none;
                }

                .sg-table__body-content.active {
                    display: flex;
                }

                .sg-table__cols .row {
                    justify-content: space-between;
                }

                .sg-table__head .row {
                    border-bottom: 1px solid black;
                    padding: 12px 0;
                    position: relative;
                }

                .size-guide-table {
                    max-width: 835px;
                    background: #FCFCFA;
                    margin: 0 auto;
                    position: fixed;
                    z-index: 9999999;
                    top: 15%;
                    left: 0;
                    right: -500%;
                    padding: 160px 64px 64px;
                    opacity: 1;
                    transition: all .7s;
                }

                .size-guide-table.active {
                    opacity: 1;
                    right: 0;
                }

                .sg-table__head .row div:first-child {
                    padding-left: 0;
                    font-size: 16px;
                    letter-spacing: 1.6px;
                    font-weight: 500;
                }

                .sg-table__head .row div:last-child {
                    padding-right: 0;
                }

                .sg-table__measurement {
                    padding-left: 0;
                    text-transform: uppercase;
                }

                .sg-table__cols {
                    padding-right: 0;
                }

                .sg-table__col p:first-child {
                    font-weight: 500;
                }

                .sg-table__measurement p:last-child, .sg-table__col p:last-child {
                    margin-bottom: 0;
                }

                span.view-size-guide {
                    position: absolute;
                    bottom: 71px;
                    left: 45%;
                    cursor: pointer;
                    z-index: 1;
                    padding: 3px 1px;
                    line-height: 1em;
                    border-bottom: 1px solid transparent;
                    transition: all .3s;
                }

                .single-product table.variations {
                    margin-bottom: 30px;
                }

                .close-size-guide {
                    background-image: url(../images/plus-icon.svg);
                    background-repeat: no-repeat;
                    width: 25px;
                    height: 25px;
                    position: absolute;
                    right: 0;
                    cursor: pointer;
                    transform: rotate(45deg);
                    background-size: cover;
                    background-position: center;
                }

                .single_variation_wrap .woocommerce-variation-price {
                    position: absolute;
                    bottom: 40px;
                }

                .single_variation_wrap .woocommerce-variation-price span.price {
                    font-size: 14px;
                }

                .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.radio-variable-item).selected {
                    border-color: black;
                }

                .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).color-variable-item.selected:not(.no-stock) .variable-item-contents:before, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).image-variable-item.selected:not(.no-stock) .variable-item-contents:before {
                    content: none !important;
                }

                .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled .variable-item-contents, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled img, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled span, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover .variable-item-contents, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover img, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover span {
                    opacity: .8;
                }

                .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.color-variable-item):first-child {
                    margin-left: -12px !important;
                }

                span.view-size-guide.active {
                    border-bottom: 1px solid;
                }

                span.view-size-guide:hover {
                    border-color: black;
                }

                .sg-table__body p {
                    line-height: 20px;
                    margin-top: 12px;
                    margin-bottom: 0;
                }

                p.sg-bottom-text {
                    font-weight: 300;
                    line-height: 16px;
                    margin-top: 12px;
                    margin-bottom: 0;
                }

                .product-type-simple span.view-size-guide {
                    bottom: 85px;
                }

                @media screen and (max-width: 1024px) {
                    .single-product main {
                        padding-top: 0;
                    }
                }

                @media screen and (max-width: 900px) {
                    .size-guide-table {
                        max-width: calc(100% - 30px);
                        padding: 64px;
                    }
                }

                @media screen and (min-width: 768px) {
                    .woocommerce-product-gallery .flex-viewport {
                        overflow: visible !important;
                    }

                    .woocommerce-product-gallery__wrapper {
                        transform: none !important;
                        width: 100% !important;
                    }

                    .woocommerce-product-gallery.woocommerce-product-gallery--with-images {
                        width: 48%;
                        overflow-x: hidden;
                        overflow-y: auto;
                        cursor: pointer;
                    }
                }

                @media screen and (max-width: 767px) {
                    .woocommerce-product-gallery {
                        width: 100%;
                        margin-bottom: 50px;
                    }

                    .single-product .summary.entry-summary {
                        width: 100%;
                        margin-left: 0;
                    }

                    .single-product form.variations_form.cart {
                        margin-top: 50px;
                    }

                    span.view-size-guide {
                        left: auto;
                        right: 0;
                        bottom: 35px;
                        padding: 5px 2px 5px 5px;
                    }

                    .single_variation_wrap .woocommerce-variation-add-to-cart {
                        position: fixed;
                        bottom: 0;
                        width: 100%;
                        z-index: 9;
                        background-color: white;
                        left: 0;
                        padding: 10px 15px;
                        border-top: 1px solid black;
                    }

                    .single-product button.single_add_to_cart_button {
                        max-width: none;
                        position: relative;
                    }

                    .single-product button.single_add_to_cart_button {
                        background-color: black !important;
                        color: white !important;
                    }

                    .woocommerce-tabs.wc-tabs-wrapper {
                        margin-top: 15px;
                    }

                    section.related.products {
                        margin-top: 100px;
                    }

                    .single-product a.reset_variations {
                        left: 160px;
                        bottom: 5px;
                        width: fit-content;
                    }

                    .single_variation_wrap .woocommerce-variation-price {
                        bottom: 5px;
                    }

                    .single_variation_wrap .woocommerce-variation-price span.price {
                        font-size: 12px;
                    }
                }

                @media screen and (max-width: 480px) {
                    .sg-table__head .row div:first-child {
                        font-size: 10px;
                        white-space: nowrap;
                    }

                    .sg-table__body-content {
                        font-size: 8px;
                    }

                    .sg-table__cols {
                        padding-left: 0;
                    }

                    .sg-table__head .row div {
                        padding-left: 0;
                    }

                    .size-guide-table {
                        padding: 15px;
                    }

                    .sg-table__body-content p {
                        margin-bottom: 0;
                        margin-top: 8px;
                        line-height: 15px;
                    }

                    .sg-table__head .row {
                        padding-top: 0;
                    }

                    .single-product .summary.entry-summary .entry-title + .price {
                        width: 100%;
                        justify-content: left;
                        padding-left: 0;
                        order: 2;
                        margin-top: 10px;
                    }

                    .single-product .summary.entry-summary .entry-title + .price span:first-child {
                        margin-left: 0;
                    }

                    .single-product h1.entry-title {
                        font-size: 14px;
                        order: 0;
                    }

                    .product-sub-title {
                        order: 1;
                        width: 100%;
                        font-size: 10px;
                    }

                    .single-product form.variations_form.cart {
                        order: 3;
                    }

                    .woocommerce-tabs.wc-tabs-wrapper {
                        order: 4;
                    }

                    .woocommerce-product-gallery {
                        margin-bottom: 20px;
                    }

                    .single-product form.variations_form.cart {
                        margin-top: 30px;
                    }

                    .single-product table.variations tr {
                        margin-bottom: 30px;
                    }

                    .single-product table.variations {
                        margin-bottom: 25px;
                    }

                    span.view-size-guide {
                        bottom: 29px;
                        padding-right: 0;
                    }

                    .single-product form.cart:not(.variations_form) button {
                        position: fixed;
                        bottom: 10px;
                        width: calc(100% - 30px);
                        z-index: 9;
                        background-color: white;
                        left: 0;
                        right: 0;
                        padding: 10px 15px;
                        border-top: 1px solid black;
                        margin: auto;
                    }

                    .product-type-simple .woocommerce-tabs.wc-tabs-wrapper {
                        margin-top: 50px;
                    }

                    .single-product form.cart:not(.variations_form) button:after {
                        content: "";
                        position: fixed;
                        width: 100vw;
                        height: 10px;
                        left: 0;
                        border-top: 1px solid black;
                        bottom: 44px;
                        background-color: white;
                        z-index: 1;
                    }

                    .single-product form.cart:not(.variations_form) button:before {
                        content: "";
                        position: fixed;
                        width: 100vw;
                        height: 10px;
                        left: 0;
                        bottom: 0;
                        background-color: white;
                        z-index: 1;
                    }

                    .product-type-simple span.view-size-guide {
                        bottom: 50px;
                    }
                }

            }

            .single-product form.cart:not(.variations_form) button:before {
                content: "";
                position: fixed;
                width: 100vw;
                height: 10px;
                left: 0;
                bottom: 0;
                background-color: white;
                z-index: 1;
            }

            .product-type-simple span.view-size-guide {
                bottom: 50px;
            }
        }

</style>
<style>
    .wvs-has-image-tooltip, [data-wvstooltip] {
        --font-size: 14px;
        --arrow-width: 5px;
        --arrow-distance: 10px;
        --arrow-position: calc(var(--arrow-distance) * -1);
        --tip-redius: 3px;
        --tip-min-width: 100px;
        --tip-min-height: 100px;
        --tip-height: 30px;
        --tip-breakpoint-start: 53vw;
        --tip-distance: calc(var(--arrow-distance) + var(--tip-height));
        --tip-position: calc(var(--tip-distance) * -1);
        --image-tip-min-height: calc(var(--tip-min-height) + var(--tip-height));
        --image-tip-max-height: calc(var(--tooltip-height) + var(--tip-height));
        --image-tip-width-dynamic: clamp(var(--tip-min-width), var(--tip-breakpoint-start), var(--tooltip-width));
        --image-tip-height-dynamic: clamp(var(--tip-min-height), var(--tip-breakpoint-start), var(--tooltip-height));
        --image-tip-ratio: calc(var(--tooltip-height) / var(--tooltip-width));
        --image-tip-position: calc(100% + var(--arrow-distance));
        --horizontal-position: 0px;
        cursor: pointer;
        outline: none;
        position: relative
    }

    .wvs-has-image-tooltip:after, .wvs-has-image-tooltip:before, [data-wvstooltip]:after, [data-wvstooltip]:before {
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: row;
        flex-direction: row;
        justify-content: center;
        opacity: 0;
        pointer-events: none;
        position: absolute;
        -webkit-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-transition: opacity .5s ease-in-out;
        -o-transition: opacity .5s ease-in-out;
        transition: opacity .5s ease-in-out;
        visibility: hidden;
        z-index: 999
    }

    .wvs-has-image-tooltip:before, [data-wvstooltip]:before {
        background-color: var(--wvs-tooltip-background-color, #333);
        border-radius: var(--tip-redius);
        bottom: var(--image-tip-position);
        -webkit-box-shadow: 0 0 5px 1px rgba(0, 0, 0, .3);
        box-shadow: 0 0 5px 1px rgba(0, 0, 0, .3);
        color: var(--wvs-tooltip-text-color, #fff);
        font-size: var(--font-size);
        height: var(--tip-height);
        line-height: var(--tip-height);
        min-width: var(--tip-min-width);
        padding-inline: 10px;
        top: auto;
        -webkit-transform: translateX(var(--horizontal-position));
        -ms-transform: translateX(var(--horizontal-position));
        transform: translateX(var(--horizontal-position));
        width: -webkit-max-content;
        width: -moz-max-content;
        width: max-content
    }

    [data-wvstooltip]:before {
        content: attr(data-wvstooltip) " " attr(data-wvstooltip-out-of-stock)
    }

    .wvs-has-image-tooltip:before {
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        -ms-flex-line-pack: center;
        align-content: center;
        align-items: center;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        background-image: var(--tooltip-background);
        background-position: top;
        background-repeat: no-repeat;
        background-size: contain;
        content: attr(data-title);
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        height: calc(var(--image-tip-height-dynamic) + var(--tip-height));
        justify-content: flex-end;
        min-width: var(--image-tip-width-dynamic)
    }

    .wvs-has-image-tooltip:after, [data-wvstooltip]:after {
        border-top-color: transparent;
        border: var(--arrow-width) solid transparent;
        border-top-color: var(--wvs-tooltip-background-color, #333);
        bottom: auto;
        content: " ";
        font-size: 0;
        line-height: 0;
        top: var(--arrow-position);
        width: 0
    }

    .wvs-has-image-tooltip:hover:after, .wvs-has-image-tooltip:hover:before, [data-wvstooltip]:hover:after, [data-wvstooltip]:hover:before {
        opacity: 1;
        visibility: visible
    }

    .wvs-tooltip-position-bottom.wvs-has-image-tooltip:after, .wvs-tooltip-position-bottom[data-wvstooltip]:after {
        border-bottom-color: var(--wvs-tooltip-background-color, #333);
        border-top-color: transparent;
        bottom: var(--arrow-position);
        top: auto
    }

    .wvs-tooltip-position-bottom.wvs-has-image-tooltip:before, .wvs-tooltip-position-bottom[data-wvstooltip]:before {
        bottom: auto;
        top: calc(var(--tip-position) * -1)
    }

    .wvs-theme-sober .product form.cart .variations .variable, .wvs-theme-sober-child .product form.cart .variations .variable {
        margin-bottom: 15px !important
    }

    .wvs-theme-sober .product form.cart .variations .variable-options, .wvs-theme-sober-child .product form.cart .variations .variable-options {
        border: 0 !important
    }

    .wvs-theme-sober .product form.cart .variations .arrow, .wvs-theme-sober .product form.cart .variations .variable-options:after, .wvs-theme-sober-child .product form.cart .variations .arrow, .wvs-theme-sober-child .product form.cart .variations .variable-options:after {
        display: none
    }

    .wvs-theme-sober .product form.cart .variations .label, .wvs-theme-sober-child .product form.cart .variations .label {
        display: block;
        margin-right: 10px;
        text-align: right
    }

    .wvs-theme-sober .product form.cart .variations .value, .wvs-theme-sober-child .product form.cart .variations .value {
        -webkit-box-flex: unset;
        -ms-flex-positive: unset;
        flex-grow: unset
    }

    .wvs-theme-sober .product form.cart .variations select, .wvs-theme-sober-child .product form.cart .variations select {
        -webkit-appearance: menulist-button !important;
        border: 1px solid #e4e6eb !important;
        padding: .5em 1em !important;
        text-align: left !important;
        -moz-text-align-last: left !important;
        text-align-last: left !important
    }

    .wvs-theme-sober .product form.cart .radio-variable-item, .wvs-theme-sober-child .product form.cart .radio-variable-item {
        margin: 5px;
        text-align: left
    }

    .wvs-theme-sober .product form.cart .radio-variable-item:last-child, .wvs-theme-sober-child .product form.cart .radio-variable-item:last-child {
        margin-right: 0
    }

    .wvs-theme-sober .product form.cart .radio-variable-item label, .wvs-theme-sober-child .product form.cart .radio-variable-item label {
        margin: 0;
        padding-left: 30px
    }

    .wvs-theme-sober .product form.cart .radio-variable-item label:before, .wvs-theme-sober-child .product form.cart .radio-variable-item label:before {
        border-radius: 100%;
        top: 0
    }

    .wvs-theme-sober .product form.cart .radio-variable-item label:after, .wvs-theme-sober-child .product form.cart .radio-variable-item label:after {
        top: 8px
    }

    .wvs-theme-shophistic-lite.woocommerce #main .entry-summary .variations {
        display: block !important
    }

    .wvs-theme-shophistic-lite .ql_custom_variations {
        display: none !important
    }

    .wvs-theme-shophistic-lite .radio-variable-item input[type=radio] {
        display: inline-block;
        margin: 0
    }

    .wvs-theme-flatsome .variations .reset_variations {
        bottom: 0;
        left: 0;
        position: relative
    }

    .wvs-theme-storefront-child.single-product div.product, .wvs-theme-storefront.single-product div.product {
        overflow: visible !important
    }

    .wvs-theme-stockholm .variations .reset_variations {
        bottom: 0;
        left: 0;
        position: relative;
        -webkit-transform: none;
        -ms-transform: none;
        transform: none
    }

    .wvs-theme-kalium .image-variable-item img, .wvs-theme-kalium-child .image-variable-item img {
        width: 100% !important
    }

    .wvs-theme-kalium .radio-variable-item input, .wvs-theme-kalium-child .radio-variable-item input {
        height: 16px !important;
        width: 16px !important
    }

    .wvs-theme-kalium .woo-variation-items-wrapper .select-option-ui, .wvs-theme-kalium-child .woo-variation-items-wrapper .select-option-ui {
        display: none
    }

    .wvs-theme-aurum .variable-items-wrapper .image-variable-item > img, .wvs-theme-aurum-child .variable-items-wrapper .image-variable-item > img {
        width: 100%
    }

    .wvs-theme-hestia .woo-variation-items-wrapper.value:before {
        display: none !important
    }

    .wvs-theme-thegem .woo-variation-items-wrapper .combobox-wrapper, .wvs-theme-thegem-child .woo-variation-items-wrapper .combobox-wrapper, .wvs-theme-thegem-elementor .woo-variation-items-wrapper .combobox-wrapper {
        display: none
    }

    .wvs-theme-thegem .wvs-archive-variation-wrapper .variations, .wvs-theme-thegem-child .wvs-archive-variation-wrapper .variations, .wvs-theme-thegem-elementor .wvs-archive-variation-wrapper .variations {
        padding: 0
    }

    .wvs-theme-ushop .variations_form, .wvs-theme-ushop-child .variations_form {
        overflow: visible !important
    }

    .wvs-theme-ushop .single-product-summary .product_meta, .wvs-theme-ushop-child .single-product-summary .product_meta {
        display: inline-table
    }

    .wvs-theme-savoy .woo-variation-items-wrapper, .wvs-theme-savoy-child .woo-variation-items-wrapper {
        position: relative !important
    }

    .wvs-theme-savoy .woo-variation-items-wrapper .sod_select, .wvs-theme-savoy-child .woo-variation-items-wrapper .sod_select {
        display: none !important
    }

    .wvs-theme-savoy .nm-variation-row, .wvs-theme-savoy-child .nm-variation-row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex
    }

    .wvs-theme-woodstock .woo-variation-items-wrapper .variation-select, .wvs-theme-woodstock-child .woo-variation-items-wrapper .variation-select {
        display: none !important
    }

    .wvs-theme-woodmart .wd-attr-selected, .wvs-theme-woodmart .woo-variation-items-wrapper > .swatches-select, .wvs-theme-woodmart-child .wd-attr-selected, .wvs-theme-woodmart-child .woo-variation-items-wrapper > .swatches-select {
        display: none
    }

    .wvs-theme-gecko .variations .value.woo-variation-items-wrapper, .wvs-theme-gecko-child .variations .value.woo-variation-items-wrapper {
        border: 0 !important
    }

    .wvs-theme-gecko .variations .value.woo-variation-items-wrapper:after, .wvs-theme-gecko-child .variations .value.woo-variation-items-wrapper:after {
        display: none !important
    }

    .woo-variation-gallery-theme-massive-dynamic .woo-variation-items-wrapper .clear-selection, .woo-variation-gallery-theme-massive-dynamic-child .woo-variation-items-wrapper .clear-selection {
        border: 0;
        height: auto;
        width: auto
    }

    .woo-variation-gallery-theme-massive-dynamic .woo-variation-items-wrapper .clear-selection .reset_variations, .woo-variation-gallery-theme-massive-dynamic-child .woo-variation-items-wrapper .clear-selection .reset_variations {
        border: 1px solid #f04040;
        border-radius: 100%;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: #f04040;
        font-size: 8px !important;
        height: 20px;
        padding: 5px;
        width: 20px
    }

    .wvs-theme-claue .woo-variation-items-wrapper, .wvs-theme-claue-child .woo-variation-items-wrapper {
        border: none
    }

    .wvs-theme-claue .woo-variation-items-wrapper:after, .wvs-theme-claue-child .woo-variation-items-wrapper:after {
        display: none
    }

    .wvs-theme-jupiter table.variations, .wvs-theme-jupiter-child table.variations {
        overflow: initial
    }

    .wvs-theme-oxygen .woo-variation-items-wrapper .select-wrapper, .wvs-theme-oxygen-child .woo-variation-items-wrapper .select-wrapper {
        display: none
    }

    .wvs-theme-oxygen .variable-items-wrapper.radio-variable-wrapper .radio-variable-item input, .wvs-theme-oxygen-child .variable-items-wrapper.radio-variable-wrapper .radio-variable-item input {
        width: 18px
    }

    .wvs-theme-simple-elegant .woo-variation-items-wrapper .wi-nice-select, .wvs-theme-simple-elegant-child .woo-variation-items-wrapper .wi-nice-select {
        display: none
    }

    .wvs-theme-twentytwenty table.variations, .wvs-theme-twentytwenty-child table.variations {
        overflow: auto
    }

    .wvs-theme-divi .et_pb_wc_add_to_cart form.variations_form.cart .variations td.value span:after, .wvs-theme-divi-child .et_pb_wc_add_to_cart form.variations_form.cart .variations td.value span:after, .wvs-theme-jevelin .sh-woo-layout table.variations td select.woo-variation-raw-select, .wvs-theme-jevelin-child .sh-woo-layout table.variations td select.woo-variation-raw-select {
        display: none !important
    }

    .wvs-theme-jevelin .sh-woo-layout table.variations, .wvs-theme-jevelin-child .sh-woo-layout table.variations {
        max-width: 100%
    }

    .wvs-theme-jevelin .radio-variable-item label, .wvs-theme-jevelin-child .radio-variable-item label {
        line-height: 1 !important
    }

    .wvs-theme-stockie .woo-variation-raw-select + .select-styled, .wvs-theme-stockie-child .woo-variation-raw-select + .select-styled {
        display: none !important
    }

    .woo-variation-swatches .wp-block-getwooplugins-variation-swatches.swatches-align-center {
        --wvs-position: center
    }

    .woo-variation-swatches .wp-block-getwooplugins-variation-swatches.swatches-align-left {
        --wvs-position: flex-start
    }

    .woo-variation-swatches .wp-block-getwooplugins-variation-swatches.swatches-align-right {
        --wvs-position: flex-end
    }

    .woo-variation-swatches .woo-variation-raw-select + .select2 {
        display: none !important
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color {
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: row;
        flex-direction: row;
        margin: 10px 0
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color > a {
        display: inline-block;
        position: relative
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color .count {
        padding: 0 5px
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color .wvs-widget-item-wrapper {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color .item {
        border: 2px solid #fff;
        -webkit-box-shadow: var(--wvs-item-box-shadow, 0 0 0 1px #a8a8a8);
        box-shadow: var(--wvs-item-box-shadow, 0 0 0 1px #a8a8a8);
        display: inline-block;
        float: left;
        height: 20px;
        margin: 0 4px;
        padding: 9px;
        -webkit-transition: -webkit-box-shadow .2s ease;
        transition: -webkit-box-shadow .2s ease;
        -o-transition: box-shadow .2s ease;
        transition: box-shadow .2s ease;
        transition: box-shadow .2s ease, -webkit-box-shadow .2s ease;
        width: 20px
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color .item.style-squared {
        border-radius: 2px
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color .item.style-rounded {
        border-radius: 100%
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color .text {
        display: inline-block
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color .text :after {
        clear: both;
        content: "";
        display: inline
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color:hover .item {
        -webkit-box-shadow: var(--wvs-hover-item-box-shadow, 0 0 0 3px #ddd);
        box-shadow: var(--wvs-hover-item-box-shadow, 0 0 0 3px #ddd)
    }

    .woo-variation-swatches .wvs-widget-layered-nav-list__item-color.woocommerce-widget-layered-nav-list__item--chosen .item {
        -webkit-box-shadow: var(--wvs-selected-item-box-shadow, 0 0 0 2px #000);
        box-shadow: var(--wvs-selected-item-box-shadow, 0 0 0 2px #000)
    }

    .woo-variation-swatches .variations td.value > span:after, .woo-variation-swatches .variations td.value > span:before, .woo-variation-swatches .woo-variation-raw-select, .woo-variation-swatches .woo-variation-raw-select:after, .woo-variation-swatches .woo-variation-raw-select:before {
        display: none !important
    }

    .woo-variation-swatches .woo-variation-swatches-variable-item-more {
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex
    }

    .woo-variation-swatches .wvs-archive-variations-wrapper {
        display: block;
        width: 100%
    }

    .woo-variation-swatches .wvs-archive-variations-wrapper .variable-items-wrapper .variable-item:not(.radio-variable-item) {
        height: var(--wvs-archive-product-item-height, 30px);
        width: var(--wvs-archive-product-item-width, 30px)
    }

    .woo-variation-swatches .wvs-archive-variations-wrapper .variable-items-wrapper .variable-item:not(.radio-variable-item).button-variable-item {
        font-size: var(--wvs-archive-product-item-font-size, 16px)
    }

    .woo-variation-swatches .wvs-archive-variations-wrapper .variable-items-wrapper.wvs-style-squared.archive-variable-items .variable-item:not(.radio-variable-item).button-variable-item {
        min-width: var(--wvs-archive-product-item-width, 30px)
    }

    .woo-variation-swatches ul.variations {
        -webkit-box-orient: vertical;
        -ms-flex-direction: column;
        flex-direction: column;
        list-style: none;
        margin: 0;
        padding: 0
    }

    .woo-variation-swatches ul.variations, .woo-variation-swatches ul.variations > li {
        -webkit-box-direction: normal;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex
    }

    .woo-variation-swatches ul.variations > li {
        -webkit-box-pack: var(--wvs-position);
        -ms-flex-pack: var(--wvs-position);
        -webkit-box-orient: horizontal;
        -ms-flex-direction: row;
        flex-direction: row;
        justify-content: var(--wvs-position);
        margin: 5px 0
    }

    .woo-variation-swatches ul.variations .wvs_archive_reset_variations.hide {
        visibility: hidden
    }

    .woo-variation-swatches ul.variations .wvs_archive_reset_variations.show {
        visibility: visible
    }

    .woo-variation-swatches .variable-items-wrapper {
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        justify-content: flex-start;
        list-style: none;
        margin: 0;
        padding: 0
    }

    .woo-variation-swatches .variable-items-wrapper.enabled-large-size .variable-item:not(.radio-variable-item) {
        height: var(--wvs-single-product-large-item-height, 40px);
        width: var(--wvs-single-product-large-item-width, 40px)
    }

    .woo-variation-swatches .variable-items-wrapper.enabled-large-size .variable-item:not(.radio-variable-item).button-variable-item {
        font-size: var(--wvs-single-product-large-item-font-size, 16px)
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-direction: column;
        flex-direction: column
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item {
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        cursor: pointer;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0 5px
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item input, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item label {
        cursor: pointer;
        vertical-align: middle
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item input {
        height: 20px;
        width: 20px
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item input + span {
        margin-inline: 10px
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item .variable-item-radio-value-wrapper {
        display: inline-block
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item .variable-item-radio-value-wrapper img {
        display: inline-block;
        margin: 0;
        padding: 0;
        vertical-align: middle;
        width: 40px
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item .variable-item-radio-value-wrapper .out-of-stock {
        display: inline-block;
        margin: 0;
        padding: 0
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item label {
        display: inline-block;
        padding: 2px 0;
        width: auto
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:hover {
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled input, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled label, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:hover input, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:hover label {
        cursor: not-allowed;
        opacity: .5
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled .variable-item-radio-value, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:hover .variable-item-radio-value {
        text-decoration: line-through
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:after, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:before, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:hover:after, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:hover:before {
        display: none
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:focus, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.disabled:hover:focus {
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.no-stock input, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.no-stock label, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.no-stock:hover input, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.no-stock:hover label {
        opacity: .6;
        text-decoration: line-through
    }

    .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.no-stock .variable-item-radio-value, .woo-variation-swatches .variable-items-wrapper.radio-variable-items-wrapper .radio-variable-item.no-stock:hover .variable-item-radio-value {
        text-decoration: line-through
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item {
        list-style: none;
        margin: 0;
        outline: none;
        padding: 0;
        -webkit-transition: all .2s ease;
        -o-transition: all .2s ease;
        transition: all .2s ease;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item .variable-item-contents {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        height: 100%;
        justify-content: center;
        position: relative;
        width: 100%
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item.variation-disabled {
        display: none !important
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item img {
        height: 100%;
        margin: 0;
        padding: 0;
        pointer-events: none;
        width: 100%
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item > span {
        pointer-events: none
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item) {
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background-color: var(--wvs-item-background-color, #fff);
        -webkit-box-shadow: var(--wvs-item-box-shadow, 0 0 0 1px #a8a8a8);
        box-shadow: var(--wvs-item-box-shadow, 0 0 0 1px #a8a8a8);
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        color: var(--wvs-item-text-color, #000);
        cursor: pointer;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        height: var(--wvs-single-product-item-height, 30px);
        justify-content: center;
        margin: 4px;
        padding: 2px;
        position: relative;
        width: var(--wvs-single-product-item-width, 30px)
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item):last-child {
        margin-right: 0
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).no-stock .variable-item-contents, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).no-stock img, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).no-stock span {
        opacity: .6
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).no-stock .variable-item-contents:before {
        background-image: var(--wvs-cross);
        background-position: 50%;
        background-repeat: no-repeat;
        content: " ";
        display: block;
        height: 100%;
        position: absolute;
        width: 100%
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item):hover {
        background-color: var(--wvs-hover-item-background-color, #fff);
        color: var(--wvs-hover-item-text-color, #000)
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item):focus, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item):hover {
        -webkit-box-shadow: var(--wvs-hover-item-box-shadow, 0 0 0 3px #ddd);
        box-shadow: var(--wvs-hover-item-box-shadow, 0 0 0 3px #ddd)
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).selected, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).selected:hover {
        -webkit-box-shadow: var(--wvs-selected-item-box-shadow, 0 0 0 2px #000);
        box-shadow: var(--wvs-selected-item-box-shadow, 0 0 0 2px #000);
        color: var(--wvs-selected-item-text-color, #000)
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover {
        cursor: not-allowed;
        overflow: hidden;
        pointer-events: none;
        position: relative
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled .variable-item-contents, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled img, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled span, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover .variable-item-contents, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover img, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover span {
        opacity: .6
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled .variable-item-contents:before, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover .variable-item-contents:before {
        background-image: var(--wvs-cross);
        background-position: 50%;
        background-repeat: no-repeat;
        content: " ";
        display: block;
        height: 100%;
        position: absolute;
        width: 100%
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).color-variable-item.selected:not(.no-stock) .variable-item-contents:before, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).image-variable-item.selected:not(.no-stock) .variable-item-contents:before {
        background-image: var(--wvs-tick);
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: 60%;
        content: " ";
        display: block;
        height: 100%;
        position: absolute;
        width: 100%
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).color-variable-item .variable-item-span-color, .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).image-variable-item .variable-item-span-color {
        display: block;
        height: 100%;
        width: 100%
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).button-variable-item {
        font-size: var(--wvs-single-product-item-font-size, 16px);
        text-align: center
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item:not(.radio-variable-item).button-variable-item.selected:not(.no-stock) {
        background-color: var(--wvs-selected-item-background-color, #fff);
        color: var(--wvs-selected-item-text-color, #000)
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item.wvs-show-stock-left-info:not(.disabled):not(.radio-variable-item) .wvs-stock-left-info:before {
        border-bottom: 3px solid #de8604;
        border-left: 3px solid transparent;
        border-right: 3px solid transparent;
        content: " ";
        left: 50%;
        margin-left: -3px;
        position: absolute;
        top: calc(100% - 1px);
        width: 0;
        z-index: 1
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item.wvs-show-stock-left-info:not(.disabled):not(.radio-variable-item) .wvs-stock-left-info:after {
        left: 50%;
        min-width: 36px;
        position: absolute;
        text-align: center;
        top: calc(100% + 2px);
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%)
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item.wvs-show-stock-left-info:not(.disabled) .wvs-stock-left-info:after {
        background: #de8604;
        border-radius: 2px !important;
        -webkit-box-shadow: 0 0 2px rgba(0, 0, 0, .38);
        box-shadow: 0 0 2px rgba(0, 0, 0, .38);
        color: #fff;
        content: attr(data-wvs-stock-info);
        font-size: 10px;
        font-style: italic;
        line-height: 1;
        padding: 2px;
        text-shadow: 0 1px rgba(0, 0, 0, .251)
    }

    .woo-variation-swatches .variable-items-wrapper .variable-item.wvs-show-stock-left-info:not(.disabled).radio-variable-item .wvs-stock-left-info:after {
        margin-left: 5px
    }

    .woo-variation-swatches .wvs-style-rounded.variable-items-wrapper .variable-item:not(.radio-variable-item) {
        border-radius: 100%
    }

    .woo-variation-swatches .wvs-style-rounded.variable-items-wrapper .variable-item:not(.radio-variable-item) .variable-item-span, .woo-variation-swatches .wvs-style-rounded.variable-items-wrapper .variable-item:not(.radio-variable-item) img {
        border-radius: 100%;
        line-height: 1;
        margin: 0;
        overflow: hidden
    }

    .woo-variation-swatches .wvs-style-rounded.variable-items-wrapper .variable-item.radio-variable-item img {
        border-radius: 100%
    }

    .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.radio-variable-item) {
        border-radius: 2px
    }

    .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.radio-variable-item).button-variable-item {
        min-width: var(--wvs-single-product-item-width);
        width: auto
    }

    .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.radio-variable-item).button-variable-item .variable-item-span {
        padding: 0 5px
    }

    .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item:not(.radio-variable-item).color-variable-item span:after {
        border-radius: 0
    }

    .woo-variation-swatches .wvs-style-squared.variable-items-wrapper .variable-item.radio-variable-item img {
        border-radius: 5px
    }

    .woo-variation-swatches.wvs-behavior-blur .variable-items-wrapper .radio-variable-item.disabled input, .woo-variation-swatches.wvs-behavior-blur .variable-items-wrapper .radio-variable-item.disabled label, .woo-variation-swatches.wvs-behavior-blur .variable-items-wrapper .radio-variable-item.disabled:hover input, .woo-variation-swatches.wvs-behavior-blur .variable-items-wrapper .radio-variable-item.disabled:hover label {
        cursor: not-allowed;
        opacity: .5;
        text-decoration: line-through
    }

    .woo-variation-swatches.wvs-behavior-blur .variable-items-wrapper .radio-variable-item.disabled:after, .woo-variation-swatches.wvs-behavior-blur .variable-items-wrapper .radio-variable-item.disabled:before, .woo-variation-swatches.wvs-behavior-blur .variable-items-wrapper .radio-variable-item.disabled:hover:after, .woo-variation-swatches.wvs-behavior-blur .variable-items-wrapper .radio-variable-item.disabled:hover:before {
        display: none
    }

    .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled .variable-item-contents:before, .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .variable-item:not(.radio-variable-item).disabled:hover .variable-item-contents:before, .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .variable-item:not(.radio-variable-item).no-stock .variable-item-contents:before, .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .variable-item:not(.radio-variable-item).no-stock:hover .variable-item-contents:before {
        background-image: none
    }

    .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .radio-variable-item.disabled, .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .radio-variable-item.disabled:hover {
        overflow: hidden
    }

    .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .radio-variable-item.disabled input, .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .radio-variable-item.disabled label, .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .radio-variable-item.disabled:hover input, .woo-variation-swatches.wvs-behavior-blur-no-cross .variable-items-wrapper .radio-variable-item.disabled:hover label {
        opacity: .3;
        pointer-events: none
    }

    .woo-variation-swatches.wvs-behavior-hide .variable-items-wrapper .variable-item.disabled {
        font-size: 0;
        height: 0 !important;
        margin: 0 !important;
        min-height: 0 !important;
        min-width: 0 !important;
        opacity: 0;
        padding: 0 !important;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        -webkit-transform-origin: center;
        -ms-transform-origin: center;
        transform-origin: center;
        visibility: hidden;
        width: 0 !important
    }

    .woo-variation-swatches.wvs-behavior-hide .variable-items-wrapper .variable-item.disabled.radio-variable-item {
        width: auto !important
    }

    .woo-variation-swatches.wvs-behavior-hide .variable-items-wrapper .variable-item.no-stock .variable-item-contents:before {
        background-image: none
    }

    .woo-variation-swatches.rtl .variable-items-wrapper .variable-item {
        text-align: right
    }

    .woo-variation-swatches.rtl .variable-items-wrapper .variable-item:not(.radio-variable-item) {
        margin: 4px 0 4px 8px
    }

    .woo-variation-swatches.rtl .variable-items-wrapper.radio-variable-wrapper .radio-variable-item input {
        margin-left: 5px;
        margin-right: 0
    }

    .woo-variation-swatches.woocommerce .product.elementor table.variations td.value:before {
        display: none !important
    }

    .woo-variation-swatches.woo-variation-swatches-ie11 .variable-items-wrapper {
        display: block !important
    }

    .woo-variation-swatches.woo-variation-swatches-ie11 .variable-items-wrapper .variable-item:not(.radio-variable-item) {
        float: left
    }

    .woo-variation-swatches.wvs-show-label .variations td, .woo-variation-swatches.wvs-show-label .variations th {
        display: block;
        text-align: start;
        width: auto !important
    }

    .woo-variation-swatches.wvs-show-label .variations td .woo-selected-variation-item-name, .woo-variation-swatches.wvs-show-label .variations td label, .woo-variation-swatches.wvs-show-label .variations th .woo-selected-variation-item-name, .woo-variation-swatches.wvs-show-label .variations th label {
        display: inline-block;
        margin: 0 2px
    }

    .woo-variation-swatches.wvs-show-label .variations td .woo-selected-variation-item-name, .woo-variation-swatches.wvs-show-label .variations th .woo-selected-variation-item-name {
        font-weight: 600
    }

    .woo-variation-swatches .variations .woo-variation-item-label {
        -webkit-margin-before: 5px;
        margin: 0;
        margin-block-start: 5px
    }

    .woo-variation-swatches .variations .woo-variation-item-label .woo-selected-variation-item-name {
        font-weight: 600
    }

    .woo-variation-swatches .grouped-variable-items {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        list-style: none !important
    }

    .woo-variation-swatches .grouped-variable-items.grouped-variable-items-display-vertical {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column
    }

    .woo-variation-swatches .grouped-variable-items.grouped-variable-items-display-vertical .group-variable-items-wrapper {
        margin-top: 10px
    }

    .woo-variation-swatches .grouped-variable-items.grouped-variable-items-display-vertical .no-group-variable-items-wrapper {
        margin-top: 20px
    }

    .woo-variation-swatches .grouped-variable-items.grouped-variable-items-display-horizontal {
        -webkit-box-align: end;
        -ms-flex-align: end;
        align-items: flex-end
    }

    .woo-variation-swatches .grouped-variable-items.grouped-variable-items-display-horizontal .group-variable-items-wrapper {
        margin-right: 20px;
        margin-top: 10px
    }

    .woo-variation-swatches .grouped-variable-items.grouped-variable-items-display-horizontal .group-variable-items-wrapper:last-child, .woo-variation-swatches .grouped-variable-items.grouped-variable-items-display-horizontal .no-group-variable-items-wrapper {
        margin-right: 0
    }

    .woo-variation-swatches .grouped-variable-items .group-variable-item-wrapper {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0
    }

    .woo-variation-swatches .grouped-variable-items .group-variable-items-name {
        font-style: italic
    }

    .woo-variation-swatches .wvs-hide-view-cart-link {
        display: none
    }

</style>
<div class="single-product">
    <main id="primary" class="site-main">
        <div class="container">
            <nav class="woocommerce-breadcrumb" aria-label="Breadcrumb"><a href="https://lespoirstudios.com">Home</a>&nbsp;/&nbsp;<a
                        href="https://lespoirstudios.com/product-category/tops/">Tops</a>&nbsp;/&nbsp;Heli Bodysuit
                White
            </nav>

            <div class="woocommerce-notices-wrapper"></div>
            <div id="product-2627"
                 class="product type-product post-2627 status-publish first instock product_cat-new-arrivals product_cat-tops has-post-thumbnail shipping-taxable purchasable product-type-variable">

                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                     data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out;">
                    <!--                    ảnh -->
                    <div class="flex-viewport" style="overflow: hidden; position: relative; height: 702.037px;">

                      <?php foreach ($gallery_product as $item) : ?>
                          <div class="woocommerce-product-gallery__wrapper"
                               style="width: 800%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                              <div data-thumb="<?php echo $item ?>"
                                   data-thumb-alt="" class="woocommerce-product-gallery__image flex-active-slide"
                                   style="width: 496.888px; margin-right: 0px; float: left; display: block;"><a
                                          href="<?php echo $item ?>">
                                      <img
                                              width="300" height="420"
                                              src="<?php echo $item ?>"
                                              class="wp-post-image" alt="" decoding="async" title="Lespoir 673308"
                                              data-caption=""
                                              data-src="<?php echo $item ?>"
                                              data-large_image="<?php echo $item ?>"
                                              data-large_image_width="1828" data-large_image_height="2560"
                                              loading="lazy"
                                              sizes="(max-width: 300px) 100vw, 300px" data-xoowscfly="fly"
                                              draggable="false"></a></div>
                          </div>
                      <?php endforeach; ?>
                    </div>
                    <ol class="flex-control-nav flex-control-thumbs">
                      <?php foreach ($gallery_product as $item) : ?>
                          <li><img onload="this.width = this.naturalWidth; this.height = this.naturalHeight"
                                   src="<?php echo $item ?>"
                                   class="flex-active" draggable="false" width="100" height="100"></li>
                      <?php endforeach; ?>
                    </ol>
                </div>

                <div class="summary entry-summary">
                    <h1 class="product_title entry-title">
                      <?php the_title() ?>
                    </h1>
                    <p class="price"><span class="woocommerce-Price-amount amount"><bdi><?= $price ?>&nbsp;<span
                                        class="woocommerce-Price-currencySymbol">$</span></bdi></span></p>
                    <p class="product-sub-title">
                      <?= $brand ?>
                    </p>
                    <form class="variations_form cart wvs-loaded"
                          action="https://lespoirstudios.com/product/heli-bodysuit-white/" method="post"
                          enctype="multipart/form-data" data-product_id="2627"
                          data-product_variations="[{&quot;attributes&quot;:{&quot;attribute_pa_color&quot;:&quot;white&quot;,&quot;attribute_pa_size&quot;:&quot;&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:65,&quot;display_regular_price&quot;:65,&quot;image&quot;:{&quot;title&quot;:&quot;Lespoir 673308&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-scaled.jpeg&quot;,&quot;alt&quot;:&quot;Lespoir 673308&quot;,&quot;src&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-300x420.jpeg&quot;,&quot;srcset&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-300x420.jpeg 300w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-214x300.jpeg 214w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-731x1024.jpeg 731w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-768x1075.jpeg 768w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-1097x1536.jpeg 1097w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-1463x2048.jpeg 1463w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-scaled.jpeg 1828w&quot;,&quot;sizes&quot;:&quot;(max-width: 300px) 100vw, 300px&quot;,&quot;full_src&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-scaled.jpeg&quot;,&quot;full_src_w&quot;:1828,&quot;full_src_h&quot;:2560,&quot;gallery_thumbnail_src&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-100x100.jpeg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-726x1038.jpeg&quot;,&quot;thumb_src_w&quot;:726,&quot;thumb_src_h&quot;:1038,&quot;src_w&quot;:300,&quot;src_h&quot;:420},&quot;image_id&quot;:2649,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:2731,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;},{&quot;attributes&quot;:{&quot;attribute_pa_color&quot;:&quot;black&quot;,&quot;attribute_pa_size&quot;:&quot;&quot;},&quot;availability_html&quot;:&quot;&quot;,&quot;backorders_allowed&quot;:false,&quot;dimensions&quot;:{&quot;length&quot;:&quot;&quot;,&quot;width&quot;:&quot;&quot;,&quot;height&quot;:&quot;&quot;},&quot;dimensions_html&quot;:&quot;N\/A&quot;,&quot;display_price&quot;:65,&quot;display_regular_price&quot;:65,&quot;image&quot;:{&quot;title&quot;:&quot;Lespoir 673308&quot;,&quot;caption&quot;:&quot;&quot;,&quot;url&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-scaled.jpeg&quot;,&quot;alt&quot;:&quot;Lespoir 673308&quot;,&quot;src&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-300x420.jpeg&quot;,&quot;srcset&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-300x420.jpeg 300w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-214x300.jpeg 214w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-731x1024.jpeg 731w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-768x1075.jpeg 768w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-1097x1536.jpeg 1097w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-1463x2048.jpeg 1463w, https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-scaled.jpeg 1828w&quot;,&quot;sizes&quot;:&quot;(max-width: 300px) 100vw, 300px&quot;,&quot;full_src&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-scaled.jpeg&quot;,&quot;full_src_w&quot;:1828,&quot;full_src_h&quot;:2560,&quot;gallery_thumbnail_src&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-100x100.jpeg&quot;,&quot;gallery_thumbnail_src_w&quot;:100,&quot;gallery_thumbnail_src_h&quot;:100,&quot;thumb_src&quot;:&quot;https:\/\/lespoirstudios.com\/wp-content\/uploads\/2024\/09\/Lespoir-673308-726x1038.jpeg&quot;,&quot;thumb_src_w&quot;:726,&quot;thumb_src_h&quot;:1038,&quot;src_w&quot;:300,&quot;src_h&quot;:420},&quot;image_id&quot;:2649,&quot;is_downloadable&quot;:false,&quot;is_in_stock&quot;:true,&quot;is_purchasable&quot;:true,&quot;is_sold_individually&quot;:&quot;no&quot;,&quot;is_virtual&quot;:false,&quot;max_qty&quot;:&quot;&quot;,&quot;min_qty&quot;:1,&quot;price_html&quot;:&quot;&quot;,&quot;sku&quot;:&quot;&quot;,&quot;variation_description&quot;:&quot;&quot;,&quot;variation_id&quot;:2732,&quot;variation_is_active&quot;:true,&quot;variation_is_visible&quot;:true,&quot;weight&quot;:&quot;&quot;,&quot;weight_html&quot;:&quot;N\/A&quot;}]"
                          current-image="">
                        <div data-product_id="2627" data-threshold_min="30" data-threshold_max="100" data-total="2">
                            <span class="view-size-guide">SIZE GUIDE</span>
                            <table class="variations" cellspacing="0" role="presentation">
                                <tbody>
                                <tr>
                                    <th class="label"><label for="pa_color">Color/Pattern</label></th>
                                    <td class="value woo-variation-items-wrapper">
                                        <select style="display:none" id="pa_color" class="woo-variation-raw-select"
                                                name="attribute_pa_color" data-attribute_name="attribute_pa_color"
                                                data-show_option_none="yes">
                                            <option value="">Choose an option</option>
                                          <?php foreach($colors as $color_code => $color_name): ?>
                                              <option value="<?php echo esc_attr(sanitize_title($color_name)); ?>" class="attached enabled"><?php echo esc_html($color_name); ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                        <ul role="radiogroup" aria-label="Color/Pattern"
                                            class="variable-items-wrapper color-variable-items-wrapper wvs-style-squared"
                                            data-attribute_name="attribute_pa_color"
                                            data-attribute_values='<?php echo json_encode(array_map(function($name) { return sanitize_title($name); }, array_values($colors))); ?>'>
                                          <?php foreach($colors as $color_code => $color_name): ?>
                                              <li aria-checked="false" tabindex="0"
                                                  class="variable-item color-variable-item color-variable-item-<?php echo sanitize_title($color_name); ?>"
                                                  title="<?php echo esc_attr($color_name); ?>"
                                                  data-title="<?php echo esc_attr($color_name); ?>"
                                                  data-value="<?php echo esc_attr(sanitize_title($color_name)); ?>"
                                                  role="radio"
                                                  data-wvstooltip-out-of-stock="">
                                                  <div class="variable-item-contents">
                                <span class="variable-item-span variable-item-span-color"
                                      style="background-color:<?php echo esc_attr($color_code); ?>;"></span>
                                                  </div>
                                              </li>
                                          <?php endforeach; ?>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="label"><label for="pa_size">Size</label></th>
                                    <td class="value woo-variation-items-wrapper">
                                        <select style="display:none" id="pa_size" class="woo-variation-raw-select"
                                                name="attribute_pa_size" data-attribute_name="attribute_pa_size"
                                                data-show_option_none="yes">
                                            <option value="">Choose an option</option>
                                          <?php foreach($sizes as $size): ?>
                                              <option value="<?php echo esc_attr(strtolower($size)); ?>" class="attached enabled"><?php echo esc_html($size); ?></option>
                                          <?php endforeach; ?>
                                        </select>
                                        <ul role="radiogroup" aria-label="Size"
                                            class="variable-items-wrapper button-variable-items-wrapper wvs-style-squared"
                                            data-attribute_name="attribute_pa_size"
                                            data-attribute_values='<?php echo json_encode(array_map('strtolower', $sizes)); ?>'>
                                          <?php foreach($sizes as $size):
                                            $size_lower = strtolower($size);
                                            ?>
                                              <li aria-checked="false" tabindex="0"
                                                  class="variable-item button-variable-item button-variable-item-<?php echo esc_attr($size_lower); ?>"
                                                  title="<?php echo esc_attr($size); ?>"
                                                  data-title="<?php echo esc_attr($size); ?>"
                                                  data-value="<?php echo esc_attr($size_lower); ?>"
                                                  role="radio"
                                                  data-wvstooltip-out-of-stock="">
                                                  <div class="variable-item-contents">
                                                      <span class="variable-item-span variable-item-span-button"><?php echo esc_html($size); ?></span>
                                                  </div>
                                              </li>
                                          <?php endforeach; ?>
                                        </ul>
                                        <a class="reset_variations" href="#" style="visibility: hidden;">Clear</a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            <div class="single_variation_wrap">
                                <div class="woocommerce-variation single_variation" style="display: none;"></div>
                                <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled">
                                    <div class="quantity">
                                        <label class="screen-reader-text" for="quantity_670cc2ea2eb4c">
                                        </label>
                                        <input type="number"  class="input-text qty text"
                                               name="quantity" value="1" aria-label="Product quantity" size="4" min="1"
                                               max="" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                                    </div>
                                    <button type="button"
                                            class="single_add_to_cart_button button alt add-to-cart"
                                            data-product_id="<?php echo esc_attr(get_the_ID()); ?>"
                                            data-product_name="<?php echo esc_attr(get_the_title()); ?>"
                                            data-product_price="<?php echo esc_attr($price); ?>"
                                            data-product_image="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                            data-max_quantity="<?php echo esc_attr($quantity); ?>
                                            ">
                                        Add to cart
                                    </button>
                                    <input type="hidden" name="add-to-cart" value="<?php echo get_the_ID(); ?>">
                                    <input type="hidden" name="product_id" value="<?php echo get_the_ID(); ?>">
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="product_meta">
                        <span class="sku_wrapper">SKU: <span class="sku">N/A</span></span>
                        <span class="posted_in">Categories: <a
                                    href="https://lespoirstudios.com/product-category/new-arrivals/" rel="tag">New Arrivals</a>, <a
                                    href="https://lespoirstudios.com/product-category/tops/" rel="tag">Tops</a></span>
                    </div>
                    <!--mô tả-->
                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="tabs wc-tabs" role="tablist">
                            <li class="description_tab active" id="tab-title-description" role="tab"
                                aria-controls="tab-description">
                                <a href="#tab-description">
                                    Description </a>
                            </li>
                            <li class="care_instructions_tab" id="tab-title-care_instructions" role="tab"
                                aria-controls="tab-care_instructions">
                                <a href="#tab-care_instructions">
                                    Care Instructions </a>
                            </li>
                        </ul>
                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                             id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="">
                            <?= $desc_product ?>
                        </div>
                        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--care_instructions panel entry-content wc-tab"
                             id="tab-care_instructions" role="tabpanel" aria-labelledby="tab-title-care_instructions"
                             style="display: none;">
                            <?= $care_desc_product ?>
                        </div>

                    </div>
                </div>

            </div>
            <!--            sp liên quan-->
            <section class="related products">
                <h2>style with this</h2>
                <ul class="products columns-4">
                    <li class="product type-product post-772 status-publish first instock product_cat-tops has-post-thumbnail shipping-taxable purchasable product-type-variable">
                        <a href="https://lespoirstudios.com/product/pidi-top/"
                           class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="726"
                                                                                                    height="1038"
                                                                                                    src="https://lespoirstudios.com/wp-content/uploads/2023/11/Untitled-Capture1231-copy-scaled-726x1038.jpeg"
                                                                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                                                    alt=""
                                                                                                    decoding="async"
                                                                                                    loading="lazy"
                                                                                                    data-xoowscfly="fly">
                            <h2 class="woocommerce-loop-product__title">PiDi Top</h2>
                            <span class="price"><span class="woocommerce-Price-amount amount"><bdi>90&nbsp;<span
                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                        </a></li>


                    <li class="product type-product post-1722 status-publish instock product_cat-new-arrivals product_cat-tops has-post-thumbnail shipping-taxable purchasable product-type-variable">
                        <a href="https://lespoirstudios.com/product/valli-top-black/"
                           class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="726"
                                                                                                    height="1038"
                                                                                                    src="https://lespoirstudios.com/wp-content/uploads/2024/04/Lespoir-316606-726x1038.jpeg"
                                                                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                                                    alt=""
                                                                                                    decoding="async"
                                                                                                    loading="lazy"
                                                                                                    data-xoowscfly="fly">
                            <h2 class="woocommerce-loop-product__title">Valli Top Black</h2>
                            <span class="price"><span class="woocommerce-Price-amount amount"><bdi>65&nbsp;<span
                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                        </a></li>


                    <li class="product type-product post-763 status-publish instock product_cat-new-arrivals product_cat-tops has-post-thumbnail shipping-taxable purchasable product-type-variable">
                        <a href="https://lespoirstudios.com/product/body-suit/"
                           class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="726"
                                                                                                    height="1038"
                                                                                                    src="https://lespoirstudios.com/wp-content/uploads/2024/04/Lespoir-339940-726x1038.jpeg"
                                                                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                                                    alt=""
                                                                                                    decoding="async"
                                                                                                    loading="lazy"
                                                                                                    data-xoowscfly="fly">
                            <h2 class="woocommerce-loop-product__title">Body Suit</h2>
                            <span class="price"><span class="woocommerce-Price-amount amount"><bdi>60&nbsp;<span
                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                        </a></li>


                    <li class="product type-product post-1715 status-publish last instock product_cat-new-arrivals product_cat-tops has-post-thumbnail shipping-taxable purchasable product-type-variable">
                        <a href="https://lespoirstudios.com/product/colin-top/"
                           class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="726"
                                                                                                    height="1038"
                                                                                                    src="https://lespoirstudios.com/wp-content/uploads/2024/04/Lespoir-316688-726x1038.jpeg"
                                                                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                                                    alt=""
                                                                                                    decoding="async"
                                                                                                    loading="lazy"
                                                                                                    data-xoowscfly="fly">
                            <h2 class="woocommerce-loop-product__title">Colin Top</h2>
                            <span class="price"><span class="woocommerce-Price-amount amount"><bdi>90&nbsp;<span
                                                class="woocommerce-Price-currencySymbol">$</span></bdi></span></span>
                        </a></li>


                </ul>

            </section>
        </div><!-- .container -->
    </main>

</div>
<!--size guide-->
<div class="size-guide-table">
    <div class="sg-table__head">
        <div class="row">
            <div class="col-xs-4 col-4">
                SIZE GUIDE
            </div>
            <div class="col-xs-8 col-8">
                <ul class="sg-table__head-units">
                    <li class="active"><a href="#tab-1">CM</a></li>
                    <li><a href="#tab-2">INCH</a></li>
                </ul>
            </div>
            <span class="close-size-guide"></span>
        </div>
    </div>
    <div class="sg-table__body">
        <div id="tab-1" class="active sg-table__body-content row">
            <div class="col-xs-4 col-4 sg-table__measurement">
                <p>Size</p>
                <p>Chest</p>
                <p>Waist</p>
                <p>Hips</p>
            </div>
            <div class="col-xs-8 col-8 sg-table__cols">
                <div class="row">
                    <?php foreach($re_size_guide as $size_guide):
                      ?>
                        <div class="sg-table__col">
                            <p><?= $size_guide['size_name'] . ($size_guide['number_size']) ?></p>
                            <p><?= $size_guide['chest'] ?></p>
                            <p><?= $size_guide['waist'] ?></p>
                            <p><?= $size_guide['hips'] ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div id="tab-2" class=" sg-table__body-content row">
            <div class="col-xs-4 col-4 sg-table__measurement">
                <p>Size</p>
                <p>Chest</p>
                <p>Waist</p>
                <p>Hips</p>
            </div>
            <div class="col-xs-8 col-8 sg-table__cols">
                <div class="row">
                    <?php foreach($re_size_guide as $size_guide): ?>
                        <div class="sg-table__col">
                            <p><?= $size_guide['size_name'] . (cmToInch($size_guide['number_size'])) ?></p>
                            <p><?= cmToInch($size_guide['chest']) ?></p>
                            <p><?= cmToInch($size_guide['waist']) ?></p>
                            <p><?= cmToInch($size_guide['hips']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <p class="sg-bottom-text">* Measurements above refer to body measurements in cm or inch</p>
</div>
<?php
get_footer() ?>
<script>
    // JSON chứa dữ liệu quantity cho từng kết hợp color-size
    const variationsData = <?php echo json_encode($variations_data); ?>;
    jQuery(document).ready(function($) {
        const quantityInput = $('input[name="quantity"]');
        const colorSelect = $('select[name="attribute_pa_color"]');
        const sizeSelect = $('select[name="attribute_pa_size"]');

        // Hàm cập nhật số lượng
        function updateQuantity() {
            const selectedColor = colorSelect.val();
            const selectedSize = sizeSelect.val();

            if (selectedColor && selectedSize && variationsData[selectedColor] && variationsData[selectedColor][selectedSize]) {
                const maxQuantity = variationsData[selectedColor][selectedSize];
                quantityInput.attr("max", maxQuantity);
                quantityInput.val(Math.min(quantityInput.val(), maxQuantity));

                // Hiển thị số lượng khả dụng trong HTML
                $('.quantity-available').remove(); // Xoá thông báo cũ nếu có
                quantityInput.after(`<span class="quantity-available">Available: ${maxQuantity}</span>`);
                console.log(maxQuantity);
            } else {
                quantityInput.removeAttr("max"); // Không có quantity phù hợp, bỏ giới hạn max
                quantityInput.val(1);
                // Xoá thông báo số lượng nếu không có chọn color-size phù hợp
                $('.quantity-available').remove();
            }
        }

        // Gọi hàm cập nhật khi chọn color hoặc size
        colorSelect.on("change", updateQuantity);
        sizeSelect.on("change", updateQuantity);
    });

</script>
<script>
    jQuery(document).ready(function ($) {
        // Product variations data from the form
        const productVariations = JSON.parse($('.variations_form').attr('data-product_variations'));

        const $form = $('.variations_form');
        const $addToCartButton = $('.single_add_to_cart_button');
        const $resetButton = $('.reset_variations');
        const $variationIdInput = $('.variation_id');
        const $colorItems = $('[data-attribute_name="attribute_pa_color"] li');
        const $sizeItems = $('[data-attribute_name="attribute_pa_size"] li');

        let selectedAttributes = {
            attribute_pa_color: '',
            attribute_pa_size: ''
        };

        $colorItems.on('click', function () {
            const $this = $(this);
            const value = $this.data('value');

            // Update visual selection
            $colorItems.attr('aria-checked', 'false').removeClass('selected');
            $this.attr('aria-checked', 'true').addClass('selected');

            // Update hidden select
            $('select#pa_color').val(value).trigger('change');

            // Update state
            selectedAttributes.attribute_pa_color = value;

            updateVariationSelection();
        });

        $sizeItems.on('click', function () {
            const $this = $(this);
            const value = $this.data('value');

            // Update visual selection
            $sizeItems.attr('aria-checked', 'false').removeClass('selected');
            $this.attr('aria-checked', 'true').addClass('selected');

            // Update hidden select
            $('select#pa_size').val(value).trigger('change');

            // Update state
            selectedAttributes.attribute_pa_size = value;

            updateVariationSelection();
        });

        // Handle reset button
        $resetButton.on('click', function (e) {
            e.preventDefault();

            // Reset selections
            selectedAttributes = {
                attribute_pa_color: '',
                attribute_pa_size: ''
            };

            // Reset visual state
            $colorItems.attr('aria-checked', 'false').removeClass('selected');
            $sizeItems.attr('aria-checked', 'false').removeClass('selected');

            // Reset selects
            $('select#pa_color, select#pa_size').val('');

            // Reset variation ID
            $variationIdInput.val('0');

            // Update button state
            $addToCartButton.addClass('disabled wc-variation-selection-needed');

            // Hide reset button
            $resetButton.css('visibility', 'hidden');

            // Reset price and stock message if needed
            $('.single_variation').hide();
        });

        function findMatchingVariation() {
            return productVariations.find(variation => {
                return Object.entries(selectedAttributes).every(([key, value]) => {
                    return !value || variation.attributes[key] === value || variation.attributes[key] === '';
                });
            });
        }

        function updateVariationSelection() {
            const allSelected = Object.values(selectedAttributes).every(value => value !== '');

            // Show/hide reset button
            $resetButton.css('visibility', Object.values(selectedAttributes).some(value => value !== '') ? 'visible' : 'hidden');

            if (allSelected) {
                const matchingVariation = findMatchingVariation();

                if (matchingVariation) {
                    // Update variation ID
                    $variationIdInput.val(matchingVariation.variation_id);

                    // Enable add to cart button
                    $addToCartButton.removeClass('disabled wc-variation-selection-needed');

                    // Update price and stock status if needed
                    const variationHtml = `
                    <div class="woocommerce-variation-price">
                        <span class="price">${matchingVariation.price_html || `$${matchingVariation.display_price}`}</span>
                    </div>
                    ${matchingVariation.is_in_stock ?
                        '<div class="woocommerce-variation-availability"><p class="stock in-stock">In stock</p></div>' :
                        '<div class="woocommerce-variation-availability"><p class="stock out-of-stock">Out of stock</p></div>'}
                `;

                    // $('.single_variation').html(variationHtml).show();
                } else {
                    // Reset variation ID
                    $variationIdInput.val('0');

                    // Disable add to cart button
                    $addToCartButton.addClass('disabled wc-variation-selection-needed');

                    // Show unavailable message
                    $('.single_variation').html('<p>This variation is unavailable</p>').show();
                }
            } else {
                // Reset variation ID
                $variationIdInput.val('0');

                // Disable add to cart button
                $addToCartButton.addClass('disabled wc-variation-selection-needed');

                // Hide variation details
                $('.single_variation').hide();
            }
        }

        $('.quantity input').on('change', function () {
            const $this = $(this);
            const min = parseFloat($this.attr('min'));
            const max = parseFloat($this.attr('max'));
            const value = parseFloat($this.val());

            if (value < min) {
                $this.val(min);
            }
            if (max && value > max) {
                $this.val(max);
            }
        });

        // Handle form submission
        $form.on('submit', function (e) {
            if ($addToCartButton.hasClass('disabled')) {
                e.preventDefault();
                return false;
            }
        });
    });
</script>
<script>
    // ẩn hiện khi click vào tab
    jQuery(document).ready(function () {
        jQuery('.woocommerce-Tabs-panel--description').show();
        jQuery('.woocommerce-Tabs-panel--care_instructions').hide();
        jQuery('.description_tab').click(function (e) {
            e.preventDefault();
            jQuery('.woocommerce-Tabs-panel--description').show();
            jQuery('.woocommerce-Tabs-panel--care_instructions').hide();
            jQuery('.description_tab').addClass('active');
        });
        jQuery('.care_instructions_tab').click(function (e) {
            e.preventDefault();
            jQuery('.description_tab').removeClass('active');
            jQuery('.care_instructions_tab').addClass('active');
            jQuery('.woocommerce-Tabs-panel--description').hide();
            jQuery('.woocommerce-Tabs-panel--care_instructions').show();
        });
    });
</script>

<!-- add to cart -->
<script>
    var cart = JSON.parse(localStorage.getItem('cart')) || [];

    $('.add-to-cart').on('click', function() {
        const productId = $(this).data('product_id');
        const productName = $(this).data('product_name');
        const productPrice = $(this).data('product_price');
        const productImage = $(this).data('product_image');
        const maxQuantity = $(this).data('max_quantity');
        const currentQuantity = $('input[name="quantity"]').val();
        const selectedSize = $('select[name="attribute_pa_size"]').val();
        const selectedColor = $('select[name="attribute_pa_color"]').val();
        const link = '<?= get_permalink() ?>';
        const productData = {
            id: productId,
            name: productName,
            price: productPrice,
            image: productImage,
            link: link,
            max_quantity: maxQuantity,
            quantity_current: currentQuantity,
            size: selectedSize,
            color: selectedColor
        };

        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        const existingProductIndex = cart.findIndex(item => item.id === productId && item.size === selectedSize && item.color === selectedColor);

        if (existingProductIndex !== -1) {
            cart[existingProductIndex].quantity_current = parseInt(cart[existingProductIndex].quantity_current) + parseInt(currentQuantity);
        } else {
            cart.push(productData);
        }

        localStorage.setItem('cart', JSON.stringify(cart));
    });

</script>
