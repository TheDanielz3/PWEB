<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 00:39
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:52
 */
interface ViewDispatcherInterface
{
    public function make($viewName, $viewData = null);
    public function attachSubView($placeHolder, $viewName, $viewData);

}