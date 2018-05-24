<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 15-04-2017
 * Time: 00:04
 */

namespace ArmoredCore\Controllers;

include 'lib/rb.php';

use Nette\NotImplementedException;
use Tracy\Debugger;

class BeanController
{
    public function __construct()
    {
        $connStr = '';
        global $defaultDbConnection;

        if ($defaultDbConnection['DBMS'] != 'mysql'){
            throw new NotImplementedException();
        }

        switch ($defaultDbConnection['DBMS']){

            case 'mysql' : $connStr = 'mysql:host=' . $defaultDbConnection['SERVER'] . ';dbname=' . $defaultDbConnection['DATABASENAME'];
                           Debugger::barDump($connStr);
                            break;
        }

        \R::setup( $connStr, $defaultDbConnection['USER'], $defaultDbConnection['PASSWORD'] );
    }
}
