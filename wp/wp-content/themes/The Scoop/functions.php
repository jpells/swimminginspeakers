<?php

// WP3 menus
register_nav_menus( array(
	'primary' => __( 'Header Navigation', '' ),
) );



// Enable post thumbnails
if ( function_exists('add_theme_support') ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 426, 268, true ); // Normal post thumbnails
	add_image_size( 'single-post-thumbnail', 158, 99, true ); // Permalink thumbnail size
	add_image_size( 'home-small', 175, 130, true ); // Home Small
}



if ( function_exists('register_sidebar') ) {
   register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar-widget-area',
		'before_widget' => '<div id="%1$s" class="box1 widget %2$s">',
		'before_title' => '<div class="wtitle"><h2>',
		'after_title' => '</h2></div><!--/wtitle --><div class="content">',
		'after_widget' => '</div><!--/content --></div><!--/box -->',       
   ));

   register_sidebar(array(
		'name' => 'Footer Widget Area 1',
		'id' => 'footer-widget-area',
		'before_widget' => '<div id="%1$s" class="box1 widget %2$s">',
		'before_title' => '<div class="wtitle"><h2>',
		'after_title' => '</h2></div><!--/wtitle --><div class="content">',
		'after_widget' => '</div><!--/content --></div><!--/box -->',       
   ));

   register_sidebar(array(
		'name' => 'Footer Widget Area 2',
		'id' => '2nd-footer-widget-area',
		'before_widget' => '<div id="%1$s" class="box1 widget %2$s">',
		'before_title' => '<div class="wtitle"><h2>',
		'after_title' => '</h2></div><!--/wtitle --><div class="content">',
		'after_widget' => '</div><!--/content --></div><!--/box -->',       
   ));

   register_sidebar(array(
		'name' => 'Footer Widget Area 3',
		'id' => '3rd-footer-widget-area',
		'before_widget' => '<div id="%1$s" class="box1 widget %2$s">',
		'before_title' => '<div class="wtitle"><h2>',
		'after_title' => '</h2></div><!--/wtitle --><div class="content">',
		'after_widget' => '</div><!--/content --></div><!--/box -->',       
   ));
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}


/**
 * add a default-gravatar to options
 */
if ( !function_exists('fb_addgravatar') ) {
	function fb_addgravatar( $avatar_defaults ) {
		$myavatar = get_bloginfo('template_directory') . '/images/avatar.gif';
		$avatar_defaults[$myavatar] = 'people';
 
		$myavatar2 = get_bloginfo('template_directory') . '/images/myavatar.png';
		$avatar_defaults[$myavatar2] = 'wpengineer.com';
 
		return $avatar_defaults;
	}
 
	add_filter( 'avatar_defaults', 'fb_addgravatar' );
}

?>
<?php

/**
 * 
 */
 
//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");  

function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}



$themename = "The Scoop Theme";
$shortname = "mmcp";
$options = array (


array(    "name" => "Theme Options Page",
        "type" => "title"),

array(    "type" => "open"),

array(  "name" => "Logo",
        "desc" => "Enter a path to your logo file, recommended size 300x100",
        "id" => $shortname."_logo",
        "std" => "",
        "type" => "text"),
		
array(  "name" => "Google Analytics",
        "desc" => "Enter the google analytics number after the UA-",
        "id" => $shortname."_google",
        "std" => "",
        "type" => "text"),

array(  "name" => "Banner Image",
        "desc" => "Add the url to the banner image",
        "id" => $shortname."_adimage",
        "std" => "",
        "type" => "text"),

array(  "name" => "Banner Link",
        "desc" => "Add the url to your landing page",
        "id" => $shortname."_adurl",
        "std" => "",
        "type" => "text"),
		
array(  "name" => "Twitter Username",
        "desc" => "Enter your Twitter username",
        "id" => $shortname."_tt",
        "std" => "",
        "type" => "text"),
                                        
array(  "name" => "Facebook Link",
        "desc" => "Enter the complete url to your FB Fan",
        "id" => $shortname."_fb",
        "std" => "",
        "type" => "text"), 

array(  "name" => "Feedburner Link",
        "desc" => "Enter the complete url to your Feedburner feed",
        "id" => $shortname."_rss",
        "std" => "",
        "type" => "text"), 
                                        
array(	"name" => "Sidebar Category",
			"desc" => "Select a category for the sidebar posts - this category will be excluded from main posts.",
			"id" => $shortname."_sidecat",
			"std" => "Select a category:",
			"type" => "select",
			"options" => $of_categories),
		
array(	"name" => "Second Sidebar Category",
			"desc" => "Select a category for the post in the second sidebar - this category will also be excluded from main posts.",
			"id" => $shortname."_sidecat2",
			"std" => "Select a category:",
			"type" => "select",
			"options" => $of_categories),

		

array(    "type" => "close")

);




function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {
    
        if ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] =='save' ) {

                foreach ($options as $value) {
                	if( isset( $value['id'] ) ) {
                  	update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
                	}
                }

                foreach ($options as $value) {
                    if( isset( $value['id'] ) ) { 
                    		update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } 
                    else {
                    		if( isset( $value['id'] ) ) { 
                    			delete_option( $value['id'] );
                    		} 
                   	} 
               }

                header("Location: themes.php?page=functions.php&saved=true");
                die;
 
        } else if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] =='reset' ) {

            foreach ($options as $value) {
            	if( isset( $value['id'] ) ) {
                delete_option( $value['id'] ); }
                }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( isset( $_REQUEST['saved'] ) && $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( isset( $_REQUEST['reset'] ) && $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
	
	
	?>
<div class="wrap">
<img style="float:left;margin:10px 10px 0 0;" src="<?php bloginfo('template_url'); ?>/images/logo.png"/><h2 style="color:#000;margin-top:10px;font-family: Times, Times New Roman, Georgia;font-weight: bold; text-shadow: 1px 1px #FFF;"><?php echo $themename; ?> Options Page</h2>
<p style="width:600px;margin:0 0 20px 0; padding: 0;">It is here, at the theme's options page, you can change the available settings. Below you'll have the power to add a banner, set categories for the side columns, add your social media details, add you analytics code, and change the logo.</p>
<div class="clear"></div>
<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style="color: #000;background-color:#FFF; padding:10px; border: 1px solid #E3E3E3;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        
        
		<?php break;
		
		case "title":
		?>
		
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
            $_REQUEST['action']
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
       </tr>
                
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php break;  
} 
}
?>

        </table><br />
<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php }

add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php
/* blast you red baron! */
require_once (ABSPATH . WPINC . '/http.php');
?>