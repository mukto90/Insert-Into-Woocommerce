<?php
/**
* Plugin Name: Insert into Woocommerce
* Description: Creates content blocks to insert into anywhere of a WooCommerce site! At 100+ places!
* Author: Nazmul Ahsan
* Author URI: http://medhabi.com
* Version: 1.0.0
* Textdomain: insert-into-woocommerce
*/

/**
* @package woocommerce
* @subpackage Insert_Into_Woocommerce
*/

class Insert_Into_Woocommerce {
	
	public function __construct(){
		$this->initiate();
	}

	public function initiate(){
		define( 'INSERT_INTO_WOO_BASE_FILE', __FILE__ );
		$this->includes();
		if( ! is_woo_active() ){
			add_action( 'admin_notices' , array( $this , 'woo_notice' ) );
		}
		else{
			add_action( 'init' , array( $this , 'add_actions' ) );
			add_filter( 'plugin_action_links_' . plugin_basename(INSERT_INTO_WOO_BASE_FILE), array( $this, 'add_action_links' ) );
		}
	}

	public function includes(){
		require plugin_dir_path( __FILE__ ) . 'includes/free/functions.php';
		if( is_woo_active() ){
			require plugin_dir_path( __FILE__ ) . 'includes/cpt-woo-blocks.php';
			require plugin_dir_path( __FILE__ ) . 'includes/cmb-woo-blocks.php';
		}
	}

	public function woo_notice(){
		echo '<div class="notice notice-error">';

		do_action( 'before_woo_required_notice' );

		echo '<p><strong>Insert Into Woocommerce</strong> requires <strong><a href="https://wordpress.org/plugins/woocommerce/" target="_blank">Woocommerce</a></strong> plugin to be activated.</strong></p>';

		do_action( 'after_woo_required_notice' );

		echo '</div>';
	}

	public function add_actions(){

		$show_wrapper = apply_filters( 'show_woo_block_wrapper', false ); // for future version releases
		
		$args = array(
			'post_type'	=>	'woo-block',
			'post_per_page'	=>	-1,
			'meta_key'   => '_status',
			'meta_value' => 'Yes'
			);

		$blocks = new WP_Query( $args );
		
		while( $blocks->have_posts() ): $blocks->the_post();

			$content = '';
			if( $show_wrapper ) $content .= "<div id=\'mdc-insert-into-woo-" . get_the_id() . "\' class=\'mdc-insert-into-woo\'>";

			ob_start();
			the_content();
			$content .= ob_get_contents();
			ob_end_clean();
			
			if( $show_wrapper ) $content .= "</div>";

			add_action( get_post_meta( get_the_id() , '_position', true ) , create_function( "", "echo '$content';" ) );

		endwhile;

		wp_reset_postdata();
	}

	public function add_action_links ( $links ) {

		$mylinks = array(
			'<a href="' . admin_url( 'edit.php?post_type=woo-block&page=insert-into-woocommerce-settings' ) . '">Settings</a>'
		);
		
		return array_merge( $links, $mylinks );
	}

}

if ( ! class_exists( 'Insert_Into_Woocommerce_Pro' ) ) {
	new Insert_Into_Woocommerce;
}
