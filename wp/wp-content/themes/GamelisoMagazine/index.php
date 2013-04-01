<?php get_header(); ?>

<?php if (get_option('swt_slider') == 'Hide') { ?>
<?php { echo ''; } ?>
<?php } else { include(TEMPLATEPATH . '/includes/slide.php'); } ?>

<?php if (get_option('swt_news') == 'Hide') { ?>
<?php { echo ''; } ?>
<?php } else { include(TEMPLATEPATH . '/includes/featured-news.php'); } ?>

<?php if (get_option('swt_gallery') == 'Hide') { ?>
<?php { echo ''; } ?>
<?php } else { include(TEMPLATEPATH . '/includes/mygallery.php'); } ?>

<div id="contentwrap">


	<?php if (have_posts()) : ?>

      <?php $count = 0; ?>

		<?php while (have_posts()) : the_post(); ?>

        <div class="postwrap">

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">

                <?php if ( has_post_thumbnail() ) { ?>

               <div class="date"><?php the_time('M d, Y'); ?></div>
                <?php if ( function_exists( 'get_the_image' ) ) {
            get_the_image( array( 'custom_key' => array( 'imgbg' ), 'default_size' => 'full', 'image_class' => 'centriraj thumb', 'width' => '273', 'height' => '119' ) ); }
            ?>
                <?php } else {} ?>

					<?php the_content(''); ?>
				</div>
                <a class="more-link" href="<?php the_permalink() ?>#more">Read More</a>
			</div>


           </div>


          <?php if(++$counter % 2 == 0) : ?>

          <div class="clear"></div>

          <?php endif; ?>

		<?php endwhile; ?>

		<div class="navigation">
        <?php
            include('includes/wp-pagenavi.php');
            if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
        ?>
		</div>

	<?php else : ?>

    <div class="notfound">
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
    </div>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
