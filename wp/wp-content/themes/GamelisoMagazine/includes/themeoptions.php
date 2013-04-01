<?php
$themename = "SWT Theme";
$shortname = "swt";
$himg_dir = get_bloginfo('template_directory');
$sfirst_img = $himg_dir . '/images/howtoslide.png';
$mx_categories_obj = get_categories('hide_empty=0');
$mx_categories = array();
foreach ($mx_categories_obj as $mx_cat) {
	$mx_categories[$mx_cat->cat_ID] = $mx_cat->cat_name;
}
$categories_tmp = array_unshift($mx_categories, "Select a category:","Uncategorized" );
$number_entries = array("Select a Number:","1","2","3","4","5","6","7","8","9","10", "12","14", "16", "18", "20" );
$options = array (


array( "name" => $themename." Options",
       "type" => "title"),

    array( "name" => "Slider Settings",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "Enable/Disable Content Slider",
			"desc" => "To add images in the slider, you'll have to enable it first, then select sliding category and number of slides. Under post, thats under selected sliding category, enter new custom field 'slide' (without '' quotes), and then on the right side in the 'Value' leave the link to the image. Check <a href='$sfirst_img' target='_blank'>this image</a> to make sure you're doing good! Images are automatically resized, but try to upload similiar size's like on demo version of this theme, pic's wont loose their quality!",
            "id" => $shortname."_slider",
            "type" => "select",
            "std" => "Display",
            "options" => array("Display", "Hide")),

	array( 	"name" => "Sliding category",
			"desc" => "Select the category that will be displayed in the slider.",
			"id" => $shortname."_slide_category",
			"std" => "Uncategorized",
			"type" => "select",
			"options" => $mx_categories),

	array(	"name" => "Number of slides",
			"desc" => "Select the number of slides.",
			"id" => $shortname."_slide_count",
			"std" => "1",
			"type" => "select",
			"options" => $number_entries),


    array( "type" => "close"),


    array( "name" => "Featured News Settings",
           "type" => "section"),
    array( "type" => "open"),


	array(  "name" => "Enable/Disable Featured News",
			"desc" => "Select the featured news category!",
            "id" => $shortname."_news",
            "type" => "select",
            "std" => "Hide",
            "options" => array("Display", "Hide")),

	array( 	"name" => "Select News category",
			"desc" => "Select the category that will be displayed in the gallery.",
			"id" => $shortname."_slide_category2",
			"std" => "Uncategorized",
			"type" => "select",
			"options" => $mx_categories),


    array( "type" => "close"),


    array( "name" => "MyGallery Settings",
           "type" => "section"),
    array( "type" => "open"),


	array(  "name" => "Enable/Disable Mygallery",
			"desc" => "To add images in the gallery, you'll have to enable it first, then select gallery category and number of slides in the gallery. Under post, thats under selected sliding gallery category, enter new custom field 'thumbnail' (without '' quotes), and then on the right side in the 'Value' leave the link to the image. Check <a href='$sfirst_img' target='_blank'>this image</a> to make sure you're doing good! Images are automatically resized, but try to upload similiar size's like on demo version of this theme, pic's wont loose their quality! <b>P.S.</b> <u>On this image is written slide, but you should write thumbnail for the gallery to work, this is only example</u>!",
            "id" => $shortname."_gallery",
            "type" => "select",
            "std" => "Hide",
            "options" => array("Display", "Hide")),

	array( 	"name" => "Select Mygallery category",
			"desc" => "Select the category that will be displayed in the gallery.",
			"id" => $shortname."_slide_category1",
			"std" => "Uncategorized",
			"type" => "select",
			"options" => $mx_categories),

	array(	"name" => "Number of sliding panels in the gallery",
			"desc" => "Select the number of panels to display .",
			"id" => $shortname."_slide_count1",
			"std" => "6",
			"type" => "select",
			"options" => $number_entries),


    array( "type" => "close"),

	array(  "name" => "Follow and subscribe settings",
           "type" => "section"),
    array( "type" => "open"),

	array(  "name" => "Enable/Disable Follow us",
            "id" => $shortname."_follow",
            "type" => "select",
            "std" => "Display",
            "options" => array("Display", "Hide")),


   	array("name" => "Delicious url",
			"desc" => "Delicious url here (include http://).",
            "id" => $shortname."_delicious",
            "std" => "#",
            "type" => "text"),

   	array("name" => "Digg url",
			"desc" => "Digg url here (include http://).",
            "id" => $shortname."_diggs",
            "std" => "#",
            "type" => "text"),

   	array("name" => "Twitter url",
			"desc" => "Twitter url here (include http://).",
            "id" => $shortname."_twitt",
            "std" => "#",
            "type" => "text"),

   	array("name" => "Stumbleupon url",
			"desc" => "Stumbleupon url here (include http://).",
            "id" => $shortname."_stumble",
            "std" => "#",
            "type" => "text"),

   	array("name" => "Facebook url",
			"desc" => "Facebook url here (include http://).",
            "id" => $shortname."_facebook",
            "std" => "#",
            "type" => "text"),

	array("name" => "Your Feedburner Email Url",
			"desc" => "Enter your Feedburner email link here (include http://), or if you use some other service, enter their's url.",
            "id" => $shortname."_email",
            "std" => "#",
            "type" => "text"),

	array("name" => "Your Feedburner RSS Url",
			"desc" => "You can enter any other RSS url (include http://) here, doesn't need to be Feedburner's.",
            "id" => $shortname."_rss",
            "std" => "#",
            "type" => "text"),

    array( "type" => "close"),


array( "name" => "Additional Settings",
       "type" => "section"),
array( "type" => "open"),


 	array(  "name" => "Menu settings",
            "type" => "heading",
            "desc" => "Here you can exclude some of the links in the menus of theme.",
         ),

	array(  "name" => "Exclude pages",
			"desc" => "You can exclude some of the links in the pages menu (comma separated if more than one!).",
            "id" => $shortname."_pages",
            "std" => "",
            "type" => "text"),

       array("name" => "Custom Google Analytics Tracking Code",
            "desc" => "Enter your tracking code here for Google Analytics",
            "id" => $shortname."_custom_analytics_code",
            "type" => "textarea",
            "std" => "")
);

function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

	if ( 'save' == $_REQUEST['action'] ) {

		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

	header("Location: admin.php?page=themeoptions.php&saved=true");
die;

}
else if( 'reset' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); }

	header("Location: admin.php?page=themeoptions.php&reset=true");
die;

}
}

      add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/includes/admin/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/includes/admin/rm_script.js", false, "1.0");

}
function mytheme_admin() {

global $themename, $shortname, $options;
$i=0;

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>

<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>

<?php break;

case "close":
?>

</div>
</div>
<br />


<?php break;

case "title":
?>
<p>To easily use the <?php echo $themename;?>, you can use the menus below. <b>Check the README.TXT for instructions!</b></p>


<?php break;

case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>
<?php
break;

case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>

<?php
break;

case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;

case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break;
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/includes/admin/images/trans.gif" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">


<?php break;

}
}
?>

<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
 </div>


<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>