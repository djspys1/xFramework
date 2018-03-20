<?php
/**
 * Created by PhpStorm.
 * User: djspy
 * Date: 2018/3/20
 * Time: 17:07
 */
require_once __DIR__ . '/../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

function render_template($request) {
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../src/page/%s.php', $_route);
    return new Response(ob_get_clean());
}

$request  = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    $controller = $controllerResolver->getController($request);
    $arguments = $argumentResolver->getArguments($request, $controller);

    $response = call_user_func_array($controller, $arguments);
} catch (ResourceNotFoundException $exception) {
    $response = new Response('Not Found!!!', 404);
} catch (Exception $exception) {
    $response = new Response('An Error occurred', 500);
}

$response->send();