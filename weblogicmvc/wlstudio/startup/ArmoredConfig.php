<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-04-2017
 * Time: 13:47
 */

// @imports
// WL_SERVER_DIR
// WL_SERVER_DIR_NAME
// WL_SERVER_URL
// WL_SERVER_MOD_NAME
// WL_SERVER_PUBLIC_DIR_NAME

define ('WL_SERVER_BASE_URL',            WL_SERVER_URL . WL_SERVER_DIR_NAME . '/');
define ('WL_MOD_BASE_URL',               WL_SERVER_BASE_URL . WL_SERVER_MOD_NAME . '/');
define ('WL_PUBLIC_FOLDER_URL',          WL_SERVER_BASE_URL . WL_SERVER_PUBLIC_DIR_NAME . '/');
// TODO fix filepath delimiters
define ('WL_MOD_BASE_DIR',               WL_SERVER_DIR . WL_SERVER_MOD_NAME . '\\' );
define ('WL_URL_PARSE_DELIMETER',        '/' );
define ('WL_CACHE_BASE_DIR',             WL_SERVER_DIR . 'cache\\');
define ('WL_LEGACY_VENDOR_BASE_DIR',     WL_SERVER_DIR . 'vendor\\legacy\\');
define ('WL_PUBLIC_FOLDER_DIR',          WL_SERVER_DIR . WL_SERVER_PUBLIC_DIR_NAME . '\\');
define ('WL_VIEW_BASE_DIR',              WL_MOD_BASE_DIR . "view\\");
define ('WL_VENDOR_BASE_DIR',            WL_SERVER_DIR . 'vendor');
define ('WL_FRAMEWORK_DIR',              WL_SERVER_DIR . "framework\\");
define ('WL_DEFAULT_VIEW_EXTENSION',     'phtml');
define ('WL_LAYOUT_BASE_DIR',            WL_MOD_BASE_DIR . "view\\layout\\");
define ('WL_MODEL_BASE_DIR',             WL_MOD_BASE_DIR . "model\\");
define ('WL_CONTROLLER_BASE_DIR',        WL_MOD_BASE_DIR . "controller\\");
