<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 23:17
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 00:12
 */
interface ComponentRegisterInterface
{
    /**
     * @return array with names of required setup parameters or null if none
     */
    public function registerRequirements();

    public function setupRequirements($requiredParams);
}