<?php
/**
 * Drift: Surface Hub theme — deliberately almost empty. The plugin draws
 * the hub and its login screen; this theme only exists so the site has
 * an active theme and the default ones can be removed.
 *
 * @package Drift_Hub_Theme
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', static function () {
	add_theme_support( 'title-tag' );
} );

// No public content here, so no generator tag, emoji script, feeds or embeds.
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
add_filter( 'wp_robots', 'wp_robots_no_robots' );

/** Where every front-end page should go. */
function drift_hub_theme_target(): string {
	return class_exists( 'Drift_Hub_App' ) ? Drift_Hub_App::url() : '';
}
