<?php
if (is_user_logged_in() && current_user_can('view-asi-pricing')): // ASI Distributors
	get_template_part('pricing', 'asi');
elseif (is_user_logged_in() && current_user_can('view_reseller_pricing')): // resellers
	get_template_part('pricing', 'reseller');
elseif (is_user_logged_in() && current_user_can('edit_pages')): // Store Managers
	get_template_part('pricing', 'asi');
elseif (!is_user_logged_in()):
?>
<div class="row animated fadeIn">
	<h5 class="teal-text">Distributor</h5>
	<p>Please log in</p>
	<span>
		<a href="/my-account" class="btn waves-effect red">Login</a>
	</span>
</div>
<?php
endif;
