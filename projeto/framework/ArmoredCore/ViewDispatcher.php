<?php

namespace ArmoredCore;

use ArmoredCore\WebKernel\ArmoredCore;
use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\ViewDispatcherInterface;
use Exception;
use Netpromotion\Profiler\Profiler;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:52
 */
class ViewDispatcher implements ViewDispatcherInterface, ComponentRegisterInterface
{
    protected $_viewBaseFolder = WL_VIEW_BASE_DIR;
    protected $_viewExtension = WL_DEFAULT_VIEW_EXTENSION;

    /**
     * @param $placeHolder
     * @param $viewName
     * @param $viewData
     * @return mixed
     */
    public function attachSubView($placeHolder, $viewName, $viewData = [])
    {
        if(!is_array($viewData)){
            throw new Exception('WL: Data passed to a view must be an array');
        }

        $viewFileName = $this->getFileName($viewName);

        ArmoredCore::get('ViewRenderer')->attachSubview($placeHolder, $viewFileName, $viewData);
    }

    public function __construct( )
    {

    }

    public function registerRequirements()
    {

    }

    public function setupRequirements($requestedParams)
    {

    }

    private function getFileName($viewName){
        $viewName = str_replace('.', '\\', $viewName);
        return $this->_viewBaseFolder . '\\' . $viewName . '.' . $this->_viewExtension;
    }

    private function isFLEXProtocolUsed($viewName)
    {
        $extract = FLEX_TEMPLATE_PROTOCOL . '://';

        $pos = strpos($viewName, $extract);

        if($pos === false){

            return false;

        } else {

            return true;
        }
    }


    //make micro_protolor component
    private function FLEXProcessURL($url){
        return str_replace( FLEX_TEMPLATE_PROTOCOL . '://', '', $url);
    }



    public function make($viewName, $viewData = [])
    {

        //check if FLEX protocol is used

        //get instance from armoredcore

        if($this->isFLEXProtocolUsed($viewName)) {

            $viewName = $this->FLEXProcessURL($viewName);

            $flex = new FLEXTemplateDispatcher();
            if ($flex->isAvailable()) {
                $flex->setCacheDir(H_CACHE_PATH);
                $flex->setViewBaseDir($this->_viewBaseFolder);
                $view = $flex->process($viewName, $viewData);
            }
        } else {

        //fallback to default phtml rendering

        if(!is_array($viewData)){
            throw new Exception('WL: Data passed to a view must be an array');
        }

        $viewFileName = $this->getFileName($viewName);

        Profiler::start('Rendering View: ' . $viewName);

        $view = ArmoredCore::get('ViewRenderer')->RenderView($viewFileName, $viewData);

        Profiler::finish('Rendering View: ' . $viewName);

        }
        /*
        $url = md5($_SERVER['REQUEST_URI']) ;
        $mk = ArmoredCore::get('MicroKernel');
        $cache = $mk->get('WL_CACHE');
        $cache->set($url, $view);
        */
        return $view;


    }

}