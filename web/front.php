<?php
/**
 * Created by PhpStorm.
 * User: djspy
 * Date: 2018/3/20
 * Time: 17:07
 */
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../vendor/autoload.php';

$request  = Request::createFromGlobals();
$response = new Response();

$map = [
    '/hello' => __DIR__ . '/../src/page/hello.php',
    '/bye'   => __DIR__ . '/../src/page/bye.php',
];

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    include $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found###');
}

$response->send();