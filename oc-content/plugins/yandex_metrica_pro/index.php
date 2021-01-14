<?php
/*
Plugin Name: Yandex.Metrica PRO
Plugin URI: osclass.pro
Description: This plugin adds the Yandex.Metrica in the footer of every page.
Version: 1.0.1
Author: osclass.pro
Author URI: osclass.pro
Plugin update URI: yandex-metrica-pro
*/
require_once osc_plugins_path() . osc_plugin_folder(__FILE__) . 'YMModel.php';

    function yandex_metrica_pro_install() {
        YMModel::newInstance()->install();
    }

    function yandex_metrica_pro_uninstall() {
        YMModel::newInstance()->uninstall();
    }

	 function yandex_metrica_pro_menu() {
        osc_add_admin_submenu_page('plugins', __('Yandex.Metrica PRO', 'yandex_metrica_pro'), osc_route_admin_url('ym-menu'), 'yandex_metrica_pro_settings', 'administrator');
    }


    function yandex_metrica_pro_id() {
        return osc_get_preference('yandex_metrica_pro_id', 'yandex_metrica_pro') ;
    }

    function yandex_metrica_pro_footer() {
        if(yandex_metrica_pro_id() != '') {
            require osc_plugins_path() . 'yandex_metrica_pro/footer.php' ;
        }
    }
	
	function yandex_metrica_pro_admin() {
        osc_redirect_to(osc_route_admin_url('ym-menu'));
    }
	
    osc_add_route('ym-menu', 'yandex_metrica_pro/admin', 'yandex_metrica_pro/admin', osc_plugin_folder(__FILE__).'admin/admin.php');
		
    osc_register_plugin(osc_plugin_path(__FILE__), 'yandex_metrica_pro_install') ;
    osc_add_hook(osc_plugin_path(__FILE__)."_uninstall", 'yandex_metrica_pro_uninstall') ;
    osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'yandex_metrica_pro_admin') ;
    osc_add_hook('footer', 'yandex_metrica_pro_footer') ;
	osc_add_hook('admin_menu_init', 'yandex_metrica_pro_menu');


?>