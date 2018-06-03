<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 16-04-2017
 * Time: 19:00
 */

namespace ArmoredCore;


class FLEXTemplateDispatcher
{
    protected $_viewBaseDir;
    protected $_cacheDir;

    public function isAvailable(){

        if(trim(FLEX_TEMPLATE_ENGINE) != ''){
            return true;
        } else {
            return false;
        }

    }

    public function setViewBaseDir($path){
        $this->_viewBaseDir = $path;
    }

    public function setCacheDir($path){
        $this->_cacheDir = $path;
    }

    public function process($ViewName, $data){

        $legacyPath = LEGACY_PATH;

        require $legacyPath . DIRECTORY_SEPARATOR . 'Haanga' . DIRECTORY_SEPARATOR . 'Haanga.php';

        \Haanga::configure(array(
            'template_dir' => $this->_viewBaseDir,
            'cache_dir' => $this->_cacheDir,
        ));

        $rows = 10;
        $data = array();
        for ($i=0; $i<$rows; $i++ ) {
            $data[] = array('id' => $i, 'name' => "name {$i}");
        }

        $view = \Haanga::Load('home\index.haanga', array(
            'number' => $rows,
            'title'  => 'haanga',
            'table'  => $data
        ), true);


        echo $view;

    }



}