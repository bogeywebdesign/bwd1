		<?php 	/* Widgetized sidebar, if you have the plugin installed. */
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			
			
		  <?php
        global $id;
        $children = wp_list_pages("title_li=&child_of=$id&show_date=modified
        &date_format=$date_format&echo=0");
        if ($children) :
      ?>
      <h3><?php wp_title('', true, 'right'); ?></h3>
      <ul>
        <? echo $children ?>
      </ul>
      <?php endif; ?>

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

			<?php include (TEMPLATEPATH . '/templates/links.php'); ?>
			
			<?php include (TEMPLATEPATH . '/templates/categories.php'); ?>
		
			<?php if (function_exists('src_simple_recent_comments')) { ?>
				<h3>Recent comments</h3>
		
				<?php src_simple_recent_comments(4,60,'', ''); ?>
			<?php } ?>

			<h3>Monthly Archives</h3>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		<?php endif; ?>