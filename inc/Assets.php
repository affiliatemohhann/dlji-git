<?php
/**
 * Frontend and editor asset registration.
 *
 * @package Dealji
 */

declare(strict_types=1);

namespace DEALJI_THEME;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Registers and enqueues theme assets.
 */
final class Assets {
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
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Register asset hooks.
	 */
	public function boot(): void {
		if ($this->booted) {
			return;
		}

		$this->booted = true;

		add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));
	}

	/**
	 * Enqueue frontend assets.
	 */
	public function enqueue_frontend_assets(): void {
		wp_enqueue_style(
			'dealji-style',
			get_stylesheet_uri(),
			array(),
			DEALJI_THEME_VERSION
		);
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
		_doing_it_wrong(__METHOD__, esc_html__('Unserializing the assets singleton is not allowed.', 'dealji'), '0.1.0');
	}
}
