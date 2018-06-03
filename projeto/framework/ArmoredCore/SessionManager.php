<?php

namespace ArmoredCore;

use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\SessionManagerInterface;
use Exception;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 02:25
 */
class SessionManager implements SessionManagerInterface, ComponentRegisterInterface
{

    public function registerRequirements()
    {
        return null;
    }

    public function setupRequirements($requestedParams)
    {
    }

    public function set($name, $mixedvar)
    {

        if (session_status() == 1) {
            session_start();
        }

        $_SESSION[$name] = $mixedvar;
    }

    public function get($name)
    {

        if (session_status() == 1) {
            session_start();
        }

        //throw exception if $name does not exists
        if (!array_key_exists($name, $_SESSION)) {
            throw new Exception("You tried to access the session with a variable name of ' $name' but it does not exist.");
        }

        return $_SESSION[$name];

    }

    public function has($name)
    {

        if (session_status() == 1) {
            session_start();
        }

        return array_key_exists($name, $_SESSION);
    }

    public function remove($name)
    {

        if (session_status() == 1) {
            session_start();
        }

        unset($_SESSION[$name]);
    }

    public function destroy()
    {

        //session not initialized
        if (session_status() == 1) {
            session_start();
        }

        session_destroy();
    }

    public function start()
    {
        //session not initialized
        if (session_status() == 1) {
            session_start();
        }
    }
}