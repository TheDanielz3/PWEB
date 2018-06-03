<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-04-2017
 * Time: 18:51
 */


// Setup for switch template engine

//Haanga Template engine
const FLEX_TEMPLATE_ENGINE = 'haanga';
const FLEX_TEMPLATE_PROTOCOL = 'haanga';
const FLEX_TEMPLATE_EXTENSION = 'haanga';

// set up haanga cache directory
$haangaCachePath = WL_CACHE_BASE_DIR . DIRECTORY_SEPARATOR . 'haanga' . DIRECTORY_SEPARATOR . 'compiled';

// constant required for Haanga
define('H_CACHE_PATH' , $haangaCachePath);
define('LEGACY_PATH' ,  WL_LEGACY_VENDOR_BASE_DIR);
define('VIEW_PATH' ,    WL_VIEW_BASE_DIR);


