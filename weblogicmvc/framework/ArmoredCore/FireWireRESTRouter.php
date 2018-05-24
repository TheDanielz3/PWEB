<?php

namespace ArmoredCore;

use ArmoredCore\WebObjects\Asset;
use ArmoredCore\Facades\Time;
use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\RouterInterface;
use parameters;
use ReflectionMethod;
use Routing;
use Tracy\Debugger;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:19
 */
class FireWireRESTRouter implements RouterInterface, ComponentRegisterInterface
{
    private $_controller = '';
    private $_action = '';
    private $_id = '';
    private $_parseDelimeter = WL_URL_PARSE_DELIMETER;

    private $_resourceMethods = array();
    /**
     * @var Routing Tables
     */
    private $_getRouteTable;
    private $_postRouteTable;
    private $_anyRouteTable;
    private $_resourceRouteTable;


    /**
     * @return array with required parameters for setting up in the container
     */
    public function registerRequirements()
    {

    }

    /**
     * @param $requestedParams parameters - use as a constructor
     */
    public function setupRequirements($requestedParams)
    {

    }


    //reimplement

    /***
     * Parse params from REST STyle URL
     */
    public function parseURLRoute($url)
    {

        if (trim($this->_parseDelimeter) == '') {
            echo 'ROUTER ERROR: Parsing delimeter for router not provided. Please provide in HTTPRouter class Constructor';
            die();
        }

        //parse url
        $urlparams = explode($this->_parseDelimeter, $url);

        //TODO FIX : create a pattern matcher manager


        if (count($urlparams) > 3) {
            $this->_controller = trim($urlparams[3]);
        } else {
            $this->_controller = '';
        }


        if (count($urlparams) > 4) {
            $this->_action = trim($urlparams[4]);
        } else {
            $this->_action = '';
        }

        if (count($urlparams) > 5) {
            $this->_id = trim($urlparams[5]);
        }




    }

    public function routeNotDefined()
    {
        if ($this->_controller == '') {
            return true;
        } else {
            return false;
        }
    }

    public function routeHasID()
    {
        if ($this->_id == '') {
            return false;
        } else {
            return true;
        }
    }

    //reimplement
    private function parseRequestRoute()
    {

    }

    public function getController()
    {
        return $this->_controller;
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function getID()
    {
        return $this->_id;
    }


    public function resource($resourceName, $controllerName)
    {
        $this->_resourceRouteTable[$resourceName] = $controllerName;
    }

    public function get($route, $controllerAction = '')
    {
        if ($controllerAction == '') {
            $this->_getRouteTable[$route] = $route;
        } else {
            $this->_getRouteTable[$route] = $controllerAction;
        }
    }

    public function post($route, $controllerAction = '')
    {
        if ($controllerAction == '') {
            $this->_postRouteTable[$route] = $route;
        } else {
            $this->_postRouteTable[$route] = $controllerAction;
        }
    }

    public function any($route, $controllerAction = '')
    {
        if ($controllerAction == '') {
            $this->_anyRouteTable[$route] = $route;
        } else {
            $this->_anyRouteTable[$route] = $controllerAction;
        }
    }

    public function matchRouterRules($routerTable, $requestMethod)
    {
        // TODO check routing rules and return http method if found, else return null
    }


    public function resolve($url)
    {
        \Netpromotion\Profiler\Profiler::start('router resolve url');

        $requestMethod = '';
        $anyRoute = false;
        //$this->parseRequestRoute();
        $isResource = false;


        $this->parseURLRoute($url);


        /**
         * resource mapping first
         */
        $resourceName = $this->getController();

        if (!is_null($this->_resourceRouteTable)) {
            if (array_key_exists($resourceName, $this->_resourceRouteTable)) {
                $isResource = true;
            }
        }

        // get request type
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $requestMethod = 'post';
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $requestMethod = 'get';
        }

        // Get matching URLEncoder in routing rules


        $controller = $this->getController();
        $actionMethod = $this->getAction();
        $fullRouteName = $controller . $this->_parseDelimeter . $actionMethod;


        Debugger::barDump($url, 'Url');

        if ($requestMethod == 'get') {
            if ($this->_getRouteTable == !null) {
                //var_dump($this->_getRoutes);
                if (array_key_exists($fullRouteName, $this->_getRouteTable)) {
                    $routingRule = explode($this->_parseDelimeter, $this->_getRouteTable[$fullRouteName]);
                } else {
                    $anyRoute = true;
                }
            }
        }

        if ($requestMethod == 'post') {
            if ($this->_postRouteTable == !null) {
                //var_dump($this->_postRoutes);
                if (array_key_exists($fullRouteName, $this->_postRouteTable)) {
                    $routingRule = explode($this->_parseDelimeter, $this->_postRouteTable[$fullRouteName]);
                } else {
                    $anyRoute = true;
                }
            }
        }


        //TODO check when both post & get are missing

        //Resource is shorthanded
        if ($isResource) {

            $resourceControllerName = $this->_resourceRouteTable[$resourceName];

            $methods = get_class_methods(new $resourceControllerName);

            foreach ($methods as $method) {
                $reflect = new ReflectionMethod($resourceControllerName, $method);

                if (($reflect->isPublic()) and (!$reflect->isConstructor())) {
                    array_push($this->_resourceMethods, $method);
                }
            }



            if (!in_array($actionMethod, $this->_resourceMethods)) {
                // The resource controller implements the given method
                require ('../public/html/RouterError.html');
                //echo 'ROUTER ERROR 006: Resource Route method name mismatch. [' . $fullRouteName . '] does not exists on controller.';
                die();
            }

        } else {
            if ($anyRoute) {
                if ($this->_anyRouteTable == !null) {
                    if (array_key_exists($fullRouteName, $this->_anyRouteTable)) {
                        $routingRule = explode($this->_parseDelimeter, $this->_anyRouteTable[$fullRouteName]);
                    } else {
                        require ('../public/html/RouterError.html');
                        //echo 'ROUTER ERROR 001: URLEncoder Route mismatch. No [' . $fullRouteName . '] rule for ' . $_SERVER['REQUEST_METHOD'] . ' Request method';
                        die();
                    }
                } else {
                    require ('../public/html/RouterError.html');
                    //echo 'ROUTER ERROR 002: URLEncoder Route mismatch. No [' . $fullRouteName . '] rule for ' . $_SERVER['REQUEST_METHOD'] . ' Request method';
                    die();
                }
            }
        }

        // TODO check routing rules
        //var_dump($routingRule);

        \Netpromotion\Profiler\Profiler::finish('router resolve url');

        // invoke method on controller for any case
        //TODO validate
        if ($isResource) {

            $controllerClassName = $resourceControllerName;

            $methodInstanceName = $actionMethod;

            \Netpromotion\Profiler\Profiler::start('Resource Controller Resolved: ' . $controllerClassName . '->' . $methodInstanceName);
            \Netpromotion\Profiler\Profiler::finish('Resource Controller Resolved: ' . $controllerClassName . '->' . $methodInstanceName);

        } else {


            $controllerClassName = $routingRule[0];
            //echo $controllerClassName;

            $methodInstanceName = $routingRule[1];

            //echo $methodInstanceName;

            //die();

        }




        // TODO post & any

        // TODO Check if class exists

        //clean up
        $methodInstanceName = trim($methodInstanceName);

        $controllerInstance = new $controllerClassName();

        // TODO check if method exists

        \Netpromotion\Profiler\Profiler::start('Controller Resolved: ' . $controllerClassName . '->' . $methodInstanceName);


        if ($this->routeHasID()) {
            //clean up
            $methodInstanceName = trim($methodInstanceName);

            return $controllerInstance->$methodInstanceName($this->getID());
        } else {
            return $controllerInstance->$methodInstanceName();
        }

        \Netpromotion\Profiler\Profiler::finish('Controller Resolved: ' . $controllerClassName . '->' . $methodInstanceName);
    }

}