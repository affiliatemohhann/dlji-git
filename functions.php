<?php
/**
 * Dealji theme bootstrap.
 *
 * @package Dealji
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DEALJI_THEME_VERSION', '0.1.0' );
define( 'DEALJI_THEME_PATH', trailingslashit( get_template_directory() ) );
define( 'DEALJI_THEME_URI', trailingslashit( get_template_directory_uri() ) );

$dealji_autoload = DEALJI_THEME_PATH . 'vendor/autoload.php';

if ( file_exists( $dealji_autoload ) ) {
	require_once $dealji_autoload;
} else {
	add_action(
		'admin_notices',
		static function (): void {
			if ( ! current_user_can( 'switch_themes' ) ) {
				return;
			}

			printf(
				'<div class="notice notice-error"><p>%s</p></div>',
				esc_html__( 'Dealji could not find Composer autoloading. Run `composer dump-autoload` from the theme directory.', 'dealji' )
			);
		}
	);
}

if ( class_exists( \DEALJI_THEME\Theme::class ) ) {
	\DEALJI_THEME\Theme::instance()->boot();
}
