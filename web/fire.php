<?php

// example.com/web/front.php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
session_start();

$request = Request::createFromGlobals();
$routes = include dirname(__DIR__) . '/src/routes.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);

//路由组件
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
//反射调用控制器

$resolver = new HttpKernel\Controller\ControllerResolver();
Fire\Fire::init();
$framework = new Fire\Framework($matcher, $resolver);

$response = $framework->handle($request);

$response->send();
