<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Fullwidth with Sidebar
 * Full-width template, no container with left sidebar
 * 
 * @package Creative Pop Theme
 * @subpackage Template
 * @since Creative Pop Theme 0.1
 */
?>

<?php get_header(); ?>
<main class="section">
	<?php //woo_main_before(); ?>
	
	<div class="row">
		<div class="col s2">
			<!-- Sidebar -->
			<?php get_sidebar('account'); ?>
		</div>
		<div class="col s10">
			<!-- Main content -->
			<?php 
				if(have_posts()) { 
					$count = 0;
					while(have_posts()) {
						the_post();
						$count++;
			?>
					<article class="section">
						<h1 class="h2"><?php the_title(); ?></h1>
						<section class="content">
							<?php the_content(); ?>
							
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
						</section>
					</article>
			<?php
					}
				}
				else {
			?>
				<article>
					<p><?php _e('Sorry, no posts match your specific request', 'woocommerce'); ?></p>
				</article>
			<?php 
			} 
			?>
		</div>
	</div>
	
	<?php //woo_main_after(); ?>
</main>
<?php get_footer(); ?>
