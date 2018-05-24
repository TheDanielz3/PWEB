<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 13-04-2017
 * Time: 18:39
 */
use ArmoredCore\WebKernel\MicroKernel;


/**
 * temp test for new module header
 */

define('CONTAINER_TYPE', 'FireWire://WebApp');

define('BASE_URL', 'http://localhost/weblogicmvc');
define('BASE_DIR', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'));

define('APP_DIR', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));
$path_parts = pathinfo(APP_DIR);
define('APP_NAME', $path_parts['basename']);
define('APP_URL', BASE_URL . '/' .APP_NAME);

define('VENDOR_DIR',  BASE_DIR . DIRECTORY_SEPARATOR . 'vendor');
define('VENDOR_URL',  BASE_URL . '/' . 'vendor');

define('APP_VIEW_DIR',  APP_URL . '/' . 'view');
define('APP_CONTROLLER_DIR',  APP_URL . '/' . 'controller');
define('APP_MODEL_DIR',  APP_URL . '/' . 'model');

$psr4configMap = [
    'Aura'      =>  WL_VENDOR_BASE_DIR,
    'Psr'       =>  WL_VENDOR_BASE_DIR,
    'Stolz'     =>  WL_VENDOR_BASE_DIR,
    'Symfony'   =>  WL_VENDOR_BASE_DIR,
    'Tracy'     =>  WL_VENDOR_BASE_DIR
];

$psr0ConfigMap = [];

$legacyConfigMap = [];


echo BASE_URL . '<br>';
echo BASE_DIR . '<br>';
echo APP_NAME . '<br>';
echo APP_URL . '<br>';
echo VENDOR_DIR . '<br>';
echo VENDOR_URL . '<br>';

echo APP_VIEW_DIR . '<br>';
echo APP_CONTROLLER_DIR . '<br>';
echo APP_MODEL_DIR . '<br>';


var_dump($psr4configMap);

$mk = new MicroKernel($psr4configMap);
$mk->PSR4AutoloaderBoot();
die();



