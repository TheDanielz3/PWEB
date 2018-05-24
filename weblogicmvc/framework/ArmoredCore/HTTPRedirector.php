<?php

namespace ArmoredCore;

use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\URL;
use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\HTTPRedirectorInterface;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:37
 */
class HTTPRedirector implements HTTPRedirectorInterface, ComponentRegisterInterface
{
    public function registerRequirements()
    {
        return null;
    }

    public function setupRequirements($requestedParams)
    {
    }

    public function toRoute($routeName, $id = '')
    {

        if ($id == '') {
            header('location:' . Url::toRoute($routeName));
        } else {
            header('location:' . Url::toRoute($routeName, $id));
        }
    }


    public function flashToRoute($routeName, $flashData, $id = '')
    {
        Session::set('ac_flashdata', $flashData);

        if ($id == '') {
            header('location:' . Url::toRoute($routeName));
        } else {
            header('location:' . Url::toRoute($routeName, $id));
        }
    }


    public function toURL($url)
    {
        header('location:' . $url);
    }

}