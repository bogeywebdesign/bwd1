<ul class="postInfo">
	<li class="author"><span>Posted by</span>: <?php the_author_posts_link() ?> under <?php the_category(', ') ?></li>
	<?php the_tags( '<li class="postTags"><span>Tags:</span> ', ', ', '</li>'); ?>
	<?php edit_post_link('(edit this)', '<li class="editInfo">', '</li>'); ?>
</ul>