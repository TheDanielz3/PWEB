<?php
/**
 * Server FrontController
 */

$time = microtime(TRUE);
$mem = memory_get_usage();

require ( 'lib/FireWireBooter.php' );
require ( 'lib/MT5MultiTentantForwarder.php' );
require ( 'lib/php_error.php' );
//$handler = new \php_error\ErrorHandler( array ( 'background_text'  => 'WEBLogicMVC' ) );
//$handler->turnOn();

$mt5 = new MT5MultiTentantForwarder();

/**
 *
 * ServerMod Secure Registry
 */

$mt5->registerServerMod('webapp','firewire')->setDefault();
$mt5->registerServerMod('wlstudio','firewire');

/**
 * End of Server Mod registration
 */

FireWireBooter::addToPipeline($mt5);

unset($mt5);

FireWireBooter::processAll();

$boot = FireWireBooter::getDataFrom('MT5MultiTentantForwarder');

FireWireBooter::destroyData();
FireWireBooter::destroyPipeline();

$time = microtime(TRUE);

require $boot;
