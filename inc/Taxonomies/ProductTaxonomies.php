<?php
/**
 * Product taxonomy registration.
 *
 * @package Dealji
 */

declare(strict_types=1);

namespace DEALJI_THEME\Taxonomies;

use DEALJI_THEME\PostTypes\ProductPostType;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers taxonomies attached to products.
 */
final class ProductTaxonomies {
	public const NICHE    = 'product_niche';
	public const CATEGORY = 'product_category';
	public const BRAND    = 'product_brand';
	public const FEATURE  = 'product_feature';
	public const STATUS   = 'product_status';

	/**
	 * Register WordPress hooks.
	 */
	public function register(): void {
		add_action( 'init', array( $this, 'register_taxonomies' ), 1 );
	}

	/**
	 * Register product taxonomies.
	 */
	public function register_taxonomies(): void {
		$this->register_niche();
		$this->register_category();
		$this->register_brand();
		$this->register_feature();
		$this->register_status();
	}

	/**
	 * Register the product niche taxonomy.
	 */
	private function register_niche(): void {
		register_taxonomy(
			self::NICHE,
			array( ProductPostType::KEY ),
			array(
				'labels'             => array(
					'name'              => _x( 'Product Niches', 'taxonomy general name', 'dealji' ),
					'singular_name'     => _x( 'Product Niche', 'taxonomy singular name', 'dealji' ),
					'search_items'      => __( 'Search Product Niches', 'dealji' ),
					'all_items'         => __( 'All Product Niches', 'dealji' ),
					'parent_item'       => __( 'Parent Product Niche', 'dealji' ),
					'parent_item_colon' => __( 'Parent Product Niche:', 'dealji' ),
					'edit_item'         => __( 'Edit Product Niche', 'dealji' ),
					'view_item'         => __( 'View Product Niche', 'dealji' ),
					'update_item'       => __( 'Update Product Niche', 'dealji' ),
					'add_new_item'      => __( 'Add New Product Niche', 'dealji' ),
					'new_item_name'     => __( 'New Product Niche Name', 'dealji' ),
					'menu_name'         => __( 'Product Niches', 'dealji' ),
					'not_found'         => __( 'No product niches found.', 'dealji' ),
					'back_to_items'     => __( 'Back to product niches', 'dealji' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'hierarchical'       => true,
				'show_ui'            => true,
				'show_admin_column'  => true,
				'show_in_rest'       => true,
				'rest_base'          => 'product-niches',
				'query_var'          => self::NICHE,
				'rewrite'            => array(
					'slug'       => 'niches',
					'with_front' => false,
				),
			)
		);
	}

	/**
	 * Register the product category taxonomy.
	 */
	private function register_category(): void {
		register_taxonomy(
			self::CATEGORY,
			array( ProductPostType::KEY ),
			array(
				'labels'             => array(
					'name'              => _x( 'Product Categories', 'taxonomy general name', 'dealji' ),
					'singular_name'     => _x( 'Product Category', 'taxonomy singular name', 'dealji' ),
					'search_items'      => __( 'Search Product Categories', 'dealji' ),
					'all_items'         => __( 'All Product Categories', 'dealji' ),
					'parent_item'       => __( 'Parent Product Category', 'dealji' ),
					'parent_item_colon' => __( 'Parent Product Category:', 'dealji' ),
					'edit_item'         => __( 'Edit Product Category', 'dealji' ),
					'view_item'         => __( 'View Product Category', 'dealji' ),
					'update_item'       => __( 'Update Product Category', 'dealji' ),
					'add_new_item'      => __( 'Add New Product Category', 'dealji' ),
					'new_item_name'     => __( 'New Product Category Name', 'dealji' ),
					'menu_name'         => __( 'Product Categories', 'dealji' ),
					'not_found'         => __( 'No product categories found.', 'dealji' ),
					'back_to_items'     => __( 'Back to product categories', 'dealji' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'hierarchical'       => true,
				'show_ui'            => true,
				'show_admin_column'  => true,
				'show_in_rest'       => true,
				'rest_base'          => 'product-categories',
				'query_var'          => self::CATEGORY,
				'rewrite'            => array(
					'slug'       => 'product-categories',
					'with_front' => false,
				),
			)
		);
	}

	/**
	 * Register the product brand taxonomy.
	 */
	private function register_brand(): void {
		register_taxonomy(
			self::BRAND,
			array( ProductPostType::KEY ),
			array(
				'labels'             => array(
					'name'                       => _x( 'Brands', 'taxonomy general name', 'dealji' ),
					'singular_name'              => _x( 'Brand', 'taxonomy singular name', 'dealji' ),
					'search_items'               => __( 'Search Brands', 'dealji' ),
					'popular_items'              => __( 'Popular Brands', 'dealji' ),
					'all_items'                  => __( 'All Brands', 'dealji' ),
					'edit_item'                  => __( 'Edit Brand', 'dealji' ),
					'view_item'                  => __( 'View Brand', 'dealji' ),
					'update_item'                => __( 'Update Brand', 'dealji' ),
					'add_new_item'               => __( 'Add New Brand', 'dealji' ),
					'new_item_name'              => __( 'New Brand Name', 'dealji' ),
					'separate_items_with_commas' => __( 'Separate brands with commas', 'dealji' ),
					'add_or_remove_items'        => __( 'Add or remove brands', 'dealji' ),
					'choose_from_most_used'      => __( 'Choose from the most used brands', 'dealji' ),
					'not_found'                  => __( 'No brands found.', 'dealji' ),
					'menu_name'                  => __( 'Brands', 'dealji' ),
					'back_to_items'              => __( 'Back to brands', 'dealji' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'hierarchical'       => false,
				'show_ui'            => true,
				'show_admin_column'  => true,
				'show_in_rest'       => true,
				'rest_base'          => 'brands',
				'query_var'          => self::BRAND,
				'rewrite'            => array(
					'slug'       => 'brands',
					'with_front' => false,
				),
			)
		);
	}

	/**
	 * Register the product feature taxonomy.
	 */
	private function register_feature(): void {
		register_taxonomy(
			self::FEATURE,
			array( ProductPostType::KEY ),
			array(
				'labels'             => array(
					'name'                       => _x( 'Features', 'taxonomy general name', 'dealji' ),
					'singular_name'              => _x( 'Feature', 'taxonomy singular name', 'dealji' ),
					'search_items'               => __( 'Search Features', 'dealji' ),
					'popular_items'              => __( 'Popular Features', 'dealji' ),
					'all_items'                  => __( 'All Features', 'dealji' ),
					'edit_item'                  => __( 'Edit Feature', 'dealji' ),
					'view_item'                  => __( 'View Feature', 'dealji' ),
					'update_item'                => __( 'Update Feature', 'dealji' ),
					'add_new_item'               => __( 'Add New Feature', 'dealji' ),
					'new_item_name'              => __( 'New Feature Name', 'dealji' ),
					'separate_items_with_commas' => __( 'Separate features with commas', 'dealji' ),
					'add_or_remove_items'        => __( 'Add or remove features', 'dealji' ),
					'choose_from_most_used'      => __( 'Choose from the most used features', 'dealji' ),
					'not_found'                  => __( 'No features found.', 'dealji' ),
					'menu_name'                  => __( 'Features', 'dealji' ),
					'back_to_items'              => __( 'Back to features', 'dealji' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'hierarchical'       => false,
				'show_ui'            => true,
				'show_admin_column'  => true,
				'show_in_rest'       => true,
				'rest_base'          => 'features',
				'query_var'          => self::FEATURE,
				'rewrite'            => array(
					'slug'       => 'features',
					'with_front' => false,
				),
			)
		);
	}

	/**
	 * Register the product status taxonomy.
	 */
	private function register_status(): void {
		register_taxonomy(
			self::STATUS,
			array( ProductPostType::KEY ),
			array(
				'labels'             => array(
					'name'                       => _x( 'Product Statuses', 'taxonomy general name', 'dealji' ),
					'singular_name'              => _x( 'Product Status', 'taxonomy singular name', 'dealji' ),
					'search_items'               => __( 'Search Product Statuses', 'dealji' ),
					'popular_items'              => __( 'Popular Product Statuses', 'dealji' ),
					'all_items'                  => __( 'All Product Statuses', 'dealji' ),
					'edit_item'                  => __( 'Edit Product Status', 'dealji' ),
					'view_item'                  => __( 'View Product Status', 'dealji' ),
					'update_item'                => __( 'Update Product Status', 'dealji' ),
					'add_new_item'               => __( 'Add New Product Status', 'dealji' ),
					'new_item_name'              => __( 'New Product Status Name', 'dealji' ),
					'separate_items_with_commas' => __( 'Separate product statuses with commas', 'dealji' ),
					'add_or_remove_items'        => __( 'Add or remove product statuses', 'dealji' ),
					'choose_from_most_used'      => __( 'Choose from the most used product statuses', 'dealji' ),
					'not_found'                  => __( 'No product statuses found.', 'dealji' ),
					'menu_name'                  => __( 'Product Statuses', 'dealji' ),
					'back_to_items'              => __( 'Back to product statuses', 'dealji' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'hierarchical'       => false,
				'show_ui'            => true,
				'show_admin_column'  => true,
				'show_in_rest'       => true,
				'rest_base'          => 'product-statuses',
				'query_var'          => self::STATUS,
				'rewrite'            => array(
					'slug'       => 'product-status',
					'with_front' => false,
				),
			)
		);
	}
}
