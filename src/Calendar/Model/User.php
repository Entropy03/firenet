<?php
namespace Calendar\Model;

use Fire\DataBase;

//第一版本 暂不加ORM

class User
{

    public function __construct()
    {

    }
    /**
     * 描述: 检查用户是否登录
     *
     * 作者：zhang
     *
     */
    public function check()
    {
        
    }

    public function layout()
    {
        if (isset($_SESSION['user']['login'])) {
            $_SESSION = array();
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time() - 3600);
            }
            //使用内置session_destroy()函数调用撤销会话
            session_destroy();

        }

    }
    /**
     *描述: 用户登陆
     *
     *返回值：1成功，2失败，3用户密码错误，4当前已经录，5用户状态
     */
    public function login($username, $password, $rememberMe = false)
    {
        $dbobj = new DataBase\sql();
        $password = md5($password);
        if (isset($username) && isset($password)) {
            $sql = "SELECT
                    t_user.id,
                    t_user.username,
					t_user.statu,
                    t_user.loginTimes,
                    t_user.freshcar
				FROM
					t_user
				WHERE
					t_user.username = '{$username}'
				AND t_user.`password` ='{$password}'";
            $requst = $dbobj->sql($sql, 'SELECT');
            if ($requst == false&&!is_array($requst)) {
                return '2';
            } else if (is_array($requst) && empty($requst)) {
                return '3';
            } else if (is_array($requst)) {
                if (isset($requst[0]['statu']) && $requst[0]['statu'] == 1) {
                    $this->setUserSession($requst[0]);
                    if ($rememberMe) {
                        $this->setUserCookie();
                    }
                    return '1';
                } else {
                    return '5';
                }

            }

        } else {
            return '0';
        }

    }
    /**
     *描述: 用户注册
     *
     *返回值：1成功，2用户名重复，3公司编码不正确,4注册失败
     */
    public function register($parmes)
    {
        $username = $parmes['username'];
        $password = $parmes['password'];
        $phone = $parmes['phone'];
        $str = $parmes['freshcar'];
        $arr = explode(",",$str);
        if(is_array($arr)){
            $freshcar =  join("','",$arr);

        }

        $dbobj = new DataBase\sql();
        $sql = "SELECT
                    t_user.id

                FROM
                    t_user
                WHERE
                    t_user.username = '{$username}'";
        $requst = $dbobj->sql($sql, 'SELECT');
        if (is_array($requst)&&!empty($requst)) {
            return '2';
        }
 
        $md5 = md5($password);
        $now = date('y-m-d h:i:s', time());
        $user = array('username' => $username, 'wechatId'=>'','password' => $md5, 'phone' => $phone, 'freshcar' => $freshcar, 'createTime' => $now,'statu'=> 1,'role'=>3);
        $dbobj->setTableName('t_user');
        $dbobj->setProperty($user, 'i');
        $userId = $dbobj->insert();
        if ($userId) {
           $login =   $this->login($username, $password);
            return '1';
        } else {
            return '4';
        }

    }
    public function save()
    {

    }
    public function checkcompany($code)
    {
        return true;
    }
    public function onlineUser($user)
    {
        return false;
    }
    public function setUserCookie($parmes = null)
    {

    }
    public function updateUser()
    {

    }
    public function setUserSession($parmes)
    {

        $_SESSION['user']['userId'] = $parmes['userId'];
        $_SESSION['user']['username'] = $parmes['username'];
        $_SESSION['user']['state'] = $parmes['state'];
        $_SESSION['user']['freshcar'] = $parmes['freshcar'];

        $_SESSION['user']['login'] = 1;
    }
}
