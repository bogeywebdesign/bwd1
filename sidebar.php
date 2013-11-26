	<div id="right">
		<?php 
			if(is_404() || !have_posts()) include(TEMPLATEPATH . '/templates/404sidebar.php');
			elseif(is_page()) include(TEMPLATEPATH . '/templates/pageSidebar.php');
			else include(TEMPLATEPATH . '/templates/blogSidebar.php');
		?>
	</div>
