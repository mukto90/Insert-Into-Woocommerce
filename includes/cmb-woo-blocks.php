<?php
/**
* Adds custom meta box and meta fields
* @author Nazmul Ahsan <n.mukto@gmail.com>
*/
class MDC_Meta_Box_Woo_Blocks {
	
	function __construct(){
		add_action( 'add_meta_boxes' , array( $this, 'add_woo_blocks_metaboxes' ) );
		add_action( 'save_post', array( $this, 'mdc_save_woo_blocks_meta' ), 1, 2 );
	}

	public function add_woo_blocks_metaboxes() {
		add_meta_box( 'mdc_woo_blocks_status', 'Settings', array( $this, 'mdc_woo_blocks_status' ), 'woo-block', 'side', 'high' );
	}

	public function mdc_woo_blocks_status() {
		global $post;
		$status = get_post_meta( $post->ID, '_status', true );
		$position = get_post_meta( $post->ID, '_position', true );
		$all_hooks = mdc_woocommerce_hooks();
		
		echo '<input type="hidden" name="woo_block_meta_noncename" id="woo_block_meta_noncename" value="' . 
		wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';
		
		$options = array( 'Select Status', 'Yes', 'No' );
		
		echo '<label><strong>Enable this Block?</strong></label><br />
			<select name="_status">';
		foreach ( $options as $option ) {
			echo '<option ' . selected( $status, $option, fasle ) . '>' . $option . '</option>';
		}
		echo '</select>';

		echo "<br />";

		echo '<label><strong>Location:</strong></label><br />
			<select name="_position">';
		foreach ( $all_hooks as $hook_group => $hooks ) {
			echo '<optgroup label="' .$hook_group. '">';
			foreach ($hooks as $hook_tag=>$hook_name ) {
				$is_disabled = ( is_woo_hook_disabled( $hook_tag ) ) ? "disabled" : "";
				$is_pro = ( is_woo_hook_disabled( $hook_tag ) ) ? " (Pro Feature) " : "";
				echo '<option value="' . $hook_tag . '" ' . selected( $position, $hook_tag, false ) . ' '.$is_disabled.' >' . $hook_name . $is_pro .'</option>';
			}
			echo '</optgroup>';
		}
		echo '</select>';

	}
	

	public function mdc_save_woo_blocks_meta( $post_id, $post ) {
		
		if ( ! wp_verify_nonce( $_POST['woo_block_meta_noncename'], plugin_basename( __FILE__ ) ) ) {
			return $post->ID;
		}

		if ( ! current_user_can( 'edit_post', $post->ID ) ){
			return $post->ID;
		}

		$woo_blocks_meta['_status'] = $_POST['_status'];
		$woo_blocks_meta['_position'] = $_POST['_position'];
		
		foreach ( $woo_blocks_meta as $key => $value ) { // Cycle through the $woo_blocks_meta array!
			if( $post->post_type == 'revision' ) return; // Don't store custom data twice
			$value = implode( ',', (array) $value ); // If $value is an array, make it a CSV (unlikely)
			if( get_post_meta( $post->ID, $key, FALSE )) { // If the custom field already has a value
				update_post_meta( $post->ID, $key, $value );
			} else { // If the custom field doesn't have a value
				add_post_meta( $post->ID, $key, $value );
			}
			if( ! $value ) delete_post_meta( $post->ID, $key ); // Delete if blank
		}

	}

}
new MDC_Meta_Box_Woo_Blocks;