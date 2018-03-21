<?php
/**
 * Created by PhpStorm.
 * User: djspy
 * Date: 2018/3/20
 * Time: 17:07
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Simplex\StringResponseListener;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\Request;

$routes = include __DIR__.'/../src/app.php';
$container = include __DIR__.'/../src/container.php';

$container->register('listener.string_response', StringResponseListener::class);
$container->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', array(new Reference('listener.string_response')));

$request = Request::createFromGlobals();
$response = $container->get('framework')->handle($request);
$response->send();