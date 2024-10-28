<?php
get_header();
?>

<div class="container">
    <section class="detail-event">
        <div class="directional">
            <h3><a href="#">Aus4Equality</a> / <a href="#"></a> / <a href="#">Video</a> / <span><?php the_title(); ?></span></h3>
        </div>
        <div class="content row">
            <div class="col-lg-8">
                <div class="title"><h2><?php  the_title(); ?></h2></div>
                <?php the_content(); ?>
            </div>
            <div class="col-lg-4">
                <div class="left">
                    <div class="socail">
                        <div class="title">
                            <h2>Social Media</h2>
                            <div class="underlined">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="content">
                            <p>Connect with us on social media</p>
                            <div class="desc">
                                <div>
                                    <a href="#">
                                        <figure>
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Facebook.png" alt="">
                                        </figure>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <figure>
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Linkedin.png" alt="">
                                        </figure>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <figure>
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Instagram.png" alt="">
                                        </figure>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <figure>
                                            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/Youtube.png" alt="">
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recent">
                        <div class="title">
                            <h2>Recent Events</h2>
                            <div class="underlined">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="content">
                            <?php
                            // Truy vấn danh sách các sự kiện gần đây
                            $args = array(
                                'post_type' => 'event', // Thay 'event' bằng tên của Custom Post Type bạn sử dụng cho sự kiện
                                'posts_per_page' => 5, // Số lượng sự kiện bạn muốn hiển thị
                                'order' => 'DESC', // Sắp xếp theo thời gian giảm dần
                            );

                            $recent_events = new WP_Query($args);

                            // Kiểm tra xem có sự kiện nào không
                            if ($recent_events->have_posts()) :
                                while ($recent_events->have_posts()) : $recent_events->the_post();
                                    ?>
                                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                    <?php
                                endwhile;
                                wp_reset_postdata(); // Đặt lại trạng thái của truy vấn
                            else :
                                echo 'Không có sự kiện gần đây.';
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="gallery">
                        <div class="title">
                            <h2><?php echo get_post_type_object('gallery')->labels->singular_name; ?></h2>
                            <div class="underlined">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="content js-gallery">
                            <?php
                            // Lấy danh sách term (taxonomy) của post type 'gallery'
                            $gallery_terms = get_terms(array(
                                'taxonomy' => 'gallery', // Tên taxonomy
                                'hide_empty' => false, // Hiển thị cả term không có bài viết nào
                            ));

                            if ($gallery_terms && !is_wp_error($gallery_terms)) {
                                foreach ($gallery_terms as $term) {
                                    // Lấy danh sách hình ảnh trong term
                                    $term_images = get_field('post_gallery', $term);
                                    
                                    if ($term_images) {
                                        foreach ($term_images as $image) {
                                            // Lấy URL hình ảnh
                                            $image_url = $image['url'];
                                            
                                            echo '<div data-src="' . esc_url($image_url) . '">';
                                            echo '<figure><img src="' . esc_url($image_url) . '" alt=""></figure>';
                                            echo '</div>';
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div> 
        </div>
    </section>
</div>
<?php get_footer(); ?>