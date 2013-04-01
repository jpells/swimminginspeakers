<?php
get_header();
?>
	<!-- begin content -->
	<div id="content" class="clearfix">
<!-- begin colLeft -->
<!-- begin col left -->
	<div id="colLeft" class="clearfix">		
		<?php 
		if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
			<!-- blog item -->

		<div class="posting">
				<div class="itemTitle clearfix">
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					
				</div><div class="entry">
				<?php the_content(); ?> 
				
			
		<!-- end blogItem -->
		
		<!-- Social Sharing Icons -->
		<div class="social">
			 <p>Did you like this article?<strong> Share it below!</strong></p>
				<div class="addthis_toolbox addthis_32x32_style addthis_default_style socials_btn">
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_google"></a>
    <a class="addthis_button_compact"></a>
</div>

			</div>
		
		<!-- end Social Sharing Icons -->
		
        <?php comments_template(); ?>
		<?php endwhile; else: ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?></div></div>
	

			</div>
			<!-- end col left -->
	
<!-- begin col right -->
		<div id="colRight" class="clearfix">
			<?php get_sidebar(); ?>	
		</div>
		<!-- end col right -->



<?php get_footer(); ?>
