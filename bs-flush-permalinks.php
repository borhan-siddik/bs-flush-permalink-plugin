<?php

/**
 * Plugin Name: BS Flush Permalinks
 * Author: Borhan Siddik
 * Description: This plugin automatically clears the permalinks after the custom post type has been registered.
 * Version: 1.0.0
 * Text Domain: bs-flush-permalinks
 */

function pluginprefix_setup_post_type()
{
	register_post_type('custom_post', array(
		'public' => true,
		'label'  => 'Custom Posts',
		'menu_icon' => 'dashicons-welcome-write-blog'
	));
}
add_action('init', 'pluginprefix_setup_post_type');

function pluginprefix_activate() {
	pluginprefix_setup_post_type();
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'pluginprefix_activate');

function pluginprefix_deactivate() {
	unregister_post_type('custom_post');
	flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'pluginprefix_deactivate');