<?php

namespace ArmoredCore\MVCReflexion;

use ArmoredCore\FileReader;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 21:49
 */
class MVCInspector
{
    private $_fr;


    public function __construct()
    {
        $this->_fr = new FileReader();
    }

    public function getModels()
    {
        $modelNames = array();

        $fr = new FileReader();
        $files = $fr->getFilesFromDir(WL_MODEL_BASE_DIR);

        foreach ($files as $file) {
            $tokens = explode('.', $file);

            if (!trim($tokens[0]) == '') {
                array_push($modelNames, $tokens[0]);
            }
        }

        return $modelNames;

    }


    public function getControllers()
    {

        $controllerNames = array();

        $fr = new FileReader();
        $files = $fr->getFilesFromDir(WL_CONTROLLER_BASE_DIR);

        foreach ($files as $file) {
            $tokens = explode('.', $file);

            if (!trim($tokens[0]) == '') {
                array_push($controllerNames, $tokens[0]);
            }
        }

        return $controllerNames;

    }


    public function getTaggedControllers()
    {

        $controllers = $this->getControllers();

        return $this->tagControllers($controllers);

    }

    private function tagControllers($controllers)
    {

        $taggedControllers = array();

        foreach ($controllers as $controller) {

            switch ($controller) {

                case 'ArmoredCore\Controllers\BaseController' :
                    $tag = ' (Weblogic MVC class)';
                    break;

                case 'DevToolsController' :
                    $tag = ' (Weblogic MVC Dev support Controller)';
                    break;

                case 'HomeController' :
                    $tag = ' (App Root Controller)';
                    break;

                default :

                    $classInterfaces = class_implements($controller);

                    if (array_key_exists('ArmoredCore\Interfaces\ResourceControllerInterface', $classInterfaces)) {
                        $tag = '(User defined Controller [Resource Controller type])';
                    } else {
                        $tag = '(User defined Controller)';
                    }

                    break;
            }

            array_push($taggedControllers, ($controller . $tag));

        }

        return $taggedControllers;

    }


}