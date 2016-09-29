<?php
namespace Calendar\Controller\User;

use Calendar\Model;
use Fire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    public function loginAction(Request $request)
    {

        $view = Fire\View::getInstance();
        $view->show('/AdminUser/login.tpl.php');
        exit;
    }

      public function layoutAction(Request $request)
    {
         $_SESSION['user'] = array();
         header("Location:/fire.php/index"); 
         exit;
    }
    public function registerAction(Request $request)
    {
        $view = Fire\View::getInstance();
        $view->show('/AdminUser/register.tpl.php');
        exit;
    }
    public function submitLoginAction(Request $request)
    {
        if (isset($_POST)) {
            $username = $request->request->get('username');
            $password = $request->request->get('password');
            $rememberMe = $request->request->get('rememberMe');
            $user = new Model\User();
            $num = $user->login($username, $password, $rememberMe);
            return new Response($num);
        }

    }


    public function submitRegisterAction(Request $request)
    {
        if (isset($_POST)) {
            $data = $request->request->get('data');
            $user = new Model\User();
            $num = $user->register($data);
            return new Response($num);
        }
    }
}
