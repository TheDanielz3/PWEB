<?php

namespace ArmoredCore;

use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\LayoutManagerInterface;
use ArmoredCore\WebKernel\ArmoredCore;
use Tracy\Debugger;


/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 16-05-2016
 * Time: 14:10
 */
class LayoutManager implements LayoutManagerInterface, ComponentRegisterInterface
{
    protected $_viewBaseFolder = WL_VIEW_BASE_DIR;
    protected $_layoutBaseFolder = WL_LAYOUT_BASE_DIR;
    protected $_viewExtension = WL_DEFAULT_VIEW_EXTENSION;
    protected $_locked = false;

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

    public function includeLayout($layoutViewName)
    {
        if(!$this->_locked){

            $layoutViewName = str_replace('.', DIRECTORY_SEPARATOR, $layoutViewName);
            require ($this->_layoutBaseFolder . '\\' . $layoutViewName . '.' . $this->_viewExtension);

        }


    }

    public function setSubViewContainer($placeHolder)
    {
        //lock does not allow includelayouts
        $this->_locked = true;
        $subViewFileName = ArmoredCore::get('ViewRenderer')->getViewForPlaceholder($placeHolder);

        Debugger::barDump($subViewFileName);

        if($subViewFileName){
            ArmoredCore::get('ViewRenderer')->RenderSubView($subViewFileName);
        }
        //unlock
        $this->_locked = false;

    }

}