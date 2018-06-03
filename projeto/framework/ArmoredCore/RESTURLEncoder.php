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
class RESTURLEncoder implements URLEncodingInterface, ComponentRegisterInterface
{

    private $_parseDelimeter = WL_URL_PARSE_DELIMETER;


    public function __construct()
    {

    }

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


    public function toRoute($route, $id = '')
    {

        if (trim($route == '')) {
            echo 'URLEncoder ERROR: Unable to build route. Route is missing.';
            die();
        }


        if (strpos($route, $this->_parseDelimeter) == 0) {
            echo 'INVALID URLEncoder ERROR 0010: delimeter not recognized';
            die();
        }

        $strToken = explode($this->_parseDelimeter, trim($route));

        if (count($strToken) < 1) {
            echo 'INVALID URLEncoder ERROR 004: Controller not defined.';
            die();
        }

        if (count($strToken) < 2) {
            echo 'INVALID URLEncoder ERROR 005: Action not defined.';
            die();
        }

        $newBaseUrl = WL_MOD_BASE_URL;

        $URLRoute = $newBaseUrl . $strToken[0] . $this->_parseDelimeter . $strToken[1];

        if (!$id == '') {
            $URLRoute = $URLRoute . $this->_parseDelimeter . $id;
        }

        return $URLRoute;
    }
}