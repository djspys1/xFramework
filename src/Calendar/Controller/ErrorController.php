<?php
/**
 * Created by PhpStorm.
 * User: djspy
 * Date: 2018/3/21
 * Time: 10:21
 */

namespace Calendar\Controller;


use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;

class ErrorController
{
    public function exceptionAction(FlattenException $exception)
    {
        $msg = 'something went wrong! ('.$exception->getMessage().')';

        return new Response($msg, $exception->getStatusCode());
    }
}