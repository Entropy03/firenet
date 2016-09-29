<?php
namespace Fire\DataBase;

use Fire\DataBase\DB;

class sql
{

    private $property = "*";

    private $where = "where ";

    private $table = "";

    private $ORDER = "";

    private $GROUP = "";

    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     *
     */
    public function setProperty($arr = array(), $type = "s")
    {
        $this->property = "";
        if ($type == "s") {
            $this->property = join(",", $arr);
        } else if ($type == "i") {
            $temp = "";
            foreach ($arr as $k => $v) {
                $temp[] = "{$k}='{$v}'";
            }
            $this->property = join(",", $temp);
        }
    }
    public function setWhere($arr,$sql = '')
    {
       $temp = "";
        foreach ($arr as $k => $v) {
            if(is_array($v)){
                $w  =  "'".join("','",$v)."'";

                $temp[] = "{$k} in ({$w})";
                

            }else{
                $w = addslashes($v);
                $temp[] = "{$k}='{$w}'";
            }
   
        }
        $this->where .= join(" AND ", $temp).$sql;

    }

    public function select()
    {
        $sql = "SELECT {$this->property} from {$this->table} {$this->where}";
        return $this->sql($sql, 'SELECT');

    }
    public function insert()
    {
        $sql = "insert into  {$this->table} set  {$this->property}";
        return $this->sql($sql, 'INSERT');

    }
    public function delete()
    {
        $sql = "delete from  {$this->table} {$this->where} ";
        return $this->sql($sql, 'DELETE');
    }
    public function update()
    {
        $sql = "update   {$this->table} set {$this->property}  {$this->where} ";
        return $this->sql($sql, 'UPDATE');
    }

    public function sql($sql, $action)
    {
        if ($temp = $this->db->_connect()) //获取读写分离连接
        {   
            if ($result = $this->db->_query($sql)) {

                switch ($action) {
                    case 'SHOW':
                    case 'SELECT':
                    case 'DESCRIBE':
                    case 'EXPLAIN':
                        $result = &$this->db->_fetchAll();
                        break;
                    case 'INSERT':
                    case 'REPLACE':
                        $result = $this->db->_lastInsertId();
                        break;
                    case 'UPDATE':
                    case 'DELETE':
                        $result = $this->db->_affectedRows();
                        break;
                }
            } else {
                  $result = false;
            }
        } else {
            $result = false;
        }
        return $result;

    }

    public function setTableName($str)
    {
        $this->table = $str;
    }
}
