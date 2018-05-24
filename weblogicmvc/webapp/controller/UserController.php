<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 15/05/2018
 * Time: 16:20
 */
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;


class UserController extends BaseController implements ResourceControllerInterface {

    public function index()
    {
        $users = User::all();
        View::make('user.index', ['users' => $users]);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        View::make('user.create');
    }

    /**
     * @return mixed
     */
    public function store()
    {
        // create new resource (activerecord/model) instance
        // your form name fields must match the ones of the table fields
        $users = new User(Post::getAll());

        if($users->is_valid()){
            $users->save();
            Redirect::toRoute('user/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('user/create', ['user' => $users]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $users = Book::find($id);

        \Tracy\Debugger::barDump($users);

        if (is_null($users)) {
            // redirect to standard error page
        } else {
            View::make('user.show', ['user' => $users]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $users = Book::find($id);

        if (is_null($users)) {
            // redirect to standard error page
        } else {
            View::make('user.edit', ['user' => $users]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    //Faz update ao utilizador
    public function update($id)
    {
        $users = Book::find($id);
        $users->update_attributes(Post::getAll());

        if($users->is_valid()){
            $users->save();
            Redirect::toRoute('user/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('user/edit', ['user' => $users], $id);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $users = Book::find($id);
        $users->delete();
        Redirect::toRoute('user/index');
    }
}