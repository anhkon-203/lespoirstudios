<?php /* Template Name: Contact */ ?>
<?php
get_header();

?>
    <style>
        h1{
            color: #000;
            font-family: Helvetica Neue;
            font-size: 10px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            text-align: center;
            margin: 80px 0;
        }
        .main-form {
            width: 100%;
            max-width: 458px;
            margin: 0 auto;
        }
        .wpcf7 .screen-reader-response {
            position: absolute;
            overflow: hidden;
            clip: rect(1px, 1px, 1px, 1px);
            clip-path: inset(50%);
            height: 1px;
            width: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
            word-wrap: normal !important;
        }
        input[name="title"], input[name="first_name"], input[name="last_name"], input[name="phone"], input[name="email"], select[name="Inquiriestopic"], textarea[name="message"]{
            /*background-image: url(../images/Vector.png);*/
            background-repeat: no-repeat;
            background-position: center right;
            padding-right: 15px !important;
        }
        .wpcf7 .screen-reader-response {
            position: absolute;
            overflow: hidden;
            clip: rect(1px, 1px, 1px, 1px);
            clip-path: inset(50%);
            height: 1px;
            width: 1px;
            margin: -1px;
            padding: 0;
            border: 0;
            word-wrap: normal !important;
        }
    </style>
    <div class="page-contact">
        <div class="container">
            <h1>Contact Us</h1>
            <div class="main-form">
                <div class="wpcf7 no-js" id="wpcf7-f242-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response">
                        <p role="status" aria-live="polite" aria-atomic="true"></p>
                        <ul></ul>
                    </div>
                    <form action="/contact-us/#wpcf7-f242-o1" method="post" class="wpcf7-form init"
                          aria-label="Contact form" novalidate="novalidate" data-status="init">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="242"/>
                            <input type="hidden" name="_wpcf7_version" value="5.8.5"/>
                            <input type="hidden" name="_wpcf7_locale" value="en_US"/>
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f242-o1"/>
                            <input type="hidden" name="_wpcf7_container_post" value="0"/>
                            <input type="hidden" name="_wpcf7_posted_data_hash" value=""/>
                            <input type="hidden" name="_wpcf7_recaptcha_response" value=""/>
                        </div>
                        <p>
                            <span class="wpcf7-form-control-wrap" data-name="title"><input size="40"
                                                                                          class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                          aria-required="true"
                                                                                          aria-invalid="false"
                                                                                          placeholder="Title" value=""
                                                                                          type="text"
                                                                                          name="title"/></span><br/>
                            <span class="wpcf7-form-control-wrap" data-name="first_name"><input size="40"
                                                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                                aria-required="true"
                                                                                                aria-invalid="false"
                                                                                                placeholder="First name"
                                                                                                value="" type="text"
                                                                                                name="first_name"/></span><br/>
                            <span class="wpcf7-form-control-wrap" data-name="last_name"><input size="40"
                                                                                               class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                                               aria-required="true"
                                                                                               aria-invalid="false"
                                                                                               placeholder="Last name"
                                                                                               value="" type="text"
                                                                                               name="last_name"/></span><br/>
                            <span class="wpcf7-form-control-wrap" data-name="phone"><input size="40"
                                                                                           class="wpcf7-form-control wpcf7-tel wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-tel"
                                                                                           aria-required="true"
                                                                                           aria-invalid="false"
                                                                                           placeholder="Phone number"
                                                                                           value="" type="tel"
                                                                                           name="phone"/></span><br/>
                            <span class="wpcf7-form-control-wrap" data-name="email"><input size="40"
                                                                                           class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email"
                                                                                           aria-required="true"
                                                                                           aria-invalid="false"
                                                                                           placeholder="Email address"
                                                                                           value="" type="email"
                                                                                           name="email"/></span><br/>
                            <span class="wpcf7-form-control-wrap" data-name="Inquiriestopic"><select
                                        class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required"
                                        aria-required="true" aria-invalid="false" name="Inquiriestopic">
                                <option value="">Select inquiries topic</option>
                                <option value="Product complaints">Product complaints</option>
                                <option value="Order">Order</option>
                                <option value="Payment">Payment</option>
                                <option value="Other">Other</option>
                            </select></span><br/>
                            <span class="wpcf7-form-control-wrap" data-name="message"><textarea cols="40" rows="10"
                                                                                                class="wpcf7-form-control wpcf7-textarea"
                                                                                                aria-invalid="false"
                                                                                                placeholder="Message"
                                                                                                name="message"></textarea></span><br/>
                            <input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit" value="Send us"/>
                        </p>
                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
<?php get_footer() ?>