<?php
/**
 * The sidebar for Account Page.
 *
 * @package WordPress
 * @subpackage Creative Pop Theme
 * @since Creative Pop theme 0.1
 */
?>
<?php do_action( 'before_sidebar' ); ?>

<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
	<div id="woocommerce_account_sidebar" class="row">
		<div class="col s10 offset-s1">
			<!--h5 class="widget-title">Categories</h5>
			<span class="full-divider"></span-->
			<?php
				/*
				$args = array('hierarchical' => true);
				the_widget('WC_Widget_Product_Categories', $args);
				*/
			?>
		</div>
	</div>			
<?php endif; // end sidebar widget area ?>
