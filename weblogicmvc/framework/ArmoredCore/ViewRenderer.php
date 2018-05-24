<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 15-04-2017
 * Time: 12:22
 */

namespace ArmoredCore;

use ArmoredCore\WebKernel\ArmoredCore;


class ViewRenderer
{
    protected $_viewName;
    protected $_subViews = [];

    public function getViewName(){
        return $this->_viewName;
    }

    public function attachSubview($placeHolder, $viewFileName, $viewData = []){
        ArmoredCore::get('Data')->set($viewData);
        $this->_subViews[$viewFileName] = $placeHolder;
    }

    public function getViewForPlaceholder($placeHolder){

        $key = array_search($placeHolder, $this->_subViews);

        if($key){
            return $key;
        } else {
            return false;
        }
    }

    public function RenderView($viewFileName, $viewData = []){

        if(!empty($viewData)){
            ArmoredCore::get('Data')->set($viewData);
        }

        try {
                ob_start();
                include $viewFileName;
                $html = ob_get_contents();
            return $html;

        } catch (Exception $e) {
            throw new Exception('The view [' . $viewFileName . '] does not exist' . $e->getMessage());
        } finally {

        }

    }

    public function RenderSubView($viewFileName, $viewData = []){

        if(!empty($viewData)){
            ArmoredCore::get('Data')->set($viewData);
        }

        try {
            include $viewFileName;

        } catch (Exception $e) {
            throw new Exception('The view [' . $viewFileName . '] does not exist' . $e->getMessage());
        } finally {

        }


    }

}