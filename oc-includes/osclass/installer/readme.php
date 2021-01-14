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
 * File Tranlsated in to Russian by osclass.pro. Replaced urls from osclass.org to osclass.pro and 4osclass.net
 */
require_once dirname(dirname(dirname(__FILE__))) . '/htmlpurifier/HTMLPurifier.auto.php';
function _purify($value, $xss_check)
{
    if( !$xss_check ) {
        return $value;
    }

    $_config = HTMLPurifier_Config::createDefault();
    $_config->set('HTML.Allowed', '');
    $_config->set('Cache.SerializerPath', dirname(dirname(dirname(dirname(__FILE__)))) . '/oc-content/uploads/');

    $_purifier = new HTMLPurifier($_config);


    if( is_array($value) ) {
        foreach($value as $k => &$v) {
            $v = _purify($v, $xss_check); // recursive
        }
    } else {
        $value = $_purifier->purify($value);
    }

    return $value;
}
function getServerParam($param, $htmlencode = false, $xss_check = true, $quotes_encode = true)
{
    if ($param == "") return '';
    if (!isset($_SERVER[$param])) return '';
    $value = _purify($_SERVER[$param], $xss_check);
    if ($htmlencode) {
        if($quotes_encode) {
            return htmlspecialchars(stripslashes($value), ENT_QUOTES);
        } else {
            return htmlspecialchars(stripslashes($value), ENT_NOQUOTES);
        }
    }

    if(get_magic_quotes_gpc()) {
        $value = strip_slashes_extended($value);
    }

    return ($value);
}
function osc_getRelativeWebURL() {
    $url = getServerParam('REQUEST_URI', false, false);
    $pos = strpos($url, '/oc-includes');
    return substr($url, 0, strpos($url, '/oc-includes'));
}

function osc_getAbsoluteWebURL() {
    $protocol = 'http';
    if((isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO'])=='https') || (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1))) {
        $protocol = 'https';
    }
    return $protocol . '://' . getServerParam('HTTP_HOST') . osc_getRelativeWebURL();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Osclass - Readme</title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo osc_getAbsoluteWebURL(); ?>/oc-includes/osclass/installer/install.css" />
</head>
<body>
<div id="wrapper">
    <div id="container">
        <div id="header" class="readme">
            <h1 id="logo">
                <a href="http://osclass.pro/" target="_blank">
                    <img src="<?php echo osc_getAbsoluteWebURL(); ?>/oc-includes/images/osclass-logo.png" alt="Osclass" title="Osclass" />
                </a>
                <br/>
                Версия 3.8.1
            </h1>
        </div>
        <div id="content">
            <div id="introduction">
                <h2 class="title">Введение</h2>
                <div class="space-left-10">
                    <p>
Osclass - это CMS сайта объявлений с открытым исходным кодом. В несколько шагов вы можете создать
доску объявлений. Некоторые функции: простая установка, многоязычность, расширяемость через плагины,
дружественные поисковые системы (sitemap, robots, urls seo-friendly) и многое другое.
                    </p>
                </div>
            </div>
            <div id="install">
                <h2 class="title">Установка</h2>
                <div class="space-left-10">
                    <p>Вот краткое пошаговое руководство по установке:</p>
                    <ol>
                        <li>Загрузите и распакуйте пакет Osclass .</li>
                        <li>Перенесите распакованные файлы в нужное место на вашем сервере.</li>
                        <li>Выполните скрипт установки, обратившись к url <code>oc-includes/osclass/install.php</code> из веббраузера:
                            <ul>
                                <li>Если вы установили Osclass в корневой каталог домена, вам придется перейти к: <code>http://вашдомен/oc-includes/osclass/install.php</code></li>
                                <li>Если вы установили в папку внутри домена, <em>papka</em>, к примеру, прейдите к: <code>http://вашдомен/papka/oc-includes/osclass/install.php</code></li>
                            </ul>
                        </li>
                        <li>Следуйте инструкциям установщика:
                            <ul>
                                <li>Прежде всего, убедитесь, что у Вас есть необходимые права для записи в указанных файлах и каталогах. Это позволит вам создать базовый файл конфигурации, а также загрузить изображения, документы и т.д.</li>
                                <li>Шаг 1: Добавьте данные для доступа к базе данных. Если вы еще не создали базу, установщик попросит другую учетную запись с правами, которые позволяют создать базу данных.</li>
                                <li>Шаг 2: Добавьте основные сведения об установке и выберите местоположения для сайта: страну, регионы, города. Или Вы можете это сделать позже из панели администратора.</li>
                                <li>Шаг 3: Выберите категории, которые выхотите использовать н сайте. Или Вы можете это сделать позже из панели администратора.</li>
                                <li>Ваша установка завершена! Используйте свой пароль для доступа к панели администратора (/oc-admin).</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
            <div id="upgrade">
                <h2 class="title">Как обновиться</h2>
                <p>
Osclass покажет сообщение о доступности обновления в панели администратора, если доступна новая (и стабильная) версия. Для начала обновления нужно только следовать инструкциям.
Мы рекомендуем сделать резервную копию, прежде чем пытаться обновить установку, вы можете выполнить это с панели администратора (если вы изменили какой-либо
файл ядра то он, вероятно, будет заменен новым файлом. Будь осторожны)
                </p>
                <div class="space-left-10"><h3 style="border-bottom: 1px solid grey;color: #444444;">Автообновление</h3>
                    <p>Функция Автообновление выполнит следующие шаги для Вас:
                    <ul>
                        <li>Шаг 1: Будет проверять доступна ли новая версия Osclass.</li>
                        <li>Шаг 2: Загрузит её.</li>
                        <li>Шаг 3: Распакует её.</li>
                        <li>Шаг 4: Удалит старые файлы и заменит на новые (помните: если вы редактировали файлы ядра, автообноление их перезапишет).</li>
                        <li>Шаг 5: Сделает изменения в таблицах базы данных (если это необходимо).</li>
                        <li>Шаг 6: Сделает дополнительные шаги (если это необходимо).</li>
                    </ul>
                    </p>
                </div>
                <p>Перейдите по ссылке, и через несколько минут вам понравится
                     новаю версию вашего любимого программного обеспечения для сайта объявлений с открытым исходным кодом. Вы ожидали большего количества шагов или сложных инструкций? Сожалею! Но это легко.
                </p>
                <div class="space-left-10"><h3 style="border-bottom: 1px solid grey;color: #444444;">Ручное обновление</h3>
                    <p>
Вы также можете обновить Osclass, загрузив пакет обновления, разархивируйте его и замените файлы на своем сервере теми, что есть в пакете.
Затем запустите вручную oc-includes/osclass/upgrade-funcs.php для завершения обновления.
                    </p>
                </div>
                <p>Если у вас возникли какие-либо проблемы во время процесса установки, пожалуйста, не стесняйтесь обращаться к нам на Форум.
Перед каждым обновлением рекомендуется выполнять резервное копирование базы данных и файлов. Вы можете сделать резервную копию своих данных из опции «Резервное копирование» в панели администратора.
Если вы хотите запустить автообновление вручную, вы можете сделать это со следующего URL-адреса : http://вашдомен/path/to/osclass/oc-admin/tools.php?action=upgrade
                </p>
            </div>
            <div id="resources">
                <h2 class="title">Онлайн ресурсы</h2>
                <div class="space-left-10">
                    <p>Если у Вас есть вопросы, посетите пожалуйста эти ресурсы:</p>
                    <dl class="space-left-25">
                        <dt><a href="https://osclass.pro" target="_blank">https://osclass.pro</a></dt>
                        <dd>
Здесь различная информация по Osclass.
                        </dd>
                        <dt><a href="https://4osclass.net" target="_blank">https://4osclass.net</a></dt>
                        <dd>
Здесь Форум, где Вы можете задать вопросы и найти ответы.
                        </dd>
                    </dl>
                </div>
            </div>
            <div id="license">
                <h2 class="title">Лицензия</h2>
                <p class="space-left-10">Osclass выпускается под лицензией Apache v2 (смотрите <a href="<?php echo osc_getAbsoluteWebURL(); ?>/licenses.txt" target="_blank">licenses.txt</a>).</p>
            </div>
        </div>
        <div id="footer">
        </div>
    </div>
</div>
</body>
</html>