<?php
/*
 * Copyright 2014 Osclass
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
  * Changes by Maxrom:
 * Added custom banners and deleted default in featured section.
 */
    function addHelp() {
        echo '<p>' . __('Browse and download available Osclass plugins, from a constantly-updated selection. After downloading a plugin, you have to install it and configure it to get it up and running.') . '</p>';
    }
    osc_add_hook('help_box','addHelp');
    osc_current_admin_theme_path('market/header.php');

    $title      = __get('title');
    $section    = __get('section');


if($section=='plugins') { ?>
<div class="grid-market">

    <h2 class="section-title"><?php _e('Рекомендуемые'); ?></h2>
<a href="https://osclass-pro.ru/russian_ultimate_payments.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/russian_ultimate_paymetns_plugin_new.png);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Плагин оплаты для монетизации</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/russian_ultimate_payments.html" data-type="theme">Посмотреть</span>
					</div></div></div></a>
                    <a href="https://osclass-pro.ru/seo_pro_plugin.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/cache/catalog/osclass_seo_pro_plugin-250x250.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Плагин SEO PRO</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/seo_pro_plugin.html" data-type="theme">Посмотреть</span>
					</div></div></div></a>
					<a href="https://osclass-pro.ru/ultimate_social_login.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/cache/catalog/social/osclass_ultimate_social_login-250x250.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Плагин авторизации через соцсети</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/ultimate_social_login.html" data-type="theme">Посмотреть</span>
					</div></div></div></a>
</div>
<div class="grid-market">

    <h2 class="section-title"></h2>
<a href="https://osclass-pro.ru/ultimate_messaging.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/cache/catalog/messages/osclass_ultimate_messaging-250x250.png);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Плагин личных сообщений</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/ultimate_messaging.html" data-type="theme">Посмотреть</span>
					</div></div></div></a>
                    <a href="https://osclass-pro.ru/plugin_oplata_robokassa.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/cache/catalog/osclass_plugin_oplata_robokassa-250x250.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Плагин Robokassa</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/plugin_oplata_robokassa.html" data-type="theme">Посмотреть</span>
					</div></div></div></a>
					<a href="https://osclass-pro.ru/google_maps_pro.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/cache/catalog/maps/google_maps_pro_osclass_plugin-250x250.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Плагин Google Maps Pro</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/google_maps_pro.html" data-type="theme">Посмотреть</span>
					</div></div></div></a>
</div>
<?php }
if($section=='themes') { ?>
<div class="grid-market">

    <h2 class="section-title"><?php _e('Рекомендуемые'); ?></h2>
		<a href="https://osclass-pro.ru/theme_bitfinder.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" >
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/bitfinder_responsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Bitfinder</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/theme_bitfinder.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
		 <a href="https://osclass-pro.ru/theme_fino.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" >
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/fino_respinsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Fino</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/theme_fino.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
		 <a href="https://osclass-pro.ru/theme_violet.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" >
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/violet_responsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Violet</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/theme_violet.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
</div>
<div class="grid-market">

    <h2 class="section-title"></h2>
		<a href="https://osclass-pro.ru/eva_theme.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" >
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/eva_responsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Eva</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/eva_theme.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
		 <a href="https://osclass-pro.ru/theme_bello.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" >
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/bello_responsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Bello</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/theme_bello.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
		 <a href="https://osclass-pro.ru/theme-next-revo.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" >
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/nextrevo_responsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Next Revo</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/theme-next-revo.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
</div>
<?php } ?> 
<?php if($section=='languages') { ?>
<div class="grid-market">
    <h2 class="section-title">Языки</h2>
	<div class="help-box"> 
	Новые языки Вы можете бесплатно скачать здесь  <a href="https://osclass.pro/category/languages/" target="_blank">https://osclass.pro/category/languages/</a>
	Новый язык можно добавить в пару кликов.
Вначале нужно скачать архив с языком, а затем загрузить его через Настройки — Языки — Добавить.
</div>
</div>
	<?php } ?>
<?php osc_current_admin_theme_path( 'parts/footer.php' ); ?>
