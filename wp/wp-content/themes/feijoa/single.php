<? include ("header.php"); ?>


	<!-- ENTRY -->
	

	<div class="col2 entry">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


		<h2 class="entry-title"><?php the_title() ?></h2>


		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<div class="entry-content">
				<?php the_content(); ?>
			</div> <!-- end entry-content -->
			
		
			<div class="comment-data">
				<span class="sub"><?php the_time(__('d.m.y')) ?></span> 
			</div> <!-- end comment-data -->
			
		</div> <!-- end post -->

	</div> <!-- end col2 entry -->
	
	
	<!-- END ENTRY -->


	<?php comments_template(); ?>

	
	<?php endwhile; else: ?>
	

	<?php endif; ?>
	

<? include ("footer.php"); ?>