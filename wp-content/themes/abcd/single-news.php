<?php get_header(); ?>
	<div class="container">
		<div class="directional">
			<h3><a href="#">Aus4Equality</a> / <a href="#">News</a> / <span>Updates</span></h3>
		</div>
		<section class="detail-news row">
			<div class="col-lg-8">
				<?php
					while(have_posts()) : the_post(); ?>
					<div class="main">
						<div class="title"><h2><?php  the_title(); ?></h2></div>
						<div class="date">
							<h4><?php
								$date = get_the_date('d/m/Y'); // Định dạng: Tháng Ngày, Năm
								echo $date;
								?>
							</h4>
						</div>
						<div class="desc">
							<?php the_content(); ?>
						</div>
						<nav class="tag">
							<ul>
								<?php
								$post_tags = get_the_tags(); // Lấy danh sách các thẻ tag của bài viết

								if ($post_tags) {
									foreach ($post_tags as $tag) {
										echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
									}
								}
								?>
							</ul>
						</nav>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="col-lg-4">
				<div class="right">
					<div class="recent">
						<div class="title">
							<h2>Recent </h2>
							<div class="underlined">
								<span></span>
								<span></span>
							</div>
						</div>
						<div class="list">
							<?php
								$recent_args = array(
									'post_type' => 'post', // Loại bài viết bạn muốn lấy
									'posts_per_page' => 4, // Số lượng bài viết gần đây muốn hiển thị
									// Thêm các tham số tùy chỉnh khác tại đây (nếu cần)
								);

								$recent_query = new WP_Query( $recent_args );

								// Kiểm tra xem có bài viết nào hay không
								if ( $recent_query->have_posts() ) {
									while ( $recent_query->have_posts() ) {
										$recent_query->the_post();
										?>
										<div class="child">
											<div class="image">
											<figure>
												<?php the_post_thumbnail(); ?>
											</figure>
											</div>
											<div class="text">
												<div class="name">
													<a href="<?php the_permalink(); ?>">
														<h4><?php the_title(); ?></h4>
													</a>
												</div>
												<div class="date">
													<h5><?php the_date('d/m/Y'); ?></h5>
												</div>
											</div>
										</div>
										<?php
									}

									// Đặt lại trạng thái sau khi kết thúc vòng lặp
									wp_reset_postdata();
								}
							
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

		</section>
	</div>
<?php get_footer(); ?>