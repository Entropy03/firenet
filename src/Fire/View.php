<?php

namespace Fire;

class View
{

    private static $instanceObj = null; //实例化对象

    public function __construct()
    {

    }
    public function __get($name)
    {
        return $this->$name;

    }
    public function __set($name, $value)
    {
        $this->$name = $value;

    }
    public static function getInstance()
    {
        if (self::$instanceObj === null) {
            self::$instanceObj = true;
            self::$instanceObj = new self;
        }
        return self::$instanceObj;

    }
    public function show($path)
    {
        $config = Fire::config();
        $file = ROOT_DIR . $config['tplPath'] . $path;
        if (is_file($file)) {
            include ROOT_DIR . $config['tplPath'] . $path;

        } else {
            echo '模板未找到';
        }
    }

    public function head($params = array())
    {

        //if (empty($paramList['init']) && is_array($params)) //输出头信息
        if (is_array($params)) {
            echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
            '<html xmlns="http://www.w3.org/1999/xhtml">',
            '<head>',
            '<meta name="viewport" content="width=device-width, initial-scale=1" />',
            //'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />',    //controllerShare.php已发送头,同时IE6 p3p隐私共享会因utf-8导致js cookie不可写
            '<title>' ,isset($params['title']) ? $params['title'] : '' ,'</title>';
            isset($params['css']) && self::eachPrintJsOrCss($params['css'],'style'); //输出css引用样式
            isset($params['js']) && self::eachPrintJsOrCss($params['js'], 'js');

            echo '</head><body>';

            //isset($paramList['before']) && self::eachPrintJsOrCss($paramList['before']); //开始注入html[before]
        }
    }
    /**
     * 描述 : 循环打印js和css
     * 参数 :
     *      list : 打印列表
     *      type : css=输出样式,js=输出脚本
     * 作者 : zhang
     */
    private static function eachPrintJsOrCss(&$list, $type = '')
    {

        static $head = array(
            '' => array('', ''),
            'js' => array('<script src="', '" ></script>'),
            'style' => array('<link type="text/css" rel="stylesheet" href="', '" />'),
        );
        $type && $url = self::path(true) . '/' . $type;

        foreach ($list as &$v) {
            if ($v) {
                echo $head[$type][0], $type ? self::formatPath($v, $url) : $v, $head[$type][1];
                $v = false; //标记已加载
            }
        }
    }
    /**
     * 描述 : 读取视图路径
     * 参数 :
     *      isUrl : 默认false=读取磁盘目录,true=网络路径,null=相对根目录
     * 返回 :
     *      读取时返回完整路径,设置时返回true
     * 作者 : zhang
     */
    public static function path($isUrl = false)
    {
        $config = Fire::config();
        $resource = $config['resource']; //初始化模板
        return $isUrl === null ? $resource : self::formatPath($resource, $isUrl ? ROOT_URL : ROOT_DIR);
    }
    public static function formatPath($resource, $root)
    {
        return $root . $resource;
    }
}
