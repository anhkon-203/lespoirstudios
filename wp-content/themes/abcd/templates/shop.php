<?php /* Template Name: Shop */ ?>
<?php 
get_header();

?>
<main id="primary" class="site-main">
    <div class="container">
        <nav class="woocommerce-breadcrumb" aria-label="Breadcrumb"><a href="https://lespoirstudios.com">Home</a>&nbsp;&#47;&nbsp;New Arrivals</nav>
        <header class="woocommerce-products-header">
            <h1 class="woocommerce-products-header__title page-title">New Arrivals</h1>

            <div class="wrap-shop-bar row">
                <div id="filter" class="col-9 col-xs-9 p-l-0">
                    <div class="row">
                        <span class="filter-label col-xs-3 col-2 p-l-0 active">FILTER</span>
                        <div class="filter__fields col-xs-9 col-10 active">
                            <div class="row">
                              <?php echo render_filter_html(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="toggle-block col-3 col-xs-3 p-r-0 text-right">
                    <p>VIEW <span class="toggle-view js-toggle-view" data-view="2">2</span><span class="seperate-text hidden for-view-1">|</span><span class="toggle-view js-toggle-view for-view-1 hidden" data-view="1">1</span><span class="seperate-text for-view-3">|</span><span class="toggle-view js-toggle-view for-view-3 active" data-view="3">3</span><span class="seperate-text for-view-4">|</span><span class="toggle-view js-toggle-view for-view-4" data-view="4">4</span></p>
                </div>
            </div>
        </header>
        <div class="woocommerce-notices-wrapper"></div>
<!--        <p class="woocommerce-result-count">-->
<!--            Showing 1&ndash;12 of 73 results</p>-->
<!--        <form class="woocommerce-ordering" method="get">-->
<!--            <select name="orderby" class="orderby" aria-label="Shop order">-->
<!--                <option value="popularity">Sort by popularity</option>-->
<!--                <option value="date" selected='selected'>Sort by latest</option>-->
<!--                <option value="price">Sort by price: low to high</option>-->
<!--                <option value="price-desc">Sort by price: high to low</option>-->
<!--            </select>-->
<!--            <input type="hidden" name="paged" value="1" />-->
<!--        </form>-->
        <ul class="products columns-4" id="product-list">
            <li class="product type-product post-2627 status-publish first instock product_cat-new-arrivals product_cat-tops has-post-thumbnail shipping-taxable purchasable product-type-variable">
                <a href="https://lespoirstudios.com/product/heli-bodysuit-white/" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><img width="726" height="1038" src="https://lespoirstudios.com/wp-content/uploads/2024/09/Lespoir-673308-726x1038.jpeg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy" data-xooWscFly="fly" />
                    <h2 class="woocommerce-loop-product__title">Heli Bodysuit White</h2>
                    <span class="price"><span class="woocommerce-Price-amount amount"><bdi>65&nbsp;<span class="woocommerce-Price-currencySymbol">&#36;</span></bdi></span></span>
                </a>
            </li>
        </ul>
        <nav class="woocommerce-pagination">
            <ul class="page-numbers" id="pagination">
                <li><span aria-current="page" class="page-numbers current">1</span></li>
                <li><a class="page-numbers" href="https://lespoirstudios.com/product-category/new-arrivals/page/2/">2</a></li>
                <li><a class="page-numbers" href="https://lespoirstudios.com/product-category/new-arrivals/page/3/">3</a></li>
                <li><a class="page-numbers" href="https://lespoirstudios.com/product-category/new-arrivals/page/4/">4</a></li>
                <li><a class="page-numbers" href="https://lespoirstudios.com/product-category/new-arrivals/page/5/">5</a></li>
                <li><a class="page-numbers" href="https://lespoirstudios.com/product-category/new-arrivals/page/6/">6</a></li>
                <li><a class="page-numbers" href="https://lespoirstudios.com/product-category/new-arrivals/page/7/">7</a></li>
                <li><a class="next page-numbers" href="https://lespoirstudios.com/product-category/new-arrivals/page/2/"></a></li>
            </ul>
        </nav>
    </div><!-- .container -->
</main><!-- #main -->


<?php get_footer() ?>
<script>
    jQuery(document).ready(function($) {
        // Hàm lấy giá trị filter hiện tại
        function getCurrentFilters() {
            return {
                category: $('.filter-item.category label').data('tid') || '',
                color: $('.filter-item.color label').data('tid') || '',
                size: $('.filter-item.size label').data('tid') || ''
            };
        }

        // Hàm gọi AJAX để tải sản phẩm
        function loadProducts(page = 1) {
            // Lấy giá trị filter mới nhất mỗi khi hàm được gọi
            const currentFilters = getCurrentFilters();

            // Thêm class loading
            $('#product-list').addClass('loading');

            // Gửi yêu cầu AJAX
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'loadProductByAjax',
                    filter_category: currentFilters.category,
                    filter_color: currentFilters.color,
                    filter_size: currentFilters.size,
                    paged: page
                },
                success: function(response) {
                    // Xóa sản phẩm cũ và thêm sản phẩm mới
                    $('#product-list').empty();

                    // Tắt loading
                    $('#product-list').removeClass('loading');

                    if (response.products && response.products.length) {
                        $.each(response.products, function(index, product) {
                            $('#product-list').append(`
                            <li class="product type-product">
                                <a href="${product.link}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                    <img src="${product.image}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="${product.name}" loading="lazy" />
                                    <h2 class="woocommerce-loop-product__title">${product.name}</h2>
                                    <span class="price">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>${product.price}&nbsp;<span class="woocommerce-Price-currencySymbol">&#36;</span></bdi>
                                        </span>
                                    </span>
                                </a>
                            </li>
                        `);
                        });
                    } else {
                        $('#product-list').html('<li class="product type-product">Không có sản phẩm nào phù hợp.</li>');
                    }

                    // Cập nhật phân trang
                    $('#pagination').empty();
                    if (response.pagination && response.pagination.total_pages > 1) {
                        for (let i = 1; i <= response.pagination.total_pages; i++) {
                            $('#pagination').append(`
                            <li><a href="#" class="page-numbers ${i == page ? 'current' : ''}" data-page="${i}">${i}</a></li>
                        `);
                        }
                    }
                },
                error: function(error) {
                    console.error('Lỗi:', error);
                    $('#product-list').removeClass('loading');
                }
            });
        }

        // Xóa style display:none mặc định của expand
        $('.filter-item .expand').removeAttr('style');

        // Bắt sự kiện click vào bộ lọc trong expand
        $('.filter-item .expand span').on('click', function() {
            const $filterItem = $(this).closest('.filter-item');
            const $label = $filterItem.find('label');
            const selectedTid = $(this).data('tid');

            // Cập nhật selected cho cả label và span
            $filterItem.find('.expand span').removeClass('selected');
            $(this).addClass('selected');

            // Cập nhật label và đóng expand
            $label.removeClass('selected').addClass('selected').data('tid', selectedTid).text($(this).text());
            $(this).closest('.expand').slideUp();

            // khi ko chọn thì hiển thị tất cả



            loadProducts(1);
        });

        $('.filter-item label').on('click', function() {
            // lấy data-expand của label // find parent
            const expand = $(this).parent().data('expand');
            console.log(expand);
            if ($(this).hasClass('selected')) {
                // reset lại selected
                // $(this).removeClass('selected').data('tid', '');
                // chỉ xoá dữ liệu đã chọn
                expand.find('span').removeClass('selected').data('tid', '');
               loadProducts(1);
                $(this).siblings('.expand').slideUp();
            }else{
                console.log('not selected')
            }
        });


        // Bắt sự kiện click vào phân trang
        $('#pagination').on('click', '.page-numbers', function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            loadProducts(page);
        });

        // Load sản phẩm lần đầu
        loadProducts();
    });
</script>
