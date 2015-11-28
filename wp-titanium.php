<?php
/**
 * Plugin Name: WordPress Tools for Titanium
 * Plugin URI: http://AndrewNatoli.com
 * Description: This plugin
 * Version: 1.0.0
 * Author: Daniel Pataki
 * Author URI: http://danielpataki.com
 * License: GPL2
 */
defined( 'ABSPATH' ) or die();

if( is_admin() ) {
    require_once dirname(__FILE__) . "/tgmpa/class-tgm-plugin-activation.php";

    function wpti_register_required_plugins()
    {
        $plugins = array(
            array(
                "name" => "WP REST API (WP API)",
                "slug" => "json-rest-api",
                "required" => true,
                "force_activation" => true,
            ),

            array(
                "name" => "WP API Menus",
                "slug" => "wp-api-menus",
                "required" => true,
                "force_activation" => true
            )
        );

        $config = array(
            "id" => "wpti",
            'default_path' => '',
            'menu' => 'tgmpa-install-plugins',
            'parent_slug' => 'plugins.php',
            'capability' => 'install_plugins',
            'has_notices' => true,
            'dismissable' => false,
            'dismiss_msg' => '',
            'is_automatic' => true,                   // Automatically activate plugins after installation or not.
            'message' => '',
        );

        tgmpa($plugins, $config);
    }

    add_action("tgmpa_register", "wpti_register_required_plugins");

}

