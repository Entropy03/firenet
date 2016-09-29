<?php
namespace Fire\DataBase;

use Fire;

abstract class DB
{

    public static $conn;
    public static $sql;
    public static $instance = null;
    protected static $params = null;
    public function __construct()
    {

    }
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = self::DBManager();
        }
        return self::$instance;
    }
    private static function DBManager()
    {

        $config = Fire\Fire::config();

        self::$params = $config['db'];

        if (!isset($config['db']['driver'])) {
            echo "error driver not exists";
            return false;
        }
        $adapterName = $config['db']['driver'];
        $driverClass = '\\Fire\DataBase\\' . 'F' . $adapterName;
        if (class_exists($driverClass)) {

            $dbObj = new $driverClass();
            return $dbObj;
        }

    }
   
    abstract public function _connect(); //连接到数据库

    abstract public function _close(); //关闭连接源

    abstract public function _error(); //读取当前错误,返回 错误号:错误信息

    abstract public function _affectedRows(); //查看影响行数

    abstract public function _lastInsertId(); //获取最后插入ID

    abstract public function _begin(); //开启事务

    abstract public function _commit(); //提交事务

    abstract public function _rollBack(); //事务回滚

    abstract public function _free(); //释放内存

    abstract public function _query(&$sql); //执行sql语句,成功返回true,失败返回false

    abstract public function &_fetch(); //读取一行数据,失败返回空数组

    abstract public function &_fetchAll(); //读取全部数据,失败返回空数组

}
