<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php get_header(); ?>
<main class="main-wrapper container">
	<div class="row">
		<div class="col s12">
				<div class="valign-wrapper">
				<h1 class="valign"><?php _e( 'Error 404 - Page not found!', 'woothemes' ); ?></h1>
				</div>
				<p class="valign"><?php _e( 'The page you trying to reach does not exist, or has been moved. Please use the menus or the search box to find what you are looking for.', 'woothemes' ); ?></p>
		</div><!-- /.post -->
											
	</div><!-- /#main -->
</main><!-- /#content -->
<?php get_footer(); ?>
