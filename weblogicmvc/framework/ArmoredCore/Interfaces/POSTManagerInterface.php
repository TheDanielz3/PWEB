<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:31
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:26
 */
interface POSTManagerInterface
{
    public function get($key);

    public function getAll();

    public function has($key);
}