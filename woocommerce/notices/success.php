<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>

<?php foreach ( $messages as $message ) : ?>
	<!--div class="woocommerce-message card-panel"><<?php echo wp_kses_post( $message ); ?>/div-->
	<script type="text/javascript">	
		Materialize.toast(<?php echo wp_kses_post( $message ); ?>,4000);
	</script>
<?php endforeach; ?>

