<?php
/**
 * Plugin Name:  Christa Timmer
 * Plugin URI:   https://christatimmer.nl
 * Description:  Boilerplate for Christa Timmer
 * Version:      1.1
 * Author:       Johan van der Wijk
 * Author URI:   https://thewebworks.nl
 * Text Domain:  christatimmer
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 */

// if this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// launch the plugin and load the translation files
function ct_plugin_init() {
	load_plugin_textdomain( 'christatimmer', false, 'christatimmer/languages' );
}
add_action( 'plugins_loaded', 'ct_plugin_init' );

// custom post types
require 'cpt-class.php';
require 'cpt-filter.php';

// remove admin menus
function ct_remove_menus() {
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'tools.php' );
}
add_action( 'admin_menu', 'ct_remove_menus' );

// remove Yoast `SEO Manager` role
if ( get_role('wpseo_manager') ) {
	remove_role( 'wpseo_manager' );
}
// remove Yoast `SEO Editor` role
if ( get_role('wpseo_editor') ) {
	remove_role( 'wpseo_editor' );
}