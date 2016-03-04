<?php
/**
 * includes settings page
 */
require plugin_dir_path( __FILE__ ) .  'admin/iiw-settigns.php';

/**
 * Define constants
 */
define('INSERT_INTO_WOO_PRO_URL', 'http://medhabi.com/product/insert-woocommerce-pro/');

/**
 * List all hooks used in template files of woocommerce (../wp-content/plugins/woocommerce/templates)
 * @return array $hooks
 */
function mdc_woocommerce_hooks(){
	$hooks = array(
		'Single Product'	=>	array(
			'woocommerce_before_single_product' => 'Before Single Product',
			'woocommerce_before_single_product_summary' => 'Before Single Product Summary',
			'woocommerce_single_product_summary' => 'With Single Product Summary',
			'woocommerce_after_single_product_summary' => 'After Single Product Summary',
			'woocommerce_before_add_to_cart_form' => 'Before \'Add to cart\' Form',
			'woocommerce_grouped_product_list_before_price' => 'Grouped Product List Before Price',
			'woocommerce_before_add_to_cart_button' => 'Before \'Add to cart\' Button',
			'woocommerce_after_add_to_cart_button' => 'After \'Add to cart\' Button',
			'woocommerce_after_add_to_cart_form' => 'After \'Add to cart\' Form',
			'woocommerce_before_single_variation' => 'Before Single Variation',
			'woocommerce_single_variation' => 'With Single Variation',
			'woocommerce_after_single_variation' => 'After Single Variation',
			'woocommerce_product_meta_start' => 'Before Product Meta',
			'woocommerce_product_meta_end' => 'After Product Meta',
			'woocommerce_product_thumbnails' => 'After Product Thumbnail',
			'woocommerce_review_before_comment_meta' => 'Before Comment Meta in Review',
			'woocommerce_review_before_comment_text' => 'Before Comment Text in Review',
			'woocommerce_review_after_comment_text' => 'After Comment Text in Review',
			'woocommerce_share' => 'After Share Options'
		),
		'Archive Pages'	=>	array(
			'disabled_hook_01' => 'After Taxonomy Description',
			'disabled_hook_02' => 'Before Product Loop/Grid',
			'disabled_hook_03' => 'After Product Loop/Grid',
			'disabled_hook_04' => 'Before Every Items',
			'disabled_hook_05' => 'Before Product Name of Every Items',
			'disabled_hook_06' => 'With Product Name of Every Items',
			'disabled_hook_07' => 'After Product Name of Every Items',
			'disabled_hook_08' => 'After Every Items',
		),
		'Cart'	=>	array(
			'disabled_hook_09' => 'When Cart is Empty',
			'disabled_hook_10' => 'After Shipping Rate',
			'disabled_hook_11' => 'Cart Totals Before Shipping',
			'disabled_hook_12' => 'Cart Totals After Shipping',
			'disabled_hook_13' => 'Cart Totals Before Order Total',
			'disabled_hook_14' => 'Cart Totals After Order Total',
			'disabled_hook_15' => 'Proceed To Checkout',
			'disabled_hook_16' => 'After Cart Totals',
			'disabled_hook_17' => 'Before Cart Totals',
			'disabled_hook_18' => 'Before Cart Contents',
			'disabled_hook_19' => 'With Cart Contents',
			'disabled_hook_20' => 'With Cart Coupon',
			'disabled_hook_21' => 'With Cart Actions',
			'disabled_hook_22' => 'After Cart Contents',
			'disabled_hook_23' => 'After Cart Table',
			'disabled_hook_24' => 'With Cart Collaterals',
			'disabled_hook_25' => 'After Cart',
			'disabled_hook_26' => 'Widget Shopping Cart Before Buttons',
			'disabled_hook_27' => 'Before Mini Cart',
			'disabled_hook_28' => 'After Mini Cart',
			'disabled_hook_29' => 'Before Shipping Calculator',
			'disabled_hook_30' => 'After Shipping Calculator',
		),
		'Checkout'	=>	array(
			'disabled_hook_31' => 'If Cart Has Error',
			'disabled_hook_32' => 'Before Checkout Billing Form',
			'disabled_hook_33' => 'After Checkout Billing Form',
			'disabled_hook_34' => 'Before Checkout Registration Form',
			'disabled_hook_35' => 'After Checkout Registration Form',
			'disabled_hook_36' => 'Before Checkout Form',
			'disabled_hook_37' => 'Before Customer Details',
			'disabled_hook_38' => 'Before Billing Address',
			'disabled_hook_39' => 'Before Shipping Address',
			'disabled_hook_40' => 'After Customer Details',
			'disabled_hook_41' => 'Before Customer Details',
			'disabled_hook_42' => 'With Order Review',
			'disabled_hook_43' => 'After Order Review',
			'disabled_hook_44' => 'After Checkout Form',
			'disabled_hook_45' => 'Pay Order Before Submit',
			'disabled_hook_46' => 'Pay Order After Submit',
			'disabled_hook_47' => 'Before Checkout Shipping Form',
			'disabled_hook_48' => 'After Checkout Shipping Form',
			'disabled_hook_49' => 'Before Order Notes',
			'disabled_hook_50' => 'After Order Notes',
			'disabled_hook_51' => 'Review Order Before Payment',
			'disabled_hook_52' => 'Review Order Before Submit',
			'disabled_hook_53' => 'Review Order After Submit',
			'disabled_hook_54' => 'Review Order After Payment',
			'disabled_hook_55' => 'With Thankyou Message',
			'disabled_hook_56' => 'Review Order Before Cart Contents',
			'disabled_hook_57' => 'Review Order After Cart Contents',
			'disabled_hook_58' => 'Review Order Before Shipping',
			'disabled_hook_59' => 'Review Order After Shipping',
			'disabled_hook_60' => 'Review Order Before Order Total',
			'disabled_hook_61' => 'Review Order After Order Total',
		),
		'Email'	=>	array(
			'disabled_hook_62' => 'Order Details',
			'disabled_hook_63' => 'Order Meta',
			'disabled_hook_64' => 'Customer Details',
			'disabled_hook_65' => 'Before Order Table',
			'disabled_hook_66' => 'After Order Table',
		),
		'Login'	=>	array(
			'disabled_hook_67' => 'Before Login Form',
			'disabled_hook_68' => 'With Login Form',
			'disabled_hook_69' => 'After Login Form',
		),
		'My Account'	=>	array(
			'disabled_hook_70' => 'Before My Account',
			'disabled_hook_71' => 'After My Account',
			'disabled_hook_72' => 'Before Edit Account Form',
			'disabled_hook_73' => 'With Edit Account Form',
			'disabled_hook_74' => 'After Edit Account Form',
			'disabled_hook_75' => 'Before Edit Billing Address Form',
			'disabled_hook_76' => 'After Edit Billing Address Form',
			'disabled_hook_77' => 'Before Customer Login Form',
			'disabled_hook_78' => 'Before Register Form',
			'disabled_hook_79' => 'With Register Form',
			'disabled_hook_80' => 'After Register Form',
			'disabled_hook_81' => 'In \'Lost Password\' Form',
		),
		'Order'	=>	array(
			'disabled_hook_82' => 'Order Details After Customer Details',
			'disabled_hook_83' => 'Before Order Item Meta',
			'disabled_hook_84' => 'After Order Item Meta',
			'disabled_hook_85' => 'After Order Item Table',
			'disabled_hook_86' => 'Order Details After Order Table',
			'disabled_hook_87' => 'After Order View',
		),
		'Others'	=>	array(
			'disabled_hook_88' => 'Before Main Content',
			'disabled_hook_89' => 'After Main Content',
			'disabled_hook_90' => 'Authentication Page Header',
			'disabled_hook_91' => 'Authentication Page Footer',
			'disabled_hook_92' => 'In Content Sidebar',
			'disabled_hook_93' => 'Before Available Downloads',
			'disabled_hook_94' => 'After Available Downloads',
		),
	);

	return apply_filters( 'mdc_woocommerce_hooks', $hooks );
}

/**
 * Checks either woocommerce is activated
 * @return boolean true|false
 */
function is_woo_active(){
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		return true;
	}
	return false;
}

/**
 * Check either this tag should be disabled! For free version only
 * @param $hook_tag the hook tag
 */
function is_woo_hook_disabled( $hook_tag ){
	if( strpos( $hook_tag, 'disabled_' ) !== false ){
		return true;
	}
	return false;
}

/**
 * And some hooks
 */

add_filter( 'user_can_richedit', 'mdc_woo_disable_wysiwyg' );
function mdc_woo_disable_wysiwyg( $default ){
	global $post;
	if( $post->post_type === 'woo-block' ){
		return false;
	}
	if( get_post_type() === 'woo-block' ){
		return false;
	}
	return $default;
}

add_action( 'admin_head', 'mdc_woo_enqueue_scripts' );
function mdc_woo_enqueue_scripts(){
	global $post;
	if( $post->post_type === 'woo-block' || get_post_type() === 'woo-block' ){
		?>
		<script type="text/javascript">
			$ = new jQuery.noConflict();
			$(document).ready(function(){
				$("#insert-media-button, #iiw_general .checkbox").prop("disabled",true);
				$("#wp-content-media-buttons").after('<span>( <a href="<?php echo INSERT_INTO_WOO_PRO_URL; ?>" target="_blank">Upgrade to Pro to enable \'Add Media\' button and WYSIWYG/visual editor</a> )</span>')
			})
		</script>
		<?php
	}
}

add_filter( 'plugin_action_links_' . plugin_basename(INSERT_INTO_WOO_BASE_FILE), 'mdc_woo_add_action_links', 11 );
function mdc_woo_add_action_links ( $links ) {

	$mylinks = array(
		'<a href="'.INSERT_INTO_WOO_PRO_URL.'" target="_blank">Get Pro</a>'
	);
	
	return array_merge( $links, $mylinks );
}
