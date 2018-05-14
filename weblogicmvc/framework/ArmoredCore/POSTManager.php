<?php

namespace ArmoredCore;

use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\POSTManagerInterface;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:26
 */
class POSTManager implements POSTManagerInterface, ComponentRegisterInterface
{
    public function registerRequirements()
    {
        return null;
    }

    public function setupRequirements($requestedParams)
    {
    }

    public function get($key)
    {
        return $_POST[$key];
    }

    public function getAll()
    {
        return $_POST;
    }

    public function has($key)
    {
        return array_key_exists($key, $_POST);
    }

}