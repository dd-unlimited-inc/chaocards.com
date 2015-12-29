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
				$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
				//$image_title = get_the_title();
				$image_link = wp_get_attachment_url(get_post_thumbnail_id());
					
				$attachment_count = count( $product->get_gallery_attachment_ids() );

				if ( $attachment_count > 0 ) {
					$gallery = '[product-gallery]';
				} else {
					$gallery = '';
				}
			?>
				<div class="item"><img itemprop="image" class="full-width-img" data-rel="prettyPhoto<?php echo $gallery; ?>" src="<?php echo $image_link; ?>" title="<?php echo $image_title; ?>" /></div>
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

					$image_title 	= esc_attr( get_the_title( $attachment_id ) );
					$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );
				?>
					<div class="item"><img class="responsive-img" data-rel="prettyPhoto<?php echo $gallery; ?>" src="<?php echo $image_link; ?>" title="<?php echo $image_title; ?>" /></div>
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
