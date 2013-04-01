<?php

	if ( post_password_required() ) : ?>
		<p><?php _e('Enter your password to view comments.'); ?></p>
	<?php return; endif; ?>
	

	<div class="col1">
	

		<!-- COMMENTS -->
	
	
		<h2 id="comments" class="comment-title">
	    	<?php comments_number(__('Kommentare'), __('Kommentare'), __('Kommentare')); ?>
	    </h2>
	    
	    
	    <?php if ( have_comments() ) : ?>


	    <ul id="commentlist">

	    	<?php foreach ($comments as $comment) : ?>
	
	    		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	
	    			<?php comment_text() ?>	
	    			
	    			<div class="comment-data">
	    				<span class="sub"><?php comment_date() ?> / <?php comment_time() ?> / <?php comment_author_link() ?></span> 
	    			</div>
	    			
	    		</li>

	    	<?php endforeach; ?>

	    </ul> <!-- end commentlist -->
	    
	    
	    <br /><br />
	    

	    <?php else : // If there are no comments yet ?>
	
	    	<p>Leider gibt es noch keine Kommentare zu diesem Eintrag. Schreibe den ersten!</p><br />

	    <?php endif; ?>

			
		<!-- END COMMENTS -->
			
			
			
		<!-- COMMENTS FORM -->
		
		    
		<?php if ( comments_open() ) : ?>


		<div class="entry-content">
		
		
			<h2 id="postcomment" class="comment-title">Einen Kommentar schreiben</h2>
		    
		    
		    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		    	<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url( get_permalink() ) );?></p>
		    <?php else : ?>
		
		
		    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
		    	<?php if ( is_user_logged_in() ) : ?>
		    		<p><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> 
		    		<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account') ?>">
		    		<?php _e('Log out &raquo;'); ?></a></p>
		    	<?php else : ?>
		    	
		    		
		    		<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" /> Name *<br />
		    		
		    		<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" /> eMail *<br />
		    		
		    		<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" />	Website<br />
		
		    	<?php endif; ?>
		
		    		<textarea name="comment" id="comment"></textarea><br />
		
		    		<input name="submit" type="submit" value="<?php esc_attr_e('Submit Comment'); ?>" class="submit" />
		    		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		
		    	<?php do_action('comment_form', $post->ID); ?>
		
		    </form>
		
		
		    <?php endif; // If registration required and not logged in ?>
		
		
		    <?php else : // Comments are closed ?>
		    	<p><?php _e('<h2 class="comment-title">Die Kommentarfunktion ist deaktiviert.</h2>'); ?></p>
		    <?php endif; ?>
		
		
		</div> <!-- end entry-content -->
		
		
		<!-- END COMMENTS FORM -->
		

	</div> <!-- end col1 -->
	

</div><!-- end secondary wrap -->

	
<? include ("sidebar.php"); ?>
