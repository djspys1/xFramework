<?php
/**
 * Created by PhpStorm.
 * User: xiaopeng
 * Date: 2018/3/20
 * Time: 22:37
 */

namespace Calendar\Controller;


use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function indexAction(Request $request, $year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            $response = new Response('Yep, this is a leap year!!'.rand());
        } else {
            $response = new Response('Nope, this is not a leap year!!'.rand());
        }

        $response->setTtl(10);

        return $response;
    }
}