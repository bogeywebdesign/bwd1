	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
		<p class="paginator"><?php next_posts_link('&lt;&lt; Previous Entries') ?> <?php previous_posts_link('Next Entries >>') ?></p>
	<?php } ?>