<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="featured-blog"> 
<h2>Squared 2 Blog</h2>
	 <!-- Edit Below -->
	<?php query_posts('cat=ID&showposts=-1'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="front-post-page">
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






<div class="clear"></div>
</div></div> 
 <div class="clear"></div>
 </div>

 <div class="clear"></div>
 </div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
