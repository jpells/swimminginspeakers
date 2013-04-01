<?php
	$slidecat = get_option('swt_slide_category1');

	$slidecount = get_option('swt_slide_count1');

$my_query = new WP_Query('category_name= '. $slidecat .'&showposts='.$slidecount.'');
if($my_query->have_posts()):
?>
	<script type="text/javascript">
	stepcarousel.setup({
		galleryid: 'mygallery2', //id of carousel DIV
		beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
		panelclass: 'panel', //class of panel DIVs each holding content
		panelbehavior: {speed:500, wraparound:true, persist:true},
		defaultbuttons: {enable: false},
		statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
		contenttype: ['external'] //content setting ['inline'] or ['external', 'path_to_external_file']
	})
	</script>

	<div id="mygallery2" class="stepcarousel">
		<div class="belt">
		<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>
			<div class="panel">
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" > <img src="<?php echo get_post_meta($post->ID,'thumbnail', true); ?>" width="150" height="120" alt="<?php the_title(); ?>"/> </a>
			</div>
		<?php endwhile; ?>
		</div>
    	<a class="prev" href="javascript:stepcarousel.stepBy('mygallery2', -1)"></a>
	<a class="next" href="javascript:stepcarousel.stepBy('mygallery2', 1)"></a>
	</div><!-- /mygallery -->
<?php endif; ?>

<div style="clear:both"></div>