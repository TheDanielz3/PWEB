<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName@methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/start',	'HomeController/start');
Router::get('home/about','HomeController/about');
Router::get('about/index', 'AboutController/index');
Router::get('calculadora/index', 'PlanoController/index');
Router::post('calculadora/show', 'PlanoController/show');

Router::resource('user', 'UserController');


/************** End of URLEncoder Routing Rules ************************************/