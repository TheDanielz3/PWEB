<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 17-04-2017
 * Time: 19:53
 */

$spl = new SplClassLoader("Windwalker",  WL_VENDOR_BASE_DIR);
$spl->register();

$spl = new SplClassLoader("phpFastCache",  WL_VENDOR_BASE_DIR);
$spl->register();

use Windwalker\Cache\Cache;
use Windwalker\Cache\Storage\FileStorage;
use Windwalker\Cache\Serializer\StringSerializer;


$cache = new Cache(new FileStorage(WL_CACHE_BASE_DIR . '\\..\\cache\\storage'), new StringSerializer());

$url = md5($_SERVER['REQUEST_URI']) ;
if ($cache->exists($url))
{
    //\ArmoredCore\WebKernecomposer require windwalker/httpl\ArmoredCore::set('cached_view', $cache->get($url) )  ;
    return $cache->get($url);
}












