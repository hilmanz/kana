<?php if ('open' == $post->comment_status) : ?>
<div id="respond" class="clearfix">
    <h3 id="reply-title"><?php comment_form_title( 'Leave Your Own Review', 'Leave a Reply to %s' ); ?></h3>
    <div class="cancel-comment-reply"><small><?php cancel_comment_reply_link(); ?></small></div>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>
    
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( $user_ID ) : ?>
        <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
        <?php else : ?>
        <div class="field-row">
            <label for="author">Name <?php if ($req) echo "<span>(required)</span>"; ?> : </label>
            <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="text_input" size="22" tabindex="1" required />
        </div>
        
        <div class="field-row">
            <label for="email">Mail <?php if ($req) echo "<span>(required)</span>"; ?> : </label>
            <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="text_input" size="22" tabindex="2" required />
        </div>
        
        <div class="field-row">
            <label for="url">Website :</label>
            <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="text_input" size="22" tabindex="3"  />
        </div>
    	<?php endif; ?>
        
        <div class="field-row">
        	<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
            <label for="message_text">Comment</label>
            <textarea name="comment" id="comment" class="text_input" cols="100%" rows="10" tabindex="4" required></textarea>
        </div>
        <div class="smallBtn">
         <input class="button" type="submit" value="Submit Comment" id="submit" name="submit">
        </div><!-- END .centerbox -->
    
   
     <?php comment_id_fields(); ?>
       <?php do_action('comment_form', $post->ID); ?>
    
    </form>
  <?php endif; // If registration required and not logged in ?>
</div><!-- END #respond -->
<?php endif; // if you delete this the sky will fall on your head ?>