	<?php $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0'); ?>
	
	<?php if ($children){ ?>
	  <h3><?php wp_title('', true, 'right'); ?></h3>
	  
	  <ul>
	    <?php echo $children; ?>
	  </ul>
	<?php } ?>
	
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
	  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
		
		<?php new_widget_cloud(''); ?>
	<?php endif; ?>