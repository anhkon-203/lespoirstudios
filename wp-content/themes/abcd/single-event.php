<?php
get_header();
?>
<div class="container">
    <section class="detail-event">
        <div class="directional">
            <h3><a href="#">Aus4Equality</a> / <a href="#">Knowledge</a> / <a href="#">Event</a> / <span>Engaging Women in Market</span></h3>
        </div>
        <div class="content row">
            <div class="col-lg-8">
                <div class="right">
                    <div class="image">
                        <figure>
                            <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                        </figure>
                    </div>
                    <div class="item">
                        <div class="date">
                            <h4><?php echo esc_html(get_field('event_date')); ?></h4>
                        </div>
                        <div class="location">
                            <h4><?php echo esc_html(get_field('event_location')); ?></h4>
                        </div>
                    </div>
                    <div class="title">
                        <h3><?php echo the_title(); ?></h3>
                    </div>
                    <div class="desc">
                        <p><?php echo the_content(); ?></p>
                    </div>
                    <!-- <div class="bang">
                        <div class="child">
                            <div class="name">
                                <i class="fas fa-caret-right"></i>
                                <h4>Gender mainstreaming:</h4>
                            </div>
                            <div class="detail">
                                <p>Integrating gender equality measures within programs including addressing barriers to women’s participation.</p>
                            </div>
                        </div>
                        <div class="child">
                            <div class="name">
                                <i class="fas fa-caret-right"></i>
                                <h4>Gender targeting:</h4>
                            </div>
                            <div class="detail">
                                <p>Initiatives that are focused on women, such as providing loans to women-led enterprises.</p>
                            </div>
                        </div>
                        <div class="child">
                            <div class="name">
                                <i class="fas fa-caret-right"></i>
                                <h4>Inclusive business:</h4>
                            </div>
                            <div class="detail">
                                <p>An entrepreneurial initiative seeking to build bridges between business and low-income populations for the benefit of both.</p>
                            </div>
                        </div>
                        <div class="child">
                            <div class="name">
                                <i class="fas fa-caret-right"></i>
                                <h4>Market systems development:</h4>
                            </div>
                            <div class="detail">
                                <p>An approach that aims to tackle the underlying causes of market failure and poverty, rather than just finding solutions to the superficial symptoms.</p>
                            </div>
                        </div>
                    </div>
                    <div class="desc">
                        <p><strong>The Engaging Women in Markets</strong> aims to bring together <a href="#">Australian Government-funded programs, including Australia-Indonesia Partnership for Promoting Rural Incomes through Support for Markets in Agriculture, Cambodia-Australia Agricultural Value Chain Program, Market Development Facility </a>and <a href="#">Investing in Women</a>to share and document approaches and lessons on gender and women’s economic empowerment.</p>
                        <p>Please click through the below for the agenda, presentations, communications products and the event photos. For further information, please kindly contact us at:</p>
                    </div> -->
                    <div class="contact">
                        <?php
                        $contact_info = get_field('event_contact');
                        if ($contact_info) :
                            foreach ($contact_info as $contact) :
                        ?>
                                <div class="<?php echo sanitize_title(strtolower($contact['name'])); ?>">
                                    <div class="icon">
                                        <figure>
                                            <img src="<?php echo esc_url($contact['contact_icon']['url']); ?>" alt="<?php echo esc_attr($contact['contact_icon']['alt']); ?>">
                                        </figure>
                                    </div>
                                    <p><strong><?php echo esc_html($contact['name']); ?>:</strong>
                                        <?php if (!empty($contact['contact_url'])) : ?>
                                            <a href="<?php echo esc_url($contact['contact_url']); ?>"><?php echo esc_html($contact['contact_desc']); ?></a>
                                        <?php else : ?>
                                            <?php echo esc_html($contact['contact_desc']); ?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
                <div class="other">
                    <div class="other-slider">
                        <?php
                        $selected_posts = get_field('post_object'); // Thay 'ten_truong_acf' bằng tên trường ACF của bạn

                        if ($selected_posts) :
                            foreach ($selected_posts as $post) :
                                setup_postdata($post);
                        ?>
                                <div class="child">
                                    <div class="image">
                                        <figure>
                                            <?php the_post_thumbnail(); ?>
                                        </figure>
                                    </div>
                                    <div class="text">
                                        <h4 style="display: none;"><?php the_title(); ?></h4>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var childElements = document.querySelectorAll('.child');

                        childElements.forEach(function(childElement) {
                            childElement.addEventListener('mouseover', function() {
                                var titleElement = childElement.querySelector('h4');
                                titleElement.style.display = 'block';
                            });

                            childElement.addEventListener('mouseout', function() {
                                var titleElement = childElement.querySelector('h4');
                                titleElement.style.display = 'none';
                            });
                        });
                    });
                </script>
            </div>
            <div class="col-lg-4">
                <div class="left">
                    <div class="socail">
                        <div class="title">
                            <h2><?php echo get_field('socail_title'); ?></h2>
                            <div class="underlined">
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="content">
                            <p><?php echo get_field('content'); ?></p>
                            <div class="desc">
                                <?php 
                                if(have_rows('desc')){
                                    while(have_rows('desc')){
                                        the_row();
                                        $url = get_sub_field('url');
                                        $image = get_sub_field('image')['url'];
                                        ?>
                                        <div>
                                            <a href="<?php echo $url; ?>">
                                                <figure>
                                                    <img src="<?php echo $image; ?>" alt="">
                                                </figure>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="recent">
                        <div class="title">
                            <h2><?php echo get_field(''); ?></h2>
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
<?php
get_footer();
?>