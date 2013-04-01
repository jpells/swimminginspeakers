<?php get_header(); ?>

<!-- begin content -->

	<div id="content" class="clearfix">

	
			<!-- end box about -->
<!-- begin colLeft -->
		<div id="colLeft">
        <!-- begin SlideShow Here -->
    <?php if(get_option('cici_slide')=='yes'){?>
			<?php include (TEMPLATEPATH . '/slider.php'); ?>
	<?php }?> 
        <!-- end SlideShow Here -->
        <div class="clear2"></div>
		<!-- archive-title -->				
						<?php if(is_month()) { ?>
						<div id="archive-title">
						Browsing all articles from <strong><?php the_time('F, Y') ?></strong>
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						Browsing all articles in <strong><?php $current_category = single_cat_title("", true); ?></strong>
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						Browsing all articles tagged with <strong><?php wp_title('',true,''); ?></strong>
						</div>
						<?php } ?>
						<?php if(is_author()) { ?>
						<div id="archive-title">
						Browsing all articles by <strong><?php wp_title('',true,''); ?></strong>
						</div>
						<?php } ?>
					<!-- /archive-title -->
			<!-- begin blog item -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="blogItem <?php echo $odd_or_even; $odd_or_even = ('even-post'==$odd_or_even) ? 'clear' : 'even-post'; ?>">
			
				<div class="itemTitle clearfix">
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				</div>
                <div class="title_border"></div>
				<div class="clear"></div>
			<!--	<div class="metadata">
				In <?php the_category(', ') ?></div> -->
				<div class="clear"></div>
				<div class="entry">
				<?php imaj_image(); ?>
				<?php the_excerpt(20); ?> </div>
				
				</div>	
			<!-- end blog item -->
			<?php endwhile; ?>
            <div class="clear2"></div>

	<?php else : ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
		</div>
		<!-- end colLeft -->

<!-- begin colRight -->
		<div id="colRight" class="clearfix">	
			<?php get_sidebar(); ?>	
			</div>
<!-- end colRight -->

<?php get_footer(); ?>