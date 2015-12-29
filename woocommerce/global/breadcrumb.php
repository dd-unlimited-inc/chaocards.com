<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $breadcrumb ) {

	echo $wrap_before;
?>
	<div id="breadcrumb" class="breadcrumb">
<?php
	foreach ( $breadcrumb as $key => $crumb ) {

		echo $before;

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<span itemscope itemtype="http://data-vocabulary.org/breadcrumb">';
			echo '<a itemprop="url" href="' . esc_url( $crumb[1] ) . '">' . '<span itemprop="title">' . esc_html( $crumb[0] ) . '</span></a></span>';
		} else {
			echo esc_html( $crumb[0] );
		}

		echo $after;

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo $delimiter;
		}

	}
?>
	</div>
<?php
	echo $wrap_after;

}
