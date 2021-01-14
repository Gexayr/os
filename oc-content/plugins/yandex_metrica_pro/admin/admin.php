<?php defined('ABS_PATH') or die('Access denied'); 

    if(Params::getParam('plugin_action')=='done') {
        osc_set_preference('yandex_metrica_pro_id', Params::getParam("yandex_metrica_pro_id"), 'yandex_metrica_pro', 'STRING');
		osc_set_preference('webvisor', Params::getParam("webvisor") ? Params::getParam("webvisor") : '0', 'yandex_metrica_pro', 'BOOLEAN');
		osc_set_preference('webvisor_new', Params::getParam("webvisor_new") ? Params::getParam("webvisor_new") : '0', 'yandex_metrica_pro', 'BOOLEAN');
		osc_set_preference('altercdn', Params::getParam("altercdn") ? Params::getParam("altercdn") : '0', 'yandex_metrica_pro', 'BOOLEAN');
		osc_set_preference('hash', Params::getParam("hash") ? Params::getParam("hash") : '0', 'yandex_metrica_pro', 'BOOLEAN');
		osc_set_preference('noindex', Params::getParam("noindex") ? Params::getParam("noindex") : '0', 'yandex_metrica_pro', 'BOOLEAN');
		        ob_get_clean();
        osc_add_flash_ok_message(__('Congratulations, the plugin is now configured', 'yandex_metrica_pro'), 'admin');
        osc_redirect_to(osc_route_admin_url('ym-menu'));
   
    }

?>
<link rel="stylesheet" href="<?php echo osc_base_url();?>/oc-content/plugins/yandex_metrica_pro/admin/css/admin.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<h1>Yandex.Metrica PRO</h1>
</br>
<h2 class="render-title"><b><i class="fa fa-cog"></i> <?php _e('Yandex Metrica settings', 'yandex_metrica_pro'); ?></b></h2>
<form action="<?php osc_admin_base_url(true); ?>" method="post">
        <input type="hidden" name="page" value="plugins" />
        <input type="hidden" name="action" value="renderplugin" />
        <input type="hidden" name="route" value="ym-menu" />
    <input type="hidden" name="plugin_action" value="done" />
    
    <div>
	<div class="form-row">
                        <div class="form-controls">
                            <div class="form-label-checkbox">
                                <label>
                                    <input type="checkbox" <?php echo (osc_get_preference('webvisor', 'yandex_metrica_pro') ? 'checked="true"' : ''); ?> name="webvisor" value="1" />
                                    <?php _e('Allow Webvisor', 'yandex_metrica_pro'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
		<div class="form-row">
                        <div class="form-controls">
                            <div class="form-label-checkbox">
                                <label>
                                    <input type="checkbox" <?php echo (osc_get_preference('webvisor_new', 'yandex_metrica_pro') ? 'checked="true"' : ''); ?> name="webvisor_new" value="1" />
                                    <?php _e('Use Webvisor 2.0', 'yandex_metrica_pro'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
	<div class="form-row">
                        <div class="form-controls">
                            <div class="form-label-checkbox">
                                <label>
                                    <input type="checkbox" <?php echo (osc_get_preference('hash', 'yandex_metrica_pro') ? 'checked="true"' : ''); ?> name="hash" value="1" />
                                    <?php _e('Track hash in URL', 'yandex_metrica_pro'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
	<div class="form-row">
                        <div class="form-controls">
                            <div class="form-label-checkbox">
                                <label>
                                    <input type="checkbox" <?php echo (osc_get_preference('noindex', 'yandex_metrica_pro') ? 'checked="true"' : ''); ?> name="noindex" value="1" />
                                    <?php _e('Disallow automatic indexing of site pages', 'yandex_metrica_pro'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
        <p>
            <?php _e('Please enter your Yandex.Metrika id', 'yandex_metrica_pro') ; ?> <label for="id" style="font-weight: bold;"></label>: <input type="text" class="xlarge" name="yandex_metrica_pro_id" value="<?php echo osc_get_preference('yandex_metrica_pro_id', 'yandex_metrica_pro'); ?>" /> 
			<div class="form-actions">
            <input type="submit" id="save_changes" value="<?php echo osc_esc_html(__("Save", 'yandex_metrica_pro')); ?>" class="btn btn-submit">
        </div>
        </p>
        <p>
            <?php _e('You can get your id here <a href="http://metrika.yandex.ru/">Yandex.Metrica</a>', 'yandex_metrica_pro') ; ?>
        </p>
    </div>
</form>
	<address class="osclasspro_address">
	<b><span><?php _e('Premium Themes and plugins', 'yandex_metrica_pro'); ?>: <a target="_blank" title="osclass-pro.ru" href="https://osclass-pro.ru/">osclass-pro.ru</a></span>
	<span><?php _e('Russian Forum', 'yandex_metrica_pro'); ?>: <a target="_blank" title="4osclass.net" href="https://4osclass.net/">4osclass.net</a></span></b>
  </address>