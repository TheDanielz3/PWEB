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

Router::get('/','HomeController/index');
Router::get('home/','HomeController/index');
Router::get('home/index','HomeController/index');


Router::get('plano/index','PlanoController/index');
Router::post('plano/show','PlanoController/show');




Router::get('home/start','HomeController/start');
Router::get('home/login','HomeController/login');
Router::get('home/worksheet','HomeController/worksheet');

Router::get('home/setsession','HomeController/setsession');
Router::get('home/showsession','HomeController/showsession');
Router::get('home/destroysession','HomeController/destroysession');

Router::get('devtools/restcontrollerform','DevToolsController/RESTControllerForm');
Router::get('devtools/accomponents','DevToolsController/accomponents');
Router::get('devtools/inspect','DevToolsController/inspect');

Router::get('F1/index','F1Controller/index');

Router::resource('book', 'BookController');










/************** End of URLEncoder Routing Rules ************************************/