<?php

namespace Calendar\Controller;

use Fire\DataBase;
use Symfony\Component\HttpFoundation\Request;

class AdminUserController
{
    public function indexAction(Request $request)
    {
       // phpinfo();exit;
        $dbobj = new DataBase\sql();
        $requst = $dbobj->sql('SELECT * from base_code', 'SELECT');

        print_r($requst);
    }
   
}
