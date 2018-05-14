<?php

namespace ArmoredCore;

use ArmoredCore\Facades\Time;
use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\RouterInterface;
use parameters;
use ReflectionMethod;
use Routing;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:19
 */
class HTTPRouter implements RouterInterface, ComponentRegisterInterface
{
    private $_URLBase = '';
    private $_controller = '';
    private $_action = '';
    private $_id = '';
    private $_parseDelimeter = '';

    private $_resourceMethods = array();
    /**
     * @var Routing Tables
     */
    private $_getRouteTable;
    private $_postRouteTable;
    private $_anyRouteTable;
    private $_resourceRouteTable;

    public function __construct($URLBase = '', $parseDelimeter = '@')
    {
        $this->_URLBase = $URLBase;
        $this->_parseDelimeter = $parseDelimeter;
    }

    /**
     * @return array with required parameters for setting up in the container
     */
    public function registerRequirements()
    {
        return array('urlbase', 'parsedelimiter');
    }

    /**
     * @param $requestedParams parameters - use as a constructor
     */
    public function setupRequirements($requestedParams)
    {
        $this->_URLBase = $requestedParams['urlbase'];
        $this->_parseDelimeter = $requestedParams['parsedelimiter'];
    }


    /***
     * Parse params from HTTP
     */
    public function parseURLRoute()
    {

        if (trim($this->_parseDelimeter) == '') {
            echo 'ROUTER ERROR: Parsing delimeter for router not provided. Please provide in HTTPRouter class Constructor';
            die();
        }

        if (!isset($_GET["route"])) {
            //echo 'ROUTER ERROR: Route not defined.';
            //die();
        } else {
            if (trim($_GET["route"]) == '') {
                //echo 'ROUTER ERROR: Route not defined.';
                //die();
            }
        }

        if (isset($_GET["id"])) {
            if (trim($_GET["id"]) == '') {
                echo 'ROUTER ERROR: ID in Route not defined.';
                die();
            } else {
                $this->_id = trim($_GET["id"]);
            }
        }

        $this->parseRequestRoute();

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

    private function parseRequestRoute()
    {

        if (isset($_GET["route"]) && isset($_GET["action"])) {

            $this->_controller = trim($_GET["route"]);

            $this->_action = trim($_GET["action"]);
        }

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

    public function __toString()
    {
        return ('[' . __CLASS__ . ' Class instance] : _URLBase = ' . $this->_URLBase);
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


    public function resolve()
    {
        $requestMethod = '';
        $anyRoute = false;
        $this->parseRequestRoute();
        $isResource = false;

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
        if ($_SERVER['REQUEST_METHOD'] == 'ArmoredCore\WebObjects\Post' ) {
            $requestMethod = 'ArmoredCore\WebObjects\Post';
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $requestMethod = 'get';
        }

        // Get matching URLEncoder in routing rules

        $controller = $this->getController();
        $actionMethod = $this->getAction();
        $fullRouteName = $controller . $this->_parseDelimeter . $actionMethod;

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

        if ($requestMethod == 'ArmoredCore\WebObjects\Post' ) {
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

            //var_dump($actionMethod);
            //var_dump($this->_resourceMethods);

            if (!in_array($actionMethod, $this->_resourceMethods)) {
                // The resource controller implements the given method
                echo 'ROUTER ERROR 006: Resource Route method name mismatch. [' . $fullRouteName . '] does not exists on controller.';
                die();
            }

        } else {
            if ($anyRoute) {
                if ($this->_anyRouteTable == !null) {
                    if (array_key_exists($fullRouteName, $this->_anyRouteTable)) {
                        $routingRule = explode($this->_parseDelimeter, $this->_anyRouteTable[$fullRouteName]);
                    } else {
                        echo 'ROUTER ERROR 001: URLEncoder Route mismatch. No [' . $fullRouteName . '] rule for ' . $_SERVER['REQUEST_METHOD'] . ' Request method';
                        die();
                    }
                } else {
                    echo 'ROUTER ERROR 002: URLEncoder Route mismatch. No [' . $fullRouteName . '] rule for ' . $_SERVER['REQUEST_METHOD'] . ' Request method';
                    die();
                }
            }
        }

        // TODO check routing rules
        //var_dump($routingRule);

        // invoke method on controller for any case
        //TODO validate
        if ($isResource) {
            $controllerClassName = $resourceControllerName;
            $methodInstanceName = $actionMethod;
        } else {
            $controllerClassName = $routingRule[0];
            $methodInstanceName = $routingRule[1];
        }


        // TODO post & any

        // TODO Check if class exists
        Time::stopMeasure('router-dispatch');

        Time::stopMeasure('ArmoredCore\Facades\Router');

        //Time::startMeasure('controller', "Executing Controller Action Method '$methodInstanceName'.");
        Time::startMeasure('controller-create', "Executing Controller Instantiation");
        $controllerInstance = new $controllerClassName();
        Time::stopMeasure('controller-create');
        // TODO check if method exists

        if ($this->routeHasID()) {
            $controllerInstance->$methodInstanceName($this->getID());
        } else {
            $controllerInstance->$methodInstanceName();
        }


    }

}