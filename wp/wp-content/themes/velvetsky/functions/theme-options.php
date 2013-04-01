<?php
/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * THEME OPTION SETUP
 *
 * More info about registering admin page: http://codex.wordpress.org/Function_Reference/register_setting
 * --------------------------------------------------------------------------------------------------------------------------------
*/
add_action( 'admin_init', 'ess_options_init' );
function ess_options_init(){
	register_setting( 'essential_options', 'essential_options_item', 'essential_options_validate' );
}

// Load up the Parent menu "Essential"
add_action( 'admin_menu', 'ess_options_add_page' );
function ess_options_add_page() {
	global $menu;
	
	// Create the new separator
	$essential_icon = get_bloginfo("template_url"). "/images/essential-icon.png";
	$menu['58.995'] = array( '', 'manage_options', 'separator-essential', '', 'wp-menu-separator' );
	
	// Create the new top-level Menu
	add_menu_page('Essential Options', 'Velvet Menu', 'edit_theme_options', 'essential_options', 'ess_options_page',  $essential_icon, '58.997');
}

// Hooking styling for Theme Option page
add_action('admin_head', 'ess_admin_header');
function ess_admin_header(){
	global $menu;
		if ((isset($_GET['page']) == 'essential_options') ) : ?>
		<style>
			#icon-essential_options{ background:url(<?php bloginfo("template_url"); ?>/images/essential-icon-title.png) no-repeat; }
			
			.essential-options .form-table	{background:#efefef; margin:0 0 40px 0;}
			.essential-options tr		{display:block; background:#f7f7f7; margin:10px;}
		</style>
	<?php 	endif;
}


/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * THEME OPTION INTERFACE BUILDER
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_options_page_frame($ess_fields){
	$ess_options = get_option("essential_options_item");
	foreach($ess_fields as $ess_field){
		switch	($ess_field['type']){
			case "opentable": ?>
			
				<table class="form-table">

			<?php break; case "closetable": ?>

				</table>			
			
			<?php break; case "subtitle": ?>
				
				<h3><?php _e( $ess_field['name'], 'essential' ); ?></h3>

			<?php break; case "checkbox": ?>
				
				<tr valign="top">
					<th scope="row">
						<?php _e( $ess_field['name'], 'essential' ); ?>
					</th>
					<td>
						<input id="essential_options_item[<?php echo $ess_field['id']; ?>]" name="essential_options_item[<?php echo $ess_field['id']; ?>]" type="checkbox" value="1" <?php if (isset($ess_options[$ess_field['id']])) { checked( '1', isset($ess_options[$ess_field['id']] )); } elseif (!isset($ess_options['ess_themestatus'])) { checked( '1', $ess_field['std']);} ?> />
						<label class="description" for="essential_options_item[<?php echo $ess_field['id']; ?>]"><?php _e( $ess_field['desc'], 'essential' ); ?></label>
					</td>
				</tr>

			<?php break; case "options": ?>
			
				<tr valign="top">
					<th scope="row">
						<?php _e( $ess_field['name'], 'essential' ); ?>
					</th>
					<td>
		
						
						<select name="essential_options_item[<?php echo $ess_field['id']; ?>]">
							<?php
								$selected = $ess_options[$ess_field['id']];
								$p = '';
								$r = '';

								foreach ( $ess_field['options'] as $option ) {
									$label = $option['label'];
									if (!isset($ess_options['ess_themestatus']) and $ess_field['std'] == $option['value'])
										$d = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";										
									elseif ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";
								}
								
								echo $d . $p . $r;
							?>
						</select>
						<label class="description" for="essential_options_item[<?php echo $ess_field['id']; ?>]"><?php _e( $ess_field['desc'], 'essential' ); ?></label>
					</td>
				</tr>

			<?php break; case "radio": ?>
			
				<tr valign="top">
					<th scope="row">
						<?php _e( $ess_field['name'], 'essential' ); ?>
					</th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( $ess_field['name'], 'essential' ); ?></span></legend>
						<?php
							foreach ( $ess_field['options'] as $option ) {
								
								if (!isset($ess_options[$ess_field["id"]]) && $option["value"] == $ess_field["std"]){
									$current_option = 'checked="checked"';
								}
								elseif (!isset($ess_options[$ess_field["id"]]) && $option["value"] != $ess_field["std"]) {
									$current_option = '';
								}
								elseif ($option["value"] == $ess_options[$ess_field["id"]]) {
									$current_option = 'checked="checked"';
								}
								else{
									$current_option = "";
								}							
								?>
									<label class="description"><input type="radio" name="essential_options_item[<?php echo $ess_field['id']; ?>]" value="<?php esc_attr_e( $option['value'] ); ?>" <?php echo $current_option; ?> /> <?php echo $option['label']; ?></label><br />
								<?php
								unset($current_option);
							}
						?>
						</fieldset>
					</td>
				</tr>			
			
			<?php break; case "text": ?>
			
				<tr valign="top">
					<th scope="row">
						<?php _e( $ess_field['name'], 'essential' ); ?>
					</th>
					<td>
						<input id="essential_options_item[<?php echo $ess_field['id']; ?>]" class="regular-text" type="text" name="essential_options_item[<?php echo $ess_field['id']; ?>]" value="<?php if (isset($ess_options[$ess_field['id']]) !== true) {echo stripslashes($ess_field['std']);} else {esc_attr_e( $ess_options[$ess_field['id']] );} ?>" />
						<label class="description" for="essential_options_item[<?php echo $ess_field['id']; ?>]"><?php _e( $ess_field['desc'], 'essential' ); ?></label>
					</td>
				</tr>
				
			<?php break; case "textarea": ?>
				
				<tr valign="top">
					<th scope="row">
						<?php _e( $ess_field['name'], 'essential' ); ?>
					</th>
					<td>
						<textarea id="essential_options_item[<?php echo $ess_field['id']; ?>]" class="large-text" cols="50" rows="5" name="essential_options_item[<?php echo $ess_field['id']; ?>]"><?php if ( $ess_options[$ess_field['id']] != "") { echo stripslashes($ess_options[$ess_field['id']]); } else { echo stripslashes($ess_field['std']); } ?></textarea>
						<label class="description" for="essential_options_item[<?php echo $ess_field['id']; ?>]"><?php _e( $ess_field['desc'], 'essential' ); ?></label>
					</td>
				</tr>

				<?php
			break;
		}
	}
}





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * ESSENTIAL THEME OPTION VARIABLES
 * --------------------------------------------------------------------------------------------------------------------------------
*/
$ess_fields = array(
	array(
		"type" => "subtitle",
		"name" => "Custom Scripts"
	),
						
	array(
		"type" => "opentable"
	),
						
	array(
		"type" => "textarea",
		"id" => "ess_script_wp_head",
		"name" => "Custom Script on <code>&lt;head&gt;</code>",
		"desc" => "You can paste your custom javascript / stylesheet like Google Analytics code here. It will be pulled through <code>wp_head()</code> hook.",
		"std" => ""
	),
						
	array(
		"type" => "textarea",
		"id" => "ess_script_wp_footer",
		"name" => "Custom Script on <code>&lt;footer&gt;</code>",
		"desc" => "You can paste your custom javascript / stylesheet like Google Analytics code here. It will be pulled through <code>wp_footer()</code> hook.",
		"std" => ""
	),
						
	array(
		"type" => "closetable"
	),
						
	array(
		"type" => "subtitle",
		"name" => "Global Settings"
	),
						
	array(
		"type" => "opentable"
	),
						
	"ess_outgoing_link_activate" => array(
		"type" => "checkbox",
		"id" => "ess_outgoing_link_activate",
		"name" => "Activate Outgoing link",
		"desc" => "Do you want to show outgoing link / link to the main site at the top of the site?",
		"std" => "1"
	),
						
	"ess_outgoing_link" => array(
		"type" => "text",
		"id" => "ess_outgoing_link",
		"name" => "Main Site Link",
		"desc" => "Type the URL to the 'main site'. ",
		"std" => "http://outstando.com/"
	),
																		
	"ess_hometitle" => array(
		"type" => "text",
		"id" => "ess_hometitle",
		"name" => "Homepage Title",
		"desc" => "Type the title of the homepage ",
		"std" => "Velvet Sky - Powered Blog"
	),

	"ess_twitter_username" => array(
		"type" => "text",
		"id" => "ess_twitter_username",
		"name" => "Twitter Username",
		"desc" => "Type this site's twitter username. Remember: The username only. ",
		"std" => "fikrirasyid"
	),
						
	"ess_facebook_username" => array(
		"type" => "text",
		"id" => "ess_facebook_username",
		"name" => "Facebook Username",
		"desc" => "Type this site's facebook page username. Remember: The username only. ",
		"std" => "fikri.rasyid.book"
	),
						
						
	array(
		"type" => "closetable"
	),
						
	array(
		"type" => "subtitle",
		"name" => "Post Settings"
	),
						
	array(
		"type" => "opentable"
	),
						
	"ess_relatedposts_active" => array(
		"type" => "checkbox",
		"id" => "ess_relatedposts_active",
		"name" => "Activate Related Posts",
		"desc" => "Do you want to show related posts on post?",
		"std" => "1"
	),
						
	"ess_relatedposts_showposts" => array(
		"type" => "options",
		"id" => "ess_relatedposts_showposts",
		"name" => "Related Posts",
		"desc" => "How many post you'd like to show on related post section?",
		"options" => array(
			'0' => array(
				'value' =>	'0',
				'label' => __( 'No Post', 'essential' )
				),
			'1' => array(
				'value' =>	'1',
				'label' => __( '1 Post', 'essential' )
				),
			'2' => array(
				'value' => '2',
				'label' => __( '2 Posts', 'essential' )
			),
			'3' => array(
				'value' => '3',
				'label' => __( '3 Posts', 'essential' )
			),
			'4' => array(
				'value' => '4',
				'label' => __( '4 Posts', 'essential' )
			),
			'5' => array(
				'value' => '5',
				'label' => __( '5 Posts', 'essential' )
			)
		),
		"std" => "2"
	),
						
	"ess_sharebuttons_active" => array(
		"type" => "checkbox",
		"id" => "ess_sharebuttons_active",
		"name" => "Activate Share Buttons",
		"desc" => "Do you want to show share buttons on post?",
		"std" => "1"
	),
						
	"ess_authorbox_active" => array(
		"type" => "checkbox",
		"id" => "ess_authorbox_active",
		"name" => "Activate Author Box",
		"desc" => "Do you want to show author box on post?",
		"std" => "0"
	),
	
	"ess_facebooklike_active" => array(
		"type" => "checkbox",
		"id" => "ess_facebooklike_active",
		"name" => "Activate Facebook Like Button",
		"desc" => "Do you want to show Facebook Like button on post?",
		"std" => "0"
	),
	
	"ess_tweetbutton_active" => array(
		"type" => "checkbox",
		"id" => "ess_tweetbutton_active",
		"name" => "Activate Tweet Button",
		"desc" => "Do you want to show Tweet button on post?",
		"std" => "1"
	),			

						
	array(
		"type" => "closetable"
	)
);




/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * THE ESSENTIAL THEME OPTIONS PAGE
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function ess_options_page() {
	
	// Get Theme Options Variable
	global $ess_fields;
	
	if (isset($_REQUEST['reset'])){
		reset_essential();
	}

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false;

	?>
	<div class="wrap essential-options">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Options', 'essential' ) . "</h2>"; ?>

		<?php if (isset($_REQUEST['reset'])): ?>
			<div class="updated fade"><p><strong><?php _e( 'Options Reset' ); ?></strong></p></div>		
		<?php  elseif (isset( $_GET['settings-updated']) == "true") : ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>
		
		<form method="post" action="options.php">
			<?php settings_fields( 'essential_options' ); ?>
			<?php $ess_options = get_option( 'essential_options_item' ); ?>
			
			
			<?php
				
				ess_options_page_frame($ess_fields);
			?>

			<input id="essential_options_item[ess_themestatus]" type="hidden" name="essential_options_item[ess_themestatus]" value="set" />
			<p class="submit">
				<input type="submit" name="update" class="button-primary" value="<?php _e( 'Save Options', 'essential' ); ?>" />
			</p>
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





/*
 * --------------------------------------------------------------------------------------------------------------------------------
 * Sanitation & Validation
 * --------------------------------------------------------------------------------------------------------------------------------
*/
function essential_options_validate( $inputs ) {
	foreach($inputs as $input){
		$inputs[] = wp_filter_nohtml_kses( $input );
	}
	return $inputs;
}

function reset_essential(){
	delete_option('essential_options_item');
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/