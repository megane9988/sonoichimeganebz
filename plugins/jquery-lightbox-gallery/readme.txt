=== Fancy Gallery ===
Contributors: Dennis Hoppe
Tags: gallery, galleries, image, images, picture, pictures, photo, photos, photo-album, photo-albums, fancybox, thickbox, lightbox, jquery, javascript, widget, cms, free, flickr       widget,Post,plugin,admin,posts,sidebar,comments,google,images,page,image,links
Requires at least: 3.2
Tested up to: 3.6.1
Stable tag: trunk

Fancy Gallery associates linked images and galleries with the jQuery Fancybox. This Plugin has been granted the "Famous Software" Award!


== Description ==
[Fancy Gallery](http://dennishoppe.de/en/wordpress-plugins/fancy-gallery) is a state of the art WordPress [Gallery Plugin](http://dennishoppe.de/en/wordpress-plugins/fancy-gallery) you can use to create, manage and handle image galleries easily in your WordPress backend and present images to your website visitors.

It migrates the Fancy Image Box to your WordPress. All links pointing to an image will automatically open in the FancyBox. If you use the [gallery] shortcode the images will get a navigation bar and the gallery itself will be converted to a valid HTML block.

Of course you can use "exclude" and "include" parameters in your [gallery] shortcode like you already know from the traditional gallery code.

If you want to display links in the fancybox add the class "fancyframe" to them! ;)

Btw: Fancy Gallery is available as [Premium Plugin](http://dennishoppe.de/en/wordpress-plugins/fancy-gallery) too.


= Main features =
In this version of [Fancy Gallery](http://dennishoppe.de/en/wordpress-plugins/fancy-gallery) some features are not available. You will find notices on several places in the backend that the described feature is part of the [Pro Version](http://dennishoppe.de/en/wordpress-plugins/fancy-gallery).

* Fancy LightBox support for all linked images on your website
* Manage Galleries separated from Posts or Pages
* Gallery Taxonomies to categorize all your images
* Custom thumbnail sizes and color effects (Pro Version only)
* Fully compatible with all existing themes with archive template
* Template engine to display your galleries
* User role and capability support (Pro Version only)
* Gallery archives and RSS Feed support
* Clean and easy-to-use user interfaces
* Widgets to display your images in the sidebars (Pro Version only)
* Completely free of advertisement and brandings (but you have the feature hints in backend)


= Settings =
You can find the settings page in WP Admin Panel &raquo; Settings &raquo; [Fancy Gallery](http://dennishoppe.de/en/wordpress-plugins/fancy-gallery).


= In the Press =
* Fancy Gallery has been granted the "Famous Software" Award. [To the post &raquo;](http://download.famouswhy.com/fancy_gallery/)
* 17 Most Used WordPress jQuery Plugins @ [Skyje.com](http://skyje.com/). [To the post &raquo;](http://skyje.com/2010/04/wordpress-jquery-plugins/)
* "Awesome and easy to use Wordpress gallery plugin" [To the post &raquo;](http://topsy.com/trackback?utm_source=pingback&utm_campaign=L2&url=http://dennishoppe.de/wordpress-plugins/fancy-gallery)
* WordPress Series #2 – The essential plugins @ [Inscope](http://www.inscope.net/). [To the post &raquo;](http://www.inscope.net/post/755)


= Questions =
I know you have many questions – my mailbox is the proof. ;) But unfortunately I cannot give support for the free plugins. There is a separate support package available for the [Pro Version](http://dennishoppe.de/en/wordpress-plugins/fancy-gallery) of this plugin. Please use it. Of course you can hire me for consulting, support, programming and customizations at any time.


= Language =
* This Plugin is available in English.
* Diese Erweiterung ist in Deutsch verfügbar. ([Ulrike Seddig](http://UlrikeSeddig.de/))
* Plugin disponible en Español. ([Guillermo Gozalbes](http://www.versus.es/))
* Este plugin está disponível em português - Brasil. (Ramiro Modica)
* Ce plugin est disponible en français. (Thomas Schlesser)


= Translate this plugin =
If you have translated this plugin in your language feel free to send me the language file (.po file) via E-Mail with your name and this translated sentence: "This plug-in is available in %YOUR_LANGUAGE_NAME%." So i can add it to the plug-in.

You can find the *Translation.pot* file in the *language/* folder in the plugin directory.

* Copy it.
* Rename it (to your language code).
* Translate everything.
* Send it via E-Mail to &lt;Mail [@t] [DennisHoppe](http://DennisHoppe.de) [dot] de&gt;.
* Thats it. Thank you! =)


= Frequently Asked Questions =
I am still collecting frequently asked questions. ;)


== Screenshots ==
1. Add a new Gallery
2. Manage Gallery Categories
3. Edit a category
4. Edit an image
5. Integrate your galleries to your navigation menus
6. Change details of several images
7. Manage the gallery capabilities.
8. The Fancybox settings
9. Use different templates
10. Show random images in your sidebar
11. Show your gallery taxonomies in your sidebar
12. Gallery single view


== Changelog ==

= 1.1.5 =
* Made options page responsive

= 1.1.4 =
* Added French translation.
* Merged all styles via SASS to fancybox.css
* Patched z-index bug for TwentenEleven theme
* Patched default template styles
* Improved Gallery generate code and parameters

= 1.1.3 =
* Fixed "Image Order" problem in manually created galleries.

= 1.1.2 =
* Improved the "Import to gallery" tab
* removed some deprecated files
* Fixed image size bug in Thumbnails-Share-Button template

= 1.1.1 =
* Added overflow style to gallery wrappers

= 1.1 =
* Fancybox updated, completely rewritten JS

= 1.0.29 =
* removed clear element from "Thumbnails only" template

= 1.0.28 =
* removed clear element from default template

= 1.0.27 =
* Fixed Strip_Tags bug in share-button-template

= 1.0.26 =
* Reordered Template files
* New Template with share buttons inside the image title

= 1.0.25 =
* Changed the right image margin of the default gallery template
* Converted the shortcode in the gallery backend from a <code> element to an <input> field

= 1.0.24 =
* Made taxonomy slugs translatable.

= 1.0.23 =
* Added a management column for each taxonomy to the gallery management page

= 1.0.22 =
* Added some CSS to the default template

= 1.0.21 =
* Removed column field from the gallery editor
* Added support for "orderby" field in manually created galleries

= 1.0.20 =
* Added html trim function

= 1.0.19 =
* Splited templates in Code and Style
* improved template output cleaning

= 1.0.18 =
* Allow URL Slug translation via WPML now

= 1.0.17 =
* Added WP 3.5 support

= 1.0.16 =
* Fixed the (Widget) translation bug

= 1.0.15 =
* Eliminated Backslashes in generated URLs (should work with Windows now)

= 1.0.14 =
* Changed z-index values for all fancy objects
* renamed library and stylesheet files
* fixed IE6/7/8 Bugs

= 1.0.13 =
* Changed fade-in time of the overlay
* fixed an IE bug which let the fancy box pop on non-image links

= 1.0.12 =
* Added Brazilian-Portuguese translation

= 1.0.11 =
* Updated mouse wheel library

= 1.0 =
* Everything works fine.
