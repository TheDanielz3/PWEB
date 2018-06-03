<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:30
 */
class HomeController extends BaseController
{

    public function index(){

        return View::make('home.index');
    }

    public function start(){

        //View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'Quick Start']);
        return View::make('home.start');
    }

    public function login(){
        return View::make('home.login');
    }
    public function adminpanel(){
        $user = User::all();
        return View::make('home.adminpanel',['user' => $user]);
    }

    public function worksheet(){

        View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'MVC Worksheet']);

        return View::make('home.worksheet');
    }

    public function setsession(){
        $dataObject = MetaArmCoreModel::getComponents();
        Session::set('object', $dataObject);

        Redirect::toRoute('home/worksheet');
    }

    public function showsession(){
        $res = Session::get('object');
        var_dump($res);
    }

    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home/login');
    }
    public function register(){
        return View::make('home.register');
    }
    public function game(){
        return View::make('home.game');
    }
    public function user(){

        $currentaccount = Currentaccount::all();
        return View::make('home.user', ['currentaccount' => $currentaccount]);
    }
    public function top(){


        $currentaccount = Currentaccount::find('all',array('limit' => 10));
        return View::make('home.top',['currentaccount' => $currentaccount]);
    }



}