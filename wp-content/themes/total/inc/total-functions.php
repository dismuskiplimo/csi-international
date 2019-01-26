<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Total
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function total_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	$post_type = array( 'post' ,'page' );

	if(is_singular($post_type)){
		global $post;
		$sidebar_layout = get_post_meta( $post->ID, 'total_sidebar_layout', true );

		if(!$sidebar_layout){
			$sidebar_layout = 'right_sidebar';
		}

		$classes[] = 'ht_'.$sidebar_layout;
	}

	$sticky_header = get_theme_mod('total_sticky_header_enable');
	
	if( $sticky_header == 'on' ){
		$classes[] = 'ht-sticky-header';
	}

	return $classes;
}
add_filter( 'body_class', 'total_body_classes' );

if( !function_exists( 'total_excerpt' ) ){
	function total_excerpt( $content , $letter_count ){
		$content = strip_shortcodes( $content );
		$content = strip_tags( $content );
		$content = mb_substr( $content, 0 , $letter_count );

		if( strlen( $content ) == $letter_count ){
			$content .= "...";
		}
		return $content;
	}
}

add_filter( 'wp_page_menu_args' , 'total_change_wp_page_menu_args');

if( !function_exists( 'total_change_wp_page_menu_args' ) ){
	function total_change_wp_page_menu_args( $args ){
		$args['menu_class'] = 'ht-menu ht-clearfix';	
		return $args;
	}
}

function total_dynamic_styles(){
	echo "<style>";
	$total_service_left_bg = get_theme_mod('total_service_left_bg');
	$total_counter_bg = get_theme_mod('total_counter_bg');
	$total_cta_bg = get_theme_mod('total_cta_bg');
	echo '.ht-service-left-bg{ background-image:url(' .esc_url($total_service_left_bg). ');}';
	echo '#ht-counter-section{ background-image:url(' .esc_url($total_counter_bg). ');}';
	echo '#ht-cta-section{ background-image:url(' .esc_url($total_cta_bg). ');}';
	echo "</style>";
}

add_action( 'wp_head', 'total_dynamic_styles' );

if( !function_exists( 'total_excerpt' ) ){
	function total_excerpt( $content , $letter_count ){
		$content = strip_shortcodes( $content );
		$content = strip_tags( $content );
		$content = mb_substr( $content, 0 , $letter_count );

		if( strlen( $content ) == $letter_count ){
			$content .= "...";
		}
		return $content;
	}
}

function total_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] )  ? 'parent' : '', $comment ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php echo sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment )  ); ?>
				</div><!-- .comment-author -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'total' ); ?></p>
				<?php endif; ?>
				<?php edit_comment_link( __( 'Edit' , 'total' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<div class="comment-metadata ht-clearfix">
				<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
					<time datetime="<?php comment_time( 'c' ); ?>">
						<?php
							/* translators: 1: comment date, 2: comment time */
							printf( __( '%1$s at %2$s' , 'total' ), get_comment_date( '', $comment ), get_comment_time() );
						?>
					</time>
				</a>

				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>'
				) ) );
				?>
			</div><!-- .comment-metadata -->
		</article><!-- .comment-body -->
<?php
}

function total_breadcrumbs(){
  /* === OPTIONS === */
	$text['home']     = __( 'Home', 'total' ); // text for the 'Home' link
	$text['category'] = __( 'Archive by Category "%s"', 'total' ); // text for a category page
	$text['tax'] 	  = __( 'Archive for "%s"', 'total' ); // text for a taxonomy page
	$text['search']   = __( 'Search Results for "%s" Query', 'total' ); // text for a search results page
	$text['tag']      = __( 'Posts Tagged "%s"', 'total' ); // text for a tag page
	$text['author']   = __( 'Articles Posted by %s', 'total' ); // text for an author page
	$text['404']      = __( 'Error 404', 'total' ); // text for the 404 page
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter   = ' &#47; '; // delimiter between crumbs
	$before      = '<span class="current">'; // tag before the current crumb
	$after       = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */
	global $post;
	$homeLink = esc_url( home_url( '/' ));
	$linkBefore = '<span typeof="v:Breadcrumb">';
	$linkAfter = '</span>';
	$linkAttr = ' rel="v:url" property="v:title"';
	$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
	if (is_home() && !is_front_page()) {
		$blog_page_id = get_option('page_for_posts');
		if ($showOnHome == 1) echo '<div id="total-breadcrumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a>'. $delimiter . $before . get_the_title($blog_page_id) . $after .'</div>';
	} else {
		echo '<div id="total-breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
		
		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
		} elseif( is_tax() ){
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
		
		}elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;
		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
			$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo $delimiter;
			}
			if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;
		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page', 'total') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		echo '</div>';
	}
} 

add_action( 'total_breadcrumbs', 'total_breadcrumbs' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

add_action('woocommerce_before_main_content', 'total_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'total_theme_wrapper_end', 10);
add_action('total_woocommerce_breadcrumb', 'woocommerce_breadcrumb', 10);
add_action('total_woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
add_action('total_woocommerce_archive_description', 'woocommerce_product_archive_description', 10);


function total_theme_wrapper_start() {
	echo '<header class="ht-main-header">';
	echo '<div class="ht-container">';
	echo '<h1 class="ht-main-title">';
	woocommerce_page_title();
	echo '</h1>';
	do_action('total_woocommerce_archive_description');
	do_action('total_woocommerce_breadcrumb');
	echo '</div>';
	echo '</header>';

	echo '<div class="ht-container">';
	echo '<div id="primary">';
}

function total_theme_wrapper_end() {
  echo '</div>';
  get_sidebar( 'shop' );
  echo '</div>';
}

add_filter( 'woocommerce_show_page_title', '__return_false' );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'total_loop_columns');
if (!function_exists('total_loop_columns')) {
	function total_loop_columns() {
		return 3; 
	}
}

// Display 9 products per page.
add_filter( 'loop_shop_per_page', 'total_product_per_page', 20 );
if (!function_exists('total_product_per_page')) {
	function total_product_per_page() {
		return 9; 
	}
}

function total_update_woo_thumbnail(){
	$catalog = array(
		'width' 	=> '325',	// px
		'height'	=> '380',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '120',	// px
		'height'	=> '120',	// px
		'crop'		=> 1 		// false
	);;
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

add_action( 'init', 'total_update_woo_thumbnail');

//Change number of related products on product page
add_filter( 'woocommerce_output_related_products_args', 'total_related_products_args' );
function total_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}

add_filter( 'woocommerce_product_description_heading', '__return_false' );

add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );

add_filter( 'woocommerce_pagination_args', 'total_change_prev_text');

function total_change_prev_text( $args ){
	$args['prev_text'] = '&lang;';
	$args['next_text'] = '&rang;';
	return $args;
}

add_filter( 'body_class' , 'woocommerce_column_class');

function woocommerce_column_class($classes){
	$classes[] = 'columns-3';
	return $classes;
}

add_action( 'woocommerce_before_shop_loop_item_title', 'total_title_wrap', 20 );

function total_title_wrap(){
	echo '<div class="total-product-title-wrap">';
}

add_action( 'woocommerce_after_shop_loop_item', 'total_title_wrap_close', 4 );

function total_title_wrap_close(){
	echo '</div>';
}

/* Convert hexdec color string to rgb(a) string */
 
function total_hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

function totalColourBrightness($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE 
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}

function punte_css_strip_whitespace($css){
	  $replace = array(
	    "#/\*.*?\*/#s" => "",  // Strip C style comments.
	    "#\s\s+#"      => " ", // Strip excess whitespace.
	  );
	  $search = array_keys($replace);
	  $css = preg_replace($search, $replace, $css);

	  $replace = array(
	    ": "  => ":",
	    "; "  => ";",
	    " {"  => "{",
	    " }"  => "}",
	    ", "  => ",",
	    "{ "  => "{",
	    ";}"  => "}", // Strip optional semicolons.
	    ",\n" => ",", // Don't wrap multiple selectors.
	    "\n}" => "}", // Don't wrap closing braces.
	    "} "  => "}\n", // Put each rule on it's own line.
	  );
	  $search = array_keys($replace);
	  $css = str_replace($search, $replace, $css);

	  return trim($css);
}

if( !function_exists('total_home_section') ){
	function total_home_section(){
		$total_home_sections = apply_filters('total_home_sections',
		array(
			'slider',
			'about',
			'featured',
			'portfolio',
			'service',
			'team',
			'counter',
			'testimonial',
			'blog',
			'logo',
			'cta'
			)
		);

		return $total_home_sections;
	}
}