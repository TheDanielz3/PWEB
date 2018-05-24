<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-04-2017
 * Time: 16:50
 *
 * Autoloader Setup (framework autoload)
 */

$PSR0autoloadFolders = array(
    'controller' => WL_MOD_BASE_DIR . "controller\\",
    'model' => WL_MOD_BASE_DIR . "model\\"
);


include_once('lib/PSR0-ClassLoader.php');
