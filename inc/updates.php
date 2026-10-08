<?php
/**
 * Theme updates from GitHub releases (Plugin Update Checker, via Composer).
 *
 * WordPress checks https://github.com/drift-creative-systems/drift-hub-theme
 * for new releases and installs the drift-hub-theme.zip release asset through
 * Dashboard → Updates, like any other theme. Release process: README.md.
 *
 * @package Drift_Hub_Theme
 */

defined( 'ABSPATH' ) || exit;

$drift_hub_autoload = get_template_directory() . '/vendor/autoload.php';

if ( ! file_exists( $drift_hub_autoload ) ) {
	// Missing vendor/ (e.g. a raw git clone without composer install) — the theme still works, it just won't update.
	error_log( 'Drift: Surface Hub theme: vendor/autoload.php missing, GitHub updates disabled. Run composer install.' ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
	return;
}

require_once $drift_hub_autoload;

if ( class_exists( \YahnisElsts\PluginUpdateChecker\v5\PucFactory::class ) ) {
	$drift_hub_update_checker = \YahnisElsts\PluginUpdateChecker\v5\PucFactory::buildUpdateChecker(
		'https://github.com/drift-creative-systems/drift-hub-theme',
		get_template_directory() . '/functions.php',
		'drift-hub-theme',
		6
	);
	$drift_hub_update_checker->setBranch( 'main' );
	$drift_hub_update_checker->getVcsApi()->enableReleaseAssets();
}
