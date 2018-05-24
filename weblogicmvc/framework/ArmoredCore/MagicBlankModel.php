<?php

namespace ArmoredCore;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 08-04-2017
 * Time: 17:44
 */
class MagicBlankModel
{
    //for active record compatibility
    public $errors = null;

    public function __get($name)
    {
        return '';
    }

    public function is_invalid()
    {
        return false;
    }

}