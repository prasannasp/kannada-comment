=== Kannada Comment ===
Contributors: prasannasp
Donate link: http://www.prasannasp.net/
License: GPLv3
License URI: http://www.gnu.org/copyleft/gpl.html
Tags: kannada, comment, language, unicode, google transliteration, india
Requires at least: 3.1
Tested up to: 3.4 Beta 1
Stable tag: 1.0

Let your fellow blog readers to write their comments in Kannada language.

== Description ==

This plugin enables Google Transliteration in wordpress comment form. So your blog readers can leave comments in Kannada script without the need of any other input engines. This is a great step to encourage people to write comments in Kannada language in your Kannada blog. This plugin adds a transliteration controller at the top of comment form. Users can click on the transliterate switch or press <strong>Ctrl+G</strong> to toggle between English and Kannada input languages. Default language is English. You can see the live action of this plugin at <a href="http://www.vedasudhe.com">vedasudhe.com</a>.

This is the first public release of this plugin. I will add some more options in the next releases. 

<strong>Get in touch:</strong><br />
<ul>
<li>Visit <a href="http://www.prasannasp.net/blog">developer's blog</a> for news and updates.</li>
<li>Follow his <a href="http://github.com/prasannasp">GitHub repositories</a> for codes and goodies.</li>
<li>Follow him on <a href="http://twitter.com/prasannasp">twitter</a> and be a friend on <a href="http://facebook.com/prasannaspp">facebook</a>.</li>
</ul>

== Screenshots ==

1. Transliterate control switch.
2. Writing comments in Kannada language when Transliteration is enabled.

== Installation ==

1. Upload the `kannada-comment` folder to the `/wp-content/plugins/` directory
2. Activate the Kannada Comment plugin through the 'Plugins' menu in WordPress
3. Transliterate control switch will be automatically added at the top of wordpress comment form.

== Frequently Asked Questions ==

= Why there is no options page for this plugin? =
This is a very simple plugin which just enables Google Transliteration on Wordpress comment form. No need to configure anything. I'm working on giving admin an option to enable/disable transliteration by default though. It will be available in the next release.


= How can I enable Transliteration by default in the current version? =

Open `kannada-comment.php` file and change <strong>`transliterationEnabled: false`</strong> to <strong>`transliterationEnabled: true`</strong>

= Does it work with Facebook comment, disqus or any other commenting systems? =

No, it works with default Wordpress commenting system only. Facebook comment, disqus or any other commenting systems are not supported in this plugin.

= Will this plugin affect Name, Email and Website fields in Wordpress comment form? =

No, Transliteration is enabled only for comment form `textarea` only. So, it will not transliterate input text in the above fields.

= How to change the position of Transliterate control switch? =

Open `kannada-comment.php` file and replace <strong>`add_action('comment_form_top',  'kannada_comment_switch');`</strong> with <strong>`add_action('comment_form',  'kannada_comment_switch');`</strong> to move transliterate control switch below the comment text area and replace with <strong>`add_action('comment_form_after',  'kannada_comment_switch');`</strong> to move at the bottom of comment form. I will add the option to set the position of `Transliterate control switch` in the next release.

== Other Notes ==

= How can I get help? =

Contact the developer using his <a href="http://www.prasannasp.net/contact/">contact form</a> for help and support. Also, please leave him a message if you are interested in co-development of this plugin.

= How to style the Transliterate control switch? =

<strong>Transliterate control switch</strong> is wrapped with <strong>kncomment</strong> div and description with <strong>kncomment-text</strong> class. Use them in your theme to style the controller.

= Compatibility with themes =
This plugin is tested and works well with default <a href="http://wordpress.org/extend/themes/twentyeleven">Twenty Eleven</a> theme, <a href="http://wordpress.org/extend/themes/twentyten">Twenty Ten</a> and <a href="http://wordpress.org/extend/themes/graphene">Graphene</a> themes. It will and should work with other themes as well. If you have any compatibility issues with the other themes, please leave the developer a message with all the information you have. 

== Changelog ==

= 1.0 =

Initial public release.

== Upgrade Notice ==
*No Upgrade Notice so far.
