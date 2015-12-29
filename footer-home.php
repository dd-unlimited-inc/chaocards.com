<?php
/**
 *
 */
?>

<?php 
	$theme_options = dd_get_options('theme_options');
?>
<!--div class="parallax-container section" id="bottom-parallax">
	<div class="parallax"><img src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/10/IMG_2209-2.jpg" /></div>
</div-->
<footer class="page-footer transparent">
<div class="row">
	<div class="col s12 m8 offset-m2 l4 offset-l4 center-align">
		<a href="//facebook.com/UnfoldedMemories/"><i class="fa fa-3x fa-facebook"></i></a>
		<a href="#"><i class="fa fa-3x fa-youtube"></i></a>
		<!--a href="#" class="symbol" title="instagram"></a>
		<a href="#" class="symbol" title="pinterest"></a>
		<a href="#" class="symbol" title="etsy"></a-->
		<a href="mailto:sales@unfoldedmemories.com"><i class="fa fa-3x fa-envelope-o"></i></a>
	</div>
</div>
<div class="footer-copyright row">
	<div class="col s12 m8 offset-m2 l4 offset-l4 center-align">
		<span class="white-text"><?php echo $theme_options['option_copyright_info']; ?></span>
	</div>
</div>
</footer>

<?php get_template_part('include-bottom'); ?>
