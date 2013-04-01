<!--/page --></div>
  <div id="footer">
      <div class="footer_resize">
	  <div class="footer-widget">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget-area') ) : ?>

    		<?php endif; ?>	
	  </div>
	  <div class="footer-widget1">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('2nd-footer-widget-area') ) : ?>

    		<?php endif; ?>	
	  </div>
	  <div class="footer-widget2">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('3rd-footer-widget-area') ) : ?>

    		<?php endif; ?>	
	  </div>
          <div class="text1">
		<ul>
			<li style="float:left;">&copy; Copyright <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> / All Rights Reserved.</li>
			<li style="float:right;"><a href="http://wpstyles.org">Premium WordPress Themes</a> / Theme by wpStyles.org</li>
			</div>
        <div class="clr"></div>
      </div>
    </div>
    <!--/footer -->
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/hoverIntent.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/superfish.js"></script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-<?php echo get_option('mmcp_google');?>");
pageTracker._initData();
pageTracker._trackPageview();
</script>



</body>
</html>