<?php if ( ! defined('ABS_PATH')) exit('ABS_PATH is not loaded. Direct access is not allowed.');

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
 */

    class CAdminMarket extends AdminSecBaseModel
    {
        function __construct()
        {
            parent::__construct();
        }

        //Business Layer...
        function doModel()
        {
            parent::doModel();


            switch ($this->action) {

                case('plugins'):
                case('themes'):
                case('languages'):
                    $section = $this->action;
                    $title = array(
                        'plugins'    => __('Recommended plugins for You'),
                        'themes'     => __('Recommended themes for You'),
                        'languages'  => __('Languages for this version'),
                        'purchases'  => __('My purchases')
                        );


                    // page number
                    $marketPage     = Params::getParam("mPage")!=''?Params::getParam("mPage"):0;
                    $url_actual     = osc_admin_base_url(true) . '?page=market&action='.$section;

                    $url_premium  = $url_actual.'&sort=premium';
                    $url_all   = $url_actual.'&sort=all';
                    $sort = Params::getParam('sort')!='all'?'premium':'all';
                    $sort_actual = '&sort=' . $sort;

                    $url_actual .= '&mPage=' . $marketPage;

                    if($marketPage>=1) {
                        $marketPage--;
                    }


                    // export variable to view
                    $this->_exportVariableToView("title"     , $title);
                    $this->_exportVariableToView("section"   , $section);

                    $this->_exportVariableToView("url_premium"        , $url_premium);
                    $this->_exportVariableToView("url_all"            , $url_all);
                    $this->_exportVariableToView("sort"               , $sort);


                    $this->doView("market/section.php");
                    break;
                default:
                    $this->doView("market/index.php");
                break;
            }
        }

        function __call($name, $arguments)
        {
            // TODO: Implement __call() method.
        }//hopefully generic...
        function doView($file)
        {
            osc_run_hook("before_admin_html");
            osc_current_admin_theme_path($file);
            Session::newInstance()->_clearVariables();
            osc_run_hook("after_admin_html");
        }
    }

    /* file end: ./oc-admin/market.php */
?>