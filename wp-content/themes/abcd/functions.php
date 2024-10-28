<?php
/**
 * abcd functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package abcd
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function abcd_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on abcd, use a find and replace
		* to change 'abcd' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'abcd', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'abcd' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'abcd_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'abcd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function abcd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'abcd_content_width', 640 );
}
add_action( 'after_setup_theme', 'abcd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function abcd_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'abcd' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'abcd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'abcd_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function abcd_scripts() {
	wp_enqueue_style( 'abcd-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'abcd-style', 'rtl', 'replace' );

	wp_enqueue_script( 'abcd-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'abcd_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
add_filter('show_admin_bar', '__return_false');
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array(
        'page_title' => 'Cấu hình chung',
        'menu_title' => 'Cấu hình chung',
        'icon_url' => 'dashicons-image-filter',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Tổng quan',
        'menu_title' => 'Tổng quan',
        'parent_slug' => $parent['menu_slug'],
    ));
}
function enqueue_scripts_and_styles() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue Slick Slider
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1');
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts_and_styles');

// author: anhplq
function register_my_menus() {
  register_nav_menus(
      array(
          'menu-left' => __('Menu Left'),
          'menu-right' => __('Menu Right'),
          'footer-menu' => __('Footer Menu')
      )
  );
}
add_action('init', 'register_my_menus');

// Custom Walker để giữ nguyên cấu trúc class
class Custom_Menu_Walker extends Walker_Nav_Menu {
  public function start_lvl(&$output, $depth = 0, $args = array()) {
    $output .= '<ul class="sub-menu">';
  }

  public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'menu-item';
    $classes[] = 'menu-item-' . $item->ID;

    if ($item->menu_item_parent == 0) {
      $classes[] = 'menu-item-type-custom';
      $classes[] = 'menu-item-object-custom';
    }

    if ($args->walker->has_children) {
      $classes[] = 'menu-item-has-children';
    }

    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

    $output .= sprintf(
        '<li id="menu-item-%d" class="%s">',
        $item->ID,
        esc_attr($class_names)
    );

    $attributes = '';
    if (!empty($item->url)) {
      $attributes .= ' href="' . esc_attr($item->url) . '"';
    }

    // Thêm data-image nếu có
    $image = get_field('menu_image', $item->ID); // Nếu dùng ACF
    if($image) {
      $attributes .= ' data-image="' . esc_attr($image) . '"';
    }

    $title = apply_filters('the_title', $item->title, $item->ID);

    $item_output = sprintf(
        '<a%s>%s</a>',
        $attributes,
        $title
    );

    $output .= $item_output;
  }
}

class Menu_Footer extends Walker_Nav_Menu {
  // output chỉ có thẻ li và thêm target cho thẻ a
  public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'menu-item';
    $classes[] = 'menu-item-' . $item->ID;

    if ($item->menu_item_parent == 0) {
      $classes[] = 'menu-item-type-custom';
      $classes[] = 'menu-item-object-custom';
    }

    if ($args->walker->has_children) {
      $classes[] = 'menu-item-has-children';
    }

    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

    $output .= sprintf(
        '<li id="menu-item-%d" class="%s">',
        $item->ID,
        esc_attr($class_names)
    );

    $attributes = '';
    if (!empty($item->url)) {
      $attributes .= ' href="' . esc_attr($item->url) . '"';
    }

    $title = apply_filters('the_title', $item->title, $item->ID);

    $item_output = sprintf(
        '<a%s target="_blank">%s</a>',
        $attributes,
        $title
    );

    $output .= $item_output;
  }
}

function cmToInch($cm) {
  // format inch thành số nguyên
  return number_format($cm / 2.54, 0);
}


function loadProductByAjax() {
  $filter_category = $_POST['filter_category'];
  $filter_color = $_POST['filter_color'];
  $filter_size = $_POST['filter_size'];
  $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;

  // lowercase $filter size

  $args = array(
      'post_type' => 'product',
      'posts_per_page' => 4,
      'post_status' => 'publish',
      'paged' => $paged,
      'tax_query' => array('relation' => 'AND'),
      'meta_query' => array('relation' => 'AND')
  );

  // Nếu có bộ lọc danh mục
  if (!empty($filter_category)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'product-category',
        'field' => 'slug',
        'terms' => $filter_category,
    );
  }
  $meta_query = array('relation' => 'OR'); // Sử dụng 'OR' để tìm bất kỳ trường nào khớp
  // Nếu có bộ lọc màu sắc
  if ($filter_color) {
    for ($i = 0; $i <= 10; $i++) {
      $meta_query[] = array(
          'key' => "group_variations_re_variations_{$i}_name_color",
          'value' => $filter_color,
          'compare' => '='
      );
    }
  }

  // Nếu có bộ lọc kích thước
  if (!empty($filter_size)) {
    for ($i = 0; $i <= 10; $i++) {
      $meta_query[] = array(
          'key' => "group_variations_re_variations_{$i}_re_sizes_0_size",
          'value' => $filter_size,
          'compare' => '='
      );
    }
  }

  $args['meta_query'] = array_merge($args['meta_query'], $meta_query);
  if (empty($filter_category) && empty($filter_color) && empty($filter_size)) {
    unset($args['tax_query']);
    unset($args['meta_query']);
  }

  $query = new WP_Query($args);

  $response = array();
  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $product_id = get_the_ID();

      $response['products'][] = array(
          'image' => get_the_post_thumbnail_url($product_id, 'full'),
          'name' => get_the_title(),
          'price' => get_post_meta($product_id, 'group_variations_price', true),
          'link' => get_permalink(),
      );
    }

    // Thêm thông tin phân trang
    $response['pagination'] = array(
        'current_page' => $paged,
        'total_pages' => $query->max_num_pages,
    );
  } else {
    $response['products'] = array();
    $response['pagination'] = array(
        'current_page' => $paged,
        'total_pages' => 0,
    );
  }

  wp_reset_postdata();

  // Gửi phản hồi JSON
  wp_send_json($response);
  wp_die();
}
add_action('wp_ajax_loadProductByAjax', 'loadProductByAjax');
add_action('wp_ajax_nopriv_loadProductByAjax', 'loadProductByAjax');



function render_filter_html() {
  // Lấy danh sách danh mục (taxonomy product_cat)
  $categories = get_terms(array(
      'taxonomy' => 'product-category',
      'hide_empty' => false,
  ));

  // Truy vấn tất cả sản phẩm để lấy `group_variations`
  $products = get_posts(array(
      'post_type' => 'product',
      'posts_per_page' => -1,
      'post_status' => 'publish',
  ));

  // Khởi tạo mảng màu sắc và kích thước
  $colors = [];
  $sizes = [];

  // Lấy dữ liệu màu sắc và kích thước từ custom field
  foreach ($products as $product) {
    $group_variations = get_field('group_variations', $product->ID);
    if ($group_variations && isset($group_variations['re_variations'])) {
      foreach ($group_variations['re_variations'] as $variation) {
        if (!empty($variation['name_color'])) {
          $colors[] = $variation['name_color'];
        }
        if (!empty($variation['re_sizes'])) {
          foreach ($variation['re_sizes'] as $size) {
            if (!empty($size['size'])) {
              $sizes[] = strtoupper($size['size']);
            }
          }
        }
      }
    }
  }

  // Loại bỏ các giá trị trùng lặp
  $colors = array_unique($colors);
  $sizes = array_unique($sizes);

  // Tạo HTML cho bộ lọc
  ?>
    <div class="filter-item category col-xs-3 col-3" data-expand="category">
      <label for="" data-id="" class="">Category <sup></sup></label>
      <div class="expand" style="display: none;">
        <?php foreach ($categories as $category): ?>
          <span data-tid="<?php echo esc_attr($category->slug); ?>"><?php echo esc_html($category->name); ?></span>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Color Filter -->
    <div class="filter-item color col-xs-3 col-3" data-expand="color">
      <label for="" data-id="" class="">Color <sup></sup></label>
      <div class="expand" style="display: none;">
        <?php foreach ($colors as $color): ?>
          <span data-tid="<?php echo esc_html($color); ?>"><?php echo esc_html($color); ?></span>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Size Filter -->
    <div class="filter-item size col-xs-3 col-3" data-expand="size">
      <label for="" data-id="">Size <sup></sup></label>
      <div class="expand" style="display: none;">
        <?php foreach ($sizes as $size): ?>
          <span data-tid="<?php echo esc_html($size); ?>"><?php echo esc_html($size); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  <?php
}





