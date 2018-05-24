<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:46
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:37
 */
interface HTTPRedirectorInterface
{
    public function toRoute($routeName, $id = '');

    public function toURL($url);
}