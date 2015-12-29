<?php
/**
 * The Shop Sidebar containing Widget areas for Shop Page.
 *
 * @package WordPress
 * @subpackage Creative Pop Theme
 * @since Creative Pop theme 0.1
 */
?>
<?php do_action( 'before_sidebar' ); ?>
<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
	<div id="woocommerce_product_search" class="widget woocommerce widget_product_search section">
		<div class="col s12 m10 offset-m1 search-wrapper">
			<!--h5 class="widget-title">Search</h5-->
			<?php get_product_search_form(); ?>
		</div>
	</div>
	<div id="woocommerce_product_categories" class="widget woocommerce widget_product_categories row">
		<div class="col s12 m10 offset-m1">
			<!--h5 class="widget-title">Categories</h5>
			<span class="full-divider"></span-->
			<div class="center">
				<a href="#" data-activates="categories-dropdown" class="dropdown-button btn-flat hide-on-large-only" style="border: 1px solid #212121;">Select a category</a>
			</div>
			<?php 
				$args = array('hierarchical' => true);
				the_widget('WC_Widget_Product_Categories', $args); 
			?>
		</div>
	</div>			
	<script type="text/javascript">
		$('ul.product-categories').addClass('collapsible z-depth-0');
		$('ul.product-categories').prepend('<li class="cat-item cat-item-1"><a href="/cards">All Cards</a></li>');
	</script>
<?php endif; // end sidebar widget area ?>
