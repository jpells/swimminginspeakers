<? include ("header.php"); ?>


		<!-- ENTRIES -->


		<div id="secondary" class="wrap">
		

			<?php while ( have_posts() ) : the_post() ?>
			
			
				<div class="box col1">
				
				
					<div id="post-<?php the_ID(); ?>" class="entry">
					
					
						<div class="entry-content" onclick="location.href='<?php the_permalink() ?>';" onkeypress="location.href='<?php the_permalink() ?>';" style="cursor: pointer;">
						
						
							<h2 class="entry-title-index"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
							
							
							<div class="meta-data">
								 <span class="entry-date"><?php the_time(__('d.m.y')) ?><br />
								<?php comments_popup_link(__('Kommentar (0)'), __('Kommentare (1)'), __('Kommentare (%)')); ?></span>
							</div> <!-- end meta-data -->
				
				
							<?php the_content('(...)'); ?>
					
					
						</div> <!-- end entry-content -->
				
				
					</div> <!-- end post-xy -->
		
		
				</div> <!-- end box col1 -->
			

			<?php endwhile; ?>
			

		<!-- END ENTRIES -->
		
		
		<!-- NEXT / PREVIOUS LINKS -->			
			
			<div class="box col1">
				<?php next_posts_link('&larr;', '0') ?> <?php previous_posts_link('&rarr;', '0') ?>
			</div>
			
		<!-- END NEXT / PREVIOUS LINKS -->


		</div> <!-- end secondary wrap -->
	
		
		<? include ("sidebar.php"); ?>
			
		
<? include ("footer.php"); ?>