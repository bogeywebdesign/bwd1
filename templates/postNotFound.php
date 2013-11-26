		<h2>Error 404 - Page Not Found</h2>
		
		<p>Sorry but the page you are looking for has either moved, the search you did has no results, or the link you followed was incorrect.  Please try visiting the <a href="<?php echo get_option('home'); ?>">home page</a>, browsing the categories and archives below, or checking out the navigation on the right to get to what you're looking for.</p>
		
		<div id="page404">
			<?php $empty = true; include (TEMPLATEPATH . '/templates/categories.php'); ?>

			<h3>Monthly Archives</h3>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</div>