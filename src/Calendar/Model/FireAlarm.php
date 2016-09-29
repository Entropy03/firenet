<?php
namespace Calendar\Model;

use Fire\DataBase;

class FireAlarm
{

    public function getFireAlarmByday($day, $type, $devId)
    {
        $dbobj = new DataBase\sql();
        $old = date('Y-m-d H:i:s', strtotime('- ' . $day . ' day'));
        $now = date('Y-m-d H:i:s');
        $dev = array('prober_id', 'f_desc', 'requst_time', 'server_time');

        $dbobj->setTableName('f_alarm');
        $dbobj->setProperty($dev, 's');
        $sql = " AND server_time <='{$now}' AND server_time >='{$old}'";
        $dbobj->setWhere(array('dev_num' => $devId),$sql);
        $data = $dbobj->select();
        return $data;

    }

    public function getOrderbyCar($fresNo){
        $dbobj = new DataBase\sql();
        $dev = array('order_no', 'order_time', 'price', 'buyer_name','buyer_telephone','buyer_address','order_statu');

        $dbobj->setTableName('t_order');
        $dbobj->setProperty($dev, 's');
        $sql = " AND freshcar_no in ({$fresNo})";
        $dbobj->setWhere(['order_statu'=>['0','1']],$sql);
        $data = $dbobj->select();
        return $data;
    }
    public function updateOrder($id){
        $dbobj = new DataBase\sql();
        $order_statu = $this->getOrderStatu($id);
        $order_statu  = $order_statu[0]['order_statu'];
        $order_statu = $order_statu  == 0 ? 1:2;
        $dev = array('order_statu'=> $order_statu);

        $dbobj->setTableName('t_order');
        $dbobj->setProperty($dev, 'i');
        $dbobj->setWhere(array('order_no' => $id));
        $row = $dbobj->update();
        return $row;
    }
    public function getDevNumByComCode($code)
    {
        $dbobj = new DataBase\sql();
        $dev = array('dev_num');
        $dbobj->setTableName('f_dev_com');
        $dbobj->setProperty($dev, 's');
        $dbobj->setWhere(array('companyCode' => $code));
        $devId = $dbobj->select();
        return isset($devId[0]) ? $devId[0]['dev_num'] : 0;

    }

    public function getOrderStatu($id){
        $dbobj = new DataBase\sql();
        $dev = array('order_statu');

        $dbobj->setTableName('t_order');
        $dbobj->setProperty($dev, 's');
        $dbobj->setWhere(['order_no'=> $id]);
        $data = $dbobj->select();
        return $data;
    }
}
