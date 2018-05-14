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
class BookController extends BaseController implements ResourceControllerInterface {
    /**
     * @return mixed
     */
    public function index()
    {
        $books = Book::all();
        View::make('book.index', ['books' => $books]);

    }

    /**
     * @return mixed
     */
    public function create()
    {
        View::make('book.create');
    }

    /**
     * @return mixed
     */
    public function store()
    {
        // create new resource (activerecord/model) instance
        // your form name fields must match the ones of the table fields
        $book = new Book(Post::getAll());

        if($book->is_valid()){
            $book->save();
            Redirect::toRoute('book/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('book/create', ['book' => $book]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $book = Book::find($id);

        \Tracy\Debugger::barDump($book);

        if (is_null($book)) {
            // redirect to standard error page
        } else {
            View::make('book.show', ['book' => $book]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $book = Book::find($id);

        if (is_null($book)) {
            // redirect to standard error page
        } else {
            View::make('book.edit', ['book' => $book]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $book = Book::find($id);
        $book->update_attributes(Post::getAll());

        if($book->is_valid()){
            $book->save();
            Redirect::toRoute('book/index');
        } else {
            // return form with data and errors
            Redirect::flashToRoute('book/edit', ['book' => $book], $id);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        Redirect::toRoute('book/index');
    }
}
