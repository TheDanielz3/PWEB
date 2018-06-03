<?php
/**
 * Created by S P MENDES.
 * User: smendes
 * Date: 07-04-2017
 * Time: 17:36
 * Boots the framework using FireWire for REST, Ajax Controllers and other server side services
 *
 */
$time = microtime(true);

// PSR-4 default Autoloader Class
require ( 'lib/SplClassLoader.php' );
//load user configs
require ( 'User-Config.php' );
// setups environment global variables (context paths and urls)
require ( 'ArmoredConfig.php' );
// PSR-4 autoload map file
require ( 'PSR4-Registry.php' );
// PSR-0 autoload map file
require ( 'PSR0-Registry.php' );
// Legacy autoload map file
require ( 'Legacy-Registry.php' );
// Vendor autoload map file
require ( 'Vendor-Registry.php' );
// include the header for the boot
// require ( 'Head-boot.php');


// Loads the PSR-11 Micro Kernel
// Registers PSR-4/0
// Loads PSR-7 HTTP Foundation
// Loads PSR-8 Hugher
// Loads PSR-15 Incoming Middeware
// Loads PSR-15 Outgoing Middeware
require ( 'Micro-Kernel.php' );

// ORM System Bootstrap
require ( 'ORM-bootstrap.php' );

// Template Engines bootstrap
require ( 'TemplateEngine-Bootstrap.php' );

// Startup the developers debug components
require ('dev-components.php');

use \Netpromotion\Profiler\Profiler;
Profiler::start('WL: Bootstrapping Armored Core');
Profiler::start('WL: Loading MVC Components');

// Loads and setups the Armored Core (PSR-11)
//
require ('ArmoredCore-boot.php');

Profiler::finish('WL: Loading MVC Components');
Profiler::start('WL: Loading Services');

// Startup services
require ('Service-Registry.php');

Profiler::finish('WL: Loading Services');
Profiler::start('WL: Loading Router');

require (WL_MOD_BASE_DIR . DIRECTORY_SEPARATOR . 'router.php');

Profiler::finish('WL: Loading Router');
Profiler::finish('WL: Bootstrapping Armored Core');



// Router Resolve
use ArmoredCore\Facades\Router;
// TODO create an psr-7 object instead
$url = $_SERVER['REQUEST_URI'];
$view = Router::resolve($url);

//$url = md5($url);
//$cache->set($url, $view);
