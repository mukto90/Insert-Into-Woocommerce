<?php

/**
 * @author Nazmul Ahsan <n.mukto@gmail.com>
 */
require_once dirname( __FILE__ ) . '/class.settings-api.php';

if ( !class_exists('MDC_iiw_Comments_Settings' ) ):
class MDC_iiw_Comments_Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_submenu_page( 'edit.php?post_type=woo-block', 'WooBlocks Settings', 'WooBlocks Settings', 'manage_options', 'insert-into-woocommerce-settings', array($this, 'iiw_comments_settings_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'iiw_general',
                'title' => null
            ),        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'iiw_general' => array(
                array(
                    'name'    => 'enable_wysiwyg',
                    'label'   => __( 'Enable WYSIWYG', 'insert-into-woocommerce' ),
                    'desc'    => __( 'Enable WYSIWYG (What You See Is What You Get) in the editor (<span><a href="'.INSERT_INTO_WOO_PRO_URL.'" target="_blank">Pro Feature</a></span>)', 'insert-into-woocommerce' ),
                    'type'    => 'checkbox',
                ),
                array(
                    'name'    => 'enable_media',
                    'label'   => __( 'Enable Media Button', 'insert-into-woocommerce' ),
                    'desc'    => __( 'Enable Media Button in the editor (<span><a href="'.INSERT_INTO_WOO_PRO_URL.'" target="_blank">Pro Feature</a></span>)', 'insert-into-woocommerce' ),
                    'type'    => 'checkbox',
                ),
                array(
                    'name'    => 'unlock_all_loc',
                    'label'   => __( 'Unlock All Locations', 'insert-into-woocommerce' ),
                    'desc'    => __( 'This will unlock all locations to insert woo-block in (<span><a href="'.INSERT_INTO_WOO_PRO_URL.'" target="_blank">Pro Feature</a></span>)', 'insert-into-woocommerce' ),
                    'type'    => 'checkbox',
                ),
            ),
        );

        return $settings_fields;
    }

    function iiw_comments_settings_page() {
        echo '<div class="wrap mdc-mask-comment free-version">';
        
        echo '<h2>Insert Into Woocommerce</h2>';

        // $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

    public function user_levels(){
        global $wp_roles;
        $roles = $wp_roles->get_names();
        $user_levels = array();
        foreach ($roles as $role_id => $role_name) {
            $user_levels[$role_id]  =  $role_name;
        }
        return $user_levels;
    }

    public function post_types(){
        $args = array(
            'public'    =>  true
            );
        $all_post_types = get_post_types($args);
        $post_types = array();
        foreach ($all_post_types as $cpt_id => $cpt_name) {
            if( 'attachment' != $cpt_name ){    // exclude attachments
                $post_types[$cpt_id]  =  $cpt_name;
            }
        }
        return $post_types;
    }

}
endif;

new MDC_iiw_Comments_Settings();