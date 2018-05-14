<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 12:16
 */

//Legacy Compability

// Auto-load class files from multiple directories using the SPL_AUTOLOAD_REGISTER method.




    spl_autoload_register(function($class) {

        $autoloadFolders = $GLOBALS['PSR0autoloadFolders'];

        foreach($autoloadFolders as $dir ) {
            if (file_exists($dir . $class . '.php')) {
                require_once($dir . $class . '.php');
                return;
            }
        }

    }
    );



