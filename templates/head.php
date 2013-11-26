<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title>
			<?php if ( is_category() ) { ?>Category: <?php } elseif ( is_tag() ) { ?>Tag: <?php } elseif ( is_404() ) { ?>404 - Page Not Found - <?php } elseif ( is_home() ) { bloginfo('description'); ?> - <?php } ?><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?>
		</title>
		<meta name="robots" content="index, follow" />
		<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />
		<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/stylesIE7.css" media="screen, projection" /><![endif]-->
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>

	<body><?php the_permalink($page->ID); ?>


	<?php get_header(); ?>

	<div id="wrapper">
		<div id="content">
		  <div id="introText">
		  <?php if(is_home()) { ?>
		    <?php if($bwd1_intro_header) { echo "<h2>" . $bwd1_intro_header . "</h2>"; } ?>
		    <?php if($bwd1_intro_message) { echo "<p>" . $bwd1_intro_message . "</p>"; } ?>
		  <?php } ?>
		  </div>