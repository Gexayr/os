<?php
    class ModelYmap extends DAO
    {

        private static $instance ;

        public static function newInstance()
        {
            if( !self::$instance instanceof self ) {
                self::$instance = new self ;
            }
            return self::$instance ;
        }


        function __construct()
        {
            parent::__construct();
        }

        public function install() {

            osc_set_preference('version', '101', 'yandex_maps_pro', 'INTEGER');
            osc_set_preference('api_key', '', 'yandex_maps_pro', 'STRING');


        }

        public function uninstall()
        {
            osc_delete_preference('version', 'yandex_maps_pro');
			osc_delete_preference('api_key', 'yandex_maps_pro');

        }

        public function versionUpdate() {
            $version = osc_get_preference('version', 'yandex_maps_pro');
            if( $version < 101) {
                osc_set_preference('version', 101, 'yandex_maps_pro', 'INTEGER');
                osc_reset_preferences();
            }
        }
  }

?>