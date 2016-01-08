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

<!-- This is a temporary fix for an IE bug, which doesn't output end wrapper for single product main content (global/wrapper-end.php) -->
</div>
</main>
<!-- End of bug fix -->
<footer class="page-footer grey darken-4">
<div class="container" style="padding: 30px; 0">
	<div class="row center" id="social-networks">
		<a href="//facebook.com/ChaoCards/"><i class="fa fa-2x fa-facebook-official"></i></a>
		<a href="//instagram.com/chaocards" title="instagram"><i class="fa fa-2x fa-instagram"></i></a>
		<a href="//www.youtube.com/channel/UC6Ah5KcTKzit4UIWwrlmu3w"><i class="fa fa-2x fa-youtube"></i></a>
		<a href="mailto:sales@chaocards.com"><i class="fa fa-2x fa-envelope"></i></a>
	</div>
	<div class="row center" id="made-in">
		<h5 class="white-text">Handcrafted with <img src="/wp-content/themes/creativepop/images/heart.png" height="15"> in Vietnam</h5>
	</div>
</div>
<div class="footer-copyright pink accent-2" style="height: inherit; line-height: inherit;">
	<div class="container">
		<p class="black-text center"><?php echo $theme_options['option_copyright_info']; ?></p>
		<div class="row center">
			<a href="/terms-and-conditions">Terms &amp; Conditions</a>
		</div>
	</div>
</div>
</footer>

<?php get_template_part('include-bottom'); ?>
