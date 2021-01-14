<?php if (!defined('OC_ADMIN') || OC_ADMIN !== true) exit('Access is not allowed.');

if (Params::getParam('plugin_action') == 'done') {
    osc_set_preference('maxPixels', Params::getParam("maxPixels"), 'preResize_images', 'INTEGER');

    osc_add_flash_ok_message(__('Settings changed'), 'admin');

    $redirect_url = osc_admin_render_plugin_url(osc_plugin_folder(__FILE__) . 'settings.php');
    header("Location: $redirect_url");
} ?>

<div id="general-settings">
    <h2 class="render-title"><?php echo 'Pre-resize Images settings'; ?></h2>
    <ul id="error_list"></ul>
    <form name="przi_form" action="<?php echo osc_admin_base_url(true); ?>" method="post">
        <input type="hidden" name="page" value="plugins"/>
        <input type="hidden" name="action" value="renderplugin"/>
        <input type="hidden" name="file" value="<?php echo osc_plugin_folder(__FILE__); ?>settings.php"/>
        <input type="hidden" name="plugin_action" value="done"/>
        <fieldset>
            <div class="form-horizontal">
                <div class="form-row">
                    <div><?php echo 'Maximum size in pixels for any dimension:'; ?></div>
                    <div>
                        <input type="number" class="large" name="maxPixels"
                               value="<?php echo osc_get_preference('maxPixels', 'preResize_images'); ?>"/>
                    </div>
                </div>

                <div class="clear"></div>
                <div class="form-actions">
                    <input type="submit" id="save_changes" value="<?php echo osc_esc_html(__('Save changes')); ?>"
                           class="btn btn-submit"/>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<br/><br/>
<style>
    .help .code {
        font-family: monospace;
        font-size: 16px;
        padding-left: 20px;
    }
</style>
<div class='help'>
    <h2 class='render-title sub_heading'><?php echo 'Setup' ?></h2>

    <p><?php echo "For this plugin to work you need to make a little modification in your theme. Find all occurrences of this line:"; ?>
        <br/>
    </p>

    <p class='code'>ItemForm::ajax_photos();</p>

    <p><?php echo '(Usually found in <strong>item-post.php</strong> and possibly <strong>item-edit.php</strong> as well)'; ?></p>

    <p><?php echo 'Replace it with:'; ?></p> 

    <p class='code'>if (function_exists('przi_ajax_uploader')) przi_ajax_photos();<br/>else ItemForm::ajax_photos();</p>
</div>