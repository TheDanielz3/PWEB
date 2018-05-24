<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 16:46
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 16:40
 */
interface URLEncodingInterface
{
    public function toRoute($route, $id = '');
}