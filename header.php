<?php
/**
 * Header for D&D Popup Cards Theme
 *
 * @package WordPress
 * @subpackage Creative Pop Theme
 * @since Creative Pop Theme 0.1
 */
?>
<?php 
	$theme_options = dd_get_options('theme_options');
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class=""><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

	<!-- Pinterest verification -->
	<meta name="p:domain_verify" content="33618691d149d05c5f867ef94b68f467"/>
	<!-- Google verification -->
	<meta name="google-site-verification" content="bUA9d6WfLnY5z37LW3g6t69QBzuJGHKAWCiJttr3M4g" />
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<!--meta name="description" content="<?php echo $theme_options['option_description']; ?>">
	<meta name="keywords" content="<?php echo $theme_options['option_keywords']; ?>"-->

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url($theme_options['option_favicon']); ?>" />
	<link ref="apple-touch-icon" href="<?php echo esc_url($theme_options['option_favicon']); ?>" />
	
	<?php wp_head(); ?>
</head>
<?php $extra_body_class = 'grey lighten-3'; ?>
<body <?php body_class($extra_body_class); ?>>
	<!--[if lt IE 8]> 
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p> 
	<![endif]-->
	<?php $is_sticky = (isset($theme_options['option_sticky_header'])) && ($theme_options['option_sticky_header']); ?>
	<div class="header-wrapper <?php if($is_sticky) { echo "navbar-fixed"; } ?>">
		<nav class="white z-depth-0 <?php // if(is_home()) { echo 'z-depth-0'; } else { echo 'z-depth-1'; } ?>">
			<div class="nav-wrapper">
				<!-- Logo -->
				<a href="/" class="brand-logo <?php echo $theme_options['option_logo_position']; ?>"><img src="/wp-content/uploads/sites/4/2015/11/New-Outlined-Chao-Logo-Black.png" /></a>
				<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
				<!-- Desktop Menu -->
				<?php
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'navbar ' . $theme_options['option_menu_position'] . ' hide-on-med-and-down',
						'menu_id' => 'nav-full'
					)); 
				?>
				<!-- Mobile Menu -->
				<?php
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'container' => false,
						'menu_class' => 'side-nav',
						'menu_id' => 'nav-mobile'
					)); 
				?>
				<!--a href="/my-account" class="right btn waves-effect waves-highlight">My Dashboard</a-->
				<script type="text/javascript">
					$(".button-collapse").sideNav();
					
					$(window).scroll(function () {
						if ($(window).scrollTop() > 0) {
							$('.navbar-fixed nav').removeClass('z-depth-0');			
							$('.navbar-fixed nav').addClass('z-depth-1');			
						}
						else {
							$('.navbar-fixed nav').removeClass('z-depth-1');			
							$('.navbar-fixed nav').addClass('z-depth-0');			
						}
					});
					/*
					$('#menu-item-880 a').addClass('btn waves-effect waves-highlight');
					$('#menu-item-880 a').css('color','#fff');
					$('#menu-item-880').hover(function() {
						$(this).css('border-bottom', 'none');
						$(this).css('background-color','rgba(0,0,0,0)');
					});
					*/
					<?php //if(!is_user_logged_in()): ?>
						$('#menu-item-880 a').text('Login/Register');
						$('.side-nav #menu-item-880 a').text('Login/Register');
					<?php //endif; ?>
				</script>
			</div>
		</nav>
	</div>
