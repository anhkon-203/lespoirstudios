<?php
/* Template Name: Forgot Password */

get_header();
?>
<style>
    /** Login page **/
    .woocommerce-account header.entry-header{text-align:center;padding:40px 15px;}
    .woocommerce-account header.entry-header h1{font-weight:400;font-size:10px;text-transform:uppercase;display:none;}
    #customer_login h2{text-align:center;font-weight:400;font-size:10px;text-transform:uppercase;margin-bottom:60px;margin-top:0;color:black;letter-spacing: 0.5px;}
    .login-form-col innput{max-width:487px;width:100%;display:block;}
    p.reg-description{font-size:10px;margin-top:91px;margin-bottom:151px;max-width: 435px;margin-left:auto;margin-right:auto;letter-spacing: 0.24px;}
    .login-form-col .woocommerce-form p{margin-bottom:10px;margin-top:0;letter-spacing: 0.5px;}
    .login-form-col input::placeholder{color:black;}
    .woocommerce-form-login__rememberme{display:flex;font-size:10px;align-items:center;color:black;display:none;}
    .woocommerce-form-login__rememberme input{width:17px;margin-right:10px;}
    .woocommerce-form-login .row{justify-content:end;}
    form.woocommerce-form.woocommerce-form-login.login{max-width:480px;margin:0 auto;}
    p.woocommerce-LostPassword.lost_password a{color:black;text-decoration:none;font-size:10px;text-transform:uppercase;}
    .woocommerce-form-login__submit:hover{background-color:white;color:black!important;border-color:black;}
    #customer_login .woocommerce-notices-wrapper .woocommerce-message{text-align:center;list-style:none;padding:0;font-size:10px;margin:-45px auto 10px;}
    #customer_login .woocommerce-notices-wrapper .woocommerce-message a{color:black;}
    .woocommerce-message{display:none;}
    .woocommerce-message:first-child{display:block;}

    /** Lost Password **/
    .woocommerce-lost-password header h1.entry-title{display:block;margin:0;}
    .woocommerce-lost-password  .woocommerce{max-width:480px;margin:0 auto;}
    .woocommerce-message{text-align:center;}

    /** My account **/
    nav.woocommerce-MyAccount-navigation{display:none;}
    nav.woocommerce-MyAccount-navigation{display:none;}
    .myaccount__nav-item:last-child,.dashboard-myaccount__content .row > div:last-child{padding-right:0;}
    .woocommerce-account header.entry-header h1{display:block;margin:0;}
    .woocommerce-account header.entry-header{padding-top:100px;padding-bottom:60px;}
    .myaccount__nav-item a{color:#868686;text-decoration:none;text-transform:uppercase;}
    .myaccount__nav-item a.current{color:black;font-weight:500}
    .dashboard-myaccount__nav{border-bottom:1px solid black;padding-bottom:15px;margin-bottom:15px;}
    .myaccount__nav-item:first-child,.dashboard-myaccount__content .row > div:first-child{padding-left:0;}
    .max-910{max-width:911px;}
    .dashboard-myaccount__content .row > div:first-child{}
    .dashboard-myaccount__content{text-transform:uppercase;}
    .myaccount-row p{margin:0;font-weight:500;}
    .myaccount-row{margin-bottom:8px;padding-left:0;}
    a.myaccount__item-logout{text-transform:none;color:black;text-decoration:none;padding-right:20px;background-image:url(../images/logout-icon.svg);background-repeat:no-repeat;background-position:right;}
    a.myaccount__item-edit{color:black;text-transform:capitalize;}

    /** Orders **/
    .order-product__details{display:flex;flex-wrap:wrap;flex-direction:column;justify-content:space-between;}
    .order-product__details > div{width:100%;}
    .myaccount-row:last-child{margin-bottom:0;}
    .myaccount-row a{color:black;text-decoration:none;}
    .order-product{margin-bottom:10px;}
    .order-product:last-child{margin-bottom:0;}
    .dashboard-myaccount__content > .row{border-bottom:1px solid black;padding-bottom:10px;margin-bottom:20px;}
    .dashboard-myaccount__content > .row:last-child{border-bottom:none;}
    @media screen and (max-width:768px){
        .woocommerce-account header.entry-header{padding-top:15px;padding-bottom:15px;}
        .login-form-col{margin-bottom:60px;}
        #customer_login h2{margin-bottom:40px;}
        p.reg-description{margin-top:0;margin-bottom:0;}
        .reg-form-col{margin-bottom:100px;}
        .woocommerce-account header.entry-header h1{font-size:8px;}
        .myaccount__nav-item a{white-space:nowrap;}
        .myaccount__nav-item-history{text-align:right;padding-right:0;}
        .dashboard-myaccount__content{}
        p.ma-bottom-text{display:flex;justify-content:space-between;margin-top:0;}
        a.myaccount__item-edit{background:no-repeat;}
        .ma-shipping-address{padding-left:0;margin-top:40px;border-bottom:1px solid black;padding-bottom:15px;}
        .dashboard-myaccount__content > .row{margin-bottom:0;}
        .myaccount-row label{font-size:8px;}
        .wrap-dashboard-myaccount .container{padding:0;}
        label.no-orders-found{text-align:center;margin:100px auto;display:block;}
        .order-history-product{padding-left:0;margin-top:15px;}
        .order-history-product .order-product__thumbnail{padding-right:0;width:90px;}
        .order-history-product .order-product__details{max-width:calc(100% - 90px);}
        .order-product__details .myaccount-row:first-child{margin-top:-7px;}
        .order-history-product-row{margin-bottom:10px!important;}
    }
</style>
<main id="primary" class="site-main">
  <div class="container">

    <article id="post-16" class="post-16 page type-page status-publish hentry">
      <header class="entry-header">
        <h1 class="entry-title">Reset your password</h1>	</header><!-- .entry-header -->


      <div class="entry-content">
        <div class="woocommerce"><div class="woocommerce-notices-wrapper"></div><div class="wrap-content">
            <div class="container max-480">
              <form method="post" class="woocommerce-ResetPassword lost_reset_password">

                <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                  <input class="woocommerce-Input woocommerce-Input--text input-text input-border" type="text" name="user_login" id="user_login" autocomplete="username" placeholder="Email">
                </p>

                <div class="clear"></div>


                <p class="woocommerce-form-row form-row">
                  <input type="hidden" name="wc_reset_password" value="true">
                  <button type="submit" class="woocommerce-Button cta-btn-black button" value="Reset password">Reset password</button>
                </p>

                <input type="hidden" id="woocommerce-lost-password-nonce" name="woocommerce-lost-password-nonce" value="88532b3e3b"><input type="hidden" name="_wp_http_referer" value="/my-account/lost-password/">
              </form>
            </div>
          </div>
        </div>
      </div><!-- .entry-content -->

    </article><!-- #post-16 -->
  </div>
</main>
<?php get_footer() ?>
