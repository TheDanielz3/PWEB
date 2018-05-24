<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-05-2016
 * Time: 14:05
 */

/**
 * Developer components
 */

use Tracy\Debugger;

if (WL_DEBUG_ENABLED) {
    //$handler = $GLOBALS['handler'];
    //$handler->turnOff();
    //unset($handler);
    //unset($GLOBALS['handler']);
    Debugger::$showBar = true;
    Debugger::enable(Debugger::DEVELOPMENT);
} else {
    Debugger::enable(Debugger::PRODUCTION);
}

$db = $GLOBALS['defaultDbConnection'];

$dbp = [
    'dbms' => $db['DBMS'],
    'server' => $db['SERVER'],
    'dbname' => $db['DATABASENAME'],
    'user' => $db['USER'],
    '_password' => md5($_SERVER['REQUEST_URI']),
    'admin console' => '<a href="http://localhost/phpmyadmin"> Open Console </a>',
];



use Pd\Diagnostics\CacheInfoPanel;
use Pd\Diagnostics\DatabaseInfoPanel;


$newTime = microtime(true);
$microtime = [
    'System Boot and Page render' => $newTime - $GLOBALS['time']
];



// todo refactor afterwards
if(isset($GLOBALS['cachedPage'])){

    echo $GLOBALS['cachedPage'];
    unset($GLOBALS['cachedPage']);
    exit (0);

}

    $cachePanel = new CacheInfoPanel($microtime);
    Debugger::getBar()->addPanel($cachePanel);


    $dbPanel = new DatabaseInfoPanel($dbp);
    Debugger::getBar()->addPanel($dbPanel);
    $profiler = new Netpromotion\Profiler\Adapter\TracyBarAdapter();
    Debugger::getBar()->addPanel($profiler);

/*
$conn = Book::connection();
Use Filisko\PDOplus\PDO;

$pdoconn = new PDO('mysql:host=localhost;dbname=webapp', 'root', '', array(PDO::ATTR_PERSISTENT => true));

$db1Panel = new \Filisko\PDOplus\Tracy\BarPanel( $conn->connection );
$db1Panel->title = "DB SQL";
Debugger::getBar()->addPanel( $db1Panel );

*/

//$html5Parser = new Kdyby\Extension\Diagnostics\HtmlValidator\ValidatorPanel();
//Debugger::getBar()->addPanel($html5Parser);

use Netpromotion\Profiler\Profiler;

Profiler::enable();
Debugger::$strictMode = true;

/*
Debugger::fireLog('Hello World'); // send string into FireLogger console
Debugger::fireLog($_SERVER); // or even arrays and objects
Debugger::fireLog(new Exception('Test Exception')); // or exceptions
*/

