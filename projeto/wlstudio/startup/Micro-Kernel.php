<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-04-2017
 * Time: 18:39
 */

$mk = new \ArmoredCore\WebKernel\MicroKernel();
$mk->PSR4register( WL_VENDOR_BASE_DIR, $GLOBALS['psr4vendorMap'] );
unset( $GLOBALS['psr4vendorMap'] );

//set PSR-8 Hugger
$mk->set('hugger', new \Dave1010\Hug\Hugger());

/*
use Windwalker\Cache\Cache;
use Windwalker\Cache\Serializer\StringSerializer;
use Windwalker\Cache\Storage\FileStorage;

$smartcache = new Cache(new FileStorage(WL_CACHE_BASE_DIR . '\\..\\cache\\weblogicmvc\\output'), new StringSerializer());



$url = md5($_SERVER['REQUEST_URI']) ;
if ($smartcache->exists($url))
{
    //$GLOBALS['cachedPage'] = $smartcache->get($url);
    echo $smartcache->get($url);
    exit(0);
}

$mk->set('WL_CACHE', $smartcache);

*/



//set PSR-7 Incoming Request
/*
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
*/

//var_dump ($request);
//die;

// Hugger
// PSR 7 Interface Zend diactoros
// incoming http middleware PSR-15
// outgoing http middleware PSR-15
//$mk->set('')
