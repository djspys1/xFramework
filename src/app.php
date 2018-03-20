<?php
/**
 * Created by PhpStorm.
 * User: xiaopeng
 * Date: 2018/3/20
 * Time: 20:49
 */

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
$routes->add('leap_year', new Route('is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\Controller\LeapYearController::indexAction',
)));

return $routes;