jQuery(document).ready(function($) {
    function getParameterByName(name, url) {
	    if (!url) {
	        url = window.location.href;
	    }
	    name = name.replace(/[[\]]/g, '\\$&');
	    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, ' '));
	}

    function scroll_to_wc_message(){
    	var header_h = $('header').outerHeight();
    	$('html, body').animate({
            scrollTop: ($('div[role="alert"]').offset().top - header_h)
        },500);
    }

    function scroll_to_products(){
    	var header_h = $('header').outerHeight();
    	$('html, body').animate({
            scrollTop: ($('.products').offset().top - header_h - 50)
        },500);
    }
    function scroll_to_element(element){
    	var header_h = $('header').outerHeight();
    	$('html, body').animate({
            scrollTop: ($(element).offset().top - header_h)
        },500);
    }

    function active_review_order_mobile(){
        $('.review-order-bar').addClass('active');
        $('.wrap-review-order').css('display','block');
        $('form #customer_details').addClass('opacity-zero');
    }

	// Hover effect menu
	var isHoveringLiHasChild = false;
	$(document).on('mouseenter','li.menu-item-has-children', function (event) {
		if($(window).width() > 1024){
			isHoveringLiHasChild = true;
		    $('div.header__overlay').fadeIn(200);
		    $(this).siblings().removeClass('hovering');
		    $(this).addClass('hovering');
		    $(this).find('.sub-menu').addClass('active');
		    var img_url = $(this).find('> a').data('image');

		    $('.wrap-menu-item__img').remove();
		    if(img_url){
		    	var image = `<div class="container wrap-menu-item__img"><img class="menu-item__img" src="${img_url}" /></div>`;
		    	$(image).appendTo('.header__overlay');
		    }
		}
	}).on('mouseleave','.header__overlay',  function(){
		if($(window).width() > 1024){
			isHoveringOverlay = false;
			isHoveringLiHasChild = false;
			setTimeout(function() {
				if (!isHoveringLiHasChild) {
				    $('div.header__overlay').fadeOut(200);
				}
			}, 100); 
			$('.wrap-menu-item__img').remove();
			$('.sub-menu').removeClass('active');
			$('.menu li').removeClass('hovering');
		}
	}).on('mouseenter','.menu > li:not(.menu-item-has-children),.header-right span',  function(){
		if($(window).width() > 1024){
		    $('div.header__overlay').fadeOut(200);
		    $('.wrap-menu-item__img').remove();
		    $('.sub-menu').removeClass('active');
		    $('.menu li').removeClass('hovering');
		}
	});

	// Header Search button
	$(document).on('click', '.header-search-btn', function() {
		$('.search-popup').addClass('active');
	});
	$(document).on('click', '.close-search-popup', function() {
		$('.search-popup').removeClass('active');
	});

	$(document).on('click', '.hamberger-icon', function(event) {
		event.preventDefault();
		$('.header-left__inner').addClass('active');
		$('footer').addClass('hidden');
	});

	$(document).on('click', '.header-back-icon', function(event) {
		event.preventDefault();
		$('.menu-item__img').remove();
		if($(this).hasClass('lv1')){
			$('.header-left__inner').removeClass('active');
			$('footer').removeClass('hidden');
		}else if($(this).hasClass('lv2')){
			$(this).removeClass('lv2').addClass('lv1');
			$('.menu-item-has-children').removeClass('active');
		}
	});

	$(document).on('click', '.menu-item-has-children', function() {
		if($(window).width() <= 1024){
			var img_url = $(this).find('> a').data('image');
			var sub_menu = $(this).find('.sub-menu');
			if(img_url){
		    	var image = `<img class="menu-item__img" src="${img_url}" />`;
		    	if($('.menu-item__img').length == 0){
			    	$(image).insertAfter(sub_menu);
			    }
		    }
			$(this).addClass('active').siblings().removeClass('active');
			$('.header-back-icon').removeClass('lv1').addClass('lv2');
		}
	});

	// Woo toggle views
	$(document).on('click', '.js-toggle-view', function(e) {
		e.preventDefault();
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		const number = $(this).attr('data-view');
		var ulElement = $(".products");
		ulElement.removeClass(function(index, className) {
			return (className.match(/\bcolumns-\S+/g) || []).join(' ');
		}).addClass('columns-'+number);
    })

	// Toggle filter  
    $('span.filter-label').on('click',function() {
    	$(this).toggleClass('active');
    	$('.filter__fields').toggleClass('active');
    });
    $(document).on('click','.filter-item label:not(.selected)', function() {
    	$(this).toggleClass('active');
    	$(this).parent().find('.expand').slideToggle(300);
    });
    $('.filter-item .expand span').on('click',function() {
    	var term_name = $(this).text();
    	var term_id = $(this).data('tid');
    	$(this).closest('.filter-item').find('label').toggleClass('active').addClass('selected').text(term_name).attr('data-tid',term_id);
    	$(this).parent().slideToggle(300);
    });
    $(document).on('click','.filter-item label.selected', function() {
    	var placeholder_text = $(this).parent().data('expand');
    	$(this).removeClass('selected active').text(placeholder_text).attr('data-tid','');
    });

    var currentURL = window.location.href,
    	currentURL = currentURL.replace(/\/page\/\d+/, ''); 

    // Filter product Ajax
    var page = 1; // Initialize page number
	var loading = false; // To prevent multiple AJAX calls
	$(document).on('click change','.filter-item .expand span, .filter-item label.selected, .filter-sale label input', function() {
    	if (!loading) { // Check if no AJAX call is in progress
            loading = true; // Set loading flag to true
         	
            var cat_term_id = $('.filter-item.category label').attr('data-tid');
	    	var color_term_id = $('.filter-item.color label').attr('data-tid');
	    	var size_term_id = $('.filter-item.size label').attr('data-tid');
	    	// console.log(cat_term_id);
	    	// console.log(color_term_id);
	    	// console.log(size_term_id);
	    	console.log(currentURL);
	    	var sale = $('.filter-sale input[name="on_sale"]:checked').val();
	    	var search = getParameterByName('s',currentURL);
	    	scroll_to_products();
	    	$('.products').addClass('loading');
        	$('.not-found').remove();
	    	$.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'lespoir_filter_products',
                    cat_term_id: cat_term_id,
                    color_term_id: color_term_id,
                    size_term_id: size_term_id,
                    search:search,
                    page: page, 
                    sale:sale,
                    currentURL:currentURL
                },
                success: function(response) {
                    if (response) {
                    	$('.woocommerce-pagination').remove();
                        $('.products').html(response).fadeIn(300);
                        $('.products').removeClass('loading');
                        loading = false; // Reset loading flag
                    }
                }
            });
        }
    });

	// Pagination Ajax
	var loading = false; // To prevent multiple AJAX calls
    $(document).on('click', '.woocommerce-pagination a', function(e) {
	    e.preventDefault();
	    if (!loading) {
	        loading = true;
	        var pag_url = $(this).attr('href');
	        var page = 1;
	        if($(this).hasClass('prev') || $(this).hasClass('next')){
				var url = $(this).attr('href'); 
				var urlParts = url.split('/'); 
				var last_string = parseInt(urlParts[urlParts.length - 2]);
				if($.isNumeric(last_string)){
					page = last_string;
				}
	        }else{
	        	page = $(this).text(); // Get the clicked page number
	        }
	        var cat_term_id = $('.filter-item.category label').attr('data-tid');
	        var color_term_id = $('.filter-item.color label').attr('data-tid');
	        var size_term_id = $('.filter-item.size label').attr('data-tid');

	        var sale = $('.filter-sale input[name="on_sale"]:checked').val();
	    	var search = getParameterByName('s',currentURL);

	        scroll_to_products();
	        $('.products').addClass('loading');
	        $.ajax({
	            url: ajax_object.ajax_url,
	            type: 'POST',
	            data: {
	                action: 'lespoir_filter_products',
	                cat_term_id: cat_term_id,
	                color_term_id: color_term_id,
	                size_term_id: size_term_id,
	                search:search,
                    sale:sale,
	                page: page,
	                currentURL:currentURL
	            },
	            success: function(response) {
	                if (response) {
	                	$('.woocommerce-pagination').remove();
	                    $('.products').html(response);
	                    $('.products').removeClass('loading');
	                    loading = false;

	                    history.pushState(null, null, pag_url);
	                }
	            }
	        });
	    }
	});

	$('.woocommerce-cart div.woocommerce').on('input change', 'input.qty', function() {
        var $this = $(this);
        var $form = $this.closest('form.woocommerce-cart-form');
        $form.find('button[name="update_cart"]').prop('disabled', false);
        $form.trigger('submit');
    }); 

    // NÃºt plus
    $('.woocommerce-cart div.woocommerce').on('click', '.quantity-plus', function(e) {
    	e.preventDefault();
        var $form = $(this).closest('form.woocommerce-cart-form');
        var $input = $(this).siblings().find('input.qty');
        var val = parseInt($input.val());
        $input.val(val + 1);
    	$('button[name="update_cart"]').prop('disabled', false).trigger('click');
    });

    // NÃºt minus
    $('.woocommerce-cart div.woocommerce').on('click', '.quantity-minus', function(e) {
    	e.preventDefault();
        var $form = $(this).closest('form.woocommerce-cart-form');
        var $input = $(this).siblings().find('input.qty');
        var val = parseInt($input.val());
        if (val > 1) {
            $input.val(val - 1);
            $('button[name="update_cart"]').prop('disabled', false).trigger('click');
        	
        }
    });

    // NÃºt plus
    $( document ).on('click', '.woocommerce-checkout .quantity-plus', function(e) {
    	e.preventDefault();
        var $input = $(this).siblings().find('input.qty');
        var val = parseInt($input.val());
        $input.val(val + 1);
        $input.trigger('change');
    });

    // NÃºt minus
    $( document ).on('click', '.woocommerce-checkout .quantity-minus', function(e) {
    	e.preventDefault();
        var $input = $(this).siblings().find('input.qty');
        var val = parseInt($input.val());
        if (val > 1) {
            $input.val(val - 1);
            $input.trigger('change');
        }
    });


    $( document ).on( 'change input', '.woocommerce-checkout input.qty', function() {
        var item_hash = $( this ).attr( 'name' ).replace(/cart\[([\w]+)\]\[qty\]/g, "$1");
        var item_quantity = $( this ).val();
        var currentVal = parseFloat(item_quantity);
        $( '.body-review-order' ).addClass('loading');
        function qty_cart() {

            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'qty_cart',
                    hash: item_hash,
                    quantity: currentVal
                },
                success: function(response) {
                    $( '.body-review-order' ).html(response).removeClass('loading');

                    // for update product on checkout page mobile
                    active_review_order_mobile();
                }
            });  

        }
        qty_cart();
    });

    /**
    ** Add new coupon
    **/
    $( document ).on('click', '.woocommerce-checkout button[name="apply_coupon"]', function(e) {
        e.preventDefault();

        var couponCode = $(this).closest('.coupon').find('#coupon_code').val();
        $( '.body-review-order' ).addClass('loading');
  		$('.coupon-msg,.woocommerce-error').remove();
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'apply_coupon_code',
                coupon_code: couponCode,
                //security: wc_checkout_params.apply_coupon_nonce
            },
            success: function(response) {
            	if(response == 'coupon_failed'){
            		$( '.body-review-order' ).removeClass('loading');
            		//$('.woocommerce > .woocommerce-notices-wrapper:first-child').html('<ul class="woocommerce-error" role="alert"><li>Coupon '+couponCode+' does not exist!</li></ul>');
            		//scroll_to_wc_message();
            		$('<span class="coupon-msg coupon-error-msg">Coupon "'+couponCode+'" does not exist!</span>').appendTo('.actions .wrap-input');
        		}else{
                	$( '.body-review-order' ).html(response).removeClass('loading');
                	//$('.woocommerce > .woocommerce-notices-wrapper:first-child').html('<div class="woocommerce-message" role="alert">Coupon applied successfully.</div>');
                	//scroll_to_wc_message();
                	$('<span class="coupon-msg">Coupon applied successfully!</span>').appendTo('.actions .wrap-input');
                	// for update product on checkout page mobile
                    active_review_order_mobile();
                }
            }
        });
    });

    $( document ).on('click touchstart', '.coupon-error-msg', function(e) {
    	$(this).remove();
    	$('input[name=coupon_code]').val('');
    });

    /**
    ** Remove Applied Coupon
    **/
    $( document ).on( 'click', '.woocommerce-checkout .list-coupons-applied a', function(e) {
        e.preventDefault();
    
        var href = $(this).attr('href'),
        	coupon_item = $(this).closest('.coupon-item ');
        	coupon_name = $(this).data('coupon');

    	$( '.body-review-order' ).addClass('loading');
      	$.get(href, function(data, status){
		    if(status == 'success'){
		    	coupon_item.remove();
		    	$('.woocommerce > .woocommerce-notices-wrapper:first-child').html('<div class="woocommerce-message" role="alert">Coupon â€œ'+coupon_name+'â€ removed.</div>');
		    	//console.log('removed coupon');
		    	$.ajax({
		            type: 'POST',
		            url: ajax_object.ajax_url,
		            data: {
		                action: 'reload_body_review_order',
		            },
		            success: function(response) {
		                $( '.body-review-order' ).html(response).removeClass('loading');
		                scroll_to_wc_message();

		                // for update product on checkout page mobile
                    	active_review_order_mobile();
                    	// $('.review-order-bar').addClass('active');
				        // $('.wrap-review-order').css('display','block');
				        // $('form #customer_details').removeClass('opacity-zero');
				        $('#customer_details').removeClass('opacity-zero');
                    	//console.log('reloaded body');
		            }
		        });
		    }
	  	});
    });
 	
 	/**
    ** Delete product
    **/
 	$( document ).on( 'click', '.woocommerce-checkout .product-remove a', function(e) {
        e.preventDefault();
    
        var href = $(this).attr('href'),
        	key = getParameterByName('remove_item',href),
        	wpnonce = getParameterByName('_wpnonce',href),
        	cart_item = $(this).closest('.cart_item'),
        	product_name = $(this).closest('.cart_item').find('.product-details a').text();

    	cart_item.siblings().removeClass('undoAble');
    	$( '.body-review-order' ).addClass('loading');
      	$.get(href, function(data, status){
		    if(status == 'success'){
		    	cart_item.fadeOut().addClass('undoAble');
		    	$('.woocommerce-notices-wrapper:first-child').html('<div class="woocommerce-message" role="alert">â€œ'+product_name+'â€ removed. <a href="/?undo_item='+key+'&amp;_wpnonce='+wpnonce+'" class="restore-item">Undo?</a>	</div>');
		    	$.ajax({
		            type: 'POST',
		            url: ajax_object.ajax_url,
		            data: {
		                action: 'reload_body_review_order',
		            },
		            success: function(response) {
		                $( '.body-review-order' ).removeClass('loading').html(response);
		                scroll_to_wc_message();

		                // for update product on checkout page mobile
                    	active_review_order_mobile();
		            }
		        });
		    }
	  	});
    });

 	/**
    ** Undo product
    **/
    $( document ).on( 'click', '.woocommerce-checkout .restore-item', function(e) {
        e.preventDefault();
        
        var href = $(this).attr('href'),
        	product_name = $('.cart_item.undoAble').find('.product-details a').text();

        $( '.body-review-order' ).addClass('loading');
        $.get(href, function(data, status){
		    if(status == 'success'){
		    	$('.undoAble').fadeIn();
		    	$('.cart_item').removeClass('undoAble');
		    	$('.woocommerce-notices-wrapper:first-child').html('<div class="woocommerce-message" role="alert">â€œ'+product_name+'â€ restored.</div>')
		    	$.ajax({
		            type: 'POST',
		            url: ajax_object.ajax_url,
		            data: {
		                action: 'reload_body_review_order',
		            },
		            success: function(response) {
		                $( '.body-review-order' ).html(response).removeClass('loading');
		                scroll_to_wc_message();

		                // for update product on checkout page mobile
                   	 	active_review_order_mobile();
		            }
		        });
		    }
	  	});
    });

    $(document).on('click', '.checkout-as-guest span', function() {
    	$('.wrap-checkout-lander').css('display','none');
    	$('.wrap-checkout-fields').fadeIn();
    	$('h1.entry-title').addClass('active').text('Checkout as guest');

    	scroll_to_element('#billing_email_results_field');
    });

    function add_span_error(message,place){
    	if (!$(place).next().hasClass("span-error")) {
	        $(`<p class="span-error">${message}</p>`).insertAfter(place);
	    }
    }

    function remove_span_error(place){
    	place.nextAll(".span-error").first().remove();
    }

    function isEmail(email) {
	    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	    return emailRegex.test(email);
	}

	function isPhoneNumber(phoneNumber) {
	    const phoneNumberRegex = /^0\d{9}$/;
	    return phoneNumberRegex.test(phoneNumber);
	}

	var email_step_fields = $('#billing_email_field, .email-continue-btn,.billing-email-title');
	var billing_shipping_fields = $('.billing-shipping-details-title, #billing_first_name_field, #billing_last_name_field, #billing_phone_field, #billing_country_field,#billing_postcode_field, #billing_address_1_field, #billing_address_2_field, #billing_city_field, #billing_country_field, #billing_state_field, .billing-shipping-details-continue-btn,#billing_customer_note_field');
	var shipping_info = $('#billing_shipping_info_title_field, #billing_shipping_info_results_field, #billing_shipping_info_continue_btn_field');
    var payment_info = $('#billing_payment_title_field, #billing_payment_results_field, #billing_payment_continue_btn_field, .woocommerce-invalid-required-field');
    
    /**
    ** If change country field
    **/
    $(document.body).on('change', 'select[name=billing_country]', function(){
        var country = $(this).val();
    	var billing_city = $('input[name="billing_city"]').val();
    	var billing_address_2 = $('input[name="billing_address_2"]').val();
    	if(country != 'VN'){
    		if($.isNumeric(billing_city)){
    			$('input[name="billing_city"]').val('');
    		}
    		if($.isNumeric(billing_address_2)){
    			$('input[name="billing_address_2"]').val('');
    		}
    	}
    });

    /**
    ** Continue Email 
    **/
    $(document).on('click', '.email-continue-btn label', function() {
    	var input = $('input[name="billing_email"]');
    	var value = input.val();

    	var country = $('select[name="billing_country"]').val();
    	var billing_city = $('input[name="billing_city"]').val();
    	var billing_address_2 = $('input[name="billing_address_2"]').val();
    	if(country != 'VN'){
    		if($.isNumeric(billing_city)){
    			$('input[name="billing_city"]').val('');
    		}
    		if($.isNumeric(billing_address_2)){
    			$('input[name="billing_address_2"]').val('');
    		}
    	}

    	if(value == '' || !isEmail(value)){
    		add_span_error('Please enter a valid email address!',input);
    	}else{
    		remove_span_error(input);

			$('.billing-email-results').addClass('active').html(`
    			<div class="wrap-step-result">
	    			<p class="step-result__title">Contact information</p>
	    			<p class="step-result__content">${value}</p>
	    			<span class="step-result__edit">Edit</span>
    			</div>
    		`);
    		email_step_fields.removeClass('active');

    		if(!$(this).hasClass('editing')){
	    		billing_shipping_fields.addClass('active').removeClass('hidden');
		    	scroll_to_element('#billing_shipping_details_title_field');
	    	}else{
	    		$(this).removeClass('editing');
	    		setTimeout(function(){
	    			scroll_to_element('#billing_email_results_field');
	    		},200);
	    	}

	    $( '.body-review-order' ).addClass('show-tax');
    	}
    	// else if(isEmail(value)){ 
    	// 	remove_span_error(input);
    	// 	$('input[name="billing_email"]').val(value);
    	// 	$('input[name="billing_phone"]').val('');

    	// 	$('.billing-email-results').addClass('active').html(`
    	// 		<div class="wrap-step-result">
	    // 			<p class="step-result__title">Contact information</p>
	    // 			<p class="step-result__content">${value}</p>
	    // 			<span class="step-result__edit">Edit</span>
    	// 		</div>
    	// 	`);

    	// 	email_step_fields.removeClass('active');
    	// }else if(isPhoneNumber(value)){ 
    	// 	remove_span_error(input);
    	// 	$('input[name="billing_phone"]').val(value);
    	// 	$('input[name="billing_email"]').val('');

    	// 	$('.billing-email-results').addClass('active').html(`
    	// 		<div class="wrap-step-result">
	    // 			<p class="step-result__title">Contact information</p>
	    // 			<p class="step-result__content">${value}</p>
	    // 			<span class="step-result__edit">Edit</span>
    	// 		</div>
    	// 	`);

    	// 	email_step_fields.removeClass('active');
    	// }
    });

    /**
    ** Validate Shipping Details Step
    **/
    function validateShippingDetails() {
    	var count_error = 0;
	    const firstName = $('.validate-required #billing_first_name');
	    const lastName = $('.validate-required #billing_last_name');
	    const address = $('.validate-required #billing_address_1');
	    const postcode = $('.validate-required #billing_postcode');
	    const city = $('.validate-required #billing_city');
	    const ward = $('.validate-required #billing_address_2');
	    const phone = $('.validate-required #billing_phone');
	    const country = $('.validate-required [name="billing_country"]');
	    const state = $('.validate-required [name="billing_state"]');

	    if (firstName.val() === '') {
	      	add_span_error('Please enter your first name!',firstName);
	      	count_error++;
	    }else{
	    	remove_span_error(firstName);
	    }

	    if (lastName.val() === '') {
	      	add_span_error('Please enter your last name!',lastName);
	      	count_error++;
	    }else{
	    	remove_span_error(lastName);
	    }

	    if (address.val() === '') {
	      	add_span_error('Please enter your address!',address);
	      	count_error++;
	    }else{
	    	remove_span_error(address);
	    }

	    if (postcode.val() === '') {
	      	add_span_error('Please enter your postcode!',postcode);
	      	count_error++;
	    }else{
	    	remove_span_error(postcode);
	    }

	    if (city.val() === '') {
	      	add_span_error('Please select a District!',city);
	      	count_error++;
	    }else{
	    	remove_span_error(city);
	    }

	    if (ward.val() === '') {
	      	add_span_error('Please select a Ward!',ward);
	      	count_error++;
	    }else{
	    	remove_span_error(ward);
	    }

	    if (phone.val() === '') {
	      	add_span_error('Please enter a valid phone number!',phone);
	      	count_error++;
	    }else{
	    	remove_span_error(phone);
	    }

	    // if (country.val() === '') {
	    //   	add_span_error('Please select a country!',country);
	    //   	count_error++;
	    // }else{
	    // 	remove_span_error(country);
	    // }

	    if (state.val() === '') {
	    	console.log(state.attr('type'));
	    	if(state.attr('type') == 'text'){
	    		remove_span_error(state);
	      		add_span_error('Please enter a City!',state);
	      	}else{
	      		remove_span_error(state);
	      		add_span_error('Please select a City!',state);
	      	}
	      	count_error++;
	    }else{
	    	remove_span_error(state);
	    }

	    if(count_error == 0){
	    	return true;
	    }
	    
  	}

    $(document).on('change', '.validate-required [name="billing_country"]', function() {
    	const state = $('.validate-required [name="billing_state"]');
    	remove_span_error(state);
    });

    /**
    ** Continue Step Shipping Details
    **/
    $(document).on('click', '.billing-shipping-details-continue-btn label', function() {
    	const firstName = $('#billing_first_name').val();
	    const lastName = $('#billing_last_name').val();
	    const phone = $('#billing_phone').val();

	    const address = $('#billing_address_1').val();
	    const postcode = $('#billing_postcode').val();
	    const country = $('select[name="billing_country"]').val();
	    const country_label = $('select[name="billing_country"] option:selected' ).text();

	    var content = [];
	    if(address){
	    	content.push(address);
	    }
	    if($('#billing_address_2').is('select')){
	    	var ward_label = $('select[name="billing_address_2"] option:selected' ).text();
	    }else{
	    	var ward_label = $('input[name="billing_address_2"]' ).val();
	    }
	    if(ward_label && country == 'VN'){
	    	content.push(ward_label);
	    }

	    if($('#billing_city').is('select')){
		 	var district_label = $('select[name="billing_city"] option:selected' ).text();
	    }else{
	    	var district_label = $('input[name="billing_city"]' ).val();
	    }
	    if(district_label){
	    	content.push(district_label);
	    }

	    if($('#billing_state').is('select')){
		    var city_label = $('select[name="billing_state"] option:selected' ).text();
	    }else{
	    	var city_label = $('input[name="billing_state"]' ).val();
	    }
	    if(city_label){
	    	content.push(city_label);
	    }

	    if(postcode){
	    	content.push(postcode);
	    }

	    if(country_label){
	    	content.push(country_label);
	    }

	    const note = $('[name="billing_customer_note"]').val();
    	if(validateShippingDetails()){
    		billing_shipping_fields.removeClass('active');
    		if(!$(this).hasClass('editing')){
	    		shipping_info.addClass('active');
	    		$('.billing-shipping-info-results').addClass('active').html(`
	    			<div class="wrap-step-result">
		    			<p class="step-result__title">Select a Shipping method</p>
		    			
	    			</div>
	    		`);
	    		// $('.billing-shipping-info-results').addClass('active').html(`
	    		// 	<div class="wrap-step-result">
		    	// 		<p class="step-result__title">Your package will be shipped within 7-9 days of office work</p>
		    	// 		<p class="step-result__content">
		    	// 			international shipping may take longer due to logistics issues
		    	// 		</p>
	    		// 	</div>
	    		// `);
	    		scroll_to_element('#billing_shipping_info_title_field');
	    	}else{
	    		$(this).removeClass('editing');
	    		setTimeout(function(){
	    			scroll_to_element('#billing_shipping_details_results_field');
	    		},200);
	    	}
    		$('.billing-shipping-details-results').addClass('active').html(`
    			<div class="wrap-step-result">
	    			<p class="step-result__title">Shipping details</p>
	    			<p class="step-result__content">
	    				${firstName} ${lastName} <br/>
	    				${phone} <br/>
	    				${content}<br/>
	    				Note: ${note}
	    			</p>
	    			<span class="step-result__edit">Edit</span>
    			</div>
    		`);

    		$('.body-review-order').addClass('show-shipping-fee');
    		$('#billing_shipping_info_results_field #shipping_method').remove();
    		if($('#billing_shipping_info_results_field #shipping_method').length == 0){
	    		$('table #shipping_method').clone().appendTo('#billing_shipping_info_results_field');
	    	}
    	}

    });

	function formatDate(date) {
		var day = date.getDate();
		var month = date.getMonth() + 1;
		var year = date.getFullYear();

		return (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year;
	}

	/**
    *** Continue Shipping info
    **/
	$(document).on('click', '.billing-shipping-info-continue-btn label', function() {
		shipping_info.removeClass('active');
		if(!$(this).hasClass('editing')){
			payment_info.addClass('active');
		}else{
    		$(this).removeClass('editing');
    		setTimeout(function(){
    			scroll_to_element('#billing_shipping_info_results_field');
    		},200);
    	}
		var today = new Date();
  		
  		var next7Day = new Date(today);
  		next7Day.setDate(today.getDate() + 7);

  		var next9Day = new Date(today);
  		next9Day.setDate(today.getDate() + 9); 

		$('.billing-shipping-info-results').removeClass('step').addClass('active').html(`
    			<div class="wrap-step-result">
	    			<p class="step-result__title">Shipping Information</p>
	    			<p class="step-result__content">
	    				Your package is expected to arrive <br>
						from ${formatDate(next7Day)} to ${formatDate(next9Day)}.
	    			</p>
	    			<span class="step-result__edit">Edit</span>
    			</div>
    		`);

		$('.billing-payment-results').addClass('active').html(`
			<div class="wrap-step-result text-center">
    			<p class="step-result__content text-uppercase">
    				Due to payment privacy protection, all payments from lespoir will be processed by paypal. Confirmation will be sent to 
your email address.
    			</p>
			</div>
		`);

		scroll_to_element('#billing_payment_title_field');

		$( '.body-review-order' ).addClass('loading');
		$.ajax({
        	type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'reload_body_review_order',
            },
            success: function(response) {
                $( '.body-review-order' ).removeClass('loading').html(response);
            }
        });

		$('#payment').insertBefore('#billing_payment_continue_btn_field');
    }); 

	/**
    *** Select Shipping Method
    **/
	$(document).on('change', '#shipping_method input', function() {
    	var shipping_method = $(this).val();
    	$('.body-review-order').attr('data-shipping-method',shipping_method);
    });

	/**
    *** Continue Payment 
    **/
    $(document).on('click', '.billing-payment-continue-btn', function() {
    	$('form.woocommerce-checkout').trigger('submit');
    });


    /**
    *** Edit Step Email
    **/
    $(document).on('click', '.billing-email-results .step-result__edit', function() {
    	$(this).closest('.checkout-results').removeClass('active');
    	email_step_fields.addClass('active');
    	$('.email-continue-btn label').addClass('editing');//.text('Update');
    	setTimeout(function(){
			scroll_to_element('#billing_email_title_field');
		},200);
    });
    

    /**
    *** Edit Step Shipping details
    **/
    $(document).on('click', '.billing-shipping-details-results .step-result__edit', function() {
    	$(this).closest('.checkout-results').removeClass('active');
    	billing_shipping_fields.addClass('active');
    	$('.billing-shipping-details-continue-btn label').addClass('editing');//.text('Update');
    	setTimeout(function(){
			scroll_to_element('#billing_shipping_details_title_field');
		},200);
    });

    /**
    *** Edit Step Shipping Info
    **/
    $(document).on('click', '.billing-shipping-info-results .step-result__edit', function() {
    	$(this).closest('.checkout-results').addClass('step');
    	shipping_info.addClass('active');
    	$('.billing-shipping-info-results').addClass('step').addClass('active').html(`
			<div class="wrap-step-result">
    			<p class="step-result__title">Shipping method</p>
			</div>
		`);
		// $('.billing-shipping-info-results').addClass('step').addClass('active').html(`
		// 	<div class="wrap-step-result">
    	// 		<p class="step-result__title">Your package will be shipped within 7-9 days of office work</p>
    	// 		<p class="step-result__content">
    	// 			international shipping may take longer due to logistics issues
    	// 		</p>
		// 	</div>
		// `);
		if($('#billing_shipping_info_results_field #shipping_method').length == 0){
    		$('#shipping_method').clone().appendTo('#billing_shipping_info_results_field');
    	}

		$('.billing-shipping-info-continue-btn label').addClass('editing');//.text('Update');

		setTimeout(function(){
			scroll_to_element('#billing_shipping_info_title_field');
		},200);
    });

    // $( document.body ).on( 'updated_checkout', function(data) {
    //     country_code = $('#billing_country').val();

    //     var ajax_data = {
    //         action: 'append_country_prefix_in_billing_phone',
    //         country_code: country_code
    //     };

    //     $.post( ajax_object.ajax_url, ajax_data, function( response ) { 
    //         $('#billing_phone').val(response);
    //     });
    // } );

    /**
    *** Reload heading review order
    **/
    $( document.body ).on( 'updated_checkout', function(data) {
    	var shipping_method = $('.body-review-order').attr('data-shipping-method');
    	$('.wrap-checkout-fields').addClass('loading');
    	$.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'reload_body_review_order',
            },
            success: function(response) {
            	$('.wrap-checkout-fields').removeClass('loading');
                $( '.body-review-order' ).html(response);
                if(shipping_method != ''){
                	$('#shipping_method input[value="'+shipping_method+'"]').prop("checked", true)
                }
                
                $('#payment').insertBefore('#billing_payment_continue_btn_field');
            }
        });
    });


    /**
    *** Update Preview Heading Cart
    **/
    $(document).on('click', '.checkout-as-guest span', function() {
    	$('.woocommerce-message').remove();
    	$.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'reload_body_review_order',
            },
            success: function(response) {
                $( '.body-review-order' ).html(response);
            }
        });
    });

    /**
    *** Click edit cart button
    **/
    $(document).on('click', '.edit-cart', function() {
    	$('.wrap-checkout-fields').css('display', 'none');
    	$('.wrap-checkout-lander').css('display', 'block').addClass('only-show-products');
    });

    /**
    *** Close Edit cart
    **/
    $(document).on('click', 'span.cta-btn-black.update-cart-btn', function() {
    	$('.wrap-checkout-fields').css('display', 'block');
    	$('.wrap-checkout-lander').css('display', 'none');
    	scroll_to_element('.review-order-heading');
    	$.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: {
                action: 'reload_body_review_order',
            },
            success: function(response) {
                $( '.body-review-order' ).html(response);
            }
        });
    });

    function validateRegPersonalStep() {
    	var count_error = 0;
    	const title = $('select[name="title"]');
	    const firstName = $('input[name="first_name"]');
	    const lastName = $('input[name="last_name"]');
	    const dob = $('input[name="dob"]');
	    const email = $('input[name="email"]');
	    const phone = $('input[name="phone"]');

	    if (title.val() === '') {
	      	add_span_error('Please select an option!',title);
	      	count_error++;
	    }else{
	    	remove_span_error(title);
	    }

	    if (firstName.val() === '') {
	      	add_span_error('Please enter your first name!',firstName);
	      	count_error++;
	    }else{
	    	remove_span_error(firstName);
	    }

	    if (lastName.val() === '') {
	      	add_span_error('Please enter your last name!',lastName);
	      	count_error++;
	    }else{
	    	remove_span_error(lastName);
	    }

		var dateRegex = /^(0[1-9]|1[0-2])\/(0[1-9]|[12][0-9]|3[01])\/\d{4}$/;

	    if (dob.val() === '' || !dateRegex.test(dob.val())) {
	      	add_span_error('Please enter your DOB! (MM/DD/YYYY)',dob);
	      	count_error++;
	    }else{
	    	remove_span_error(dob);
	    }

	    if(email.val() == '' || !isEmail(email.val())){
    		add_span_error('Please enter a valid email address!',email);
    		count_error++;
    	}else{
    		remove_span_error(email);
    	}

	    if (phone.val() === '') {
	      	add_span_error('Please enter a valid phone number!',phone);
	      	count_error++;
	    }else{
	    	remove_span_error(phone);
	    }

	    if(count_error == 0){
	    	return true;
	    }
	    
  	}

  	function validateRegShippingInforStep() {
    	var count_error = 0;
    	//const house_number = $('input[name="house_number"]');
	    //const street = $('input[name="street"]');
	    const address = $('input[name="address"]');
	    const ward = $('select[name="billing_address_2"]');
	    const district = $('select[name="billing_city"]');
	    const city = $('select[name="billing_state"]');
	    //const country = $('select[name="country"]');

	    // if (house_number.val() === '') {
	    //   	add_span_error('Please fill in the blank field!',house_number);
	    //   	count_error++;
	    // }else{
	    // 	remove_span_error(house_number);
	    // }

	    // if (street.val() === '') {
	    //   	add_span_error('Please fill in the blank field!',street);
	    //   	count_error++;
	    // }else{
	    // 	remove_span_error(street);
	    // }
	    if (address.val() === '') {
	      	add_span_error('Please fill in the blank field!',address);
	      	count_error++;
	    }else{
	    	remove_span_error(address);
	    }

	    if (ward.val() === '') {
	      	add_span_error('Please select Commune/Ward/Town!',ward);
	      	count_error++;
	    }else{
	    	remove_span_error(ward);
	    }

	    if (district.val() === '') {
	      	add_span_error('Please select District!',district);
	      	count_error++;
	    }else{
	    	remove_span_error(district);
	    }

	    if (city.val() === '') {
	      	add_span_error('Please select City!',city);
	      	count_error++;
	    }else{
	    	remove_span_error(city);
	    }

	    // if (country.val() === '') {
	    //   	add_span_error('Please fill in the blank field!',country);
	    //   	count_error++;
	    // }else{
	    // 	remove_span_error(country);
	    // }

	    if(count_error == 0){
	    	return true;
	    }
	    
  	}

    /**
    *** Reg Personal Information Step
    **/
    $(document).on('click', '.reg-personal-btn', function() {
    	const title = $('.woocommerce-form-register select[name="title"]').val();
	    const firstName = $('.woocommerce-form-register input[name="first_name"]').val();
	    const lastName = $('.woocommerce-form-register input[name="last_name"]').val();
	    const dob = $('.woocommerce-form-register input[name="dob"]').val();
	    const email = $('.woocommerce-form-register input[name="email"]').val();
	    const phone = $('.woocommerce-form-register input[name="phone"]').val();

	    var current_step = $(this).closest('.step');
    	if(validateRegPersonalStep()){
    		$(this).closest('.step').addClass('passed');
    		$(this).closest('.step').find('.step-results').html(`
    			<p class="step-result__title">Personal information</p>
    			<p class="step-result__content">
    				${title} ${firstName} ${lastName} <br/>
    				${dob}<br/>
    				${email}<br/>
    				${phone}
    			</p>
    			<span class="step-result__edit">Edit</span>
    		`)
    		current_step.removeClass('active');
    		if($(this).hasClass('editing')){
    			setTimeout(function(){
    				scroll_to_element(current_step);
    			},200);
    			$(this).removeClass('editing')
    		}else{
    			current_step.nextAll().first().addClass('active');
    			scroll_to_element(current_step.nextAll().first());
    		}
    	}else{
    		$(this).closest('.step').removeClass('passed');
    	}
    });

    /**
    *** Reg Shipping Information Step
    **/
    $(document).on('click', '.reg-shipping-info-btn', function() {
    	const country = $('.woocommerce-form-register select[name="country"]' ).val();

	    var content = '';
	    const address = $('.woocommerce-form-register input[name="address"]').val();

	    if(address){
	    	content += address+' - ';
	    }
	    if($('#billing_address_2').is('select')){
	    	var ward = $('.woocommerce-form-register select[name="billing_address_2"] option:selected' ).text();
	    }else{
	    	var ward = $('.woocommerce-form-register input[name="billing_address_2"]' ).val();
	    }
	    if(ward && country == 'VN'){
	    	content += ward+' - ';
	    }

	    if($('#billing_city').is('select')){
		 	var district = $('.woocommerce-form-register select[name="billing_city"] option:selected' ).text();
	    }else{
	    	var district = $('.woocommerce-form-register input[name="billing_city"]' ).val();
	    }
	    if(district){
	    	content += district+' - ';
	    }

	    if($('#billing_state').is('select')){
		    var city = $('.woocommerce-form-register select[name="billing_state"] option:selected' ).text();
	    }else{
	    	var city = $('.woocommerce-form-register input[name="billing_state"]' ).val();
	    }
	    if(district){
	    	content += city+' - ';
	    }

	    const country_label = $('.woocommerce-form-register select[name="country"] option:selected' ).text();
	    if(country_label){
	    	content += country_label;
	    }

	    var current_step = $(this).closest('.step');
    	if(validateRegShippingInforStep()){
    		$(this).closest('.step').addClass('passed');
    		$(this).closest('.step').find('.step-results').html(`
    			<p class="step-result__title">ADDRESS - shipping information</p>
    			<p class="step-result__content">
    				${content}
    			</p>
    			<span class="step-result__edit">Edit</span>
    		`)
    		current_step.removeClass('active');

    		if($(this).hasClass('editing')){
    			setTimeout(function(){
    				scroll_to_element(current_step);
    			},200);

    			$(this).removeClass('editing');
    		}else{
    			current_step.nextAll().first().addClass('active');
    			scroll_to_element(current_step.nextAll().first());
    		}
    	}else{
    		$(this).closest('.step').removeClass('passed');
    	}
    });

    /**
    *** Reg Enter Password Step
    **/
    $(document).on('click', '.reg-password-btn', function(e) {
    	const title = $('.woocommerce-form-register select[name="title"]').val();
	    const firstName = $('.woocommerce-form-register input[name="first_name"]').val();
	    const lastName = $('.woocommerce-form-register input[name="last_name"]').val();
	    const dob = $('.woocommerce-form-register input[name="dob"]').val();
	    const email = $('.woocommerce-form-register input[name="email"]').val();
	    const phone = $('.woocommerce-form-register input[name="phone"]').val();
	    const tele = $('.woocommerce-form-register input[name="tele"]').val();

	    const address = $('.woocommerce-form-register input[name="address"]').val();
	    if($('#billing_address_2').is('select')){
	    	var ward = $('.woocommerce-form-register select[name="billing_address_2"]' ).val();
	    }else{
	    	var ward = $('.woocommerce-form-register input[name="billing_address_2"]' ).val();
	    }

	    if($('#billing_city').is('select')){
		 	var district = $('.woocommerce-form-register select[name="billing_city"]' ).val();
	    }else{
	    	var district = $('.woocommerce-form-register input[name="billing_city"]' ).val();
	    }

	    if($('#billing_state').is('select')){
		    var city = $('.woocommerce-form-register select[name="billing_state"]' ).val();
	    }else{
	    	var city = $('.woocommerce-form-register input[name="billing_state"]' ).val();
	    }
	    const country = $('.woocommerce-form-register select[name="country"]').val();

    	var password =  $('.woocommerce-form-register input[name="password"]');
        var confirmPassword = $('.woocommerce-form-register input[name="confirm_password"]');

        var message = '';
        if (password.val() == '' || confirmPassword.val() == '' || password.val() !== confirmPassword.val()) {
            e.preventDefault(); 
            add_span_error('Confirm Password does not match!',confirmPassword);
        }else{
        	$('.woocommerce-form-register').addClass('loading');
        	remove_span_error(confirmPassword);
        	//$('.woocommerce-form-register').find('input[type=submit]').attr("disabled", false).click();
        	$.ajax({
	            type: 'POST',
	            url: ajax_object.ajax_url,
	            data: {
	                action: 'register_user_ajax',
	                title:title,
	                first_name:firstName,
	                last_name:lastName,
	                dob:dob,
	                email:email,
	                phone:phone,
	                //house_number:house_number,
	                address:address,
	                tele:tele,
	                //street:street,
	                ward:ward,
	                district:district,
	                city:city,
	                country:country,
	                password:password.val()

	            },
	            success: function(response) {
	            	if(response){
	            		if(response == 'error_email'){
		            		message = '<p>This Email is registered!</p>';
		            		$('.woocommerce-form-register').removeClass('loading');
		            	}else if(response == 'error_phone'){
		            		message = '<p>This Phone is registered!</p>';
		            		$('.woocommerce-form-register').removeClass('loading');
		            	}else{
		            		$('.woocommerce-form-register').removeClass('loading');
		            		message = '<p>Registered successfully, redirecting to My Account page!</p>';
		            		//window.location.href = '/my-account/?register=success';
		            		$('.wrap-content').remove();
		            		$('.wrap-message-box').removeClass('hidden');
		            	}
		                $('.wp-message').html(message);
		                scroll_to_element($('.wp-message'));
	            	}
	            }
	        });
        }
    });

    /**
    *** Click edit button reg page
    **/
    $(document).on('click', '.woocommerce-form-register .step-result__edit, .woocommerce-form-update .step-result__edit', function() {
    	var current_step = $(this).closest('.step');
    	current_step.addClass('active');
    	current_step.find('.reg-continue-btn').addClass('editing');
    	scroll_to_element(current_step);
    });

    /**
    *** Update Personal Information
    **/
    $(document).on('click', '.update-personal-btn', function() {
    	const title = $('.woocommerce-form-update select[name="title"]').val();
	    const firstName = $('.woocommerce-form-update input[name="first_name"]').val();
	    const lastName = $('.woocommerce-form-update input[name="last_name"]').val();
	    const dob = $('.woocommerce-form-update input[name="dob"]').val();
	    const email = $('.woocommerce-form-update input[name="email"]').val();
	    const phone = $('.woocommerce-form-update input[name="phone"]').val();

	    var current_step = $(this).closest('.step');
    	if(validateRegPersonalStep()){
    		$(this).closest('.step').addClass('passed');
    		current_step.addClass('loading');
    		$.ajax({
	            type: 'POST',
	            url: ajax_object.ajax_url,
	            data: {
	                action: 'update_user_ajax',
	                title:title,
	                first_name:firstName,
	                last_name:lastName,
	                dob:dob,
	                email:email,
	                phone:phone,
	            },
	            success: function(response) {
	            	if(response){
	            		if(response == 'success'){
		            		message = '<p>Personal information updated!</p>';
		            		current_step.removeClass('loading');
		            		current_step.find('.step-results').html(`
				    			<p class="step-result__title">Edit personal information</p>
				    			<p class="step-result__content">
				    				${title} ${firstName} ${lastName} <br/>
				    				${dob}<br/>
				    				${email}<br/>
				    				${phone}
				    			</p>
				    			<span class="step-result__edit cta-btn-black">Update personal information</span>
				    		`)
				    		current_step.removeClass('active');
		            	}else{
		            		message = response;
		            		current_step.removeClass('loading');
		            	}
		                $('.wp-message').html(message);
		                scroll_to_element($('.wp-message'));
	            	}
	            }
	        });
    	}else{
    		$(this).closest('.step').removeClass('passed');
    	}
    });

    /**
    *** Update Shipping Information
    **/
    $(document).on('click', '.update-shipping-info-btn', function() {
	    const address = $('.woocommerce-form-update input[name="address"]').val();
	    const country = $('.woocommerce-form-update select[name="country"]').val();
	    const country_label = $('.woocommerce-form-update select[name="country"] option:selected' ).text();

	    var content = [];
	    if(address){
	    	content.push(address);
	    }
	    if($('#billing_address_2').is('select')){
	    	var ward = $('.woocommerce-form-update select[name="billing_address_2"]').val();
	    	var ward_label = $('.woocommerce-form-update select[name="billing_address_2"] option:selected' ).text();
	    }else{
	    	var ward = $('.woocommerce-form-update input[name="billing_address_2"]' ).val();
	    	var ward_label = ward;
	    }
	    if(ward_label && country == 'VN'){
	    	content.push(ward_label);
	    }

	    if($('#billing_city').is('select')){
	    	var district = $('.woocommerce-form-update select[name="billing_city"]').val();
		 	var district_label = $('.woocommerce-form-update select[name="billing_city"] option:selected' ).text();
	    }else{
	    	var district = $('.woocommerce-form-update input[name="billing_city"]' ).val();
	    	var district_label = district;
	    }
	    if(district_label){
	    	content.push(district_label);
	    }

	    if($('#billing_state').is('select')){
	    	var city = $('.woocommerce-form-update select[name="billing_state"]').val();
		    var city_label = $('.woocommerce-form-update select[name="billing_state"] option:selected' ).text();
	    }else{
	    	var city = $('.woocommerce-form-update input[name="billing_state"]' ).val();
	    	var city_label = city;
	    }
	    if(city_label){
	    	content.push(city_label);
	    }

	    if(country_label){
	    	content.push(country_label);
	    }

	    var current_step = $(this).closest('.step');
    	if(validateRegShippingInforStep()){
    		current_step.addClass('loading');
    		current_step.addClass('passed');
    		$.ajax({
	            type: 'POST',
	            url: ajax_object.ajax_url,
	            data: {
	                action: 'update_user_ajax',
	                address:address,
	                ward:ward,
	                district:district,
	                city:city,
	                country:country
	            },
	            success: function(response) {
	            	if(response){
	            		if(response == 'success'){
		            		message = '<p>Address -	Shipping information updated!</p>';
		            		current_step.removeClass('loading');
		            		current_step.find('.step-results').html(`
				    			<p class="step-result__title">Edit shipping information</p>
				    			<p class="step-result__content">
				    				${content.join(" - ")}
				    			</p>
				    			<span class="step-result__edit cta-btn-black">Update shipping information</span>
				    		`)
				    		current_step.removeClass('active');
		            	}else{
		            		message = response;
		            		current_step.removeClass('loading');
		            	}
		                $('.wp-message').html(message);
		                scroll_to_element($('.wp-message'));
	            	}
	            }
	        });
    	}else{
    		$(this).closest('.step').removeClass('passed');
    	}
    });

    /**
    *** Update Password
    **/
    $(document).on('click', '.update-password-btn', function(e) {
    	var password =  $('.woocommerce-form-update input[name="password"]');
        var confirmPassword = $('.woocommerce-form-update input[name="confirm_password"]');

        var message = '';
        var current_step = $(this).closest('.step');
        if(password.val() == '' && confirmPassword.val() == ''){
        	e.preventDefault(); 
        	add_span_error('Please enter your new password!',password);
        }else if (password.val() !== confirmPassword.val()) {
            e.preventDefault(); 
            add_span_error('Confirm Password does not match!',confirmPassword);
        }else{
        	current_step.addClass('loading');
        	remove_span_error(password);
        	remove_span_error(confirmPassword);
        	//$('.woocommerce-form-register').find('input[type=submit]').attr("disabled", false).click();
        	$.ajax({
	            type: 'POST',
	            url: ajax_object.ajax_url,
	            data: {
	                action: 'update_user_ajax',
	                password:password.val()

	            },
	            success: function(response) {
	            	if(response){
	            		if(response == 'success'){
		            		message = '<p>Password updated!</p>';
		            		current_step.removeClass('loading');
		            		current_step.find('.step-results').html(`
				    			<p class="step-result__title">CHANGE PASSWORD</p>
				    			<p class="step-result__content">
				    				***********<br/>
				    				***********
				    			</p>
				    			<span class="step-result__edit cta-btn-black">Change password</span>
				    		`)
				    		current_step.removeClass('active');
		            	}else{
		            		message = response;
		            		current_step.removeClass('loading');
		            	}
		                $('.wp-message').html(message);
		                scroll_to_element($('.wp-message'));
	            	}
	            }
	        });
        }
    });

    // Size guide
    $(document).on('click touchstart', '.view-size-guide', function() {
    	$('.size-guide-table').addClass('active');
    	$(this).addClass('active');
    });
    $(document).on('click touchstart', '.close-size-guide', function() {
    	$('.size-guide-table').removeClass('active');
    	$('.view-size-guide').removeClass('active');
    });
    $(document).on('click', '.sg-table__head-units a', function(event) {
    	event.preventDefault();
    	$(this).parent().addClass('active').siblings().removeClass('active');
    	var tabId = $(this).attr('href');

    	 $('.sg-table__body-content').hide();

    	 $(tabId).css('display','flex');
    });

    $(document).on('click', '.review-order-bar', function() {
    	$(this).toggleClass('active');
    	$('.wrap-review-order').slideToggle('fast');
    	$('#customer_details').toggleClass('opacity-zero');
    });

});
