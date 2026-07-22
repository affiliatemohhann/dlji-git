<?php
/**
 * Product custom post type registration.
 *
 * @package Dealji
 */

declare(strict_types=1);

namespace DEALJI_THEME\PostTypes;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Registers the Product custom post type.
 */
final class ProductPostType {
	public const KEY = 'product';

	/**
	 * Register WordPress hooks.
	 */
	public function register(): void {
		add_action('init', array($this, 'register_post_type'), 0);
	}

	/**
	 * Register the Product post type.
	 */
	public function register_post_type(): void {
		register_post_type(
			self::KEY,
			array(
				'labels'              => array(
					'name'                     => _x('Products', 'post type general name', 'dealji'),
					'singular_name'            => _x('Product', 'post type singular name', 'dealji'),
					'menu_name'                => _x('Products', 'admin menu', 'dealji'),
					'name_admin_bar'           => _x('Product', 'add new on admin bar', 'dealji'),
					'add_new'                  => _x('Add New', 'product', 'dealji'),
					'add_new_item'             => __('Add New Product', 'dealji'),
					'new_item'                 => __('New Product', 'dealji'),
					'edit_item'                => __('Edit Product', 'dealji'),
					'view_item'                => __('View Product', 'dealji'),
					'view_items'               => __('View Products', 'dealji'),
					'all_items'                => __('All Products', 'dealji'),
					'search_items'             => __('Search Products', 'dealji'),
					'parent_item_colon'        => __('Parent Products:', 'dealji'),
					'not_found'                => __('No products found.', 'dealji'),
					'not_found_in_trash'       => __('No products found in Trash.', 'dealji'),
					'archives'                 => __('Product Archives', 'dealji'),
					'attributes'               => __('Product Attributes', 'dealji'),
					'insert_into_item'         => __('Insert into product', 'dealji'),
					'uploaded_to_this_item'    => __('Uploaded to this product', 'dealji'),
					'featured_image'           => __('Product image', 'dealji'),
					'set_featured_image'       => __('Set product image', 'dealji'),
					'remove_featured_image'    => __('Remove product image', 'dealji'),
					'use_featured_image'       => __('Use as product image', 'dealji'),
					'filter_items_list'        => __('Filter products list', 'dealji'),
					'items_list_navigation'    => __('Products list navigation', 'dealji'),
					'items_list'               => __('Products list', 'dealji'),
					'item_published'           => __('Product published.', 'dealji'),
					'item_published_privately' => __('Product published privately.', 'dealji'),
					'item_reverted_to_draft'   => __('Product reverted to draft.', 'dealji'),
					'item_scheduled'           => __('Product scheduled.', 'dealji'),
					'item_updated'             => __('Product updated.', 'dealji'),
				),
				'public'              => true,
				'publicly_queryable'  => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_rest'        => true,
				'rest_base'           => 'products',
				'has_archive'         => true,
				'hierarchical'        => false,
				'exclude_from_search' => false,
				'capability_type'     => 'post',
				'map_meta_cap'        => true,
				'menu_icon'           => 'dashicons-products',
				'rewrite'             => array(
					'slug'       => 'products',
					'with_front' => false,
				),
				'supports'            => array(
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'author',
					'revisions',
					'custom-fields',
				),
			)
		);
	}
}
