<?php
/**
 * Single Product title
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="row">
	<h4 itemprop="name" class="product_title entry-title center-align"><?php the_title(); ?><span class="heading-divider"></span></h4>
</div>
