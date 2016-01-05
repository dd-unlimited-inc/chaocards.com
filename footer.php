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
<div class="container">
	<div class="row" style="">
		<div class="col s12 m6 l4 xl3" id="footer-logo">
			<img class="responsive-img" src="<?php echo $theme_options['option_logo_img']; ?>">
			<div class="row" style="margin-bottom: 0">
				<img class="responsive-img" id="asi-member-logo" style="height:85px" src="/wp-content/uploads/sites/4/2015/11/48102-1.png">
			</div>
		</div>
		<div class="col s12 m4 l5 xl4 right" id="subscribe">
			<h5 style="color: #ca3c96;">Love our cards?</h5>
			<p class="white-text">Be the first one to see our new designs!</p>
			<div class="row" id="newsletter-signup">
				<div id="mc_embed_signup">
					<form action="//unfoldedmemories.us12.list-manage.com/subscribe/post?u=7fbb2b6d0341e0c6f9166eb49&amp;id=add5587531" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate col s12" target="_blank" novalidate="">
					<div class="row">
    						<div id="mc_embed_signup_scroll" class="input-field col s12 m9">
							<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" required="">
							<label for="mce-EMAIL">Your email address</label>
    					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    							<div style="position: absolute; left: -5000px;"><input type="text" name="b_7fbb2b6d0341e0c6f9166eb49_add5587531" tabindex="-1" value=""></div>
						</div>
						<div class="input-field col s12 m3">
							<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn">
						</div>
					</div>
					</form>
				</div>
				<!--End mc_embed_signup-->
			</div>
			<div class="row" id="social-networks">
				<a href="//facebook.com/ChaoCards/"><i class="fa fa-2x fa-facebook-official"></i></a>
				<a href="//instagram.com/chaocards" title="instagram"><i class="fa fa-2x fa-instagram"></i></a>
				<a href="//www.youtube.com/channel/UC6Ah5KcTKzit4UIWwrlmu3w"><i class="fa fa-2x fa-youtube"></i></a>
				<a href="mailto:sales@chaocards.com"><i class="fa fa-2x fa-envelope"></i></a>
			</div>
		</div>
	</div>
</div>
<div class="footer-copyright grey darken-4">
	<div class="container">
		<div class="row">
			<div class="col s12 m3 l4 right">
				<a class="right" href="/terms-and-conditions">Terms &amp; Conditions</a>
			</div>
			<div class="col s12 m9 l8 left">
				<span class="white-text"><?php echo $theme_options['option_copyright_info']; ?></span>
			</div>
		</div>
	</div>
</div>
</footer>

<?php get_template_part('include-bottom'); ?>
