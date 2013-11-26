			<?php $links = wp_list_bookmarks('exclude_category=144,117&category_before=&category_after=&title_before=<h3>&title_after=</h3>&echo=0');
			
			if($links) { ?>
				<?php echo $links; ?>
			<?php } ?>