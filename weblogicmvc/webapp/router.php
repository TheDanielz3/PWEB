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
Router::resource('user/index', 'UserController/index');
Router::resource('blackjack', 'UserController');
//Router::resource('user', 'UserController');
Router::get('test/index', 'CardTestController/index');
Router::post('user/Bet', 'BlackjackController/Bet');
//Router::get('user/Hit', 'BlackjackController/Hit');
Router::get('home/worksheet', 'AboutController/Worksheet');

Router::resource('user/login', 'UserController/login');


//Router::post('user/store','UserController/store');
//Router::post('user/create','UserController/create');
//outer::get('user/create', 'UserController/create');

Router::get('user/login', 'LoginController/doLogin');


Router::get('user/Bet', 'BlackjackController/Bet');
Router::post('user/PostBet', 'BlackjackController/PostBet');

Router::get('user/GameView', 'BlackjackController/Bet');
Router::post('user/GameView', 'BlackjackController/PostBet');
Router::get('user/Hit', 'BlackjackController/Hit');



Router::resource('user', 'UserController');

/************** End of URLEncoder Routing Rules ************************************/