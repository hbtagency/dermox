=== WordPress Access Control ===
Contributors: brandon.wamboldt
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=Y398QNA6FM9TA
Tags: members, only, plugin, restricted, access, menus, 3.3, wp_nav_menu, nonmembers
Requires at least: 3.0
Tested up to: 4.0
Stable tag: 4.0.13

Restrict pages, posts, custom post types, menus and widgets to members, nonmembers or specific roles and still add to navigation

== Description ==

**Now with shortcodes and post/custom-post-type support, as well as a comprehensive admin interface for setting plugin defaults**

WordPress Access Control is a plugin designed to integrate into membership sites where certain pages, posts and custom post types should only be available to members of the site. The plugin offers fine tuned features for this purpose, including the ability to set site wide defaults and override these on a per-page basis.

You can easily set a page to be accessible only by members of your site, or even a specific role. You can also set pages to be accessible only to non-members of  your site, useful for registration pages.

By default, you can add Members only pages to your menus, and users who cannot  access them (non-members) won't be able to see them. This applys to the children of a menu item as well, making it easy to build a separate menu for your  members.

Additionally, you have the ability to customize search pages, completely hiding posts/pages from search results if a user can't access them, showing search  results without an excerpt, or showing search results normally.

**New Features in 4.0**

Enhanced theme compatiblity! We now have a much smaller impact on sites due to a new way of implementing our nav walker code. This should significantly improve compatability with third party themes.

**New Features in 3.1**

* You can add member only versions of each menu on your site (Only when using WordPress menus)
* You can make certain widgets only visible to members or non-members.

**Translators:** The POT file is included with the plugin and all text output uses gettext functions. Alternatively, you may download the POT file from http://brandonwamboldt.ca/files/wordpress-access-control.pot.

**Documentation:** The plugin includes comprehensive documentation file accessible via the plugin directory

== Installation ==

Installation is very simple:

1. Upload wordpress-access-control/ to your websites plugins folder (/wp-content/plugins/ by default)
2. Login to your WordPress admin
3. Navigate to Plugins
4. Activate WordPress Access Control

You can change settings by going to Settings > Members Only Settings

== Frequently Asked Questions ==

**I don't see the controls on the page/post edit screens**
Please make sure you have the meta enabled under the Screen Options panel (top right next to help)

**This plugin doesn't work with theme XYZ**
Please leave a comment at http://brandonwamboldt.ca/plugins/members-only-menu-plugin/ and I will address it A.S.A.P.

**Can I restrict content to a specific role using shortcodes?**
Yes, this is a new feature in 3.1.3. Use the syntax [members role="administrator"]Your content[/members] where administrator is the desired role

== Screenshots ==

1. The meta box added by this plugin
2. The comprehensive admin settings interface
3. The new nav menu options for creating member only menus
4. The widget options for making widgets visible only to members/non-members

== Changelog ==

= 4.0.13 - September 19, 2014 =

* Adding a variety of bulk action tools

= 4.0.12 - September 13, 2014 =

* Fix PHP warning if there is no post

= 4.0.11 - September 13, 2014 =

* Add the ability to set the default state/roles for custom post types instead of just pages & posts

= 4.0.10 - September 13, 2014 =

* Get the localized roles using translate_user_role

= 4.0.9 - September 11, 2014 =

* Mark as compatible with WordPress 4.0
* Fix some checkboxes (for roles) not having label tags

= 4.0.8 - December 18, 2013 =

* Fixing syntax errors (forgot to turn WP_DEBUG back on)

= 4.0.7 - December 18, 2013 =

* Fixed faulty code which cause menu items to show up when they shouldn't

= 4.0.6 - December 18, 2013 =

* Fixed a bug with multi-level menus when using page inheritance instead of nav menus

= 4.0.5 - December 17, 2013 =

* Fix a bug with 3rd level menus or deeper

= 4.0.4 - December 15, 2013 =

* Decrease plugin action priority to run after other plugins (Fixes known bug with "CodeFlavours Floating Menu" plugin)

= 4.0.3 - December 15, 2013 =

* Fixed default redirect URLs not being used

= 4.0.2 - December 15, 2013 =

* Fixing more compatability bugs
* Fixing PHP notices & warnings
* Fixed bug when using page navigation fallback (no menu selected)

= 4.0.1 - December 14, 2013 =

* Fix login redirect to remove hard coded URL

= 4.0.0 - December 13, 2013 =

* Rewrote the Nav Walker classes to be more minimalistic and to defer actual functionality to the originally configured walker, allowing for better compatability with themes or plugins that use their own nav walkers
* Code style updates
* Fixing some PHP warnings/notices

= 3.1.4 - August 30, 2012 =

* Added not/or keywords to the role option of the members shortcode, syntax: [members role="not:guest,banned"][/members] and [members role="or:editor,author,contributor"](Thanks to Dave Amphlett for the idea)

= 3.1.3 - August 30, 2012 =

* Fixed a PHP warning about load_plugin_textdomain using a deprecated argument
* Fixed a PHP error if no nav menu is set
* Added a role option to the members shortcode (Use like [members role="administrator"][/members])

= 3.1.2 - December 7, 2011 =

* Fixed a PHP error when there are no nav menus

= 3.1.1 - December 7, 2011 =

* Fixed a bug that might cause memory issues

= 3.1 - December 7, 2011 =

* Custom Post Type section is no longer displayed on the options page if there are no custom post types
* Members Only Blog now properly restricts the entire site
* Admins now have the ability to override permissions to prevent lower level users from denying admins access to posts
* Admins may now create menu widgets that are only visible to members or non-members from the Widgets screen
* Admins may now create WordPress nav menus that are only visible to members
* Updated the documentation
* Added new screenshots

= 3.0.5 - June 6, 2011 =

* Fixed the PHP issue properly this time

= 3.0.4 - June 6, 2011 =

* Fixed a PHP issue if a second argument wasn't supplied to several functions

= 3.0.3 - June 5, 2011 =

* Added an option to apply members settings to all children of a page
* Fixed a bug where the page navigation for posts/archives was broken
* Fixed a bug where themes that used the_content on archive/search pages could show all the contents of a post instead of the no excerpt message

= 3.0.2 - June 2, 2011 =

* Added do_shortcode commands to allow nested shortcodes in the [members] and [nonmembers] shortcodes

= 3.0.1 - June 1, 2011 =

* Fixed an issue where a members only blog with no redirect link specified would cause an infinite loop

= 3.0 - May 26, 2011 =

* Added an admin options page
* Added an option to allow pages to show up in menus even if a user cannot access them
* Added support to make an entire blog members only
* Added options to set the defaults of all options for pages and posts
* Added support for posts
* Added support for searching/archives
* Added better support for custom post types
* Added a redirect_to argument even when using custom redirect links
* Added [member][/member] and [nonmember][/nonmember] shortcodes

= 2.1 =
* Added an icon on the page list dialog that shows Non-member or Member only statuses
* Bug Fix: Fixed a PHP4 bug by replacing self with the full class name thanks to `itpixie`
* Bug Fix: Fixed a bug where pages with roles set could lock an administrator out (Thanks to `evlapix` for reporting)
* Bug Fix: After logging in you are now redirected back to the page you were trying to access

= 2.0 =
* Added the ability to mark pages as non-members only
* Added the ability to restrict pages to specific roles
* Added the ability to set the redirect URL for users with incorrect permissions

= 1.6.4 =
* Fixed a problem with certain themes that use wp_list_pages as my plugin didn't affect that function. It does now, as we hook into get_pages. Also updated some of the code to better reflect WordPress coding standards

= 1.6.3 =
* Fixed a problem in pre WordPress 3 instances where a PHP error is generated due to lack of the Walker_Nav_Menu class

= 1.6.2 =
* Fixed (X)HTML validation errors caused by an empty ul which could occur if all items in a submenu were members only but the parent element was not.

= 1.6 =
* Fixed a bug where third level menu items with members only attributes would break the HTML/menu

= 1.5 =
* Fixed an error where submenus would still be generated if the parent was marked as members only. This has been fixed.

= 1.4 =
* Added support for PHP4

= 1.3 =
* Added support for wp_page_menu

= 1.2 =
* Added a filter which catches a fallback to wp_page_menu and removes our walker class from the arguments list

= 1.1 =
* Added a filter which removed the need to change the wp_nav_menu commands

= 1.0 =
* Initial Version

== Upgrade Notice ==

= 3.1.2 - December 7, 2011 =

* Fixed a PHP error when there are no nav menus

= 3.1.1 - December 7, 2011 =

* Fixed a bug that might cause memory issues

= 3.1 =

* Custom Post Type section is no longer displayed on the options page if there are no custom post types
* Members Only Blog now properly restricts the entire site
* Admins now have the ability to override permissions to prevent lower level users from denying admins access to posts
* Admins may now create menu widgets that are only visible to members or non-members from the Widgets screen
* Admins may now create WordPress nav menus that are only visible to members
* Updated the documentation
* Added new screenshots

= 1.6.4 =
* Fixed several bugs including adding support for wp_list_pages

= 1.6 =
* Fixed a bug with third level menu items

= 1.5 =
* Fixed a bug with submenus and the parent being members only

= 1.4 =
Now supports PHP 4

= 1.3 =
Full support for wp_page_menu!

= 1.2 =
Fixes the code so it no longer degrades terribly when no nav menu is available

= 1.1 =
Increases compatibility and ease of use by removing the need to change theme file
