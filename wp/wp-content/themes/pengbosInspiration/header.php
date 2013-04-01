<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head>
		<title>
			<?php echo bloginfo('name');?>
		</title>
		<meta name="keywords" content="single web page, single page website, single page template, single page layout"/>
                <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
		<meta name="description" content="<?php bloginfo('description') ?>" />
                <meta name="theme_template_dir" content="<?php bloginfo('template_directory'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
                <!-- [favicon] begin -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
		<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
		<!-- [favicon] end -->

		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
		
		<!--[if IE]>
		        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css" type="text/css" media="screen, projection" />
		  <![endif]-->
		  
		<!-- Some hacks for the dreaded IE6 ;) -->
	    <!--[if lt IE 6]>
			<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie6.css" type="text/css" media="screen" />
			<script type="text/javascript">
				var clear="<?php bloginfo('template_url'); ?>/images/clear.gif";
			</script>
			<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/unitpngfix.js"></script>
		<![endif]-->
		<?php 
		wp_enqueue_script('jquery', '1.3.2');
		?> 
        <?php wp_head(); ?>
		<!-- Scripts -->
                <script type="text/javascript" charset="utf-8">jQuery.noConflict();</script>
                
		
    <!-- START FANCYZOOM -->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancyzoom.js"></script>
    <script type="text/javascript" charset="utf-8">
                var theme_template_dir = jQuery("meta[name=theme_template_dir]").attr('content');
		jQuery(document).ready(function($) {
			$('div.photo a').fancyZoom({scaleImg: true, directory:theme_template_dir+'/images/fancyzoom'});

		});
    </script>
    <!-- END FANCYZOOM -->

    <!-- START SCROLL -->
	<script src="<?php bloginfo('template_url'); ?>/js/scroll.js" type="text/javascript"></script>
	<!-- END SCROLL -->
	<script src="<?php bloginfo('template_url'); ?>/js/form-contact-validate.js" type="text/javascript"></script>
	<!-- START CUFON -->
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/dustismo_400.font.js"></script>
	<script type="text/javascript">
       Cufon.replace('h1,ul#nav,h2,h4', {
           hover: true,
           fontFamily: 'dustismo' 
       });
    </script>
	<!-- END CUFON -->

	</head>

<body id="home-page">
	
	<!-- START TOP FADE -->
    <div class="top-bg">&nbsp;</div>
    <!-- END TOP FADE -->
    
    <!-- START BOTTOM FADE -->
    <div class="bottom-bg">&nbsp;</div>
    <!-- END BOTTOM FADE -->
    
    <!-- START HEADER -->
    <div class="container_12">
        
        <!-- START NAVIGATION SECTION -->
        <div class="grid_3 alpha">
        
            <div class="fixed-column">
                
                <!-- START LOGO -->
                <a href="<?php echo get_settings('home'); ?>" title="home page">
                    <?php if(get_option("my_logo_url")):?>
                        <img src="<?php echo get_option("my_logo_url")?>" alt="logo" class="logo" />
                     <?php else:?>
                         <h2><?php bloginfo('name'); ?></h2>
                     <?php endif;?>
                </a>
                <!-- END LOGO -->
                
                <!-- START NAV -->
                <ul id="nav">
                    <li><a href="#home-page" title="Home page">home</a></li>
                    <li><a href="#about-page" title="about">about</a></li>
                    <li><a href="#portfolio-page" title="portfolio">portfolio</a></li>
                    <li><a href="#contact-page" title="contatti">contact</a></li>
                </ul>
                <!-- END NAV -->
                
                <!-- START FOLLOW ME -->
                <a href="http://twitter.com/<?php echo get_option("my_twitter_username");?>" title="follow me on twitter">
                    <img src="<?php bloginfo('template_url'); ?>/images/follow-me.gif" alt="follow-me" class="follow-me" />
                </a>
                <!-- END FOLLOW ME -->
                
                <!-- START SEND ME AN EMAIL -->
                <a href="mailto:<?php echo get_option('admin_email'); ?>" title="Send me an email">
                    <img src="<?php bloginfo('template_url'); ?>/images/send-mail.gif" alt="send mail" />
                </a>
                <!-- END SEND ME AN EMAIL -->
                
                <!-- START ADD ME ON SKYPE -->
                <a href="skype:<?php echo get_option("my_skype_username");?>?add" title="Add me on Skype">
                    <img src="<?php bloginfo('template_url'); ?>/images/add-on-skype.png" alt="add skype" />
                </a>
                <!-- END ADD ME ON SKYPE -->
                
                <!-- DO NOT REMOVE: START CREDITS -->
                <div class="credits">
                    <!--<a rel="license" href="http://creativecommons.org/licenses/by/2.5/it/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/2.5/it/80x15.png" /></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/" property="dc:title">Pengbo's</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.pengbos.com" property="cc:attributionName" rel="cc:attributionURL">Pengbo's</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/2.5/it/">Creative Commons Attribuzione 2.5 Italia License</a>.--> powered by
                    <a href="http://pengbos.com" title="Pengbo's Free Wordpress theme">
                         Pengbo's
                    </a>
                    <br/>
                    <!--<a rel="license" href="http://creativecommons.org/licenses/by/2.5/it/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/2.5/it/80x15.png" /></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/" property="dc:title">Your Inspiration Folio</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.yourinspirationweb.com" property="cc:attributionName" rel="cc:attributionURL">Your Inspiration Web</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/2.5/it/">Creative Commons Attribuzione 2.5 Italia License</a>.--> &
                    <a href="http://www.yourinspirationweb.com/en/free-website-template-present-your-portfolio-online-in-a-single-webpage/" title="The Community of Inspiration Dedicated to Webdesign">
                         YIW
                    </a>
                </div>
                <!-- END CREDITS -->
    
            </div>
        
        </div>
        <!-- END NAVIGATION SECTION -->
