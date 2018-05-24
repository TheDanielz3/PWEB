<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 08-04-2017
 * Time: 22:37
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 08-04-2017
 * Time: 22:24
 */
interface ErrorManagerInterface
{
    public function attach($model);

    public function setPreTag($html);

    public function setEndTag($html);

    public function bind($dataname);
}