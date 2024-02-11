<?php
/*
Plugin Name: Test plugin 7.0
Description: plugin base test
Version: 1.0
Author: CC dev
*/


// adds a dedicated section for the plugin in the dashboard menu of word press
add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'Plugin to API',
        'Plugin to API Options',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/PluginMenu.php',
        null,
        'dashicons-admin-plugins',
        20
    );
}

?>