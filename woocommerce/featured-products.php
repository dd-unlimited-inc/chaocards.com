<?php
global $woocommerce_loop;

$args = array(
	'post_type' => 'product',
	'meta_key' => '_featured',
	'meta_value' => 'yes',
	'posts_per_page' => 6
);
$products = new WP_Query($args);
		
if($products ->have_posts()): 
?>
	<div class="row">
		<h4 class="title center-align animated pulse">Trending Products<span class="heading-divider"></span></h4>
	</div>
	<div class="row" id="featured-products">
		<div id="owl-demo" class="owl-carousel owl-theme">
<?php
			while ( $products->have_posts() ) : $products->the_post();
				global $post;
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$image_link = wp_get_attachment_url($post_thumbnail_id); 
?>
				<div class="item"><a href="<?php the_permalink(); ?>"><img src="<?php echo $image_link; ?>" class="responsive-img" /></a></div>
<?php
			endwhile; // end of the loop. 
?>
		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		var owl = $('#owl-demo');

 		owl.owlCarousel({
      			items : 4, //10 items above 1000px browser width
      			itemsDesktopSmall : [900,3], // betweem 900px and 601px
      			itemsTablet: [600,2], //2 items between 600 and 0
      			itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
			lazyLoad: true,
			navigation: true,
			pagination: false
 		});	
	});
	</script>
<?php 

endif;

woocommerce_reset_loop();
wp_reset_query();

?>
