<?php
add_action('widgets_init', 'ess_recentcomments');
function ess_recentcomments(){
	register_widget('ess_recentcomments_widget');
}

class ess_recentcomments_widget extends WP_Widget{
	function ess_recentcomments_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'ess_recentcomments', 'description' => __('List of recent comments and its excerpt.', 'essential') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'ess_recentcomments-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'ess_recentcomments-widget', __('ESS - Better Recent Comment', 'essential'), $widget_ops, $control_ops );
	}	

	/* Front End Interface */
	function widget( $args, $instance ) {
		extract( $args );		
		
		echo $before_widget;

		echo $before_title . $instance['ess_recentcomments_widgettitle'] . $after_title;
		
		$ess_recentcomments_commentnumber = $instance['ess_recentcomments_commentnumber'];
		$ess_recentcomments_commentlength = $instance['ess_recentcomments_commentlength'];
		
		ess_recent_comments($ess_recentcomments_commentnumber, $ess_recentcomments_commentlength);
		
		echo $after_widget;
	}

	/* Saving Widget Settings */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['ess_recentcomments_widgettitle'] = strip_tags( $new_instance['ess_recentcomments_widgettitle'] );
		$instance['ess_recentcomments_commentnumber'] = ereg_replace('[^0-9]', '', $new_instance['ess_recentcomments_commentnumber']);
		$instance['ess_recentcomments_commentlength'] = ereg_replace('[^0-9]', '', $new_instance['ess_recentcomments_commentlength']);
		
		return $instance;
	}

	/* Widget Options Interface*/
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'ess_recentcomments_widgettitle' => __('Recent Comments', 'essential'), 'ess_recentcomments_commentnumber' => __('5', 'essential'), 'ess_recentcomments_commentlength' => __('100', 'essential'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ess_recentcomments_widgettitle' ); ?>"><?php _e('Title:', 'essential'); ?></label>
			<input id="<?php echo $this->get_field_id( 'ess_recentcomments_widgettitle' ); ?>" name="<?php echo $this->get_field_name( 'ess_recentcomments_widgettitle' ); ?>" value="<?php echo $instance['ess_recentcomments_widgettitle']; ?>" class="widefat" />
		</p>

		<!-- Comment Number -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ess_recentcomments_commentnumber' ); ?>"><?php _e('Numbers of comments to show:', 'essential'); ?></label>
			<input id="<?php echo $this->get_field_id( 'ess_recentcomments_commentnumber' ); ?>" name="<?php echo $this->get_field_name( 'ess_recentcomments_commentnumber' ); ?>" value="<?php echo $instance['ess_recentcomments_commentnumber']; ?>" class="widefat" />
		</p>

		<!-- Comment Length -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ess_recentcomments_commentlength' ); ?>"><?php _e('Numbers of characters of comment to show:', 'essential'); ?></label>
			<input id="<?php echo $this->get_field_id( 'ess_recentcomments_commentlength' ); ?>" name="<?php echo $this->get_field_name( 'ess_recentcomments_commentlength' ); ?>" value="<?php echo $instance['ess_recentcomments_commentlength']; ?>" class="widefat" />
		</p>

	<?php
	}
	
}

// Recent Comment
function ess_recent_comments($ess_recentcomments_commentnumber, $ess_recentcomments_commentlength) {
    global $wpdb;
	$request = "SELECT * FROM $wpdb->comments";
	$request .= " JOIN $wpdb->posts ON ID = comment_post_ID";
	$request .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password =''";
	$request .= " ORDER BY comment_date DESC LIMIT $ess_recentcomments_commentnumber";
	$comments = $wpdb->get_results($request);
	echo "<ul>";
	if ($comments) {
		foreach ($comments as $comment) {
			ob_start();
			?>
				<li>
					<a href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>" class="commentator"><?php echo ess_get_author($comment); ?>: <?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, $ess_recentcomments_commentlength)); ?></a>
				</li>
			<?php
			ob_end_flush();
		}
	} else {
		echo '<li>'.__('No comments', 'essential').'';
	}
	echo "</ul>";
}

function ess_get_author($comment) {
	$author = "";
	if ( empty($comment->comment_author) )
		$author = __('Anonymous', 'essential');
	else
		$author = $comment->comment_author;
	return $author;
}













add_action( 'widgets_init', 'ess_subscription_counter' );
function ess_subscription_counter() {
	register_widget( 'ess_subscription_counter_widget' );
}

class ess_subscription_counter_widget extends WP_Widget {
	
	/* Widget Settings */
	function ess_subscription_counter_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'ess_subscriptioncounter', 'description' => __('RSS feed & follower counter', 'essential') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'ess_subscriptioncounter-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'ess_subscriptioncounter-widget', __('ESS - Subscription Counter', 'essential'), $widget_ops, $control_ops );
	}
	

	/* Front End Interface */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */		
		$feedburner_username = $instance['feedburner_username'];
		$twitter_username = $instance['twitter_username'];
		
		$minimum_feedburner_subscriber = $instance['minimum_feedburner_subscriber'];
		$minimum_twitter_follower = $instance['minimum_twitter_follower'];
		
		if (ess_feedburner_counter($feedburner_username) < $minimum_feedburner_subscriber)
			{$feedburner_subscriber = 'update';}
			else
			{$feedburner_subscriber = ess_feedburner_counter($feedburner_username);}
			
		if (ess_follower_counter($twitter_username) < $minimum_twitter_follower)
			{$twitter_follower = 'update';}
			else
			{$twitter_follower = ess_follower_counter($twitter_username);}
			
		
		echo $before_widget;
		echo $before_title . $instance['ess_subscriber_widgettitle'] . $after_title;
		echo '
		<ul>
			<li>
				<p><strong>'. $feedburner_subscriber . __(' awesome people</strong> already subscribed', 'essential') . '</p>
				<p><a class="subscribe-feed" href="http://feeds.feedburner.com/' . $feedburner_username .'" title="' . __('Subscribe to the feed', 'essential') . '">' . __('Subscribe to the feed now!', 'essential') . '</a></p>
			</li>
			
			<li>
				<p><strong>' . $twitter_follower . __(' tweeter</strong> already followed us', 'essential') . '</p>
				<p><a class="follow-twitter" href="http://twitter.com/' . $twitter_username . '" title="' . __('Follow us on Twitter', 'essential') . '">' . __('Follow us on Twitter now!', 'essential') . '</a></p>
			</li>
		</ul>
		';
		
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['ess_subscriber_widgettitle'] = strip_tags( $new_instance['ess_subscriber_widgettitle'] );
		$instance['feedburner_username'] = strip_tags( $new_instance['feedburner_username'] );
		$instance['twitter_username'] = strip_tags( $new_instance['twitter_username'] );
		
		$instance['minimum_feedburner_subscriber'] = ereg_replace('[^0-9]', '', $new_instance['minimum_feedburner_subscriber']);
		$instance['minimum_twitter_follower'] = ereg_replace('[^0-9]', '', $new_instance['minimum_twitter_follower']);

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'ess_subscriber_widgettitle' => __('Subscribe  &amp Follow', 'essential'), 'feedburner_username' => __('fikrirasyid', 'essential'), 'minimum_feedburner_subscriber' => __('5', 'essential'), 'twitter_username' => __('fikrirasyid', 'essential'),  'minimum_twitter_follower' => __('5', 'essential'),);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ess_subscriber_widgettitle' ); ?>"><?php _e('Widget Title:', 'essential'); ?></label>
			<input id="<?php echo $this->get_field_id( 'ess_subscriber_widgettitle' ); ?>" name="<?php echo $this->get_field_name( 'ess_subscriber_widgettitle' ); ?>" value="<?php echo $instance['ess_subscriber_widgettitle']; ?>" class="widefat" />
		</p>
		
		<!-- Feedburner Username -->
		<p>
			<label for="<?php echo $this->get_field_id( 'feedburner_username' ); ?>"><?php _e('Feedburner Username:', 'essential'); ?></label>
			<input id="<?php echo $this->get_field_id( 'feedburner_username' ); ?>" name="<?php echo $this->get_field_name( 'feedburner_username' ); ?>" value="<?php echo $instance['feedburner_username']; ?>" class="widefat" />
		</p>

		<!-- Minimum Feedburner Subscriber -->
		<p>
			<label for="<?php echo $this->get_field_id( 'minimum_feedburner_subscriber' ); ?>"><?php _e('Minimum Feedburner Subscriber Required to show the feed counter:', 'essential'); ?></label>
			<input id="<?php echo $this->get_field_id( 'minimum_feedburner_subscriber' ); ?>" name="<?php echo $this->get_field_name( 'minimum_feedburner_subscriber' ); ?>" value="<?php echo $instance['minimum_feedburner_subscriber']; ?>" class="widefat" />
		</p>

		<!-- Twitter Username -->
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>"><?php _e('Twitter Username:', 'essential'); ?></label>
			<input id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" value="<?php echo $instance['twitter_username']; ?>" class="widefat" />
		</p>

		<!-- Minimum Twitter Follower -->
		<p>
			<label for="<?php echo $this->get_field_id( 'minimum_twitter_follower' ); ?>"><?php _e('Minimum Twitter Follower Required to show the follower counter:', 'essential'); ?></label>
			<input id="<?php echo $this->get_field_id( 'minimum_twitter_follower' ); ?>" name="<?php echo $this->get_field_name( 'minimum_twitter_follower' ); ?>" value="<?php echo $instance['minimum_twitter_follower']; ?>" class="widefat" />
		</p>

	<?php
	}
	

}


// Twitter Follower Counter
function ess_follower_counter($username){
	
	delete_transient('follower_count');
	
	// first check the transient
	$count = get_transient('follower_count');
	if ($count !== false) return $count;
		
	// no count, so go get it
	$count = 0;
		
	$data = wp_remote_get('http://api.twitter.com/1/users/show.json?screen_name=' . $username);
	if (!is_wp_error($data)) {
		$value = json_decode($data['body'],true);
		$count = $value['followers_count'];
	}
		
	// set the cached value
	set_transient('follower_count', $count, 60*60); // 1 hour cache
		
	return $count;
}

// Feedburner Subscriber Counter
function ess_feedburner_counter($username){
	$api_page = 'https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=' . $username;
	$xml = file_get_contents ( $api_page );
	$profile = new SimpleXmlElement($xml, LIBXML_NOCDATA);
	$rsscount = (string) $profile->feed->entry['circulation'];
	
	return $rsscount;
}