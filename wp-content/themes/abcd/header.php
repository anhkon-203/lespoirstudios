<?php
$url = get_template_directory_uri();
?>

<!doctype html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <style>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <link rel='stylesheet' id='reset-css-css' href='<?= $url ?>/assets/css/reset.css' media='all' />
    <link rel='stylesheet' id='lespoir-style-css' href='<?= $url ?>/assets/css/style.css' media='all' />
    <link rel='stylesheet' id='homepage-css-css' href='<?= $url ?>/assets/css/page-homepage.css' media='all' />
    <link rel='stylesheet' id='homepage-css-css' href='<?= $url ?>/assets/css/single-product.css' media='all' />
    <link rel='stylesheet' id='lespoir-style-css' href='<?= $url ?>/assets/css/single-product.css' media='all' />

</head>

<body class="home page-template page-template-template-pages page-template-homepage page-template-template-pageshomepage-php page page-id-85 wp-custom-logo theme-lespoir woocommerce-no-js woo-variation-swatches wvs-behavior-blur wvs-theme-lespoir wvs-mobile no-sidebar woocommerce-active">
    <div id="page" class="site">
        <header id="masthead" class="site-header">
            <div class="container">
                <div class="row space-between">
                    <div class="header-left col-5 col-xs-5">
                        <div class="hamberger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="header-left__inner">
                            <span class="header-back-icon lv1"></span>
                            <div class="menu-menu-left-container">
                              <?php
                              wp_nav_menu(array(
                                  'theme_location' => 'menu-left',
                                  'menu_class' => 'menu',
                                  'menu_id' => 'menu-left',
                                  'container' => false,
                                  'walker' => new Custom_Menu_Walker()
                              ));
                              ?>
                            </div>
                            <div class="hidden">
                                <div class="menu-menu-right-container">
                                  <?php
                                  wp_nav_menu(array(
                                      'theme_location' => 'menu-right',
                                      'menu_class' => 'menu',
                                      'menu_id' => 'menu-right',
                                      'container' => false,
                                      'walker' => new Custom_Menu_Walker()
                                  ));
                                  ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-center col-2 col-xs-2 text-center">
                        <a href="<?= home_url() ?>" class="custom-logo-link" rel="home" aria-current="page">
                            <img width="200" height="200" src="<?= get_field('logo_header', 'option') ?>" class="custom-logo" alt="Lespoir" loading="lazy">
                        </a>
                    </div>

                    <div class="header-right col-5 col-xs-5 right">
                        <div class="header-right__inner">
                            <span class="header-btn header-search-btn">Search</span>
                            <div class="menu-menu-right-container">
                              <?php
                              wp_nav_menu(array(
                                  'theme_location' => 'menu-right',
                                  'menu_class' => 'menu',
                                  'menu_id' => 'menu-right',
                                  'container' => false,
                                  'walker' => new Custom_Menu_Walker()
                              ));
                              ?>
                            </div>
                            <span class="header-btn header-cart-btn xoo-wsc-cart-trigger">Cart</span>
                            <div class="search-popup">
                                <label>SEARCH FOR PRODUCTS, COLOR, COLLECTIONS</label>
                                <form method="get" action="<?php echo home_url(); ?>">
                                    <input type="text" name="s" class="input-border">
                                    <button></button>
                                    <input type="hidden" name="post_type" value="product">
                                </form>
                                <span class="close-search-popup"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__overlay"></div>
        </header><!-- #masthead -->