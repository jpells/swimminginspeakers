</div>
<div id="nav-wrap"><!-- CATEGORY MENU -->
<div id="nav2"><!-- CATEGORY MENU -->
    <?php if ( has_nav_menu( 'secondary-menu' ) ) {   //checks if custom menu has been created
          wp_nav_menu( array( 'menu_class' => 'bot-menu', 'theme_location' => 'secondary-menu' ) );
	} else {// if not, old fashioned category menu will be loaded
	?>
    <ul class="bot-menu">
        <?php $cat = get_option('swt_categories');  ?>
        <li class="category_item <?php if(is_home()) { echo 'current-cat'; } ?>"><a href="<?php bloginfo('home'); ?>" id="home">Home</a></li>
     	<?php wp_list_categories ("title_li=&exclude=$cat" ); ?>
    </ul>
   <?php } ?>

  <?php if (get_option('swt_follow') == 'Hide') { ?>
  <?php { echo ''; } ?>
  <?php } else { include(TEMPLATEPATH . '/includes/follow.php'); } ?>
</div><!-- END CATEGORY MENU -->
</div><!-- END CATEGORY wrap -->
<div id="footer">
<!-- Please do not edit following code, it may cause your site to stop working! -->
<div class="alignleft">Copyright &copy; <?php the_time('Y'); ?>. All Rights Reserved. Designed by <a href="http://www.animalcarejobs.net/">Animal Care Jobs</a>.</div>
<div class="alignright">
<a href="http://www.indianamatch.com/meet/indianapolis-singles">Indianapolis Singles</a>&nbsp;
<a href="http://www.michigansingles.com/local/grand-rapids-singles">Grand Rapids Singles</a>&nbsp;
<a href="http://www.professionaldogsitters.com/">Dog Sitters</a>
</div>
</div>
<?php
 $code = get_option('swt_custom_analytics_code'); echo stripslashes($code);
?>
<?php wp_footer();?>
</body>
</html>