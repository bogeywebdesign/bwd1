	<?php include(TEMPLATEPATH . '/templates/head.php'); ?>
	
	<?php if (have_posts()) : ?>
	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	  <h2 class="archive">
    <?php /* If this is a category archive */ if (is_category()) { ?>
    Posts Categorized ‘<?php single_cat_title(); ?>’
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    Posts Tagged ‘<?php single_tag_title(); ?>’
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    Archive for <?php the_time('F jS, Y'); ?>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    Archive for <?php the_time('F, Y'); ?>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    Archive for <?php the_time('Y'); ?>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    Author Archive
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    Blog Archives
    <?php } ?>
  	</h2>
  	
  	<?php if(is_tag() && tag_description()) { echo "<div id=\"tagDescription\">" . tag_description() . "</div>"; } ?>
  	<?php if(is_category() && category_description()) { echo "<div id=\"categoryDescription\">" . category_description() . "</div>"; } ?>

  	<?php $postnumber = '1' ?>

  	<?php while (have_posts()) : the_post(); ?>
  	<div class="post<?php if($postnumber == '1') echo " post" . $postnumber; $postnumber++; ?>" id="post-<?php the_ID(); ?>">
  		<?php include(TEMPLATEPATH . '/templates/titleBlock.php'); ?>

  		<?php the_content('Read the rest of this entry »'); ?>
		
  		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

  		<p class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
  	</div>
    <?php endwhile; ?>

  	<?php include(TEMPLATEPATH . '/templates/backToTop.php'); ?>

	<?php else : ?>
		<?php include(TEMPLATEPATH . '/templates/postNotFound.php'); ?>
	<?php endif; ?>
	
	<?php include(TEMPLATEPATH . '/templates/paginator.php'); ?>
	
	<?php include(TEMPLATEPATH . '/templates/foot.php'); ?>
