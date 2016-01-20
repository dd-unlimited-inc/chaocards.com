<?php
/**
 * Creative Pop Single Product Thumbnails
 *
 * @author 	tdan
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;
?>
	<div class="owl-carousel own-carousel-theme" id="img-carousel">
		<?php
			if ( has_post_thumbnail() ) {
				$image_id = get_post_thumbnail_id();
				//$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				$image_link = wp_get_attachment_url($image_id);
					
				$attachment_count = count( $product->get_gallery_attachment_ids() );

				if ( $attachment_count > 0 ) {
					$gallery = '[product-gallery]';
				} else {
					$gallery = '';
				}
			?>
				<div class="item"><img itemprop="image" class="full-width-img" data-rel="prettyPhoto<?php echo $gallery; ?>" src="<?php echo $image_link; ?>" alt="<?php echo $image_alt; ?>"/></div>
			<?php
			} else {

				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

			}
		?>

		<?php 
			//do_action( 'single_product_thumbnails' );
			$attachment_ids = $product->get_gallery_attachment_ids();
			if ($attachment_ids) {
				$loop = 0;
				foreach ($attachment_ids as $attachment_id) {
					
					$classes = array( 'zoom' );

					if ( $loop == 0 || $loop % $columns == 0 )
						$classes[] = 'first';

					if ( ( $loop + 1 ) % $columns == 0 )
						$classes[] = 'last';

					$image_link = wp_get_attachment_url( $attachment_id );

					if ( ! $image_link )
						continue;

					$image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
				?>
					<div class="item"><img class="responsive-img" data-rel="prettyPhoto<?php echo $gallery; ?>" src="<?php echo $image_link; ?>" atl="<?php echo $image_alt; ?>" /></div>
				<?php
					$loop++;
				}
			}

		?>
	</div>
<script type="text/javascript">
$(document).ready(function() {
	$("#img-carousel").owlCarousel({
		singleItem: true,
		autoHeight: true,
		lazyLoad: true,
		navigation: true,
		pagination: false
	});
});
</script>
