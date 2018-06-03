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

Router::get('/',			'HomeController/login');

Router::get('home/',		'HomeController/login');
Router::get('home/index',	'HomeController/login');
Router::get('home/start',	'HomeController/login');
Router::get('home/register',	'HomeController/register');
Router::get('home/login',	'HomeController/login');
Router::get("home/admin","HomeController/adminpanel");

Router::get('home/game', 'HomeController/game');
Router::get('home/user', 'HomeController/user');
Router::get('home/destroysession','HomeController/destroysession');

Router::get('game/pedircarta','CardTestController/pedircarta');

Router::get('user/block','UserController/block');
Router::get('home/game','CardTestController/index');

Router::get('home/top','HomeController/top');




Router::post('home/register','HomeController/NewUser');
Router::post("home/adminpanel","HomeController/adminpanel");
Router::post('home/index','HomeController/index');



Router::get('user/block','UserController/block');

Router::get('home/game','CardTestController/index');

Router::resource('user', 'UserController');

Router::resource('game', 'CardTestController');









/************** End of URLEncoder Routing Rules ************************************/