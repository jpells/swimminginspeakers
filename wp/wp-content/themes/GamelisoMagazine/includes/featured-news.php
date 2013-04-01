<?php
	$slidecat = get_option('swt_slide_category2');
	$slidecount = get_option('swt_slide_count2');
?>
<div id="news">
  <ul>
        <?php
 	    $my_query = new WP_Query('category_name= '. $slidecat .'&showposts=4');
        while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
        ?>
    	<li>
              <h2 class="titlef"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title2('', '...', true, '20') ?></a></h2>

              <?php if ( function_exists( 'get_the_image' ) ) {
            get_the_image( array( 'custom_key' => array( 'post_thumbnail' ), 'default_size' => 'full', 'image_class' => 'alignleft', 'width' => '209', 'height' => '103' ) ); }
            ?>
      	   	  <p><?php truncate_post(190,true); ?></p>

      </li>
      <?php endwhile; ?>
	</ul>
  </div>