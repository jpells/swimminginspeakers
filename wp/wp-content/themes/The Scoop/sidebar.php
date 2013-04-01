<div id="rightcol">

	<div class="cols1">
		
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-widget-area') ) : ?>

    <?php endif; ?>	
          
	</div>
  
</div>
<!--/rightcol -->

<div id="rightcol" class="center">
	<div class="cols">
		
		<?php if( get_option('mmcp_sidecat')  == '' ) { ?>
			<h2>Uncategorized</h2>
		<?php } else { ?>
		<h2><?php echo get_option('mmcp_sidecat'); ?></h2>
		<?php } ?> 

		<?php $inc = ( get_option('mmcp_sidecat') ? get_option('mmcp_sidecat') : 'uncategorized'); ?>

		<?php $sideposts = new WP_Query('category_name='. $inc .'&showposts=10'); ?> 
		<?php while ( $sideposts->have_posts()) : $sideposts->the_post(); ?>
		
		<?php if ( has_post_thumbnail() ) { ?> 
		
        	<div class="big_pic_shadow"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to 
			<?php the_title_attribute(); ?>" class="pic"> 
         		<?php the_post_thumbnail('single-post-thumbnail'); ?>
	  
          		</a>
		</div> 
        	<?php } ?>
        
        	<div class="cols-title">
	  		<h3><a href="<?php the_permalink(); ?>" rel="title" title="<?php the_title_attribute(); ?>"><?php 
			the_title(); ?></a></h3>
    			<div class="cats-2">
				<?php the_time('M. d, Y'); ?> / <a href="<?php the_permalink() ?>#comments" class="post-view" href="<?php the_permalink(); ?>" title="View <?php _e('Comments'); ?>" rel="category tag"><?php comments_number(0, 1, '%'); ?> <?php _e('Comments'); ?></a>
				
				</div>
			<p><?php echo excerpt(8); ?></p>
	 		
			
        	</div>
		
	  	
	  	
		<?php endwhile; ?>
          
	</div>
</div>

<div id="rightcol" class="center">

	<div class="cols">
		
		<?php if( get_option('mmcp_sidecat2')  == '' ) { ?>
			<h2>Uncategorized</h2>
		<?php } else { ?>
		<h2><?php echo get_option('mmcp_sidecat2'); ?></h2>
		<?php } ?> 

		<?php $inc = ( get_option('mmcp_sidecat2') ? get_option('mmcp_sidecat2') : 'uncategorized'); ?>

		<?php $sideposts = new WP_Query('category_name='. $inc .'&showposts=10'); ?> 
		<?php while ( $sideposts->have_posts()) : $sideposts->the_post(); ?>
		
		<?php if ( has_post_thumbnail() ) { ?> 
		
        	<div class="big_pic_shadow"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to 
			<?php the_title_attribute(); ?>" class="pic"> 
         		<?php the_post_thumbnail('single-post-thumbnail'); ?>
	  
          		</a>
		</div> 
        	<?php } ?>
        
        	<div class="cols-title">
	  		<h3><a href="<?php the_permalink(); ?>" rel="title" title="<?php the_title_attribute(); ?>"><?php 
			the_title(); ?></a></h3>
    			<div class="cats-2">
				<?php the_time('M. d, Y'); ?> / <a href="<?php the_permalink() ?>#comments" class="post-view" href="<?php the_permalink(); ?>" title="View <?php _e('Comments'); ?>" rel="category tag"><?php comments_number(0, 1, '%'); ?> <?php _e('Comments'); ?></a>
				
				</div>
			<p><?php echo excerpt(8); ?></p>
	 		
			
        	</div>
		
	  	
	  	
		<?php endwhile; ?>
          
	</div>
  
</div>
<!--/rightcol -->