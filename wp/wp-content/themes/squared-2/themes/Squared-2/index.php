
<?php get_header(); ?>
<div id="slideshow"><?php wp_cycle(); ?></div>
<div id="featured"> 
<h2></h2>
	 <!-- Edit Below -->
	<?php query_posts('cat=1&showposts=2'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="front-post">
    <div class="featured-post">
        
        <div class="featured-image">
            <?php image_attachment('image', 290, 134); ?>
        </div>
    </div> <!-- END Featured-post -->
<div class="featured-title">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?>
</a></h2>
        
    <div class="postMeta-featured"><span class="date"><?php the_time('m-j-y') ?></span><!-- <span class="comments"><?php comments_popup_link('0', '1', '%'); ?></span> --></div> <div class="clear"></div></div>
     <div class="featured-content">
	 <?php the_excerpt(); ?>
	<p class="moretext"><a href="<?php the_permalink() ?>">Continue Reading...</a></p>	
    </div> <!-- END Featured-Content -->
   	</div> 
    <?php endwhile; ?>
    <!-- Edit Below 2 -->
    <?php query_posts('cat=1&showposts=1&offset=2'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="front-post-last"> <!-- Featured-Last -->
    <div class="featured-post">
        
        <div class="featured-image">
            <?php image_attachment('image', 290, 134); ?>
        </div>
    </div> <!-- END Featured-post -->
<div class="featured-title">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?>
</a></h2>
        
    <div class="postMeta-featured"><span class="date"><?php the_time('m-j-y') ?></span><!-- <span class="comments"><?php comments_popup_link('0', '1', '%'); ?></span> --></div> <div class="clear"></div></div>
     <div class="featured-content">
	 <?php the_excerpt(); ?>
	<p class="moretext"><a href="<?php the_permalink() ?>">Continue Reading...</a></p>	
    </div> <!-- END Featured-Content -->
    
   	</div> 
    <?php endwhile; ?>
</div> <!-- END Featured -->
<div class="clear"></div>


<div id="front-bottom">
	<div id="latest-wrap">
		<h2>From the Blog</h2>
			<div class="content">
			<!-- Edit Below 3 --> 
			<?php query_posts('cat=-ID&showposts=6'); ?>
				<?php while (have_posts()) : the_post(); ?>
    			<div class="latest-post-wrap">
    			<div class="latest-post">
                		<div class="latest-title">
           				 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        			</div>
        		<div class="latest-image">
            			<?php image_attachment('image', 205, 90); ?>
        		</div>
        		</div>
             <div class="latest-content">
             <div class="postMeta-front"><!-- <span class="comments"><?php comments_popup_link('0', '1', '%'); ?></span> --></div> <div class="clear"></div>
				<p><?php
  $excerpt = get_the_excerpt();
  echo string_limit_words($excerpt,15);
?></p>
		<p class="moretext"><a href="<?php the_permalink() ?>">Continue Reading...</a></p>	
    </div> 
        </div>
				<?php endwhile; ?> <!-- END -->

<div class="clear"></div>


<div id="front-middle">
<h2>Squared Extras</h2>
<div id="post-middle"><div class="middle-title"><h2>Twitter World</h2><?php twitter_messages('mikebrisk', 4); ?></div></div>
	
<div id="post-middle">
		<div class="middle-title">
			<h2>Inspirational Links</h2>
		</div>
		<div class="middle-text">
			<li><a href="http://www.briskstudios.com">Brisk Studios</a></li>
			<li><a href="http://www.thisisaaronslife.com/">Aaron Irizarry</a></li>
			<li><a href="http://www.cjgraphix.com/">Collin Robinson</a></li>
			<li><a href="http://www.janejohnsonphotography.com/">Jane Johnson</a></li>
			<li><a href="http://cagwindesign.com/">Josh Cagwin</a></li>
			<li><a href="http://www.thevisualclick.com/">Josh Hemsley</a></li>
			<li><a href="http://kylesteed.com/">Kyle Steed</a></li>
			<li><a href="http://www.chris-wallace.com">Chris Wallace</a></li>
		</div>
	</div>
		

	
	<div class="front-post-last"><h2>Newsletter Signup</h2></div>
 </div>

<div class="clear"></div>
</div></div> 
 <div class="clear"></div>
 </div>

 <div class="clear"></div>
 </div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>