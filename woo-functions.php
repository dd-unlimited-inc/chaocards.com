<?php
/**
 * Functions and definitions for Woocommerce
 */

remove_filter ('the_content', 'wpautop');

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail');
function creativepop_template_loop_product_thumbnail() {
	global $post, $product;
?>
	<?php if (has_post_thumbnail()) { ?>
		<?php
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$image_link = wp_get_attachment_url($post_thumbnail_id); 
			// Get secondary image
			$attachment_ids = $product->get_gallery_attachment_ids();
			$secondary_image_link = wp_get_attachment_url($attachment_ids[0]);
		//<img class="activator responsive-img" src="<?php echo $image_link; " />
	} else { 
		//<img class="activator responsive-img" src="http://placehold.it/350x150" />
		$image_link = 'http://placehold.it/350x150';
	} ?>
		<a href="<?php the_permalink(); ?>" rel="<?php echo $product->id; ?>" class="card-image front-img waves-effect waves-block waves-light" style="height: 300px; background-image:url('<?php echo $image_link; ?>'); background-position: center; background-size: cover;">
		</a>

	<?php if ($secondary_image_link) { ?>
		<a href="<?php the_permalink(); ?>" rel="<?php echo $product->id; ?>" class="card-image back-img waves-effect waves-block waves-light" style="height: 300px; background-image:url('<?php echo $secondary_image_link; ?>'); background-position: center; background-size: cover; display:none; ">
		</a>
	<?php
	}
}
add_action('woocommerce_before_shop_loop_item_title', 'creativepop_template_loop_product_thumbnail', 10);

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
function creativepop_template_loop_product_title() {
	global $post;
?>
	<div class="card-content center-align pink-text">
		<a href="<?php the_permalink(); ?>">
			<span class="card-title activator teal-text text-lighten-2 center-align truncate" style="font-weight: 500;"><?php the_title() ?><!--i class="material-icons right">more_vert</i--></span>
		</a>
		<p><?php wc_get_template('loop/price.php'); ?></p>
		<p><?php wc_get_template('loop/rating.php'); ?></p>
	</div>
	<!--div class="card-reveal">
		<span class="card-title activator teal-text text-lighten-2 truncate" style="font-weight: 500;"><?php the_title() ?><i class="material-icons right">close</i></span>
		<?php //echo apply_filters('woocommerce_short_description', $post->post_excerpt); ?>
		<a class="btn" href="<?php the_permalink(); ?>">More Detail</a>
	</div-->
<?php
}
add_action('woocommerce_shop_loop_item_title', 'creativepop_template_loop_product_title', 10);

remove_action('woocommerce_before_subcategory_title','woocommerce_subcategory_thumbnail', 10);
function creativepop_subcategory_thumbnail( $category ) {
	$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true);

	if( $thumbnail_id ) {
		$image = wp_get_attachment_url( $thumbnail_id ); 
		/*
		$image = wp_get_attachment_image_src( $thumbnail_id );
		$image = $image[0];
		 */
	}
	else {
		$image = wc_placeholder_img_src();
	}

	if( $image ) {
		$image = str_replace( ' ', '%20', $image);
		echo '<img class="responsive-img" src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '" />';
	}
}
add_action('woocommerce_before_subcategory_title', 'creativepop_subcategory_thumbnail', 10);


/* Products' prices and ratings are put under shop_loop_product_title.
 * Removing them from after_shop_loop_item_title
 */
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price');
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating');
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart');

/** Custom Breadcrumb **/
function creativepop_breadcrumbs() {
	return array(
		'delimiter' => ' &#47; ',
		'wrap_before' => '<div class="section">',
		'wrap_after'=>'</div>',
		'before' => '',
		'after' => '',
		'home' => _x('Home', 'breadcrumb', 'woocommerce')
	);
}
add_filter('woocommerce_breadcrumb_defaults', 'creativepop_breadcrumbs');
/** Remove breadcrumb and add it to before_shop_loop **/
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_shop_loop', 'woocommerce_breadcrumb', 10);
add_action('woocommerce_before_single_product', 'woocommerce_breadcrumb', 5);

/** Move product title from product summary to before_single_product **/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_product_title', 'woocommerce_template_single_title', 5);

/** Change priority of add_to_cart section **/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 45);

/** Add product price below excerpt **/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);

/** **/
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_show_product_images', 20);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);
add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_meta', 20);

/*
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30);
*/

function creativepop_before_add_to_cart_form() {
	echo '<div class="row">';
}
add_action('woocommerce_before_add_to_cart_form', 'creativepop_before_add_to_cart_form', 10);

function creativepop_after_add_to_cart_form() {
	echo '</div>';
}
add_action('woocommerce_after_add_to_cart_form', 'creativepop_after_add_to_cart_form', 10);

/*remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);*/



function show_product_thumbnails_carousel() {
	wc_get_template('single-product/product_thumbnails_carousel.php');
}
add_action('product_thumbnails_carousel', 'show_product_thumbnails_carousel', 10);

add_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


function content_product_cat_search_form() {
?>
	<div class="col s12 m8 l6 xl4 offset-m2 offset-l6 offset-xl8">
<?php
	wc_get_template('product-searchform.php');
?>
	</div>
<?php
}

add_action('woocommerce_before_shop_loop', 'content_product_cat_search_form', 20);
