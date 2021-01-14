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
 * Changes by osclass.pro:
 * File Tranlsated in to Russian. Replaced urls from osclass.org to osclass.pro and 4osclass.net
 */

error_reporting(E_ERROR | E_CORE_ERROR | E_COMPILE_ERROR | E_PARSE);

define( 'ABS_PATH', dirname(dirname(dirname(__FILE__))) . '/' );
define( 'LIB_PATH', ABS_PATH . 'oc-includes/' );
define( 'CONTENT_PATH', ABS_PATH . 'oc-content/' );
define( 'TRANSLATIONS_PATH', CONTENT_PATH . 'languages/' );
define( 'OSC_INSTALLING', 1 );

if(extension_loaded('mysqli')) {
    require_once LIB_PATH . 'osclass/Logger/Logger.php';
    require_once LIB_PATH . 'osclass/Logger/LogDatabase.php';
    require_once LIB_PATH . 'osclass/Logger/LogOsclass.php';
    require_once LIB_PATH . 'osclass/classes/database/DBConnectionClass.php';
    require_once LIB_PATH . 'osclass/classes/database/DBCommandClass.php';
    require_once LIB_PATH . 'osclass/classes/database/DBRecordsetClass.php';
    require_once LIB_PATH . 'osclass/classes/database/DAO.php';
    require_once LIB_PATH . 'osclass/model/Preference.php';
    require_once LIB_PATH . 'osclass/helpers/hPreference.php';
}
require_once LIB_PATH . 'osclass/core/iObject_Cache.php';
require_once LIB_PATH . 'osclass/core/Object_Cache_Factory.php';
require_once LIB_PATH . 'osclass/helpers/hCache.php';

require_once LIB_PATH . 'osclass/core/Session.php';
require_once LIB_PATH . 'osclass/core/Params.php';
require_once LIB_PATH . 'osclass/helpers/hDatabaseInfo.php';
require_once LIB_PATH . 'osclass/helpers/hDefines.php';
require_once LIB_PATH . 'osclass/helpers/hErrors.php';
require_once LIB_PATH . 'osclass/helpers/hLocale.php';
require_once LIB_PATH . 'osclass/helpers/hSearch.php';
require_once LIB_PATH . 'osclass/helpers/hPlugins.php';
require_once LIB_PATH . 'osclass/helpers/hTranslations.php';
require_once LIB_PATH . 'osclass/helpers/hSanitize.php';
require_once LIB_PATH . 'osclass/default-constants.php';
require_once LIB_PATH . 'osclass/install-functions.php';
require_once LIB_PATH . 'osclass/utils.php';
require_once LIB_PATH . 'osclass/core/Translation.php';
require_once LIB_PATH . 'osclass/classes/Plugins.php';
require_once LIB_PATH . 'osclass/locales.php';


Params::init();
Session::newInstance()->session_start();

$locales = osc_listLocales();

if(Params::getParam('install_locale')!='') {
    Session::newInstance()->_set('userLocale', Params::getParam('install_locale'));
    Session::newInstance()->_set('adminLocale', Params::getParam('install_locale'));
}

if(Session::newInstance()->_get('adminLocale')!='' && key_exists(Session::newInstance()->_get('adminLocale'), $locales)) {
    $current_locale = Session::newInstance()->_get('adminLocale');
} else if(isset($locales['ru_RU'])) {
    $current_locale = 'ru_RU';
} else {
    $current_locale = key($locales);
}

Session::newInstance()->_set('userLocale', $current_locale);
Session::newInstance()->_set('adminLocale', $current_locale);


$translation = Translation::newInstance(true);

$step = Params::getParam('step');
if( !is_numeric($step) ) {
    $step = '1';
}

if( is_osclass_installed( ) ) {
    $message = __("Похоже, вы уже установили Osclass. Чтобы переустановить, сначала очистите старые таблицы базы данных.");
    osc_die('Osclass &raquo; Error', $message);
}

switch( $step ) {
    case 1:
        $requirements = get_requirements();
        $error        = check_requirements($requirements);
        break;
    case 2:
        if( Params::getParam('save_stats') == '1'  || isset($_COOKIE['osclass_save_stats'])) {
            setcookie('osclass_save_stats', 1, time() + (24*60*60) );
        } else {
            setcookie('osclass_save_stats', 0, time() + (24*60*60) );
        }

        if( Params::getParam('ping_engines') == '1' || isset($_COOKIE['osclass_ping_engines']) ) {
            setcookie('osclass_ping_engines', 1, time() + (24*60*60) );
        } else {
            setcookie('osclass_ping_engines', 0, time()+ (24*60*60) );
        }

        break;
    case 3:
        if( Params::getParam('dbname') != '' ) {
            $error = oc_install();
        }
        break;
    case 4:
        if( Params::getParam('result') != '' ) {
            $error = Params::getParam('result');
        }
        $password = Params::getParam('password', false, false);
        break;
    case 5:
        $password = Params::getParam('password', false, false);
        break;
    default:
        break;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru-RU" xml:lang="ru-RU">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php _e('Osclass Installation'); ?></title>
        <script src="<?php echo get_absolute_url(); ?>oc-includes/osclass/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo get_absolute_url(); ?>oc-includes/osclass/assets/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo get_absolute_url(); ?>oc-includes/osclass/installer/vtip/vtip.js" type="text/javascript"></script>
        <script src="<?php echo get_absolute_url(); ?>oc-includes/osclass/assets/js/jquery.json.js" type="text/javascript"></script>
        <script src="<?php echo get_absolute_url(); ?>oc-includes/osclass/installer/install.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_absolute_url(); ?>oc-includes/osclass/installer/install.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_absolute_url(); ?>oc-includes/osclass/installer/vtip/css/vtip.css" />
    </head>
    <body>
        <div id="wrapper">
            <div id="container">
                <div id="header" class="installation">
                    <h1 id="logo">
                        <img src="<?php echo get_absolute_url(); ?>oc-includes/images/osclass-logo.png" alt="Osclass" title="Osclass" />
                    </h1>
                    <?php if(in_array($step, array(2,3))) { ?>
                    <ul id="nav">
                        <li class="<?php if($step == 2) { ?>actual<?php } elseif($step < 2) { ?>next<?php } else { ?>past<?php }?>">1 - База данных</li>
                        <li class="<?php if($step == 3) { ?>actual<?php } elseif($step < 3) { ?>next<?php } else { ?>past<?php }?>">2 - Установка</li>
                    </ul>
                    <div class="clear"></div>
                    <?php } ?>
                </div>
                <div id="content">
                <?php if($step == 1) { ?>
                    <h2 class="target"><?php _e('Добро пожаловать');?></h2>
                    <form action="install.php" method="post">
                        <div class="form-table">
                            <?php if( count($locales) > 1 ) { ?>
                                <div>
                                    <label for="install_locale"><?php _e('Выберите язык'); ?></label>
                                    <select name="install_locale" id="install_locale" onchange="window.location.href='?install_locale='+document.getElementById(this.id).value">
                                        <?php foreach($locales as $k => $locale) {?>
                                            <option value="<?php echo osc_esc_html($k); ?>" <?php if( $k == $current_locale ) { echo 'selected="selected"'; } ?>><?php echo $locale['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <?php } ?>
                            <?php if($error) { ?>
                                <p><?php _e('Проверьте следующие требования:');?></p>
                                <div class="requirements_help">
                                    <p><b><?php _e('Требования:'); ?></b></p>
                                    <ul>
                                        <?php foreach($requirements as $k => $v) { ?>
                                            <?php  if(!$v['fn'] && $v['solution'] != ''){ ?>
                                                <li><?php echo $v['solution']; ?></li>
                                            <?php } ?>
                                        <?php } ?>
                                        <li><a href="https://4osclass.net/" hreflang="en"><?php _e('Нужна дополнительная помощь?');?></a></li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <p><?php _e('Отлично! Все требования выполнены:');?></p>
                            <?php } ?>
                            <ul>
                                <?php foreach($requirements as $k => $v) { ?>
                                    <li><?php echo $v['requirement']; ?> <img src="<?php echo get_absolute_url(); ?>oc-includes/images/<?php echo $v['fn'] ? 'tick.png' : 'cross.png'; ?>" alt="" title="" /></li>
                                <?php } ?>
                            </ul>
                            <div class="more-stats">
                                <input type="checkbox" name="ping_engines" id="ping_engines" checked="checked" value="1" />
                                <label for="ping_engines">
                                    <?php _e('Разрешить поисковым системам(таким как Google) индексировать сайт ?.');?>
                                </label>
                                <br />
                                <input type="checkbox" name="save_stats" id="save_stats" checked="checked" value="1" />
                                <input type="hidden" name="step" value="2" />
                                <label for="save_stats">
                                    <?php _e('Помогите сделать Osclass лучше, автоматически отправляя статистику использования и отчеты о сбоях.');?>
                                </label>
                            </div>
                        </div>
                        <?php if($error) { ?>
                            <p class="margin20">
                                <input type="button" class="button" onclick="document.location = 'install.php?step=1'" value="<?php echo osc_esc_html( __('Попробуй еще раз'));?>" />
                            </p>
                        <?php } else { ?>
                            <p class="margin20">
                                <input type="submit" class="button" value="<?php echo osc_esc_html( __('Запустить установку'));?>" />
                            </p>
                        <?php } ?>
                    </form>
                <?php } elseif($step == 2) {
                         display_database_config();
                    } elseif($step == 3) {
                        if( !isset($error["error"]) ) {
                            display_target();
                        } else {
                            display_database_error($error, ($step - 1));
                        }
                    } elseif($step == 4) {
                        // ping engines
                        ping_search_engines($_COOKIE['osclass_ping_engines']);
                        setcookie('osclass_save_stats', '', time() - 3600);
                        setcookie('osclass_ping_engines', '', time() - 3600);

                        // copy robots.txt
                        $source = LIB_PATH . 'osclass/installer/robots.txt';
                        $destination = ABS_PATH . 'robots.txt';
                        if (function_exists('copy')) {
                            @copy($source, $destination);
                        } else {
                            $contentx = @file_get_contents($source);
                            $openedfile = fopen($destination, "w");
                            fwrite($openedfile, $contentx);
                            fclose($openedfile);
                            if ($contentx === FALSE) {
                                $status = false;
                            } else {
                                $status = true;
                            }
                        }
                        display_finish($password);
                    }
                ?>
                </div>
                <div id="footer">
                    <ul>
                        <li>
                            <a href="<?php echo get_absolute_url(); ?>/oc-includes/osclass/installer/readme.php" target="_blank" hreflang="ru"><?php _e('Прочти меня'); ?></a>
                        </li>
                        <li>
                            <a href="https://osclass.pro/dokumentaciya/" target="_blank" hreflang="ru"><?php _e('Документация'); ?></a>
                        </li>
                        <li>
                            <a href="https://4osclass.net" target="_blank" hreflang="ru"><?php _e('Форум');?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
