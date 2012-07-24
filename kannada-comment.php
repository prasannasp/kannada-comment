<?php
/*
Plugin Name: Kannada Comment
Plugin URI: http://www.prasannasp.net/kannada-comment-wordpress-plugin
Description: Let your fellow blog readers to write their comments in Kannada language. This plugin uses Google Transliteration API to transliterate input text to Kannada script in Wordpress comment form. Admins can choose the default language on options page. User can press Ctrl+G to toggle between Kannada and English.
Author: Prasanna SP
Version: 2.0
Author URI: http://www.prasannasp.net/
*/

/*  This file is part of Kannada Comment plugin, a Wordpress plugin written in PHP using Google 	 Transliteration API. Copyright 2012 Prasanna SP (email: prasanna@prasannasp.net)

    Kannada Comment is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Kannada Comment is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Kannada Comment.  If not, see <http://www.gnu.org/licenses/>.
*/

// Lets define the defaults first
function kncm_add_defaults() {
	$tmp = get_option('kncm_options');
		$arr = array(	"lang_select" => "true",
				"toggle_switch_place" => "comment_form_top",
				"comment_switch_txt" => "Click this button or press <strong>Ctrl+G</strong> to toggle between Kannada and English"
		);
		update_option('kncm_options', $arr);
}

// Main function
function kannada_comment() {
	$options = get_option('kncm_options');
	$language = $options['lang_select'];
?>

<script type="text/javascript" src="http://www.google.com/jsapi">    
</script>    
<script type="text/javascript">      
         // Load the Google Transliteration API      
         google.load("elements", "1", {            
              packages: "transliteration"          
          });
          
        var lang = <?php echo $language; ?>;

      function onLoad() {
        var options = {
          sourceLanguage: 'en',            
          destinationLanguage: ['kn'],    
          shortcutKey: 'ctrl+g',   
          transliterationEnabled: lang
        };
 
        var control =
            new google.elements.transliteration.TransliterationControl(options);
       
	// Enable transliteration in comment form textarea. id = comment		
		var ids = ["comment"];	
        control.makeTransliteratable(ids);

	// Show the transliteration control which can be used to toggle between
        // English and Kannada.
        control.showControl('translControl');
      }

      google.setOnLoadCallback(onLoad);
</script>

<?php
}
function kannada_comment_switch() {
	$options = get_option('kncm_options');
	$switchtxt = $options['comment_switch_txt'];

echo "<div id=\"kncomment\"><p class=\"kncomment-text\"><span id='translControl'></span>&nbsp;$switchtxt</p></div>";
}

function kncm_init(){
	register_setting( 'kncm_plugin_options', 'kncm_options' );
}

// Add menu page
function kncm_add_options_page() {
	add_options_page('Kannada Comment Options Page', 'Kannada Comment', 'manage_options', __FILE__, 'kncm_options_form');
}

// Plugin options form
function kncm_options_form() {
	?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<h2>Kannada Comment Plugin Options</h2>

		<form method="post" action="options.php">
			<?php settings_fields('kncm_plugin_options'); ?>
			<?php $options = get_option('kncm_options'); ?>

			<table class="form-table">

				<tr valign="top">
					<th scope="row">Default Language</th>
					<td>
						<label><input name="kncm_options[lang_select]" type="radio" value="true" <?php checked('true', $options['lang_select']); ?> /> Kannada </label><br />

						<label><input name="kncm_options[lang_select]" type="radio" value="false" <?php checked('false', $options['lang_select']); ?> /> English </label><br />
					</td>
				</tr>

				<tr>
					<th scope="row">Language Switch Title</th>
					<td>
						<input type="text" size="75" name="kncm_options[comment_switch_txt]" value="<?php echo $options['comment_switch_txt']; ?>" />
					</td>
				</tr>
				
				<tr valign="top">
					<th scope="row">Place of the language toggle box</th>
					<td>
						<!-- comment_form_before -->
						<label><input name="kncm_options[toggle_switch_place]" type="radio" value="comment_form_before" <?php checked('comment_form_before', $options['toggle_switch_place']); ?> /> Before comment form</label><br />

						<!-- comment_form_top -->
						<label><input name="kncm_options[toggle_switch_place]" type="radio" value="comment_form_top" <?php checked('comment_form_top', $options['toggle_switch_place']); ?> /> Top of the comment form, before name and email fields</label><br />

						<!-- comment_form -->
						<label><input name="kncm_options[toggle_switch_place]" type="radio" value="comment_form" <?php checked('comment_form', $options['toggle_switch_place']); ?> /> Within comment form, after comment text area</label><br />

						<!-- comment_form_after -->
						<label><input name="kncm_options[toggle_switch_place]" type="radio" value="comment_form_after" <?php checked('comment_form_after', $options['toggle_switch_place']); ?> /> After the comment form</label>
					</td>
				</tr>
			
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php	
}

// Display a Settings link on the main Plugins page
function kncm_plugin_action_links( $links, $file ) {

	if ( $file == plugin_basename( __FILE__ ) ) {
		$kncm_links = '<a href="'.get_admin_url().'options-general.php?page=kannada-comment/kannada-comment.php">'.__('Settings').'</a>';
		array_unshift( $links, $kncm_links );
	}

	return $links;
}

// Change the place of transliteration controller according to user settings
function kannada_comment_switch_hook() {
	$options = get_option('kncm_options');
	$switchplace = $options['toggle_switch_place'];

if ( $switchplace == comment_form )

add_action('comment_form', 'kannada_comment_switch');

elseif ( $switchplace == comment_form_before )
add_action('comment_form_before', 'kannada_comment_switch');

elseif ( $switchplace == comment_form_after )
add_action('comment_form_after', 'kannada_comment_switch');

else 

add_action('comment_form_top', 'kannada_comment_switch');
}

// Lets call the Transliteration control function
kannada_comment_switch_hook();

// Set-up Action and Filter Hooks
register_activation_hook(__FILE__, 'kncm_add_defaults');
add_action('admin_init', 'kncm_init' );
add_action('admin_menu', 'kncm_add_options_page');
add_filter('plugin_action_links', 'kncm_plugin_action_links', 10, 2 );
add_action('comment_form', 'kannada_comment');
?>
