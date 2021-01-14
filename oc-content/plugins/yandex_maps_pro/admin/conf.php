<?php
/*
 * Copyright 2016 osclass-pro.ru
 *
 * You shall not distribute this plugin and any its files (except third-party libraries) to third parties.
 * Rental, leasing, sale and any other form of distribution are not allowed and are strictly forbidden.
 */

    if(Params::getParam('plugin_action')=='done') {

        osc_set_preference('api_key', Params::getParam("api_key"), 'yandex_maps_pro', 'STRING');
        ob_get_clean();
        osc_add_flash_ok_message(__('Congratulations, the plugin is now configured', 'yandex_maps_pro'), 'admin');
        osc_redirect_to(osc_route_admin_url('yandex_maps_pro-admin-conf'));
    }
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<link rel="stylesheet" href="<?php echo osc_base_url();?>/oc-content/plugins/yandex_maps_pro/admin/css/admin.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="<?php echo osc_base_url();?>oc-content/plugins/yandex_maps_pro/admin/js/jscolor.js"></script>
<div class="credit-osclasspro"> <a href="http://osclass.pro/" target="_blank" class="pro_logo"> <img src="<?php echo osc_base_url();?>/oc-content/plugins/yandex_maps_pro/admin/img/logo.png" title="Osclass русское сообщество" /> </a>
</div>
</br>
<div class="clear"></div>
    <div id="general-setting">
	
        <h2 class="render-title"><b><i class="fa fa-cog"></i> <?php _e('Yandex Maps settings', 'yandex_maps_pro'); ?></b></h2>
        <ul id="error_list"></ul>
        <form name="yandex_maps_pro_form" action="<?php echo osc_admin_base_url(true); ?>" method="post">
            <input type="hidden" name="page" value="plugins" />
            <input type="hidden" name="action" value="renderplugin" />
            <input type="hidden" name="route" value="yandex_maps_pro-admin-conf" />
            <input type="hidden" name="plugin_action" value="done" />
            <fieldset>
                <div class="form-horizontal">
                    
                    <div class="form-row paypal">
                        <div class="form-label"><?php _e('API key', 'yandex_maps_pro'); ?></div>
                        <div class="form-controls"><input type="text" class="xlarge" name="api_key" value="<?php echo osc_get_preference('api_key', 'yandex_maps_pro'); ?>" /></div>
                    </div>
        
                    <div class="clear"></div>
                    <div class="form-actions">
                        <input type="submit" id="save_changes" value="<?php echo osc_esc_html( __('Save changes', 'yandex_maps_pro') ); ?>" class="btn btn-submit" />
                    </div>
                </div>
            </fieldset>
        </form>
		<h2 class="render-title"><b><i class="fa fa-cog"></i> <?php _e('Help', 'yandex_maps_pro'); ?></b></h2>
		<p><?php _e('Plugin work with latest API 2.1', 'yandex_maps_pro'); ?></p>
		<p><?php _e('You can work for free with Yandex Maps before 25000 request for a day.', 'yandex_maps_pro'); ?></p>
		<p><?php _e('Go to', 'yandex_maps_pro'); ?></p><a style="color:#2aa4db;" href="https://developer.tech.yandex.ru/services/" target="_blank">https://developer.tech.yandex.ru/services/</a></p>
		<p><?php _e('Click button Connect APIs', 'yandex_maps_pro'); ?></p>
		<p><?php _e('Select JavaScript API and Geocoder HTTP API', 'yandex_maps_pro'); ?></p>
		<p><?php _e('Get the Key and add to plugin settings', 'yandex_maps_pro'); ?></p>
		<p><?php _e('API docs and examples here: ', 'yandex_maps_pro'); ?><a style="color:#2aa4db;" href="https://tech.yandex.ru/maps/doc/jsapi/2.1/quick-start/tasks/quick-start-docpage/" target="_blank">https://tech.yandex.ru/maps/doc/jsapi/2.1/quick-start/tasks/quick-start-docpage/</a></p>
		<p><?php _e('You can edit map in file /oc-content/plugins/yandex_maps_pro/map.php', 'yandex_maps_pro'); ?></p>
	<address class="osclasspro_address">
	<b><span><?php _e('Premium Themes and plugins', 'yandex_maps_pro'); ?>: <a target="_blank" title="osclass-pro.ru" href="https://osclass-pro.ru/">osclass-pro.ru</a></span>
	<span><?php _e('Russian Forum', 'yandex_maps_pro'); ?>: <a target="_blank" title="4osclass.net" href="https://4osclass.net/">4osclass.net</a></span></b>
  </address>
	<?php echo '<script src="' . osc_base_url() . 'oc-content/plugins/yandex_maps_pro/admin/js/jquery.admin.js"></script>'; ?>
</div>