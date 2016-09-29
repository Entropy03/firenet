<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\\Controller\\LeapYearController::indexAction',
)));

$routes->add('login', new Routing\Route('/login', array(
    '_controller' => 'Calendar\\Controller\\User\\UserController::loginAction',
)));
$routes->add('register', new Routing\Route('/register', array(
    '_controller' => 'Calendar\\Controller\\User\\UserController::registerAction',
)));
$routes->add('submitLogin', new Routing\Route('/submitLogin', array(
    '_controller' => 'Calendar\\Controller\\User\\UserController::submitLoginAction',
)));
$routes->add('fire', new Routing\Route('/index', array(
    '_controller' => 'Calendar\\Controller\\FireAlarmController::indexAction',
)));
$routes->add('submitRegister', new Routing\Route('/submitRegister', array(
    '_controller' => 'Calendar\\Controller\\User\\UserController::submitRegisterAction',
)));
$routes->add('adminLogin', new Routing\Route('/adminLogin', array(
    '_controller' => 'Calendar\\Controller\\User\\adminUserController::adminLoginAction',
)));
$routes->add('AuSubmit', new Routing\Route('/AuSubmit', array(
    '_controller' => 'Calendar\\Controller\\User\\adminUserController::AuSubmitAction',
)));
$routes->add('layoutAction', new Routing\Route('/layout', array(
    '_controller' => 'Calendar\\Controller\\User\\UserController::layoutAction',
)));
$routes->add('updateOrder', new Routing\Route('/updateOrder', array(
    '_controller' => 'Calendar\\Controller\\FireAlarmController::updateOrderAction',
)));
// $routes->add('Distort', new Routing\Route('/distort', array(
//     '_controller' => 'Calendar\\Controller\\FireAlarmController::DistortAction',
// )));
// $routes->add('Fault', new Routing\Route('/fault', array(
//     '_controller' => 'Calendar\\Controller\\FireAlarmController::FaultAction',
// )));
$routes->add('AdminCp', new Routing\Route('/AdminCp', array(
    '_controller' => 'Calendar\\Controller\\User\\adminUserController::AdminCpAction',
)));
return $routes;
