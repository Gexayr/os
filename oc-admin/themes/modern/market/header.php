<?php
/*
 * Changes by Maxrom:
 * Added custom text in header and banner.
 */
    // check requirements
    if( !is_writable( ABS_PATH . 'oc-content/downloads/' ) ) {
        osc_add_flash_error_message( sprintf(_m('<code>downloads</code> folder has to be writable, i.e.: <code>chmod a+w %soc-content/downloads/</code>'), ABS_PATH), 'admin');
    }

    // fancybox
    osc_enqueue_script('fancybox');
    osc_enqueue_style('fancybox', osc_assets_url('js/fancybox/jquery.fancybox.css'));


    function gradienColors(){
        $letters = str_split('abgi');
        shuffle($letters);
        return $letters;
    }
    if(!function_exists('addBodyClass')){
        function addBodyClass($array){
                   $array[] = 'market';
            return $array;
        }
    }
    osc_add_filter('admin_body_class','addBodyClass');


    function customPageHeader() {
        $action = Params::getParam("action"); ?>
        <div class="header-title-market">
            <h1><?php _e('Discover how to improve your Osclass!'); ?></h1>
            <h2>Osclass можно улучшить шаблонами и плагинами.<br/>Особенно выгодно купить пакет из шаблона и плагинов на <a href="https://osclass-pro.ru/packs/" target="_blank" class="  is-featured">osclass-pro.ru</a>
			</h2>
        </div>
        <div class="banner-market">
		<a href="https://osclass-pro.ru/pack9.html" target="_blank" class="is-featured"><div class="mk-item mk-item-theme">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/bitfinder_responsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Bitfinder+SEO+Плагин оплаты</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/pack9.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
        </div>
        <ul class="tabs">
            <li <?php if($action == 'plugins'){ echo 'class="active"';} ?>><a href="<?php echo osc_admin_base_url(true).'?page=market&action=plugins'; ?>"><?php _e('Plugins'); ?></a></li>
            <li <?php if($action == 'themes'){ echo 'class="active"';} ?>><a href="<?php echo osc_admin_base_url(true).'?page=market&action=themes'; ?>"><?php _e('Themes'); ?></a></li>
            <li <?php if($action == 'languages'){ echo 'class="active"';} ?>><a href="<?php echo osc_admin_base_url(true).'?page=market&action=languages'; ?>"><?php _e('Languages'); ?></a></li>
        </ul>
<?php
    }
    osc_add_hook('admin_page_header','customPageHeader');

    function customPageTitle($string) {
        return __('Market');
    }
    osc_add_filter('admin_title', 'customPageTitle');
    osc_current_admin_theme_path( 'parts/header.php' );
?>