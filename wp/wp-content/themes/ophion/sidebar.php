<!-- begin box about -->



			<!-- begin colRightInner -->
			<!-- begin search box -->
			 <?php include (TEMPLATEPATH . '/searchform.php'); ?>
		<!-- end search box -->
			<div id="colRightInner"><?php if(get_option('cici_about_txt')!=""){?>
		<!--	<div id="boxAbout">
				<p><?php echo stripslashes(get_option('cici_about_txt')); ?></p>
			</div> -->


		<?php }?>
<h2>Advertising</h2>
<?php if(get_option('cici_ads')=='yes'){?>
<?php include (TEMPLATEPATH . '/ad1.php'); ?>
<?php }?>
<?php if(get_option('cici_videos')=='yes'){?>
<?php include (TEMPLATEPATH . '/video.php'); ?>
<?php }?>
<div class="clear2"></div>


<h2>Popular Articles</h2>
<ul class="popular">
<?php pp_popular_posts(4); ?>
</ul>


<h2>Flickr Photos</h2>
<div id="flickr">
<?php if (function_exists('get_flickrRSS')) get_flickrRSS(); ?>
</div>

<h2>TagCloud</h2>
<div class="tagcloud">
  <?php wp_tag_cloud( $args ); ?> 
</div>

<?php 
	/* Widgetized sidebar */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>			
<?php endif; ?>

   




			</div>
			<!-- end colRightInner -->
		</div>
		<!-- end colRight -->
