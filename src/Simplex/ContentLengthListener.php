<?php
/**
 * Created by PhpStorm.
 * User: djspy
 * Date: 2018/3/21
 * Time: 9:24
 */

namespace Simplex;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ContentLengthListener implements EventSubscriberInterface
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        $headers = $response->headers;

        if (!$headers->has('Content-Type') && $headers->has('Transfer-Encoding')) {
            $headers->set('Content-Length', strlen($response->getContent()));
        }
    }

    public static function getSubscribedEvents()
    {
        return array('response' => array('onResponse', -255));
    }
}