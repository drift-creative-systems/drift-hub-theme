<?php
/**
 * Every front-end page. With the Drift: Surface Hub plugin active this sends
 * visitors to the hub (the plugin normally gets there first); without it,
 * a plain holding page.
 *
 * @package Drift_Hub_Theme
 */

defined( 'ABSPATH' ) || exit;

$drift_hub_target = drift_hub_theme_target();
if ( $drift_hub_target ) {
	wp_safe_redirect( $drift_hub_target );
	exit;
}

status_header( 503 );
nocache_headers();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body>
<main>
	<svg class="dht-mark" viewBox="80 40 180 160" aria-hidden="true" focusable="false"><path fill="currentColor" d="M80 40H180C220 40 260 80 260 120C260 160 220 200 180 200H80L130 150H180C196 150 210 136 210 120C210 104 196 90 180 90H80V40Z"/><path fill="currentColor" d="M90 170L150 110H210L150 170H90Z"/></svg>
	<p class="dht-name">DRIFT<small>SURFACE HUB</small></p>
	<p class="dht-msg">The hub is offline for a moment. <?php if ( current_user_can( 'activate_plugins' ) ) : ?><a href="<?php echo esc_url( admin_url( 'plugins.php' ) ); ?>">Switch the Drift: Surface Hub plugin back on</a>.<?php endif; ?></p>
</main>
<?php wp_footer(); ?>
</body>
</html>
