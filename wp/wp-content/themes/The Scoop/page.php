<?php get_header(); ?>

<div id="columns">
  <div id="centercol">
	<div class="main-column-title">
<h2><?php echo wp_title(''); ?></h2>
</div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="box post full" id="post-<?php the_ID(); ?>">
      <div class="content border page-text">
        <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
        <!--/post-excerpt -->
      </div>
      <!--/content -->
    </div>
    <!--/box -->
    <?php endwhile; endif; ?>
  </div>
  <!--/centercol -->
  <?php get_sidebar(); ?>
  <div class="clr"></div>
</div>
<!--/columns -->
<?php get_footer(); ?>
