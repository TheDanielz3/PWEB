<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 08-04-2017
 * Time: 12:36
 */
class UserController extends BaseController implements ResourceControllerInterface {
    /**
     * @return mixed
     */
    public function index()
    {
        $user = user::all();
        View::make('user.index', ['users' => $user]);
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
        $user = new user(Post::getAll());

        if($user->is_valid()){
            $user->save();
            Redirect::toRoute('user/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('user/create', ['user' => $user]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $user = user::find($id);

        \Tracy\Debugger::barDump($user);

        if (is_null($user)) {
            // redirect to standard error page
        } else {
            View::make('user.show', ['user' => $user]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = user::find($id);

        if (is_null($user)) {
            // redirect to standard error page
        } else {
            View::make('user.edit', ['user' => $user]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $user = user::find($id);
        $user->update_attributes(Post::getAll());

        if($user->is_valid()){
            $user->save();
            Redirect::toRoute('user/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('user/edit', ['user' => $user], $id);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        Redirect::toRoute('user/index');
    }
}