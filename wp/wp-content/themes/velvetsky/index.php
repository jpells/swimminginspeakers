<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title>
		<?php
			if 	( is_home() )			{ bloginfo("name"); echo (' | '); bloginfo('description'); }
			elseif	( is_single() )			{ wp_title(''); }
			elseif	( is_page() || is_paged() ) 	{ bloginfo('name'); wp_title('|'); }
			elseif	( is_archive() )		{ _e('Archive for ', 'essential'); wp_title(''); }			
			elseif	( is_author() )			{ wp_title(__(' | Post written by ', 'essential'));	} 
			elseif	( is_search() )			{ echo __('Search results for "', 'essential') . $s . '"'; }
			elseif	( is_404() )			{ _e('Four-oh-Four', 'essential'); } 
			else 					{ _e('Are You Lost?', 'essential'); }
		?>
	</title>
	
	<?php if (is_home()) { ?>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
	<?php } ?>

	<meta name="robots" content="noodp,noydir" />
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="Shortcut Icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />

	
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' );}
		wp_head();
	?>

</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<?php ess_outgoinglink_topmenu(); ?>
		<div id="navigation">
			<div class="wrap">
				<?php if (is_home()) { ?>
					<h1 id="site-name"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php } else { ?>
					<h2 id="site-name"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h2>
				<?php } ?>
				<?php wp_nav_menu(array('theme_location' => 'top_nav')); ?>
				<form method="get" id="searchform" action="<?php echo get_option('home'); ?>">
					<input type="text" value="<?php _e("Search...", "essential"); ?>" name="s" id="s" onfocus="if (this.value == '<?php _e("Search...", "essential"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Search...", "essential"); ?>';}" />
					<input type="hidden" id="searchsubmit" value="<?php _e("Search", 'essential'); ?>" />
				</form>
			</div>
		</div>		
		<div id="header">
			<div class="wrap">
				<div id="site-info">
					
				</div>
			</div>
		</div>
		<div id="body">
			<div class="wrap">
				<div id="content">	
					
					<?php if (is_home() || is_category() || is_tag() || is_search()) { ?>
					<div class="content-title-wrap">
						<?php if (is_home()) { ?>
							<h2 id="content-title"><?php ess_hometitle(); ?></h2>
						<?php } elseif (is_category()) { ?>
							<h1 id="content-title"><?php _e('Posts categorized into ', 'essential'); ?> <em><?php echo single_cat_title(); ?></em> :</h1>			
						<?php } elseif (is_tag()) { ?>
							<h1 id="content-title"><?php _e('Posts tagged with ', 'essential'); ?> <em><?php echo single_tag_title(); ?></em> :</h1>
						<?php } elseif (is_search()) { ?>
							<h1 id="content-title"><?php _e('Search results for ', 'essential'); ?> <em><?php echo $s ?></em> :</h1>
						<?php } ?>
						<?php ess_pagination(); ?>
					</div>				
					<?php } ?>
					
					<?php get_template_part( 'loop', 'index' ); ?>
					
					<?php ess_pagination(); ?>				
					
				</div>
				<div id="sidebar">
					<ul id="sidebar-root">
					<?php dynamic_sidebar('Sidebar'); ?>
					</ul>
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="wrap">
				<div id="navigation-footer">
					<?php wp_nav_menu(array('theme_location' => 'bottom_nav' )); ?>
				</div><!-- #navigation-footer -->
				<div id="copyright">
					<p><?php _e('Copyright &copy;', 'essential'); echo date('Y '); bloginfo('name'); ?></p>
				</div>
				<div id="footer-follow">
					<a href="<?php ess_facebook_link(); ?>" id="footer-facebook" title="<?php _e('Like us on Facebook', 'essential'); ?>"><?php _e('Like us on Facebook', 'essential'); ?></a> <a href="<?php ess_twitter_link(); ?>" id="footer-twitter" title="<?php _e('Follow us on Twitter', 'essential'); ?>"><?php _e('Follow us on Twitter', 'essential'); ?></a>
				</div>
				<div id="credit">
					<p><?php _e('WordPress theme By:', 'essential'); ?></p>
					<a href="http://dapurpixel.com" title="DapurPixel" id="dapurpixel">DapurPixel</a>
				</div>
			</div>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>