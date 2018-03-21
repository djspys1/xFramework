<?php
/**
 * Created by PhpStorm.
 * User: xiaopeng
 * Date: 2018/3/20
 * Time: 22:21
 */

namespace Simplex;


use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ArgumentResolverInterface;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpKernel\EventListener\ResponseListener;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;
use Symfony\Component\Routing\RequestContext;

class Framework extends HttpKernel
{
//    public function __construct($routes)
//    {
//        $context = new RequestContext();
//        $matcher = new UrlMatcher($routes, $context);
//        $requestStack = new RequestStack();
//
//        $controllerResolver = new ControllerResolver();
//        $argumentResolver = new ArgumentResolver();
//
//        $dispatcher = new EventDispatcher();
//        $dispatcher->addSubscriber(new RouterListener($matcher, $requestStack));
//        $dispatcher->addSubscriber(new ResponseListener('UTF-8'));
//
//        parent::__construct($dispatcher, $controllerResolver, $requestStack, $argumentResolver);
//    }

//    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
//    {
//        $this->matcher->getContext()->fromRequest($request);
//
//        try {
//            $request->attributes->add($this->matcher->match($request->getPathInfo()));
//
//            $controller = $this->controllerResolver->getController($request);
//            $arguments = $this->argumentResolver->getArguments($request, $controller);
//
//            $response = call_user_func_array($controller, $arguments);
//        } catch (ResourceNotFoundException $exception) {
//            $response = new Response('Not Found!!!', 404);
//        } catch (\Exception $exception) {
//            $response = new Response('An Error occurred', 500);
//        }
//
//        $this->dispatcher->dispatch('response', new ResponseEvent($response, $request));
//        return $response;
//    }
}