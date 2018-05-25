<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 15/05/2018
 * Time: 16:55
 */
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class ContasController extends BaseController implements ResourceControllerInterface
{
    public function index()
    {
        $contas = Contas::all();
        View::make('conta.index', ['contas' => $contas]);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        View::make('conta.create');
    }

    /**
     * @return mixed
     */
    public function store()
    {
        // create new resource (activerecord/model) instance
        // your form name fields must match the ones of the table fields
        $contas = new Contas(Post::getAll());

        if($contas->is_valid()){
            $contas->save();
            Redirect::toRoute('conta/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('conta/create', ['conta' => $contas]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $contas = Book::find($id);

        \Tracy\Debugger::barDump($contas);

        if (is_null($contas)) {
            // redirect to standard error page
        } else {
            View::make('conta.show', ['conta' => $contas]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $contas = Book::find($id);

        if (is_null($contas)) {
            // redirect to standard error page
        } else {
            View::make('conta.edit', ['conta' => $contas]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    //Faz update ao utilizador
    public function update($id)
    {
        $contas = Book::find($id);
        $contas->update_attributes(Post::getAll());

        if($contas->is_valid()){
            $contas->save();
            Redirect::toRoute('conta/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('conta/edit', ['conta' => $contas], $id);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $contas = Book::find($id);
        $contas->delete();
        Redirect::toRoute('conta/index');
    }
}