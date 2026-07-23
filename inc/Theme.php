<?php
/**
 * Main theme bootstrap class.
 *
 * @package Dealji
 */

declare(strict_types=1);

namespace DEALJI_THEME;

use DEALJI_THEME\PostTypes\ProductPostType;
use DEALJI_THEME\Taxonomies\ProductTaxonomies;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Boots the Dealji theme.
 */
final class Theme {
	/**
	 * Singleton instance.
	 *
	 * @var self|null
	 */
	private static ?self $instance = null;

	/**
	 * Tracks whether hooks have already been registered.
	 *
	 * @var bool
	 */
	private bool $booted = false;

	/**
	 * Get the singleton instance.
	 */
	public static function instance(): self {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Register theme hooks and services.
	 */
	public function boot(): void {
		if ( $this->booted ) {
			return;
		}

		$this->booted = true;

		add_action( 'after_setup_theme', array( $this, 'setup' ) );

		Assets::instance()->boot();
		( new ProductPostType() )->register();
		( new ProductTaxonomies() )->register();
	}

	/**
	 * Register base theme support.
	 */
	public function setup(): void {
		load_theme_textdomain( 'dealji', DEALJI_THEME_PATH . 'languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'script', 'search-form', 'style' ) );

		add_editor_style( 'style.css' );
	}

	/**
	 * Prevent external construction.
	 */
	private function __construct() {}

	/**
	 * Prevent cloning.
	 */
	private function __clone() {}

	/**
	 * Prevent unserialization.
	 */
	public function __wakeup(): void {
		_doing_it_wrong( __METHOD__, esc_html__( 'Unserializing the theme singleton is not allowed.', 'dealji' ), '0.1.0' );
	}
}
