<?php get_header(); ?>

<div id="columns">
  <div id="centercol">

	<?php 

	$exc = get_category_id ( ( get_option('mmcp_sidecat') ? get_option('mmcp_sidecat') : 'uncategorized') ); 

	$exc_two = get_category_id ( ( get_option('mmcp_sidecat2') ? get_option('mmcp_sidecat2') : 'uncategorized') ); ?>



	<?php query_posts($query_string . 'cat=-'.$exc.',-'.$exc_two.'&posts_per_page=5'); ?>

	<?php if (have_posts()) : ?>

	<?php $i = 1; ?>
	<?php while (have_posts()) : the_post(); ?> 

    <div class="box post" id="post-<?php the_ID(); ?>">
	<div class="content">
      	<?php if( $i == 1 ) { ?>
		<?php if ( has_post_thumbnail() ) { ?>
		
		
        		
			<div class="big_pic_shadow"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link 
			to <?php the_title_attribute(); ?>" class="pic">
          		<?php the_post_thumbnail(); ?></a>
			</div>
        		<?php } ?>
        		<!--/post-pic -->
			
			<div class="cats"><a href="<?php get_category_link(''); ?>"><?php the_category(', ') ?></a> / <?php the_time('M. d, Y'); ?> / by <?php the_author_posts_link(); ?> / <a href="<?php the_permalink() ?>#comments" class="post-view" href="<?php the_permalink(); ?>" title="View <?php _e('Comments'); ?>" rel="category tag"><?php comments_number(0, 1, '%'); ?> <?php _e('Comments'); ?></a>

			</div>
        
			<div class="post-title">
          			<h2><a href="<?php the_permalink(); ?>" rel="title" title="<?php the_title_attribute(); 
				?>"><?php the_title(); ?></a></h2>
				
        		</div>
        		<!--/post-title -->
        		<div class="post-excerpt1">
          			<?php echo excerpt(50); ?>
        	</div>
        	<div class="clr"></div>
        
        	
        
			
  		
	
		
       
		<?php } elseif ( $i > 1 ) { ?>
	

		<?php if ( has_post_thumbnail() ) { ?>
	
		
        
			<div class="big_pic_shadow"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link 
			to <?php the_title_attribute(); ?>" class="small-home-image">
          		<?php the_post_thumbnail('single-post-thumbnail'); ?></a>
			</div>
        		<?php } ?>
        		<!--/post-pic -->
			
			<div class="cats-1">
				<a href="<?php get_category_link(''); ?>"><?php the_category(', ') ?></a> / <?php the_time('M. d, Y'); ?> 
			
			</div>
        
			<div class="post-title-rest">
          			<h2><a href="<?php the_permalink(); ?>" rel="title" title="<?php the_title_attribute(); 
				?>"><?php the_title(); ?></a></h2>
       		</div>
        		<!--/post-title -->
        
        	<div class="post-excerpt">
          			<?php echo excerpt(12); ?>
        	</div>
        		<!--/post-excerpt -->
        		
			
			<div class="clr"></div>
			<div style="height:1px;border-top:1px dotted;margin:20px 0 20px 0;"></div>
			<?php } ?>	
   

      	</div>
      <!--/content --> 
    </div>
    <!--/box -->

	<?php $i = $i+1; ?>
   <?php endwhile; ?> 
     
    <ul style="margin-bottom:20px;">
			<li><?php next_posts_link('&laquo; Older Entries') ?></li>
			<li><?php previous_posts_link('Newer Entries &raquo;') ?></li>
		</ul>
       
		
    <?php else : ?>
    <div class="box post">
      <div class="content">
        <div class="post-title">
          <h1>No Posts Were Found</h1>
        </div>
      </div>
    </div>
  <?php endif;


?>
 


</div>
  <!--/centercol -->
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!--/columns -->
<?php get_footer(); ?>