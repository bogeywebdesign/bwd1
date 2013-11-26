<?
global $options;

foreach ($options as $value) {
  if (get_settings( $value['id'] ) === FALSE) { 
    $$value['id'] = $value['std']; 
  }
  else { 
    $$value['id'] = stripslashes(get_settings( $value['id'] )); 
  }
}
?>

	<?php include(TEMPLATEPATH . '/templates/head.php'); ?><a href="sitemap">/site map</a>
	
	<?php if (have_posts()) : ?>
		<?php $postnumber = '1' ?>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post<?php if($postnumber == '1') echo " post" . $postnumber; $postnumber++; ?><?php sticky_class(); ?> " id="post-<?php the_ID(); ?>">
			<?php include(TEMPLATEPATH . '/templates/titleBlock.php'); ?>

			<?php the_content('Read the rest of this entry »'); ?>
			
			<?php include(TEMPLATEPATH . '/templates/postPagination.php'); ?>
		
			<p class="comments"><?php comments_popup_link(); ?></p>
		</div>
  	<?php endwhile; ?>
	
		<?php include(TEMPLATEPATH . '/templates/backToTop.php'); ?>
	<?php else : ?>
		<?php include(TEMPLATEPATH . '/templates/postNotFound.php'); ?>
	<?php endif; ?>
	
	<?php include(TEMPLATEPATH . '/templates/paginator.php'); ?>
	
	<?php include(TEMPLATEPATH . '/templates/foot.php'); ?>