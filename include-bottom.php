<?php
/*
 * Include js scripts and execute
 */
?>

<!-- Javascript -->
<script type="text/javascript">
$(document).ready(function() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$('body').addClass('mobile');
	}

	$('#main-preloader').hide();

	new WOW().init();

	$('.owl-buttons .owl-next').html('<i class="fa fa-chevron-right"></i>');
	$('.owl-buttons .owl-prev').html('<i class="fa fa-chevron-left"></i>');

	/* Initialize code */
	$('.collapsible').collapsible({
		accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
	});
	
	$('.materialboxed').materialbox();
	
	$('.parallax').parallax();

	$('select').material_select();

	if ($(window).width() <= 960 ) {
		$('ul.product-categories').removeClass('collapsible');
		$('ul.product-categories').addClass('dropdown-content');
		$('ul.product-categories').attr('id','categories-dropdown');
	}

	$('.dropdown-button').dropdown({
		inDuration: 300,
		outDuration: 225,
		constrain_width: false, // Does not change width of dropdown to that of the activator
		hover: true, // Activate on hover
		gutter: 0, // Spacing from edge
		belowOrigin: true, // Displays dropdown below the button
		alignment: 'left' // Displays dropdown with edge aligned to the left of button
	});

	$('ul.tabs').tabs();
});


/*
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-47199330-5', 'auto');
ga('send', 'pageview');
*/
</script>
</body>
</html>