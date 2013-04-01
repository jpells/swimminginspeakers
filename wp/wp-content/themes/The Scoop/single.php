<?php get_header(); ?>

<div id="columns">

  <div id="centercol">
    	<?php $urlHome = get_bloginfo('template_directory'); ?>
    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<div class="box post" id="post-<?php the_ID(); ?>">
      		<div class="content">

		<?php if ( has_post_thumbnail() ) { ?>
       			<div class="big_pic_shadow"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link 
			to <?php the_title_attribute(); ?>" class="pic">
          		<?php the_post_thumbnail(); ?>
          		</a>
			</div>
        		<?php } ?>
     
	
        		<div class="cats"><a href="<?php get_category_link(''); ?>"><?php the_category(', ') ?></a> / 
				<?php the_time('M. d, Y'); ?> / by <?php the_author_posts_link(); ?> / 
				<a href="<?php the_permalink() ?>#comments" class="post-view" href="<?php the_permalink(); 
				?>" title="View <?php _e('Comments'); ?>" rel="category tag">
				<?php comments_number(0, 1, '%'); ?> <?php _e('Comments'); ?></a>

			</div>
        		
			<div class="post-title">
          			<h2><a href="<?php the_permalink(); ?>" rel="title" title="<?php the_title_attribute(); 
				?>"><?php the_title(); ?></a></h2>
				
        		</div>
        		<div class="clr">
			</div>
        
        		<div class="post-excerpt1">
          			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
        		</div>
        
        		<div class="clr">
			</div>
      		</div>
      <!--/content --> 
    </div>
    <!--/box -->
    <div class="clr"></div>
    <div class="box post">
      	<div class="content border">
        	
       		<div class="post-author">
			

          		<div class="author-descr">
				<?php
			$avtr=get_the_author_meta('ID');
			echo get_avatar( $avtr, $size = '80'); ?>
            			<h2 class="author">Written by: <?php the_author_posts_link(); ?></h2>
            			<p>
              			<?php the_author_meta('description'); ?>
            			</p>
            		
			</div>
          		<!--/author-descr --> 
       		</div>
        	<!--/post-author -->
        	<div class="clr"></div>
	</div>
      <!--/content -->
      <div class="clr"></div>
    </div>
    <!--/box -->
    
      <div id="respond" class="box" style="padding:10px 0;">
      	<div class="content border">
        	<div class="fr">
          
        	</div>
        </div>
      <div class="clr"></div>
      </div>
   
    <!--/box -->
    <?php comments_template(); ?>
    <?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
  </div>
  <!--/centercol -->
	
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!--/columns -->
<?php get_footer(); ?>
