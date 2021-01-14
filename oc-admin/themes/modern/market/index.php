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
 * Added custom banners.
 * Disabled connection to Closed Market.
 */

    function addHelp() {
        echo '<p>' . __('Browse and download available Osclass plugins, from a constantly-updated selection. After downloading a plugin, you have to install it and configure it to get it up and running.') . '</p>';
    }
    osc_add_hook('help_box','addHelp');
    osc_current_admin_theme_path('market/header.php');


?>

		<a href="https://osclass-pro.ru/pack9.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" style="margin-right: 30px;">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/bitfinder_responsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Bitfinder+SEO+Плагин оплаты</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/pack9.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
		 <a href="https://osclass-pro.ru/pack7.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" >
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/fino_respinsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Fino+SEO+Плагин оплаты</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/pack7.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>
		 <a href="https://osclass-pro.ru/pack_pro10.html" target="_blank" class="mk-item-parent is-featured"><div class="mk-item mk-item-theme" style="margin-right: 30px;">
					<div class="banner" style="background-image:url(https://osclass-pro.ru/image/templates/violet_responsive.jpg);"></div>
					<div class="mk-info"><i class="flag"></i>
					<h3>Violet+SEO+Плагин оплаты</h3>
					<i class="author">osclass-pro.ru</i>
					<div class="market-actions"> 
					<span class="buy-btn" data-code="https://osclass-pro.ru/pack_pro10.html" data-type="theme">Посмотреть</span>
					</div></div></div>
         </a>


<div class="grid-market">
    <h2 class="section-title"><?php _e('Recommended themes for You'); ?> </h2>
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
    <h2 class="section-title"><?php _e('Recommended plugins for You'); ?></h2>

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
<?php osc_current_admin_theme_path( 'parts/footer.php' ); ?>