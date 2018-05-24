<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 00:14
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:19
 */
interface RouterInterface
{
    public function parseURLRoute($url);

    public function routeNotDefined();

    public function routeHasID();

    public function getController();

    public function getAction();

    public function getID();

    /**
     * sets a rule for a http POST method request
     * @param $route
     * @param string $controllerAction
     * @return mixed
     */
    public function get($route, $controllerAction = '');

    /**
     * sets a rule for a http POST method request
     * @param $route
     * @param string $controllerAction
     * @return mixed
     */
    public function post($route, $controllerAction = '');

    public function any($route, $controllerAction = '');

    public function resolve($url);
}