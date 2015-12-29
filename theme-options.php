<?php
/**
 * Admin Theme Settings Page
 * @package Creative Pop Theme
 * @since Creative Pop Theme 0.1
 */

function theme_options_enqueue_scripts() {
    wp_register_script( 'file-upload', get_template_directory_uri() .'/js/admin/file-upload.js', array('jquery','media-upload','thickbox') );

    if ( 'appearance_page_theme_options' == get_current_screen() -> id ) {
        wp_enqueue_script('jquery');

        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');

        wp_enqueue_script('media-upload');
        wp_enqueue_script('file-upload');
    }
}
add_action('admin_enqueue_scripts', 'theme_options_enqueue_scripts');
/**
 * ADMIN THEME OPTIONS MENU
 */
function add_theme_options_menu() {
	add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'creativepop_theme_options', 'admin_theme_options');
}

add_action('admin_menu', 'add_theme_options_menu');

function admin_theme_options() {
	// Check that the user is allowed to update options
	if (!current_user_can('edit_theme_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
?>
	<div class="wrap">
		<div id="icon-themes" class="icon32" id="icon-tools"></div>
		<h2>Theme Options</h2>
		<p>Take control of your theme, by overriding the default settings with your own specific preferences.</p>
		<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
        	<?php settings_errors(); ?>

		<!-- Form to render options -->
		<form id="form-theme-options" method="post" action="options.php" enctype="multipart/form-data">
			<?php
				settings_fields('theme_options');
				do_settings_sections('creativepop_theme_options');
			?>
			<!--div class="submit">
				<input id="submit_options_form" name="theme_options[submit]" type="submit" class="button-primary"
						value="<?php esc_attr_e('Save Settings', 'theme_options')?>" />
				<input type="submit" class="button-secondary" name="theme_options[reset]"
						value="<?php esc_attr_e('Reset to Defaults', 'theme_options') ?>" />
			</div-->
			<?php submit_button(__('Save Changes', 'creativepop')); ?>
		</form>
	</div>
<?php
}

/**
 * Settings Registration
 */
function add_options_fields() {
	register_setting('theme_options', 'theme_options', '');

	/* Options Sections */
	add_settings_section('general', __('General', 'creativepop'), '__return_false', 'creativepop_theme_options');
	add_settings_section('header', __('Header', 'creativepop'), '__return_false', 'creativepop_theme_options');
	add_settings_section('slider', __('Slider', 'creativepop'), '__return_false', 'creativepop_theme_options');
	add_settings_section('footer', __('Footer', 'creativepop'), '__return_false', 'creativepop_theme_options');
	add_settings_section('woocommerce', __('Woocommerce', 'creativepop'), '__return_false', 'creativepop_theme_options');

	/* Options Fields for each section */
	add_settings_field('logo_img', __('Logo Image', 'creativepop'), 'option_logo_img', 'creativepop_theme_options', 'general', array('info' => __('Upload an image for logo', 'creativepop')));
	add_settings_field('logo_pos', __('Logo Position', 'creativepop'), 'option_logo_position', 'creativepop_theme_options', 'general', array('info' => __('Choose position for logo', 'creativepop')));
	add_settings_field('favicon', __('Favicon', 'creativepop'), 'option_favicon', 'creativepop_theme_options', 'general', array('info' => __('Upload an image for favicon', 'creativepop')));

	add_settings_field('sticky_header', __('Sticky Header', 'creativepop'), 'option_sticky_header', 'creativepop_theme_options', 'header', array('info' => __('Set sticky header','creativepop')));
	add_settings_field('menu_position', __('Menu Position', 'creativepop'), 'option_menu_position', 'creativepop_theme_options', 'header', array('info' => __('Set menu position', 'creativepop')));
	add_settings_field('header_color', __('Header Color', 'creativepop'), 'option_header_color', 'creativepop_theme_options', 'header', array('info' => __('Pick a color for header', 'creativepop')));

	add_settings_field('copyright_info', __('Copyright Info', 'creativepop'), 'option_copyright_info', 'creativepop_theme_options', 'footer', array('info' => __('Website copyright information', 'creativepop')));
	add_settings_field('social_links', __('Social Links', 'creativepop'), 'option_social_links', 'creativepop_theme_options', 'footer', array('info' => __('Add urls to your social profiles', 'creativepop')));
}

add_action('admin_init', 'add_options_fields');

/* Save theme options */
function save_theme_options() {
	$data = $_POST['theme_options'];

	if(!isset($data['option_sticky_header'])) { $data['option_sticky_header'] = false; }

	if(!empty($data)) {
		if(update_option('theme_options', $data)) {
			die('1');
		}
		else {
			die('0');
		}
	}
	else {
		die('1');
	}
}

/* Default options */
function get_theme_default_options() {
	/**
	 * 'logo_img' => string
	 * 'logo_pos' => string
	 * 'favicon' => string
	 *
	 * 'sticky_header' => true/false
	 * 'menu_position' => string 
	 * 'header_color' => string
	 *
	 * 'copyright_info' => string
	 * 'social_urls' => string
	 */
	return array(
			'option_logo_img' => '',
			'option_logo_position' => 'left',
			'option_favicon' => '',
			'option_sticky_header' => false,
			'option_menu_position' => 'right',
			'option_header_color' => '#fff',
			'option_copyright_info' => esc_attr__('© Copyright 2015', 'creativepop') . ' <a href="' . esc_url(__('ddunlimitedinc.com', 'creativepop')) . '">'  . esc_attr__('D&D Unlimited Inc', 'creativepop') . '</a>',
                        'facebook_url' => '',
                        'twitter_url' => '',
                        'instagram_url' => '',
                        'pinterest_url' => '',
			'googleplus_url' => '',
			'skype_url' => '',
			'flickr_url' => '',
			'youtube_url' => '',
			'email_url' => '',
			'github_url' => '',
			'rss_url' => '',
			'soundcloud_url' => '',
			'tumblr_url' => '',
			'vimeo_url' => '',
			'yelp_url' => '',
			'linkedin_url' => ''
        );
}

function get_theme_options() {
	$saved = (array) get_option('theme_options');
	$defaults = get_theme_default_options();
	$defaults = apply_filters('default_theme_options', $defaults);
	$options = wp_parse_args($saved, $defaults);
	$options = array_intersect_key($options, $defaults);
	return $options;
}

function reset_theme_options() {
	delete_option('theme_options', '');
	die();
}

function option_logo_img() {
	$options = get_theme_options();
	?>
	<input id="option_logo_img" class="text-input" name="theme_options[option_logo_img]" type="text" value="<?php echo esc_url($options['option_logo_img']); ?>"/>
	<?php
}

function option_logo_position() {
	$options = get_theme_options();
	?>
	<select id="option_logo_position" name="theme_options[option_logo_position]" class="select-box">
		<option value="left" <?php if ($options['option_logo_position'] == 'left') { echo "selected"; } ?> >Left</option>
		<option value="right" <?php if ($options['option_logo_position'] == 'right') { echo "selected"; } ?> >Right</option>
		<option value="center" <?php if ($options['option_logo_position'] == 'center') { echo "selected"; } ?> >Center</option>
	</select>
	<?php
}

function option_favicon() {
	$options = get_theme_options();
	?>
	<input id="option_favicon" class="text-input" name="theme_options[option_favicon]" type="text" value="<?php echo esc_url($options['option_favicon']); ?>"/>
	<?php
}

function option_sticky_header() {
	$options = get_theme_options();
	?>
	<div class="box-option">
		<label for="option_sticky_header"><input type="checkbox" name="theme_options[option_sticky_header]" id="option_sticky_header" <?php checked('on', $options['option_sticky_header']); ?> />
			<?php _e('Enabled', 'creativepop'); ?>
		</label>
	</div>
	<?php
}

function option_menu_position() {
	$options = get_theme_options();
	?>
	<select id="option_menu_position" name="theme_options[option_menu_position]" class="select-box">
		<option value="left" <?php if ($options['option_menu_position'] == 'left') { echo "selected"; } ?> >Left</option>
		<option value="right" <?php if ($options['option_menu_position'] == 'right') { echo "selected"; } ?> >Right</option>
		<option value="center" <?php if ($options['option_menu_position'] == 'center') { echo "selected"; } ?> >Center</option>
	</select>
	<?php
}

function option_header_color() {
	$options = get_theme_options();
	?>
	<input id="option_header_color" class="text-input" name="theme_options[option_header_color]" type="text" value="<?php echo $options['option_header_color']; ?>"/>
	<?php
}

function option_social_links() {
	$options = get_theme_options();
	?>
	<div class="socials">
		<h4><?php _e('Facebook', 'creativepop'); ?></h4>	<input id="facebook_url" 	class="text-input" name="theme_options[facebook_url]" 	type="text"   value="<?php echo esc_url( $options['facebook_url'] ); ?>"/>
		<h4><?php _e('Twitter', 'creativepop'); ?></h4>		<input id="twitter_url" 	class="text-input" name="theme_options[twitter_url]" 	type="text"   value="<?php echo esc_url( $options['twitter_url'] ); ?>"/>
		<h4><?php _e('LinkedIn', 'creativepop'); ?></h4>	<input id="linkedin_url" 	class="text-input" name="theme_options[linkedin_url]" 	type="text"   value="<?php echo esc_url( $options['linkedin_url'] ); ?>"/>
		<h4><?php _e('Google Plus+', 'creativepop'); ?></h4>	<input id="googleplus_url" 	class="text-input" name="theme_options[googleplus_url]" type="text"  value="<?php echo esc_url( $options['googleplus_url'] ); ?>"/>
		<h4><?php _e('Skype', 'creativepop'); ?></h4>		<input id="skype_url" 		class="text-input" name="theme_options[skype_url]" 	type="text"   value="<?php echo esc_attr( $options['skype_url'] ); ?>"/>
		<h4><?php _e('Flickr', 'creativepop'); ?></h4>		<input id="flickr_url" 	class="text-input" name="theme_options[flickr_url]" 	type="text"   value="<?php echo esc_url( $options['flickr_url'] ); ?>"/>
		<h4><?php _e('You Tube', 'creativepop'); ?></h4>	<input id="youtube_url" 	class="text-input" name="theme_options[youtube_url]"	type="text"   value="<?php echo esc_url( $options['youtube_url'] ); ?>"/>
		<h4><?php _e('Vimeo', 'creativepop'); ?></h4>		<input id="Vimeo_url" 		class="text-input" name="theme_options[vimeo_url]"		type="text"   value="<?php echo esc_url( $options['vimeo_url'] ); ?>"/>
		<h4><?php _e('RSS', 'creativepop'); ?></h4>		<input id="rss_url" 		class="text-input" name="theme_options[rss_url]" 		type="text"   value="<?php echo esc_url( $options['rss_url'] ); ?>"/>
		<h4><?php _e('Instagram', 'creativepop'); ?></h4>	<input id="instagram_url"	class="text-input" name="theme_options[instagram_url]"	type="text"   value="<?php echo esc_url( $options['instagram_url'] ); ?>"/>
		<h4><?php _e('Pinterest', 'creativepop'); ?></h4>	<input id="pinterest_url"	class="text-input" name="theme_options[pinterest_url]"	type="text"   value="<?php echo esc_url( $options['pinterest_url'] ); ?>"/>
		<h4><?php _e('Yelp', 'creativepop'); ?></h4>			<input id="yelp_url"		class="text-input" name="theme_options[yelp_url]"		type="text"   value="<?php echo esc_url( $options['yelp_url'] ); ?>"/>
		<h4><?php _e('E-mail', 'creativepop'); ?></h4>			<input id="email_url" 		class="text-input" name="theme_options[email_url]" 	type="text"   value="<?php echo sanitize_email( $options['email_url'] ); ?>"/>
		<h4><?php _e('Github', 'creativepop'); ?></h4>			<input id="github_url"		class="text-input" name="theme_options[github_url]" 	type="text"   value="<?php echo esc_url( $options['github_url'] ); ?>"/>
		<h4><?php _e('Tumblr', 'creativepop'); ?></h4>			<input id="tumblr_url"		class="text-input" name="theme_options[tumblr_url]" 	type="text"   value="<?php echo esc_url( $options['tumblr_url'] ); ?>"/>
		<h4><?php _e('Soundcloud', 'creativepop'); ?></h4>		<input id="soundcloud_url"	class="text-input" name="theme_options[soundcloud_url]" type="text" value="<?php echo esc_url( $options['soundcloud_url'] ); ?>"/>
	</div>
	<?php
}

function option_copyright_info() {
	$options = get_theme_options();
	?>
	<textarea id="copyright_info" name="theme_options[option_copyright_info]" cols="50" rows="20" /><?php echo stripslashes($options['option_copyright_info']); ?></textarea>
	<?php
}

?>
