<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:16
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 02:25
 */
interface SessionManagerInterface
{
    public function set($name, $mixedvar);

    public function get($name);

    public function has($name);

    public function remove($name);

    public function destroy();
}