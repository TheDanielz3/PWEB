<?php

namespace ArmoredCore;

use ArmoredCore\Interfaces\AssetInterface;
use ArmoredCore\Interfaces\ComponentRegisterInterface;
use Exception;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 10-05-2016
 * Time: 14:04
 */
class WebAsset implements AssetInterface, ComponentRegisterInterface
{
    protected $_publicBaseURL = WL_PUBLIC_FOLDER_URL;

    public function __construct()
    {

    }

    public function registerRequirements()
    {

    }

    public function setupRequirements($requestedParams)
    {

    }

    public function css($filenameCSS)
    {
        return $this->_publicBaseURL . 'css/' . $filenameCSS;
    }

    public function js($filenameJS)
    {
        return $this->_publicBaseURL . 'js/' . $filenameJS;
    }

    public function Image($filenameImage)
    {
        return $this->_publicBaseURL . 'img/' . $filenameImage;
    }

    public function html($htmlpage)
    {
        return $this->_publicBaseURL . 'html/' . $htmlpage;
    }

}