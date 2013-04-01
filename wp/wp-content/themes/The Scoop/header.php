<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head profile="http://gmpg.org/xfn/11">
<title>
<?php if (is_home()) { ?>
<?php bloginfo('name'); ?>
-
<?php bloginfo('description'); ?>
<?php } else { ?>
<?php wp_title($sep = ''); ?>
-
<?php bloginfo('name'); ?>
<?php } ?>
</title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
<meta name="description" content="<?php bloginfo('description') ?>" />
<?php if(is_search()) { ?>
<meta name="robots" content="noindex, nofollow" />
<?php }?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>
<script type="text/javascript"
 src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // This is more like it!
  });
</script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/superfish.css" media="screen" />
<script type="text/javascript"> 
 
		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});
 
		</script>


</head>
<body>
<?php if (is_front_page()) { ?>
<div id="page_index">
<?php } else { ?>
<div id="page">
<?php } ?>


  <!--header-->
  <div id="header">
  <div class="block_top">
     <div class="search">
        <form method="get" id="searchform" action="">
          <fieldset id="search">
            <span>
            <input type="text" value="Search the archives" onclick="this.value='';" name="s" id="s" />
            <input name="searchsubmit" type="image" src="<?php bloginfo('template_url'); ?>/images/search.gif" value="Go" id="searchsubmit" class="btn"  />
            </span>
          </fieldset>
        </form>
      </div>
      <!--/searchform -->
     
      <div class="rss">

    	<a href="<?php echo get_option('mmcp_rss'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss_1.gif" alt="rss" width="16" height="16" border="0" /></a>
    	<a href="<?php echo get_option('mmcp_fb'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss_2.gif" alt="rss" width="16" height="16" border="0" /></a>
   	<a href="http://twitter.com/<?php echo get_option('mmcp_tt'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rss_6.gif" alt="rss" width="16" height="16" border="0" /></a> 
    </div>
     
      <div class="clr"></div>
    </div>
  
  
<div class="logo">
	<a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
	<?php if( $logo = get_option('mmcp_logo') ) { ?> 
		<a href="<?php echo get_option('home'); ?>"><img src="<?php echo $logo; ?>" style="border:none;float:left;"></a>
	<?php } else { ?> 
      <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png"/></a><h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></h1>
 	<?php }  ?> </a>
</div><!-- /logo-->

    	
	<?php if( $adimage = get_option('mmcp_adimage') ) { ?> 
		<a href="<?php echo get_option('mmcp_adurl'); ?>"><img src="<?php echo $adimage; ?>" style="border:none;float:right;" class="adver"></a>
	<?php } else { ?> 
      <img src="<?php bloginfo('template_directory'); ?>/images/banner.gif" class="adver">
 	<?php }  ?> 

      

    <div class="clr"></div>
    
	
		<?php wp_nav_menu( array(
	'container' => 'nav', /* default is 'div' */
	'container_class' => 'nav-header',
	'menu_class' => 'sf-menu', 
	'theme_location' => 'primary' 
	) )?><!--.header-nav-->

	
	<div class="clr"></div>
   

  <!--/header-->