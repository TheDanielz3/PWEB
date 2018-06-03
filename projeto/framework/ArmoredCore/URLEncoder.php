<?php

namespace ArmoredCore;

use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\URLEncodingInterface;
use parameters;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 16:40
 */
class URLEncoder implements URLEncodingInterface, ComponentRegisterInterface
{
    private $_URLBase = '';
    private $_parseDelimeter = '';

    public function __construct($URLBase = '', $parseDelimeter = '/')
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


    public function toRoute($route, $id = '')
    {

        if (trim($route == '')) {
            echo 'URLEncoder ERROR: Unable to build route. Route is missing.';
            die();
        }

        $strToken = explode($this->_parseDelimeter, trim($route));

        if (trim($strToken[0]) == '') {
            echo 'INVALID URLEncoder ERROR 004: Route is empty.';
            die();
        }

        if (trim($strToken[1]) == '') {
            echo 'INVALID URLEncoder ERROR 005: Action is empty.';
            die();
        }

        $URLRoute = $this->_URLBase . '?route=' . $strToken[0] . '&action=' . $strToken[1];

        if (!$id == '') {
            $URLRoute = $URLRoute . '&id=' . $id;
        }

        return $URLRoute;
    }
}