<?php
/** Process Contact Form **/
if( isset($_POST['submitted']) ) {
	$name = trim($_POST['contact_name']);
	$email = trim($_POST['contact_email']);

	/* Clean up message */
	if( function_exists('stripslashes') ) {
		$msg = stripslashes(trim($_POST['message']));
	}
	else {
		$msg = trim($_POST['messageOS']);
	}

	$emailTo = get_option('tz_email');
	if (!isset($emailTo) || ($emailTo == '') ){
		$emailTo = get_option('admin_email');
	}

	$subject = '[Message From] ' . $name;
	$body = "Name: $name \n\nEmail: $email \n\nMessage: $msg";
	$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

	$emailSent = wp_mail($emailTo, $subject, $body, $headers);
}
?>

	<div class="row">
		<div class="col s12 m4 animated fadeInLeft">
			<h5 class="title">Our Office</h5>
			<span class="full-divider"></span>
			<h5>Chào - Unfolded Memories</h5>
			<span>524 Mid Florida Drive, Suite 202</span>
			<br/>
			<span>Orlando, FL 32822</span>
			<br/>
			<span>Email: <a href="mailto:sales@unfoldedmemories.com">sales@unfoldedmemories.com</a></span>
			<br/>
			<span>Tel: 407.704.8886 ~ 8887</span>
			<p>
			<a href="//facebook.com/UnfoldedMemories/"><i class="fa fa-1x-half fa-facebook grey-text" style="padding-left:0"></i></a>
			<a href="//instagram.com/unfoldedmemories" title="instagram"><i class="fa fa-1x-half fa-instagram grey-text"></i></a>
			<a href="//www.youtube.com/channel/UC6Ah5KcTKzit4UIWwrlmu3w"><i class="fa fa-1x-half fa-youtube grey-text"></i></a>
			</p>
			<p style="font-size: 0.9em;"><em>* Chào is a subsidiary of <a href="//ddunlimitedinc.com">D&D Unlimited Inc</a></em></p>
		</div>
		<div class="col s12 m6 right animated fadeInRight">
			<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJXfAvX25954gRrgTtBQ6_y2s&key=AIzaSyCoY1-P5DFd3QqIHbcXeKuYDslX1A3fl18" allowfullscreen></iframe>
		</div>
	</div>
	<br/>
	<div class="row animated fadeInUpBig">
		<div class="col s12">
			<h5 class="title">Send Us A Message</h5>
			<span class="col s12 m4 full-divider"></span>
			<br />
			<p class="grey-text" style="font-size: 16px; line-height: 1.6;">We would love to hear from you and answer any questions you may have!</p>
		</div>
	</div>
	<?php 
		if ( $emailSent ):
			echo '<script type="text/javascript">Materialize.toast("Thank you! Your message is on its way. We\'ll reach out to you shortly.", 4000);</script>';
		endif;
	?>
	<div class="row">
	<form id="contactForm" class="col s12 m12" method="post">
		<div class="row">
			<div class="input-field col s12 m6">
			<input name="contact_name" type="text" value="<?php if(isset($_POST['contact_name'])) echo $_POST['contact_name']; ?>" class="validate" required>
				<label for="contact_name">Name</label>
        		</div>
			<div class="input-field col s12 m6">
				<input id="email" name="contact_email" value="<?php if(isset($_POST['contact_name'])) echo $_POST['contact_email']; ?>" type="email" class="validate" required>
				<label for="contact_email" data-error="Please enter a valid email address">Email</label>
			</div>
		</div>

		<div class="row">
			<div class="input-field col s12">
				<textarea id="message" name="message" class="materialize-textarea" required></textarea>
				<label for"message">Message</label>
			</div>
		</div>
		
		<div class="row">
			<!--div class="g-recaptcha col s12 m6" data-sitekey="6LcKUhATAAAAABWg6QBK9joVw98bwweuHeW5sF3e"></div-->
			<div class="col s12 m3 right">
				<button style="width: 100%;" type="submit" name="send-btn" id="send-btn" class="btn waves-effect waves-light">Send Message</button>
			</div>
		</div>
		<input type="hidden" name="submitted" id="submitted" value="true" />	
	</form>
	</div>
