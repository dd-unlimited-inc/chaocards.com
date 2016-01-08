<?php
/**
 * Index Page
 * @package Creative Pop Theme
 * @since Creative Pop Theme 0.1
 */

get_header('home');
?>
<main id="snow" class="white">
<?php
	/** Temporary pseudo code **
	if ($welcome == 'slider') {
		// load some 3rd party slider if welcome section is slider
	}
	else if ($welcome == 'video') {
		// load video if welcome section is video
	}
	else {
		// load image by default (default image if user's is not defined)
	}
	*/
?>
	<!-- Video -->
	<section id="welcome" class="animated fadeIn" data-wow-duration="2.5s" style="margin-top: -100px; max-height: 100%;">
		<!--img class="full-height" id="wecome-img" src="/wp-content/uploads/sites/4/2015/12/welcome-img1.jpg"/-->
		<div id="welcome-pattern"></div>
		<video class="full-height" id="welcome-video" preload="auto" autoplay loop>
			<source src="/wp-content/uploads/sites/4/2015/12/home-video.mp4" type="video/mp4" />
			<source src="/wp-content/uploads/sites/4/2015/12/home-video.webm" type="video/webm" />
			Your browser does not support <code>video</code> element.
		</video>
		<!--div class="caption center-align">
			<h4 class="grey-text animated fadeInLeft">Celebrate Your Memories</h4>
			<h4 class="grey-text animated fadeInLeft">One Pop-up at a Time</h4>
		</div-->

		<!--div class="slider" id="welcome-slider"-->
			<!--div class="owl-carousel owl-theme" id="o-slider">
				<div class="item">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/11/london-bridge-2-resized.jpg">
				</div>
				<div class="item">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/11/happy-birthday-resized.jpg">

				</div>
				<div class="item">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/11/xmas-1-resized.jpg">

				</div>
				<div class="item">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/11/vietnam-resized.jpg">

				</div>
			</div-->
	
			<!--ul class="slides" id="materialize-slider"-->
				<!--li>
					<video class="full-width-video" style="" autoplay loop>
						<source src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/11/horses-coming.mp4" type="video/mp4" />
						Your browser does not support <code>video</code> element.
					</video>
				</li-->
				<!--li>
					<img class="responsive-img" src="/wp-content/uploads/sites/4/2015/11/london-bridge-2-resized.jpg">
				</li>
				<li>
					<img class="responsive-img" src="/wp-content/uploads/sites/4/2015/11/happy-birthday-resized.jpg">

				</li>
				<li>
					<img class="responsive-img" src="/wp-content/uploads/sites/4/2015/11/xmas-1-resized.jpg">

				</li>
				<li>
					<img class="responsive-img" src="/wp-content/uploads/sites/4/2015/11/vietnam-resized.jpg">

				</li>
			</ul>
			<script type="text/javascript">
			$(document).ready(function() {
				
				$('#welcome-slider').slider({
					full_width: true,
					height: 800
				});
					
				$('#o-slider').owlCarousel({
					autoPlay: 5000,
					navigation: true,
					pagination: false,
					addClassActive: true,
					lazyLoad: true,
					singleItem: true
				});
			});
			</script>
		</div-->
	</section>
	<script type="text/javascript">
		$(document).ready(function () {
			var wWidth = $(window).width();
			var wHeight = $(window).height();
			$('#welcome').css({"height": wHeight, "overflow": "hidden"});
			
			var mLeft = (wWidth - 1920) / 2;
		       	$('#welcome-video').css('margin-left', mLeft);	
		});
		$(window).resize(function() {
			var wWidth = $(window).width();
			var wHeight = $(window).height();
			
			$('#welcome').css("height", wHeight);

			var mLeft = (wWidth - 1920) / 2;
		       	$('#welcome-video').css('margin-left', mLeft);	
		});
	</script>

	<!-- Call to action message -->
	<section id="call-to-action" class="section wow fadeIn">
		<div class="card-panel pink accent-2 center-align"> <span class="white-text" style="font-size: 20px">Check out our awesome cards <a href="/cards" class="btn waves-effect waves-light">Shop Now</a></span> </div>
	</section> 

	<section id="introduction-video" class="section wow fadeIn">
		<div class="container">
			<div class="row">
				<h4 class="title center-align animated pulse">Who We Are<span class="heading-divider"></span></h4>
				<div class="row">
					<div class="col s12 m6 offset-m3">
						<p class="center-align">Allow us to introduce you to Chao, our 3D pop-up cards! Check out this video for a brief overview of our story, process, and products. Let us help you bring great value to your company's upcoming programs.</p>
					</div>
				</div>
				<div class="row">
					<div class="col s12 m8 offset-m2">
					<div class="video-container">
						<iframe src="https://www.youtube.com/embed/UQLiF5wtWGg" frameborder="0" allowfullscreen></iframe>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Featured Product --> 
	<section id="trending" class="section wow fadeIn"> 
		<?php	wc_get_template_part('woocommerce/featured-products'); ?>	
	</section>
	<section id="customization" class="section">
		<div class="row wow fadeIn">
			<h4 class="title center-align animated pulse">Customization<span class="heading-divider"></span></h4>
			<div class="col s12 m6 offset-m3">
				<p class="center-align">We pride ourselves on working with our clients to provide customized pop-up art. Our customization department offers unique opportunities for you to work with our designers and paper engineers to create specialized pieces for you, your company or your customers.</p>
				<p class="center-align"><a class="waves-effect waves-red btn-large" href="/contact">Customize Your Card<i class="fa fa-3x fa-cloud left"></i></a></p>
			</div>
		</div>
		<div class="row">
		<div class="col s12 m8 offset-m2">
			<div class="col s12 m12 l4 wow fadeInLeft" data-wow-duration="1.5s">
				<div class="center promo promo-example">
					<i class="fa fa-2x fa-gift"></i>
					<h5 class="promo-caption">Birthdays</h5>
					<p class="light center">Why not celebrate another year of vitality and liveliness with a card that comes to life? Let's start the year off with some pop-up excitement from Unfolded Memories.</p>
              			</div>
            		</div>
			<div class="col s12 m12 l4 wow fadeInUp" data-wow-duration="1.5s">
				<div class="center promo promo-example">
					<i class="fa fa-2x fa-heart"></i>
					<h5 class="promo-caption">Love</h5>
					<p class="light center">When you want to express your love to that special someone, don't think twice. Speak your heart out and let us help you express your feelings one pop-up at a time.</p>
				</div>
			</div>
			<div class="col s12 m12 l4 wow fadeInRight" data-wow-duration="1.5s">
				<div class="center promo promo-example">
					<i class="fa fa-2x fa-tree"></i>
					<h5 class="promo-caption">Holidays</h5>
					<p class="light center">Delight your friends & family with holiday spirit that POPS!</p>
				</div>
			</div>
		</div>
		</div>
	</section>
	<!--section id="subscribe-2" class="section grey lighten-3">
		<div class="container" style="padding: 80px 0;">
			<h4 class="center bold">Love Our Cards?</h4>
			<p class="center">Join our mailing list and be the first one to see our new designs.</p>
			<div class="container" id="newsletter-signup">
				<div class="container" id="mc_embed_signup">
					<form action="//unfoldedmemories.us12.list-manage.com/subscribe/post?u=7fbb2b6d0341e0c6f9166eb49&amp;id=add5587531" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate col s12" target="_blank" novalidate>
					<div class="row">
    						<div id="mc_embed_signup_scroll" class="input-field col s12 m6 l8">
							<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" required>
							<label for="mce-EMAIL">Your email address</label-->
    					<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    							<!--div style="position: absolute; left: -5000px;"><input type="text" name="b_7fbb2b6d0341e0c6f9166eb49_add5587531" tabindex="-1" value="" /></div>
						</div>
						<div class="input-field col s12 m6 l4">
							<button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn z-depth-0" style="margin-top: 10px" />Sign Me Up!</button>
						</div>
					</div>
					</form>
				</div-->
				<!--End mc_embed_signup-->
			<!--/div>
		</div>
	</section-->
	<!--section id="features" class="section">
		<div class="row">
		<div class="col s12 m12 l8 offset-l2">
			<div class="row">
				<div class="col s12 m6 right">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/11/IMG_0827-small-2.jpg" />
				</div>
				<div class="col s12 m6 left">
					<h4 class="black-text">Laser Cut</h4>
					<br/>
					<p>Lorem Ipsum</p>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m6">
				</div>
				<div class="col s12 m6">
				</div>
			</div>
			<div class="row">
				<div class="col s12 m6">
				</div>
				<div class="col s12 m6">
				</div>
			</div>
		</div>
		</div>
	</section-->
	
	<!--section id="show-case" class="section">
		<div class="row"> 
			<h4 class="title center-align">Cards for Any Occasion<span class="heading-divider"></span></h4>
		</div>

		<div class="row">
		<div class="col s12 m12 l8 offset-l2">
		
		<div class="row">
			<div class="col s12 m6 wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1.5s">
				<a href="/product-category/special-occasions/happy-birthday/" class="darken">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/11/img_0679-edited.jpg" title="Birthday" alt="Birthday"/>
					<span class="text-content">
						<span class="text white-text">Birthday</span>
					</span>
				</a>
			</div>
			<div class="col s12 m6 wow fadeIn" data-wow-delay="1s" data-wow-duration="1.5s">
				<a href="/product-category/special-occasions/love/" class="darken">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/10/img_1226_2.jpg" title="Love" alt="Love"/>
					<span class="text-content">
						<span class="white-text">Love</span>
					</span>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6 wow fadeIn" data-wow-delay="1.5s" data-wow-duration="1.5s">
				<a href="http://unfoldedmemories.com/product-category/holidays/christmas/" class="darken">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/10/img_0664-edited.jpg" title="Holidays" alt="Holidays"/>
					<span class="text-content">
						<span class=" white-text">Holidays</span>
					</span>
				</a>
			</div>
			<div class="col s12 m6 wow fadeIn" data-wow-delay="2s" data-wow-duration="1.5s">
				<a href="http://unfoldedmemories.com/product-category/special-occasions/new-born/" class="darken">
					<img class="responsive-img" src="http://unfoldedmemories.com/wp-content/uploads/sites/4/2015/11/img_2186-2.jpg" title="Newborn" alt="Newborn"/>
					<span class="text-content">
						<span class="white-text">Newborn</span>
					</span>
				</a>
			</div>
		</div>

		</div>
		</div>

		<div class="row">
			<a href="/cards">
				<h5 class="title center-align grey-text"><em>And Many More...<i class="fa fa-arrow-right"></i></em></h4>
			</a>
		</div>
	</section-->
	<!--section id="customization" class="section grey lighten-3">
		<div class="row wow fadeInUp">
			<h4 class="title center-align animated pulse">Customize Your Own<span class="heading-divider"></span></h4>
			<div class="col s12 m6 offset-m3">
				<p class="center-align">We pride ourselves on working with our clients to provide customized pop-up art. Our customization department offers unique opportunities for you to work with our designers and paper engineers to create specialized pieces for you, your company or your customers.</p>
				<p class="center-align"><a class="waves-effect waves-red btn-large" href="/contact">Tell Us Your Idea<i class="fa fa-3x fa-cloud left"></i></a></p>
			</div>
		</div>
	</section-->
	<section id="subscribe" class="section grey lighten-3" style="padding: 80px 0;">
		<div class="container">
			<h4 class="bold center">Love Our Cards?</h4>
			<p class="center">Join our mailing list and be the first one to see our new designs!</p>
			<div class="row" id="newsletter-signup">
				<div id="mc_embed_signup">
					<form action="//unfoldedmemories.us12.list-manage.com/subscribe/post?u=7fbb2b6d0341e0c6f9166eb49&amp;id=add5587531" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate col s12 m10 l8 xl6 offset-m1 offset-l2 offset-xl3" target="_blank" novalidate="">
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
		</div>
	</section>
</main>

<?php get_footer(''); ?>
