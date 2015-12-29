$(function () {
	var $window = $(window); // jQuery caching
		
	$window.on('scroll', animateOnScroll);

	function animateOnScroll() {
		$('.animateOnScroll').each(function() {
			var $this = $(this);

			var 	window_height = $window.height(),
				window_top_pos = $window.scrollTop(),
				window_bottom_pos = window_top_pos + window_bottom_pos;
			var 	ele_height = $this.outerHeight(),
				ele_top_pos = $this.offset().top,
				ele_bottom_pos = ele_top_pos + ele_height;

			if(ele_bottom_pos >= window_top_pos && 
				ele_top_pos <= window_bottom_pos) {

				if ($this.data('delay')) {
					window.setTimeOut(function() { $this.addClass('animated') },
						parseInt($this.data('delay'), 10));
				} 
				else {
					$this.addClass('animated');
				}
			}
			else {
				$this.removeClass('animated');
			}
		});
	}
});
