<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;



class UserController extends BaseController{

    public function index()
    {
        $user = User::all();
        View::make('home.game', ['user' => $user]);

    }
    public function adminpanel()
    {
        $user = User::all();
        View::make('home.adminpanel', ['user' => $user]);
    }


    public function create()
    {
        View::make('book.create');
    }

    public function store()
    {

        // create new resource (activerecord/model) instance
        // your form name fields must match the ones of the table fields
        $user = new User(Post::getAll());
        $currentaccount = new Currentaccount();

        $currentaccount->saldo =400;
        $currentaccount->tipo = "pay";
        $currentaccount->descricao = "Carregamento 100 Euros";
        $currentaccount->credito = 400;
        $currentaccount->debito = 0;


        $user->block=0;
        $user->type = "normal";


        \Tracy\Debugger::barDump($user, 'user test');

        if($user->is_valid()){
            $user->save();

            $userSave = User::find_by_username($user->username);



            $currentaccount->id_username = $userSave->id;



            $currentaccount->save();
            \Tracy\Debugger::barDump($currentaccount, 'user test');
            Redirect::toRoute('home/login');
        } else {

            // return form with data and errors
            Redirect::flashToRoute('home/register', ['user' => $user]);
        }
    }

    public function show($id)
    {
        $user = User::find($id);



        if (is_null($user)) {
            // redirect to standard error page
        } else {
            View::make('home.show', ['user' => $user]);
        }
    }


    public  function login(){

        $username = Post::get('username');
        $password = Post::get('password');

        $user = User::find_by_username_and_password($username, $password);





        if(is_null($user))
        {
            View::make('home.login');
            echo "<script>alert('Username or password is incorrect!')</script>";
        }
        else
        {
            if($user->block == 1)
            {
                View::make('home.login');
                echo "<script >alert('Utilizador Banido do Site!')</script>";
            }
            else{
                $currentaccount = Currentaccount::find_by_id_username($user->id);
                Session::set('playerhandvalue', 0);
                Session::set('serverhandvalue', 0);

                Session::set('Status', "");
                Session::set('currentaccount', $currentaccount);
                Session::set('user', $user);
                Session::set('bet', 0);
                Redirect::toRoute('game/index');
            }
        }

    }

    public function edit($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            // redirect to standard error page
        } else {
            View::make('book.edit', ['user' => $user]);
        }
    }


    public function block($id)
    {


        $user = User::find($id);
        $user->block = 1;
        $user->update_attributes(Post::getAll());

        if($user->is_valid()){
            $user->save();
            Redirect::toRoute('user/adminpanel');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('user/adminpanel', ['user' => $user], $id);
        }
    }
    public function unblock($id)
    {
        $user = User::find($id);
        $user->block = 0;
        $user->update_attributes(Post::getAll());

        if($user->is_valid()){
            $user->save();
            Redirect::toRoute('user/adminpanel');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('user/adminpanel', ['user' => $user], $id);
        }
    }
    public function change($id)
    {
        $user = User::find($id);

        $user->update_attributes(Post::getAll());


        if($user->is_valid()){
            $user->save();
            Redirect::toRoute('home/user');
            Session::set('user', $user);
        } else {
            // return form with data and errors
            Redirect::flashToRoute('home/user', ['user' => $user], $id);
        }
    }
    public function charge($id)
    {


        $sessionaccount = Session::get('currentaccount');
        $currentaccount2 = Currentaccount::find_by_id_username($id);



        $currentaccount2->update_attributes(Post::getAll());


        $currentaccount = new Currentaccount();

        $currentaccount->saldo = $sessionaccount->saldo +($currentaccount2->credito*4);
        $currentaccount->tipo = "pay";
        $currentaccount->descricao = "Carregamento ".$currentaccount2->credito." Euros";
        $currentaccount->credito = $currentaccount2->credito*4;
        $currentaccount->debito = 0;
        $currentaccount->id_username = $id;

        \Tracy\Debugger::barDump($currentaccount2->credito, 'credito');
        if($currentaccount2->credito >= 1){
            if($currentaccount->is_valid()){

                $currentaccount->save();
                Session::set('currentaccount', $currentaccount);
                Redirect::toRoute('home/user');
            } else {

                // return form with data and errors
                Redirect::flashToRoute('home/register', ['user' => $currentaccount]);
            }

        }else{

            echo "<script>alert('Introduza um valor valido')</script>";
            Redirect::toRoute('home/user');


        }




    }
    public function change_bet5()
    {

        $bet=5;


            Session::set('bet', $bet);
            Session::set('Status', "0");
            Redirect::toRoute('user/index');

    }
    public function change_bet10()
    {

        $bet = 10;

            Session::set('bet', $bet);
            Session::set('Status', "0");
            Redirect::toRoute('user/index');

    }
    public function change_bet25()
    {

        $bet = 25;

            Session::set('bet', $bet);
            Session::set('Status', "0");
            Redirect::toRoute('user/index');

    }
}
