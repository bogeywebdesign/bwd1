	<?php include(TEMPLATEPATH . '/templates/head.php'); ?>
	
	<div class="post" id="post-<?php the_ID(); ?>">
	<?php while (have_posts()) : the_post(); ?>
		<?php include(TEMPLATEPATH . '/templates/getPostTitle.php'); ?>
		<?php edit_post_link('(edit this)', '<p>', '</p>'); ?>

		<?php the_content('Read the rest of this entry »'); ?>
		
		<?php include(TEMPLATEPATH . '/templates/postPagination.php'); ?>
  <?php endwhile; ?>
 	<?php include(TEMPLATEPATH . '/templates/commenting.php'); ?>
	<?php include(TEMPLATEPATH . '/templates/backToTop.php'); ?>
	</div>
	
	<?php include(TEMPLATEPATH . '/templates/foot.php'); ?>
