<?php

namespace ArmoredCore\WebKernel;
use Closure;
use Exception;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 00:08
 */
abstract class IOCContainer
{
    protected static $instances = [];
    protected static $configs = [];

    public static function config($configparams)
    {
        static::$configs = $configparams;
    }

    public static function run()
    {

        foreach (static::$instances as $instance) {
            self::setupInstance($instance);
        }
    }

    public static function set($name, $instance)
    {
        if (is_string($instance)) {
            $instance = new $instance();
        }

        $instance = self::setupInstance($instance);

        static::$instances[$name] = $instance;
    }

    public static function get($name)
    {
        $instance = static::$instances[$name];

        if ($instance instanceof Closure) {
            $instance = $instance();
        }

        return $instance;
    }

    private static function setupInstance($instance)
    {

        $requirementNames = null;
        //get requirements of the object
        if (method_exists($instance, 'registerRequirements')) {
            $requirementNames = $instance->registerRequirements();
        }

        //if no requirements object is good
        if (is_null($requirementNames)) {
            return $instance;
        }

        $requirementData = array();

        // if we don't have the setup data warn user
        foreach ($requirementNames as $paramName) {
            if (!array_key_exists($paramName, static::$configs)) {
                throw new Exception('Error in configuring armored core component: ' . get_class($instance) . " '$paramName' required but not provided in configuration.");
                die();
            }

            $requirementData[$paramName] = static::$configs[$paramName];
        }

        //Setup the object
        if (method_exists($instance, 'setupRequirements')) {
            $instance->setupRequirements($requirementData);
        }

        return $instance;

    }


}