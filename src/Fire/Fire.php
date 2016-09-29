<?php

namespace Fire;

class Fire
{

    public static function init()
    {

    	self::setSystem();

    }
    private static $config = null;

    public static function setSystem()
    {
        ini_set('default_charset', 'UTF-8'); //默认编码
        ini_get('date.timezone') || date_default_timezone_set('PRC'); //默认时区

        if (!defined('F_DIR')) define('F_DIR', strtr(dirname(dirname(__FILE__)), '\\', '/'));
        $global = include F_DIR . '/config.php';
        self::$config = $global; //引用配置
        if (!defined('ROOT_DIR')) define('ROOT_DIR',$global['rootDir']);
        if (!defined('ROOT_URL')) define('ROOT_URL',$global['rootUrl']);

       


    }

    public static function config()
    {
        return self::$config;

    }

}

Fire::init();
