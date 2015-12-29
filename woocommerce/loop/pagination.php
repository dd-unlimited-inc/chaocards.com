<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>

<div class="row">
<div class="col s12 m6 offset-m4 l4 offset-l5">
<ul class="woocommerce-pagination pagination">
	<?php
		$page_links= paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'       => '',
			'add_args'     => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '<i class="material-icons">chevron_left</i>',
			'next_text'    => '<i class="material-icons">chevron_right</i>',
			'type'         => 'array',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) );
	?>
	<?php
		foreach ($page_links as $page) {
	?>
			<li class="waves-effect"><?php echo $page; ?></li>	
	<?php } ?>
</ul>
</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$('span.current').parent().addClass('active');
});
</script>