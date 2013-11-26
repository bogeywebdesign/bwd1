<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php
			return;
		}
	}
?>

<!-- You can start editing here. -->
<?php if ($comments) : ?>
	<?php /* Count the totals */
		$numPingBacks = 0;
		$numComments  = 0;
		foreach ($comments as $comment) {
			if (get_comment_type() != "comment") {
				$numPingBacks++;
			} else {
				$numComments++;
			}
		}
	?>
	
	<?php if ($numComments != 0) : ?>
	<div id="comments">
		<h4 id="commentsList"><?php if ($numComments == 1) { echo 'One comment'; } else { echo $numComments; echo ' comments so far'; } ?></h4>
		<?php $commentnumber = 1 ?>
		
		<ol>
		<?php foreach ($comments as $comment) : ?>
			<?php if (get_comment_type() == 'comment'){ ?>
			<li id="comment-<?php comment_ID() ?>"<?php /* throw class on even numbered comments for styling */ if (($commentnumber % 2) == 0) echo ' class="even"' ?>>
				<?php echo get_avatar( $comment, 50 ); ?>
				<p class="commentAuthor"><?php comment_author_link(); edit_comment_link('edit',' | ',''); ?></p>
				<p class="messageTime"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></p>
				<div class="message-entry font-resize">
					<?php if ($comment->comment_approved == '0') : ?>
					<p><em>Your comment is awaiting moderation.</em></p>
					<?php endif; ?>
					<?php comment_text() ?>
				</div>
				<?php $commentnumber++;?>
		  </li>
			<?php } /* End of is_comment statement */ ?>
		<?php endforeach; /* end for each comment */ ?>
		</ol>
	</div>
	<?php endif; ?>

	<?php if ($numPingBacks != 0) : ?>
	<div id="trackBacks">
		<h4 id="trackbacks"><?php if ($numPingBacks == 1) { echo 'One Trackback/Ping'; } else { echo $numPingBacks; echo ' Trackbacks/Pings'; } ?></h4>
		<?php $trackbacknumber = 1 ?>
		<ol class="trackbacksList">
		<?php foreach ($comments as $comment) : ?>
			<?php if (get_comment_type() != 'comment'){ ?>
			<li id="comment-<?php comment_ID() ?>"<?php /* throw class on even numbered comments for styling */ if (($trackbacknumber % 2) == 0) echo ' class="even"' ?>>
				<p class="commentAuthor"><?php comment_author_link(); echo ' '; comment_date('M d Y') ?> at <?php comment_date('ga'); edit_comment_link('edit',' | ',''); ?>:</p>
				<?php if ($comment->comment_approved == '0') : ?>
				<p><em>Your comment is awaiting moderation.</em></p>
				<?php endif; ?>
				<?php comment_text() ?>
			</li>
			<?php $trackbacknumber++;  ?>
			<?php } ?>
		<?php endforeach; /* end for each comment */ ?>
		</ol>
  </div>
	<?php endif; ?>
	
<?php else : /* this is displayed if there are no comments so far */ ?>
  <?php if ('open' == $post-> comment_status) : ?> 
	<!-- If comments are open, but there are no comments. -->
	<p class="noComments">No comments yet, be the first!</p>
	<?php else : /* comments are closed */ ?>
	<!-- If comments are closed. -->
	<p class="closedComments">Sorry, comments are closed at this time.</p>
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
<div id="response" class="clear">
	<?php if (get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<fieldset>
		<legend>Leave a reply</legend>
	  <?php if ( $user_ID ) : ?>
		<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout »</a></p>

	  <?php else : ?>
		<label>Name <?php if ($req) _e('(<b>*</b>)'); ?></label>
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
	
		<label>Mail (will not be published) <?php if ($req) _e('(<b>*</b>)'); ?></label>
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
	
		<label>URI</label>
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
<?php endif; ?>

		<label>Comment</label>
		<textarea name="comment" tabindex="4" rows="4" cols="4"></textarea>

		<input type="submit" name="submit" class="submit" tabindex="5" value="Submit Comment" />
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		<?php do_action('comment_form', $post->ID); ?>
	</fieldset>
	</form>
	  <?php endif; /* if registration required and not logged in */ ?>
</div>		
<?php endif; /* if you delete this the sky will fall on your head */ ?>

