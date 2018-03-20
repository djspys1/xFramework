<?php
/**
 * Created by PhpStorm.
 * User: xiaopeng
 * Date: 2018/3/20
 * Time: 20:49
 */

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class LeapYearController
{
    public function indexAction($year)
    {
        if (is_leap_year($year)) {
            return new Response('Yep, this is a leap year!!');
        }

        return new Response('Nope, this is not a leap year!!');
    }

}

function is_leap_year($year = null) {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }

$routes = new RouteCollection();
$routes->add('leap_year', new Route('is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'LeapYearController::indexAction',
)));


//$routes->add('hello', new Route('/hello/{name}', array('name' => 'world')));
//$routes->add('bye', new Route('bye'));

return $routes;