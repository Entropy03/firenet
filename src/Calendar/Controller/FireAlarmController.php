<?php

namespace Calendar\Controller;

use Calendar\Model;
use Fire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FireAlarmController
{
    public function indexAction(Request $request)
    {

        if (isset($_SESSION['user']['login'])) {
            $FireAlarm = new Model\FireAlarm();
            $code = $_SESSION['user']['freshcar'];
            //$devId = $FireAlarm->getDevNumByComCode($code);
            $data = $FireAlarm->getOrderbyCar($code);
            $view = Fire\View::getInstance();
            $view->data = json_encode($data);
            $num = array();
            for ($i = 1; $i <= count($data); $i++) {
                $num[] = $i;
            }
            $view->num = json_encode($num);
            $view->show('/AdminUser/fireData.tpl.php');

        } else {
            header("location:/fire.php/login");
        }
    }

    public function updateOrderAction(Request $request)
    {
        if (isset($_SESSION['user']['login'])) {
            $FireAlarm = new Model\FireAlarm();
            $id = $request->request->get('id');
            $data = $FireAlarm->updateOrder($id);
            return new Response($data);
        } else {
            return new Response('-1');

        }
    }
    // public function DistortAction()
    // {
    //     if (isset($_SESSION['user']['login'])) {
    //         $FireAlarm = new Model\FireAlarm();
    //         $code = $_SESSION['user']['companyCode'];
    //         $devId = $FireAlarm->getDevNumByComCode($code);
    //         $data = $FireAlarm->getFireAlarmByday(30, 'FDE', $devId);

    //         $view = Fire\View::getInstance();
    //         $view->data = json_encode($data);
    //         $num = array();
    //         for ($i = 1; $i <= count($data); $i++) {
    //             $num[] = $i;
    //         }
    //         //  print_r($view->data);
    //         $view->num = json_encode($num);
    //         $view->show('/AdminUser/fireDataDistort.tpl.php');

    //     } else {
    //         header("location:/fire.php/login");
    //     }
    // }
    // public function FaultAction()
    // {
    //     if (isset($_SESSION['user']['login'])) {
    //         $FireAlarm = new Model\FireAlarm();
    //         $code = $_SESSION['user']['companyCode'];
    //         $devId = $FireAlarm->getDevNumByComCode($code);
    //         $data = $FireAlarm->getFireAlarmByday(30, 'FDE', $devId);

    //         $view = Fire\View::getInstance();
    //         $view->data = json_encode($data);
    //         $num = array();
    //         for ($i = 1; $i <= count($data); $i++) {
    //             $num[] = $i;
    //         }
    //         //  print_r($view->data);
    //         $view->num = json_encode($num);
    //         $view->show('/AdminUser/fireDataFault.tpl.php');

    //     } else {
    //         header("location:/fire.php/login");
    //     }
    // }
}
