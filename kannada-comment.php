<?php
/*
Plugin Name: Kannada Comment
Plugin URI: http://www.prasannasp.net/kannada-comment-wordpress-plugin
Description: Let your fellow blog readers to write their comments in Kannada language. This plugin uses Google Transliteration API to transliterate input text to Kannada script in Wordpress comment form. Default input language is English. User has to press Ctrl+G or click on the Enable Transliterate button to type in Kannada.
Author: Prasanna SP
Version: 1.0
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

function kannada_comment() {
?>
<script type="text/javascript" src="http://www.google.com/jsapi">    
</script>    
<script type="text/javascript">      
         // Load the Google Transliteration API      
         google.load("elements", "1", {            
              packages: "transliteration"          
          });

      function onLoad() {
        var options = {
          sourceLanguage: 'en',            
          destinationLanguage: ['kn'],    
          shortcutKey: 'ctrl+g',   
          transliterationEnabled: false
        };
 
        var control =
            new google.elements.transliteration.TransliterationControl(options);

	var Text_Area=document.getElementsByTagName("textarea")[0].id;
        var ids = [Text_Area];
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
echo "<div id=\"kncomment\"><p class=\"kncomment-text\"><span id='translControl'></span>&nbsp;Click this button or press <strong>Ctrl+G</strong> to write your <strong>Comment</strong> in Kannada.</p></div>";
}

add_action('comment_form',  'kannada_comment');
add_action('comment_form_top',  'kannada_comment_switch');
?>