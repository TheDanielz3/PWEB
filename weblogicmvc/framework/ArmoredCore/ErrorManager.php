<?php

namespace ArmoredCore;

use ArmoredCore\Interfaces\ComponentRegisterInterface;
use ArmoredCore\Interfaces\ErrorManagerInterface;
use Exception;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 08-04-2017
 * Time: 22:24
 */
class ErrorManager implements ErrorManagerInterface, ComponentRegisterInterface
{
    private $_preTag = '<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>! </strong>';
    private $_endTag = '</div>';
    private $_dataobject = null;

    public function registerRequirements()
    {
        return null;
    }

    public function setupRequirements($requestedParams)
    {
    }

    public function attach($model)
    {
        $this->_dataobject = $model;
    }

    public function setPreTag($html)
    {
        $this->_preTag = $html;
    }

    public function setEndTag($html)
    {
        $this->_endTag = $html;
    }

    public function bind($dataname)
    {

        if (is_null($this->_dataobject)) {
            throw new Exception('WebLogic MVC: No model attached to error manager. Please attach model before binding fields.');
        } else {
            if ($this->_dataobject->is_invalid()) {
                $errors = $this->_dataobject->errors->on($dataname);
                if (!is_null($errors)) {
                    if (is_array($errors)) {
                        $bulkmsg = '';
                        foreach ($errors as $errormessage) {
                            $bulkmsg .= $this->_preTag . $errormessage . $this->_endTag;
                        }
                        return $bulkmsg;
                    } else {
                        return $this->_preTag . $errors . $this->_endTag;
                    }
                }
            }
        }
    }

}