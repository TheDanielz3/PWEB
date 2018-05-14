<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-04-2017
 * Time: 18:46
 */

# setup the PHP-ActiveRecord library

// environment setup

/**
 * phpactiverecord ORM library
 **/

require WL_VENDOR_BASE_DIR . "\\php-activerecord\\ActiveRecord.php";

ActiveRecord\Config::initialize(function($cfg)
{
    $db = $GLOBALS['defaultDbConnection'];
    $DBconnections = array(
        'dev' => $db['DBMS'] . '://' . $db['USER'] . ':' . $db['PASSWORD'] . '@' . $db['SERVER'] . '/' . $db['DATABASENAME'],
        'pgsql' => 'pgsql://username:password@localhost/development',
        'sqlite' => 'sqlite://my_database.db',
        'oci' => 'oci://username:passsword@localhost/xe'
    );

    $cfg->set_model_directory(WL_MODEL_BASE_DIR);
    $cfg->set_connections($DBconnections);
    $cfg->set_default_connection(WL_RUNNING_ENV);
});


