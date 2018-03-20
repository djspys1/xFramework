<?php
/**
 * Created by PhpStorm.
 * User: djspy
 * Date: 2018/3/20
 * Time: 17:07
 */
require_once __DIR__ . '/../vendor/autoload.php';
use Simplex\Framework;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

//function render_template($request) {
//    extract($request->attributes->all(), EXTR_SKIP);
//    ob_start();
//    include sprintf(__DIR__.'/../src/page/%s.php', $_route);
//    return new Response(ob_get_clean());
//}

$request  = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new RequestContext();
$matcher = new UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

$framework = new Framework($matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);
$response->send();