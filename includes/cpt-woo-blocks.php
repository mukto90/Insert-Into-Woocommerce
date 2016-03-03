<?php
/**
* Registers a new post type
* @author Nazmul Ahsan <n.mukto@gmail.com>
*/
class MDC_Post_Type_Woo_Blocks{
	public function __construct(){
		add_action( 'init', array( $this, 'register_post_type_woo_block' ) );
	}

	public function register_post_type_woo_block() {
		$labels = array(
			'name'                => __( 'WooBlocks', 'insert-into-woocommerce' ),
			'singular_name'       => __( 'Block', 'insert-into-woocommerce' ),
			'add_new'             => _x( 'Add New Block', 'insert-into-woocommerce', 'insert-into-woocommerce' ),
			'add_new_item'        => __( 'Add New Block', 'insert-into-woocommerce' ),
			'edit_item'           => __( 'Edit Block', 'insert-into-woocommerce' ),
			'new_item'            => __( 'New Block', 'insert-into-woocommerce' ),
			'view_item'           => __( 'View Block', 'insert-into-woocommerce' ),
			'search_items'        => __( 'Search Blocks', 'insert-into-woocommerce' ),
			'not_found'           => __( 'No Blocks found', 'insert-into-woocommerce' ),
			'not_found_in_trash'  => __( 'No Blocks found in Trash', 'insert-into-woocommerce' ),
			'parent_item_colon'   => __( 'Parent Block:', 'insert-into-woocommerce' ),
			'menu_name'           => __( 'WooBlocks', 'insert-into-woocommerce' ),
		);

		$args = array(
			'labels'              => $labels,
			'hierarchical'        => false,
			'description'         => 'Creates content blocks that can be inserted into anywhere of a WooCommerce site!',
			'taxonomies'          => array(),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => null,
			'menu_icon'           => null,
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'page',
			'supports'            => array( 'title', 'editor' )
		);

		register_post_type( 'woo-block', $args );
	}
}

new MDC_Post_Type_Woo_Blocks;
