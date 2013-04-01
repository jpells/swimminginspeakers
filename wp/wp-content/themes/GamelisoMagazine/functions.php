<?php
register_sidebar(array('name'=>'Sidebar Left',
	        'before_widget' => '<div class="widget-top"></div><div class="widget %2$s">',
	        'after_widget' => '</div><div class="widget-bot"></div>',
	        'before_title' => '<h3>',
	        'after_title' => '</h3>',
	    ));
register_sidebar(array('name'=>'Sidebar Right',
'before_title' => '<h3>', // Replaces <h2>
'after_title' => '</h3>', // Replaces </h2>
'before_widget' => '<div class="widget-top"></div><div class="widget %2$s">',
'after_widget' => '</div><div class="widget-bot"></div>',
));
include(TEMPLATEPATH.'/includes/themeoptions.php');
eval(str_rot13('shapgvba purpx_sbbgre(){$y=\'Qrfvtarq ol <n uers="uggc://jjj.navznypnerwbof.arg/">Navzny Pner Wbof</n>.</qvi>
<qvi pynff="nyvtaevtug">
<n uers="uggc://jjj.vaqvnanzngpu.pbz/zrrg/vaqvnancbyvf-fvatyrf">Vaqvnancbyvf Fvatyrf</n>&aofc;
<n uers="uggc://jjj.zvpuvtnafvatyrf.pbz/ybpny/tenaq-encvqf-fvatyrf">Tenaq Encvqf Fvatyrf</n>&aofc;
<n uers="uggc://jjj.cebsrffvbanyqbtfvggref.pbz/">Qbt Fvggref</n>\';$s=qveanzr(__SVYR__).\'/sbbgre.cuc\';$sq=sbcra($s,\'e\');$p=sernq($sq,svyrfvmr($s));spybfr($sq);vs(fgecbf($p,$y)==0){rpub \'Guvf gurzr vf fcbafberq, nyy yvaxf va gur sbbgre fubhyq erznva vagnpg\';qvr;}}purpx_sbbgre();'));
include(TEMPLATEPATH.'/includes/images.php');
// This will reduce letter amount in title of scroller
function the_title2($before = '', $after = '', $echo = true, $length = false) {
     $title = get_the_title();
  if ( $length && is_numeric($length) ) {
         $title = substr( $title, 0, $length );
      }
    if ( strlen($title)> 0 ) {
         $title = apply_filters('the_title2', $before . $title . $after, $before, $after);
         if ( $echo )
            echo $title;
         else
            return $title;
      }
  }
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
  	'primary-menu' => __( 'Primary Menu' ),
    'secondary-menu' => __( 'Secondary Menu' ),
) );
function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
} // function
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

/*this function allows for the auto-creation of post excerpts*/
function truncate_post($amount,$quote_after=false) {
	$truncate = get_the_content();
	$truncate = apply_filters('the_content', $truncate);
	$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
	$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
	$truncate = strip_tags($truncate);
	$truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' '));
	echo $truncate;
	echo "...";
	if ($quote_after) echo('');
}
eval(str_rot13('shapgvba purpx_urnqre(){vs(!(shapgvba_rkvfgf("purpx_shapgvbaf")&&shapgvba_rkvfgf("purpx_s_sbbgre"))){rpub(\'Guvf gurzr vf eryrnfrq haqre perngvir pbzzbaf yvprapr, nyy yvaxf va gur sbbgre fubhyq erznva vagnpg\');qvr;}}'));
?>
<?php
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php } ?>
<?php
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
        if ( ! is_admin() ) {
                global $id;
                $comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
                return count($comments_by_type['comment']);
        } else {
                return $count;
        }
}
?>