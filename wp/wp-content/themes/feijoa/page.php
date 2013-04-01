<? include ("header.php"); ?>


	<!-- CONTENT -->
	

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


		<div class="page-wrapper">
		
			<h2 class="entry-title"><?php the_title(); ?></h2>	
			<?php the_content(); ?>

		</div> <!-- end page-wrapper -->


	<?php endwhile; ?>


	<!-- END CONTENT -->
	
			
	<? include ("sidebar.php"); ?>
			
		
<? include ("footer.php"); ?>