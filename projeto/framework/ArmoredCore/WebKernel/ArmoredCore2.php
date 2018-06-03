<?php

namespace ArmoredCore\WebKernel;
use PSR;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 13-04-2017
 * Time: 15:42
 */
class ArmoredCore2
{
    protected $_microKernel;        //PSR-11 Container
    protected $_core;               //PSR-11 Container
    protected $_services;           //PSR-11 Container
    protected $_facades;            //PSR-11 Container

    protected $_bootableMiddleware; //PSR-15 Middleware Pipeline

    /**
     * ArmoredCore2 constructor.
     * @param $microKernel PSR-11 Container
     *
     */
    public function __construct($microKernel)
    {
        $this->_microKernel = $microKernel;
        $this->runMicroKernel();
    }

    private function runMicroKernel()
    {
        $this->_microKernel->lock();
    }


}