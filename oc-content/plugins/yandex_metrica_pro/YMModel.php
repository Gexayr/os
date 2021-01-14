<?php defined('ABS_PATH') or die('Access denied');

class YMModel extends DAO {
    
    private static $instance;

    public static function newInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }

        return self::$instance;
    }
    
   function __construct()
        {
            parent::__construct();
        }
    
    
    public function install() {
		osc_set_preference('version', '101', 'yandex_metrica_pro', 'INTEGER');
		osc_set_preference('webvisor', '1', 'yandex_metrica_pro', 'BOOLEAN');
		osc_set_preference('webvisor_new', '0', 'yandex_metrica_pro', 'BOOLEAN');
		osc_set_preference('hash', '0', 'yandex_metrica_pro', 'BOOLEAN');
		osc_set_preference('noindex', '0', 'yandex_metrica_pro', 'BOOLEAN');
    }
    
    public function uninstall() {
        Preference::newInstance()->delete(array('s_section' => 'yandex_metrica_pro'));
    }
    
}