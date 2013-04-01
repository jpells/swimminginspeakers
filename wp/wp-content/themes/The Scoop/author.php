<?php get_header(); ?>
<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
	
	$urlHome = get_bloginfo('template_directory');
?>

<div id="columns">

  <div id="centercol">
    
    <div class="box post">
   
      <div class="content">
       
     
      
        <div class="post-author">
          <div class="author-descr">
		     <?php
$avtr=get_the_author_meta('ID');
echo get_avatar( $avtr, $size = '80');
?>
		<h2><?php echo wp_title(''); ?></h2>
            <p><?php echo $curauth->user_description; ?></p>
            
          </div>
          <!--/author-descr --> 
        </div>
        <!--/post-author -->
        <div class="clr"></div>
	<div class="author-details"></div>
      </div>
    </div>
   <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div class="box post" id="post-<?php the_ID(); ?>">
      <div class="content">
	<?php if ( has_post_thumbnail() ) { ?>
        <div class="big_pic_shadow"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="small-home-image">
          <?php the_post_thumbnail('home-small'); ?>
          </a></div>
        <?php } ?>
        <!--/post-pic -->
	
        <div class="post-title-cats">
          <h2><a href="<?php the_permalink(); ?>" rel="title" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
            </a></h2>
        </div>
	<div class="cats-archives"><?php the_time('M. d, Y'); ?> / by <?php the_author_posts_link(); ?> / <a href="<?php the_permalink() ?>#comments" class="post-view" href="<?php the_permalink(); ?>" title="View <?php _e('Comments'); ?>" rel="category tag"><?php comments_number(0, 1, '%'); ?> <?php _e('Comments'); ?></a>

			</div>
        <!--/post-title -->
        
        <!--/post-date -->
    
        
        <div class="post-excerpt1">
          <?php the_excerpt(12); ?>
        </div>
        <!--/post-excerpt -->
        
        <div class="clr"></div>
      </div>
      <!--/content --> 
    </div>
    <!--/box -->
    <?php endwhile; ?>
    
        <ul>
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
    <?php endif; ?>
  </div>
  <!--/centercol -->
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!--/columns -->
<?php get_footer(); ?>
