<?php
namespace Fire\DataBase;

use Fire\DataBase\DB;
use PDO;

class FPdoMysql extends DB
{

    private $connection = null; //连接源
    private $query = null; //当前结果集

    public function _connect()
    {
        $params= self::$params['params'];
        try {
            
            $connection = new PDO(
                "mysql:host={$params['host']};port={$params['port']};dbname={$params['database']}",
                $params['user'],
                $params['password'],
                array(PDO::ATTR_PERSISTENT => !!$params['persistent']) //长连接
            );

            if (!$connection || $connection->getAttribute(PDO::ATTR_SERVER_INFO) === 'MySQL server has gone away') {
                return false;
            } else {
                $this->connection = $connection;
                $connection->query("SET NAMES '{$params['charset']}'");
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * 描述 : 关闭连接源
     * 作者 : Edgar.lee
     */
    public function _close()
    {
        return is_resource($this->connection) && !($this->connection = null);
    }

    /**
     * 描述 : 读取当前错误
     * 作者 : Edgar.lee
     */
    public function _error()
    {
        $error = $this->connection->errorInfo() + array('', 2 => '');
        return $error[0] . ':' . $error[2];
    }

    /**
     * 描述 : 查看影响行数
     * 作者 : Edgar.lee
     */
    public function _affectedRows()
    {
        return $this->query->rowCount();
    }

    /**
     * 描述 : 获取最后插入ID
     * 作者 : Edgar.lee
     */
    public function _lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    /**
     * 描述 : 开启事务
     * 作者 : Edgar.lee
     */
    public function _begin()
    {
        return $this->connection->beginTransaction();
    }

    /**
     * 描述 : 提交事务
     * 作者 : Edgar.lee
     */
    public function _commit()
    {
        return $this->connection->commit();
    }

    /**
     * 描述 : 事务回滚
     * 作者 : Edgar.lee
     */
    public function _rollBack()
    {
        return $this->connection->rollBack();
    }

    /**
     * 描述 : 释放内存
     * 作者 : Edgar.lee
     */
    public function _free()
    {
        $this->query = null;
    }

    /**
     * 描述 : 读取一行数据
     * 作者 : Edgar.lee
     */
    public function &_fetch()
    {
        ($result = $this->query->fetch() || $result = array());
        return $result;
    }

    /**
     * 描述 : 读取全部数据
     * 作者 : Edgar.lee
     */
    public function &_fetchAll()
    {
        $result = $this->query->fetchAll();
        return $result;
    }

    /**
     * 描述 : 执行sql语句
     * 作者 : Edgar.lee
     */
    public function _query(&$sql)
    {
        $this->query = false;
        if ($this->_linkIdentifier() && $this->query = $this->connection->query($sql, PDO::FETCH_ASSOC)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 描述 : 检测连接有效性
     * 参数 :
     *      restLink : 是否重新连接,true(默认)=是,false=否
     * 作者 : Edgar.lee
     */
    private function _linkIdentifier($restLink = true)
    {
        if (
            $this->connection->getAttribute(PDO::ATTR_SERVER_INFO) !== 'MySQL server has gone away' ||
            ($restLink && $this->_connect())
        ) {
            return true;
        } else {
            return false;
        }
    }
}
