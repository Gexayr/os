<?php
/*
Plugin Name: Yandex Maps Pro
Plugin URI: https://osclass.pro
Description: This plugin shows a latest Yandex Map v2.1 on the every item page.
Version: 1.0.1
Author: Dis
Author URI: https://osclass.pro
Plugin update URI: yandex-maps-pro
*/
   require_once osc_plugins_path() . osc_plugin_folder(__FILE__) . 'ModelYmap.php';
   
   function yandex_maps_pro_location() {
        $item = osc_item() ;
        require 'map.php' ;
    }
	
	function yandex_maps_pro_install() {
        ModelYmap::newInstance()->install();
    }

    function yandex_maps_pro_uninstall() {
        ModelYmap::newInstance()->uninstall();
    }
	
	function yandex_maps_pro_configure_link() {
        osc_redirect_to(osc_route_admin_url('yandex_maps_pro-admin-conf'));
    }
	
	 function yandex_maps_pro_admin_menu() {
        osc_add_admin_submenu_divider('plugins', 'Yandex Maps Pro plugin', 'yandex_maps_pro_divider', 'administrator');
        osc_add_admin_submenu_page('plugins', __('Yandex Maps options', 'yandex_maps_pro'), osc_route_admin_url('yandex_maps_pro-admin-conf'), 'yandex_maps_pro_settings', 'administrator');
    }

    osc_register_plugin(osc_plugin_path(__FILE__), 'yandex_maps_pro_install');
    osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'yandex_maps_pro_configure_link');
    osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'yandex_maps_pro_uninstall');

    osc_add_hook('admin_menu_init', 'yandex_maps_pro_admin_menu');
	
	osc_add_route('yandex_maps_pro-admin-conf', 'yandex_maps_pro/admin/conf', 'yandex_maps_pro/admin/conf', osc_plugin_folder(__FILE__).'admin/conf.php');

    osc_add_hook('location', 'yandex_maps_pro_location') ;


?>