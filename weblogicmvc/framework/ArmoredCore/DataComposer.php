<?php

namespace ArmoredCore;
use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\DataComposerInterface;
use Exception;
use ArmoredCore\WebObjects\Session;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 10-05-2016
 * Time: 13:45
 */
class DataComposer implements DataComposerInterface, ComponentRegisterInterface
{
    protected $_viewData = '';

    public function registerRequirements()
    {
        return null;
    }

    public function setupRequirements($requestedParams)
    {
    }

    public function set($assoc_array)
    {

        if (!is_null($assoc_array)) {

            if (!(is_array($assoc_array))) {
                throw new Exception('Please use an associative array as data object for views');
            }

            foreach ($assoc_array as $key => $data) {
                $this->_viewData[$key] = $data;
            }
        }
    }

    public function get($key)
    {
        // if it was flashed use data immediately


        if (Session::has('ac_flashdata')) {
            $data = Session::get('ac_flashdata');
            if (!array_key_exists($key, $data)) {
                throw new Exception('A view is asking for a Flashed "' . $key . '"" data object. None has been passed in the controller.');
            } else {
                $copy = $data[$key];
                Session::remove('ac_flashdata');
                return $copy;
            }
        }

        //check if we have regular data
        if (is_array($this->_viewData)) {
            if (array_key_exists($key, $this->_viewData)) {
                return $this->_viewData[$key];
            }
        }

        // if we have nothing else return magicmodel BlankDataBinder
        return new MagicBlankModel();
    }

}