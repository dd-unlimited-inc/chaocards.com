<form role="search" method="get" class="woocommerce-product-search col s12" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<div class="input-field">
	<!--label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label-->
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" style="background-color:#fff; border: none;" />
	<button type="submit" value="<?php //echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" style="position:absolute; top: 10px; border: none; background-color: transparent;" />
		<i class="fa fa-search"></i>
	</button>
	</div>
	<input type="hidden" name="post_type" value="product" />
</form>
