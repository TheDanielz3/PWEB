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
//Router::resource('user', 'UserController');
Router::get('test/index', 'CardTestController/index');
Router::get('blackjack/Bet', 'BlackjackController/Bet');
Router::post('blackjack/PostBet', 'BlackjackController/PostBet');
Router::get('blackjack/GameView', 'BlackjackController/Bet');

/************** End of URLEncoder Routing Rules ************************************/