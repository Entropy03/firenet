<?php
namespace Calendar\Controller\User;

use Calendar\Model;
use Fire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminUserController
{
    public function adminLoginAction(Request $request)
    {

        $view = Fire\View::getInstance();
        $view->show('/AdminUser/adminlogin.tpl.php');
        exit;
    }

    public function AuSubmit(Request $request)
    {
        if (isset($_POST)) {
            $username = $request->request->get('username');
            $password = $request->request->get('password');
            $autoLogin = $request->request->get('autoLogin');

            $user = new Model\User();
            $num = $user->login($username, $password, $rememberMe);
            return new Response($num);
        }
    }

    public function AdminCpAction(Request $request)
    {
        $view = Fire\View::getInstance();
        $view->show('/AdminUser/adminCp.tpl.php');
        exit;
    }
}
