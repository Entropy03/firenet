<?php
return array(
    'rootDir' => strtr(substr(__FILE__, 0, -15), '\\', '/'), //用__FILE__表示的站点根目录,修改substr的第二参数即可
    'rootUrl' => '/',
    'tplPath' =>'/src/Calendar/Views',
    'resource' =>'Public',
    'db' => array(
        'driver' => 'PdoMysql',
        'params' => array(
            'host' => '192.168.100.63',
            'port' => '3306',
            'user' => 'root',
            'password' => '123456',
            'database' => 'freshcar',
            'charset' => 'utf8',
            'persistent' => false,
        )),
);
