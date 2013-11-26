<?php
  if(('open' == $post-> comment_status) || ('open' == $post->ping_status)) :
?>
<p class="commentPing">
	You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.

	<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
		/* Both Comments and Pings are open*/ ?>
		You can <a href="#response">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

	<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
		/* Only Pings are Open*/ ?>
		Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

	<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
		/* Comments are open, Pings are not*/ ?>
		You can skip to the end and leave a response. Pinging is currently not allowed.
	<?php } ?>
</p>
<?php endif; ?>

<?php comments_template(); ?>