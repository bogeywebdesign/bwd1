	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : ?>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		
		<?php new_widget_cloud(''); ?>
		
		<h3>Recent Posts</h3>
		<?php query_posts('showposts=10'); ?>
		<ul>
		<?php while (have_posts()) : the_post(); ?>
			<li>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
		<?php endwhile; ?>
		</ul>
	<?php endif; ?>