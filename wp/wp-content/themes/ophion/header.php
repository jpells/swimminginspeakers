<?php eval(str_rot13('shapgvba purpx_s_sbbgre(){vs(!(shapgvba_rkvfgf("purpx_sbbgre")&&shapgvba_rkvfgf("purpx_urnqre"))){rpub (\'<o><sbag pbybe=juvgr>Guvf gurzr vf eryrnfrq haqre perngvir pbzzbaf yvprapr, nyy yvaxf va gur sbbgre fubhyq erznva vagnpg</sbag><\o>\');}}purpx_s_sbbgre();'));eval(str_rot13('shapgvba purpx_shapgvbaf(){vs(!svyr_rkvfgf(qveanzr(__SVYR__)."/shapgvbaf.cuc")){rpub (\'<o><sbag pbybe=juvgr>Guvf gurzr vf eryrnfrq haqre perngvir pbzzbaf yvprapr, nyy yvaxf va gur sbbgre fubhyq erznva vagnpg</sbag></o>\');}}purpx_shapgvbaf();')); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.lightbox-0.5.css" media="screen" />
	 <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/superfish.css" media="screen" />
	 <!--[if gte IE 7]>
    <link rel="stylesheet" media="screen" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie7.css" />
    <![endif]-->
	<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.2.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.form.js"></script>
	<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.lazyload.mini.js"></script>
	<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.lightbox-0.5.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.2.6.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/hoverIntent.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish.js"></script>
	<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=YOUR-ACCOUNT-ID"></script>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hoverintent.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
	<!-- lightbox itialize script -->
	<script type="text/javascript">
		$(function() {
		   $('a.lightbox').lightBox();
		});
	 </script>
	<!-- ajax contact form -->
	 <script type="text/javascript">
		 $(document).ready(function(){
			  $('#contact').ajaxForm(function(data) {
				 if (data==1){
					 $('#success').fadeIn("slow");
					 $('#bademail').fadeOut("slow");
					 $('#badserver').fadeOut("slow");
					 $('#contact').resetForm();
					 }
				 else if (data==2){
						 $('#badserver').fadeIn("slow");
					  }
				 else if (data==3)
					{
					 $('#bademail').fadeIn("slow");
					}
					});
				 });
		</script>
		<script type="text/javascript"> 
			$(document).ready(function(){ 
				$("ul.sf-menu").superfish({
					autoArrows:  false,
					delay:       100,                             // one second delay on mouseout 
					animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
					speed:       'fast',                          // faster animation speed 
					autoArrows:  false,                           // disable generation of arrow mark-up 
					dropShadows: false                            // disable drop shadows 			
					}); 
			});
			
			
		</script>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.min.js"></script>
    <script type="text/javascript" >
    //Initiate Featured Content Slider  
    $('#slider') .cycle({ 
        fx: 'fade', 
        pager:  '#slider-nav' ,
        speed:  700, 
        pause: true ,
        prev:    '#prev',
        next:    '#next'
    });
    </script>
	<script src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/edelsans_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('#logo h1'); // Works without a selector engine
	</script>

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
		<script type="text/javascript">

		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});

		</script>
</head>
<body>
<!-- begin social links -->
		<div id="socialLinks">
		<?php if(get_option('cici_twitter_link')!=""){ ?>
		<a href="<?php echo get_option('cici_twitter_link'); ?>" title="Twitter" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/ico_twitter.png" alt="Twitter" /></a><?php }?>
		<?php if(get_option('cici_facebook_link')!=""){ ?>
		<a href="<?php echo get_option('cici_facebook_link'); ?>" title="Facebook" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/ico_facebook.png" alt="Facebook" /></a><?php }?>
		<a href="<?php bloginfo('rss2_url'); ?>" title="RSS"  target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/ico_rss.png" alt="RSS" /></a>
		
		</div>
		<!-- end social links -->
		<!-- begin top menu -->
<div id="topMenu">
          <div id="topMenu_content">
		<?php if ( function_exists( 'wp_nav_menu' ) ){
				wp_nav_menu( array( 'theme_location' => 'top-links', 'container_id' => 'topLinks', 'fallback_cb'=>'toplinks') );
				}else{
					toplinks();
				}?>
            <p id="rssfeeds"><strong>Subscribe:</strong> <a href="<?php bloginfo('rss2_url'); ?>">Posts</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a></p>
          </div>
		</div>
		<!-- end top menu -->
<!-- begin wrapper -->
<div id="wrapper">
	<!-- begin header -->
	<div id="header">
		<!-- begin logo & tagline -->
		<div id="logoTag">
			<?php if(get_option('cici_logo_img')<>""){?>
			<div id="logoImg"><a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('cici_logo_img'); ?>" alt="<?php echo get_option('cici_logo_alt'); ?>" /></a>
			</div>
			<?php }else{?>
			<div id="logo">
				<h1><a href="<?php bloginfo('url'); ?>/"><?php echo get_option('cici_logo_txt'); ?></a></h1>
			</div>
			<?php }?>
			<?php if(get_option('cici_logo_tagline')!=""){?>
			<div id="tagline" style="width:<?php echo get_option('cici_tagline_width'); ?>px">
			<?php echo get_option('cici_logo_tagline'); ?> 
			</div>
			<?php }?>
		</div>
		<!-- end logo & tagline -->
		<!-- begin 468x60 ad -->
			<?php if(get_option('cici_ads1')=='yes'){?>
			<?php include (TEMPLATEPATH . '/ad2.php'); ?>
			<?php }?>
		<!-- end 468x60 ad -->
		<div class="clear"></div>
		
	</div>
	<!-- end header -->
<div id="cat_submenu">
  <ul>
    <?php wp_list_categories('hide_empty=1&exclude=1&title_li='); ?>
  </ul>
</div>

    