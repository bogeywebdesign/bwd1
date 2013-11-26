<div id="header">
  <div id="blogTitle"><div>
	  <h1><?php bloginfo('title'); ?> <span><?php bloginfo('description'); ?></span></h1>
	</div></div>
	
	<div id="blogNavigation">
  	<ul>
  		<li id="home" <?php if(is_home()){echo 'class="current_page_item"';}?>><a href="<?php echo get_option('home'); ?>/" title="Home">Home</a></li>
    	<?php wp_list_pages('title_li=&depth=1&sort_column=menu_order');?>
  	</ul>
  </div>
</div>
