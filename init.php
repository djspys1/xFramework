<?php
require_once __DIR__.'/vendor/autoload.php';
/**
 * Created by PhpStorm.
 * User: djspy
 * Date: 2018/3/20
 * Time: 16:55
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();