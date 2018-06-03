<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 18:03
 */
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebKernel\ArmoredCore;

/*******************************************************
 * Create ArmoredCore, load runtime objects and Facades
 *******************************************************/

//ArmoredCore::config();

ArmoredCore::set('MicroKernel', $GLOBALS['mk']);
unset($GLOBALS['mk']);

ArmoredCore::set('Router', 'ArmoredCore\FireWireRESTRouter');
ArmoredCore::set('View', 'ArmoredCore\ViewDispatcher');
ArmoredCore::set('ViewRenderer', 'ArmoredCore\ViewRenderer');
ArmoredCore::set('URL', 'ArmoredCore\RESTURLEncoder');
ArmoredCore::set('Asset', 'ArmoredCore\WebAsset');
ArmoredCore::set('Data', 'ArmoredCore\DataComposer');
ArmoredCore::set('Layout', 'ArmoredCore\LayoutManager');
ArmoredCore::set('Session', 'ArmoredCore\SessionManager');
ArmoredCore::set('Post', 'ArmoredCore\POSTManager');
ArmoredCore::set('Redirector', 'ArmoredCore\HTTPRedirector');

ArmoredCore::run();

//session enabled for third party libraries
// phpactiverecord requirement
Session::start();
