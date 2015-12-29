jQuery(document).ready(function() {
	jQuery('#upload_logo_button').click(function() {
		/* Open ThickBox for file uploading */
		tb_show('Upload a logo', 'media-upload.php?referer=theme_options&type=image&TB_iframe=true&post_id=0', false);
		return false;
	});
	
	window.send_to_editor = function(html) {
		var image_url = $('img', html).attr('src');
		jQuery('#logo_url').val(image_url);
		tb_remove();
	};
});