<?php
/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * Setting Up Theme Support
 * --------------------------------------------------------------------------------------------------------------------------------
*/
add_theme_support('post-thumbnails');
add_image_size( 'home-image', 615, 290, true);





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * Add Custom Image Header Support
 * --------------------------------------------------------------------------------------------------------------------------------
*/
define('HEADER_TEXTCOLOR', 'ffffff');
define('HEADER_IMAGE', '%s/images/default-header.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 940); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 156);
add_custom_image_header('ess_header_background', 'ess_admin_header_background');

function ess_header_background() {
	?>
	<style type="text/css">
        #header .wrap{
            background: url(' <?php header_image(); ?> ');
        }
	</style>
	<?php
}

function ess_admin_header_background(){
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
	
}





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * WordPress Custom Menu: Registering navs + home option
 * --------------------------------------------------------------------------------------------------------------------------------
*/
// Create "home" option on WordPress Custom Menu page
function custom_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'custom_page_menu_args' );

// Registering Custom Menus
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'top_nav' => 'Top Navigation',
		  'bottom_nav' => 'Bottom Navigation'
		)
	);
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * Register Sidebar
 * --------------------------------------------------------------------------------------------------------------------------------
*/
$sidebar_args = array(
	'name'          => 'Sidebar',
	'id'            => 'sidebar',
	'description'   => __('Widget area for sidebar', 'essential'),
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>' );
register_sidebar($sidebar_args);





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * STYLESHEETS & SCRIPTS
 * 
 * Hook the main CSS & jQuery using wp_enqueue_style & wp_enqueue_script a.k.a. the right way of adding scripts
 * However, the IE-specific files are using "manual" method, since the wp_enqueue_style can not be added between the IE comment tag
 * --------------------------------------------------------------------------------------------------------------------------------
*/
add_action('wp_head', 'ess_stylesheets_scripts', 5);
function ess_stylesheets_scripts(){
	// Register scripts & stylesheets
	wp_register_style('ess-main', get_bloginfo('template_directory') . '/css/main.css', array(), false, 'screen');
	wp_enqueue_style('ess-main');
		
	// Adding scripts into wp_head()
	wp_enqueue_script('jquery');
	
}


add_action('wp_head', 'ess_ie_stylesheets', 8);
function ess_ie_stylesheets(){
	// Adding stylesheets into wp_head()
	echo "<!--[if lte IE 8]>";
	echo "<link rel='stylesheet' id='ess-main-css'  href='" . get_bloginfo('template_directory') . "/css/ie.css' type='text/css' media='screen' />";
	echo "<![endif]--><!--[if lte IE 7]>";
	echo "<link rel='stylesheet' id='ess-main-css'  href='" . get_bloginfo('template_directory') . "/css/ie7.css' type='text/css' media='screen' />";
	echo "<![endif]--><!--[if lte IE 6]>";
	echo "<link rel='stylesheet' id='ess-main-css'  href='" . get_bloginfo('template_directory') . "/css/ie6.css' type='text/css' media='screen' />
	";
	echo "<![endif]-->";	
}


// Custom javascript embedded to the wp_head()
add_action('wp_head', 'ess_javascripts', 10);
function ess_javascripts(){
	$widget_class = "<span class='widget-ul-wrap'>";
	echo '
		<script type="text/javascript"> 
		jQuery(document).ready(function(){
			jQuery("#navigation li").hover(function(){jQuery(this).children("ul").slideToggle();}, function(){jQuery(this).children("ul").slideToggle();});
			jQuery("#navigation li li").has(".sub-menu").children("a").append(" &raquo;");
			
			jQuery(".widget>ul").wrapInner("' . $widget_class . '");
			
		});
		</script>

	';	
	echo "
		<!--[if lte IE 6]>
			<script src='" . get_bloginfo('template_directory') . "/js/DD_belatedPNG_0.0.8a-min.js'></script>
			<script>
			DD_belatedPNG.fix('#body-main,#visit-shop,#site-name a,#navigation ul,#navigation ul li,.post-time,.post-share a,.comment-reply-link,.widget li,#footer-facebook,#footer-twitter,#dapurpixel ');
			</script>
		<![endif]-->
	";	
}


add_action('wp_head', 'ess_customscripts_wp_head', 11);
function ess_customscripts_wp_head(){
	$ess_options = get_option('essential_options_item');
	echo $ess_options["ess_script_wp_head"];
}

add_action('wp_footer', 'ess_customscripts_wp_footer', 11);
function ess_customscripts_wp_footer(){
	$ess_options = get_option('essential_options_item');
	echo $ess_options["ess_script_wp_footer"];
}





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * THEME OPTIONS CHECKER
 *
 * Check whether a function should be executed or note, based on the Theme Options value
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_activation_checker( $array_name ) {

	// Get Theme Options variable -> used if Theme Options values have NOT been modified / saved to the database yet
	global $ess_fields;
	
	// Use the "std" array of Theme Options variable
	$activation = $ess_fields[$array_name]["std"];

	// Get the Theme Options data -> used if Theme Options values have been modified / saved to the database 
	$ess_options = get_option( "essential_options_item" );
	
	// Check based on the $array_name !
	if ( $ess_options["ess_themestatus"] == "set"){
		return ( isset( $ess_options[$array_name]) );	
	} else {
		return ( $activation == "1");		
	}
}





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * OUTGOING LINK TO MAIN SITE AT THE TOP MENU
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_outgoinglink_topmenu(){

	// Check whether the function should be executed or not
	if(ess_activation_checker("ess_outgoing_link_activate")):
		
		// Get Theme Options variable -> used if Theme Options values have NOT been modified / saved to the database yet
		// Get the default value of function
		global $ess_fields;
		$ess_outgoing_link_std = $ess_fields["ess_outgoing_link"]["std"];
	
		// Get Theme Options variable -> used if Theme Options values have been modified / saved to the database yet
		$ess_options = get_option("essential_options_item");
		
		// Set the URL: database or default variable? Has been saved or not?
		if (isset($ess_options["ess_outgoing_link"])){
			$outgoing_link = $ess_options["ess_outgoing_link"];	
		} else {
			$outgoing_link = $ess_outgoing_link_std;
		}
		
		// The function output to browser:
		?>
			<div id="top-menu">
				<div class="wrap">
					<a href="<?php echo $outgoing_link; ?>" id="visit-shop" title="<?php _e("Visit Our Shop", "essential"); ?>"><?php _e("Visit Our Shop", "essential"); ?></a>
				</div>
			</div>
	
		
		<?php
	endif;
}





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * HOMEPAGE TITLE
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_hometitle(){

	global $ess_fields;
	$ess_hometitle = $ess_fields["ess_hometitle"]["std"];

	$ess_options = get_option("essential_options_item");

	
	if (isset($ess_options["ess_hometitle"])) {
		$ess_hometitle = $ess_options["ess_hometitle"];
		echo $ess_hometitle;
	} else {
		echo $ess_hometitle;
	}
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * POST META
 * Make it reusable, don't repeat yourself
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_post_meta(){
	echo "<span>";
	echo "By: " . get_the_author_link();
	echo "</span>" . __('Posted in: ', 'essential');
	the_category(', ');
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * POST DATE
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_post_date(){
	echo '<div class="post-month">';
	the_time('M');
	echo '</div>';
	echo '<div class="post-date">';
	the_time('j');
	echo '</div>';
	echo '<div class="post-comment-popup">';
	comments_popup_link('0','1','%','post-comment-popup-link','off');
	echo '</div>';

}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * MORE FLEXIBLE CONTENT & EXCEPRT
 * 
 * The flaw of the_content() & the_excerpt() is you can not decide how many words you'd like to show
 * This function handle it
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}	
	
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}


function ess_content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}	
	
	$content = preg_replace("/<img[^>]+\>/i", "", $content);
	$content = apply_filters('the_content', $content); 
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * SHARE BUTTON
 *
 * Current buttons: feed, twitter, digg, facebook, delicious, stumbleupon, reddit
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_share_button(){
	if(ess_activation_checker("ess_sharebuttons_active")):
		
		// Get the current page link, encode it
		$share_link = urlencode(get_permalink());
		
		// Get the current page title
		$share_title = the_title('','',false);
		
		// The Titles of Buttons
		$share_feed = __("Subscribe to feed", "essential");
		$share_twitter = __("Tweet this page", "essential");
		$share_digg = __("Digg this page", "essential");
		$share_facebook = __("Share this page to Facebook", "essential");
		$share_delicious = __("Bookmark to Delicious", "essential");
		$share_stumbleupon = __("StumbleUpon this page", "essential");
		$share_reddit = __("Share to Reddit", "essential");
		
		// Browser's Output:
		echo'
		<div class="post-share">
		<ul>
			<li class="share-rss"><a href="' . get_bloginfo("rss_url") . '" title="' . $share_feed . '">' . $share_feed . '</a></li>
			<li class="share-twitter"><a href="http://twitter.com/share?url='. $share_link . '" title="' . $share_twitter . '">' . $share_twitter . '</a></li>
			<li class="share-digg"><a href="http://digg.com/submit?url=' . $share_link . '" title="' . $share_digg . '">' . $share_digg . '</a></li>
			<li class="share-facebook"><a href="http://www.facebook.com/sharer.php?u=' . $share_link . '" title="' . $share_facebook . '">' . $share_facebook . '</a></li>
			<li class="share-reddit"><a href="http://www.reddit.com/submit?url=' . $share_link . '" title="' . $share_reddit . '">' . $share_reddit . '</a></li>
			<li class="share-delicious"><a href="http://www.delicious.com/save?url=' . $share_link . '&title=' . $share_title . '" title="' . $share_delicious . '">' . $share_delicious . '</a></li>
			<li class="share-stumbleupon"><a href="http://www.stumbleupon.com/submit?url=' . $share_link .'&title=' . $share_title .'" title="' . $share_stumbleupon . '">' . $share_stumbleupon . '</a></li>
		</ul>
		</div>
		';
	endif;
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * TWEET THIS PAGE BUTTON
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_tweet_this($mode){
	// There are only two modes: "vertical" & "horizontal"
	if(ess_activation_checker("ess_tweetbutton_active")):
		echo'
		<div class="tweet-this">
			<a href="http://twitter.com/share" class="twitter-share-button" data-count="'. $mode .'">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
		</div>
		';
	endif;
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * FACEBOOK LIKE BUTTON
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_facebook_like(){
	if(ess_activation_checker("ess_facebooklike_active")):
		
		// Get the current link, encode it
		$share_link = urlencode(get_permalink());

		echo '
		<div class="facebook-like">
			<iframe src="http://www.facebook.com/plugins/like.php?href=' . $share_link . '&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:25px; margin:15px 0 0 0;" allowTransparency="true"></iframe>
		</div>
		';	
	endif;
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * AUTHOR BOX ON SINGLE / PAGE
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_author_box(){
	if(ess_activation_checker("ess_authorbox_active")):
		
		// Get the author email -> for Gravatar
		$author_email = get_the_author_meta('user_email');
		
		// Get the author description
		$author_description = get_the_author_meta('description');
		
		echo '
			<div class="post-author-box">
				<h2>' . __('Written by ', 'essential') . get_the_author_link() . '</h2>
				' . get_avatar($author_email, 60, '') . '
				<p>' . $author_description . '</p>
			</div>
		';
	endif;
}





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * RELATED POST BY CATEGORY
 *
 * Get current post category, show posts with similar category.
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_related_posts(){
	if(ess_activation_checker("ess_relatedposts_active")):

		// Get $post & $ess_fields variables
		global $post, $ess_fields;
		$ess_options = get_option("essential_options_item");
		
		// Determine whether $showposts uses database's or default value
		if(isset($ess_options["ess_relatedposts_showposts"])){
			$showposts = $ess_options["ess_relatedposts_showposts"];
		} else {
			$showposts = $ess_fields["ess_relatedposts_showposts"]["std"];
		}
		
		// Get current post category -> Make query based on it
		$categories = get_the_category($post->ID);
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		
			$args=array(
			    'category__in' => $category_ids,
			    'post__not_in' => array($post->ID),
			    'showposts'=>$showposts, // Number of related posts that will be shown.
			    'ignore_sticky_posts'=>1
		);
		
		// The custom query + browser output					
		$my_query = new wp_query($args);
		if( $my_query->have_posts() ) {
			echo '
			<div id="related-posts">
				<h2>Related Posts</h2>
				<ul>';
		    
				while ($my_query->have_posts()) {
				$my_query->the_post();
				?>
			
				<li><a href="<?php the_permalink(); ?>" title="view <?php the_title(); ?>"><?php the_title(); ?></a></li>
	
				<?php
				}

				echo '
				</ul>
			</div><!-- #related-posts -->
			';
			}
		}
		
		// Reset query
		wp_reset_query();
	endif;
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * PAGE NAVIGATION
 *
 * Taken from: http://wordpressapi.com/2010/12/08/wordpress-pagination-style-wordpress-plugin/ with few modifications
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_pagination($pages = '', $range = 4){
	
	if (!is_single() or !is_page()){	
		$showitems = ($range * 2)+1;
	 
		global $paged;
		if(empty($paged)) $paged = 1;
	 
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1;
			}
		}
	 
		if(1 != $pages){
			echo "<div class=\"ess-pagination\">";
			
			previous_posts_link(__('Previous', 'essential'), 0);
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
			if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
	 
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
				}
			}
			next_posts_link(__('Next', 'essential'), 0);
	 
		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
		echo "</div>\n";
		}
	}
	
}

// Add class to previous posts link
add_filter('previous_posts_link_attributes', 'ess_previous_posts_link_attributes');
function ess_previous_posts_link_attributes(){
	return 'class="previous-posts-link"';
}

// Add class to next posts link
add_filter('next_posts_link_attributes', 'ess_next_posts_link_attributes');
function ess_next_posts_link_attributes(){
	return 'class="next-posts-link"';
}






/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * COMMENTS & PINGS LISTING
 * --------------------------------------------------------------------------------------------------------------------------------
*/
add_filter('get_comments_number', 'ess_comment_count', 0);
function ess_comment_count( $count ) {
	global $id;
	$comments_by_type = &separate_comments(get_comments('post_id=' . $id));
	return count($comments_by_type['comment']);
}

function ess_list_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li id="comment-<?php comment_ID(); ?>">
		<?php comment_author_link(); ?>
		<span><?php comment_date('d m y'); ?></span>
	<?php
}

function ess_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">	
		<div id="div-comment-<?php comment_ID() ?>" class="comment-wrap">
			<div class="comment-wrap-inside">
				<div class="comment-avatar">
					<?php echo get_avatar($comment, 40, ''); ?>
				</div>
				<div class="comment-content the-content">
					<p class="comment-author"><strong><?php comment_author_link(); ?></strong> <em class="comment-date"> <?php printf( get_comment_time('d F Y')) ?><?php edit_comment_link(__('| Edit', 'essential'),'  ','') ?></em></p>
					<?php if ($comment->comment_approved == '0') : ?>
					<p><em><?php _e('Your comment will appear after being approved by admin.', 'essential') ?></em> </p>
					<?php endif; ?>
					<?php comment_text() ?>
					<?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'essential'), 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</div><!-- .comment-wrap -->
	<?php
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * COMMENT FORM
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_comment_form(){
	global $user_identity, $id;

	if ( ! comments_open() ) : ?>
	<div id="comment-closed">
		<h2><?php _e("Comment Closed", "essential"); ?></h2>
		<p><?php _e("Comment form is closed. You can contact me if you have something important to say about this topic.", "essential"); ?></p>
	</div>
	<?php elseif (comments_open()) : ?>

	<!-- Comment Form -->
	<div id="respond" class="comment-form">
		<div class="cancel-comment-reply"> 
			<?php cancel_comment_reply_link(); ?>
		</div>
		<h3 id="reply-title">
			<?php comment_form_title( 'Leave a Comment', 'essential' ); ?>
		</h3>

		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p class="comment-loggedin">
				You have to be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to be able to comment.
			</p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
			
			<?php if ( is_user_logged_in() ) : ?>
				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>			
			<?php else : ?>
				<p><label><?php _e("Name*", "essential"); ?></label><input type="text" name="author" class="comment-input" id="author" size="22" tabindex="1" <?php if (isset($req)) echo "aria-required='true'"; ?> /></p>
				<p><label><?php _e("Email*", "essential"); ?></label><input type="text" name="email"  class="comment-input" id="email" size="22" tabindex="2" <?php if (isset($req)) echo "aria-required='true'"; ?> /></p>
				<p><label><?php _e("Website", "essential"); ?></label><input type="text" name="url"  class="comment-input" id="url" size="22" tabindex="3"/></p>

			<?php endif; ?>
				<p id="comment-textarea-wrapper">
					<label><?php _e("Message*", "essential"); ?></label>
					<textarea name="comment" id="comment" rows="10" tabindex="4"></textarea>
				</p>
				<p id="required-field"><?php _e("* Required field", "essential"); ?></p>
				<p>
					<input name="submit" type="submit" id="submit" tabindex="5" value="&raquo; post comment" />
					<?php comment_id_fields(); ?>
				</p>
				<?php do_action('comment_form', isset($post->ID)); ?>
			</form>
		<?php endif; // If registration required and not logged in ?>
	</div>
	<?php endif;
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * FACEBOOK LINK
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_facebook_link(){
	global $ess_fields;
	$ess_facebook_link_default = $ess_fields["ess_facebook_username"]["std"];

	$ess_options = get_option("essential_options_item");
	
	if (isset($ess_options["ess_facebook_username"])){
		$ess_facebook_link = $ess_options["ess_facebook_username"];
	} else {
		$ess_facebook_link = $ess_facebook_link_default;
	}
	
	echo "http://facebook.com/" . $ess_facebook_link;
}




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * TWITTER LINK
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_twitter_link(){
	global $ess_fields;
	$ess_twitter_link_default = $ess_fields["ess_twitter_username"]["std"];

	$ess_options = get_option("essential_options_item");	

	if (isset($ess_options["ess_twitter_username"])){
		$ess_twitter_link = $ess_options["ess_twitter_username"];
	} else {
		$ess_twitter_link = $ess_twitter_link_default;
	}
	
	echo "http://twitter.com/" . $ess_twitter_link;
}



/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * WIDGETS
 * --------------------------------------------------------------------------------------------------------------------------------
*/
require_once ( get_template_directory() . '/functions/widgets.php' );





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * Theme Option
 * --------------------------------------------------------------------------------------------------------------------------------
*/
require_once ( get_template_directory() . '/functions/theme-options.php' );