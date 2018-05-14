<?php

namespace ArmoredCore\Facades;


/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 00:33
 * @method static void get(string $route, string $controllerAction) use convention: controllername@methodname example: routename: home@index is mapped to HomeController@index (index is the action-method name)
 * @method static void post(string $route, string $controllerAction) use convention: controllername@methodname
 * @method static void resource(string $resourceName, string $controllerName)
 *
 * */
class Router extends Facade
{

    protected static function getName()
    {
        return 'Router';
    }

}