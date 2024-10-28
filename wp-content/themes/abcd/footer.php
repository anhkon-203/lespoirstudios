<?php
$url = get_template_directory_uri();
?>
<footer id="colophon" class="site-footer text-center">
            <div class="container">
                <div class="menu-footer-container">
                    <ul id="menu-footer" class="menu">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'menu_class' => 'menu',
                                'menu_id' => 'menu-footer',
                                'container' => false,
                                'walker' => new Menu_Footer()
                            ));
                        ?>
                    </ul>
                </div>
                <p class="copyright-text">© lespoir 2024</p>
            </div>
    </div><!-- #page -->


    <!-- <div class="xoo-wsc-modal">




        <div class="xoo-wsc-container">



            <div class="xoo-wsc-header">



                <div class="xoo-wsch-top">



                    <span class="xoo-wsch-text">SHOPPING CART</span>

                    <span class="xoo-wsch-close xoo-wsc-icon-cross"></span>

                </div>



            </div>


            <div class="xoo-wsc-body">



                <div class="xoo-wsc-empty-cart"><span>Your cart is currently empty.</span><a class="button btn" href="https://lespoirstudios.com/shop/">Continue shopping</a></div>

            </div>

            <div class="xoo-wsc-footer">





                <div class="xoo-wsc-ft-extras">



                </div>


                <div class="xoo-wsc-ft-buttons-cont">

                    <a href="/shop" class="xoo-wsc-ft-btn xoo-wsc-ft-btn-continue">Continue Shopping</a>
                </div>


                <div class="xoo-wsc-payment-btns">
                </div>

            </div>

            <span class="xoo-wsc-loader"></span>

        </div>
        <span class="xoo-wsc-opac">

    </div>

    <div class="xoo-wsc-slider-modal">
        <div class="xoo-wsc-slider">




            <div class="xoo-wsc-sl-content xoo-wsc-sl-coupon" data-slider="coupon">



                <div class="xoo-wsc-sl-heading">
                    <span class="xoo-wsc-toggle-slider xoo-wsc-slider-close xoo-wsc-icon-arrow-thin-left"></span>
                    Apply Coupon
                </div>

                <div class="xoo-wsc-sl-body">

                    <form class="xoo-wsc-sl-apply-coupon">
                        <input type="text" name="xoo-wsc-slcf-input" placeholder="Enter Promo Code">
                        <button class="button btn" type="submit">Submit</button>
                    </form>



                    <div class="xoo-wsc-clist-cont"></div>
                </div>

            </div>



            <span class="xoo-wsc-loader"></span>

        </div>
    </div> -->
        <script src="<?= $url ?>/assets/js/ajax/jquery/3.7.1/jquery.min.js" ></script>
        <script src='<?= $url ?>/assets/js/ajax/frontend.min.js'></script>
  <?php include get_template_directory() . '/templates/Cart.php'; ?>

    <script>
        $(document).ready(function(){
            $('.header-cart-btn').click(function(){
                $('.xoo-wsc-modal').addClass('xoo-wsc-cart-active');
            });

        });
    </script>
    <script src='<?= $url ?>/assets/js/script.js' id='lespoir-script-js'></script>

</body>


</html>


<!-- Page cached by LiteSpeed Cache 6.5.0.2 on 2024-09-24 19:44:12 -->