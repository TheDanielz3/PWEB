<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 15-04-2017
 * Time: 22:52
 */
class MT5MultiTentantForwarder
{
    private $_registeredModules = [];
    private $_defaultModule = '';

    public function registerServerMod($moduleName, $bootType){
        array_push($this->_registeredModules, $moduleName);
        return $this;
    }

    public function setDefault(){

        $size = count($this->_registeredModules);

        if ($size > 0){
            $this->_defaultModule = $this->_registeredModules[($size-1)];
        } else {
            throw new Exception('FireWire Microcontroller: there is no Server Module to set as default');
        }
    }


    public function fireStart(){

        $reqServerMod = $this->getRequestedServerMod();

        if (in_array($reqServerMod, $this->_registeredModules)){

            $bootfile = $this->createBootfilePath($reqServerMod);

        } else {
            // go default

            if ($this->_defaultModule == ''){

                throw new Exception('FireWire Micro Controller: no default Server Module set.');

            } else {

                $bootfile = $this->createBootfilePath($this->_defaultModule);

            }
        }

        //starting boot
        return $bootfile;
    }

    private function createBootfilePath($serverModName, $bootType = ''){

        $curDir = __DIR__;

        // @FIX DIRECTORY_SEPARATOR was not working (currently only runs on windows)
        // TODO FIX DIRECTORY_SEPARATOR was not working (currently only runs on windows)
        $segments = explode('\\', $curDir);

        $segments = array_filter($segments);

        $dir = WL_SERVER_DIR_NAME;

        $idx = array_search($dir, $segments);

        $path = '';

        for ($i=0 ; $i <= $idx ; $i++ ){
            // TODO FIX DIRECTORY_SEPARATOR was not working (currently only runs on windows)
            $path .= $segments[$i] . '\\';
        }

        // TODO FIX DIRECTORY_SEPARATOR was not working (currently only runs on windows)

        define('WL_SERVER_DIR', $path);

        $path .= $serverModName . '\\startup\\FireWireBoot.php' ;

        return $path;
    }


    private function getRequestedServerMod(){

        $url = $_SERVER['REQUEST_URI'];

        $segments = explode('/', $url);

        $segments = array_filter($segments);

        define('WL_SERVER_DIR_NAME', $segments[1]);

        if (isset($segments[2])) {
            $requestComponent = $segments[2];
        } else {
            // get default redirect
            $requestComponent = $this->_defaultModule;
        }

        return $requestComponent;

    }


}