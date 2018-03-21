<?php
/**
 * Created by PhpStorm.
 * User: djspy
 * Date: 2018/3/21
 * Time: 13:17
 */

namespace Calendar\Controller;


use Symfony\Component\HttpFoundation\Request;

class NisenController
{
    public function indexAction(Request $request, $name)
    {
        return 'nisen is '. $name;
    }
}