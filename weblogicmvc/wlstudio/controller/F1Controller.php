<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 15-04-2017
 * Time: 00:48
 */
use \ArmoredCore\Controllers\BeanController;
use \ArmoredCore\Interfaces\ResourceControllerInterface;

class F1Controller extends BeanController implements ResourceControllerInterface
{

    public function index(){
        $cars = R::findAll( 'f1cars' );
    }

    public function store(){

        $newCar = R::dispense( 'f1cars' );
        $newCar->make = 'Honda';
        $newCar->engine = 'V10';
        $newCar->tires = 4;
        $newCar->last_run = new DateTime(date("Y-m-d"));;
        $newCar->driver = 'Mika Huan';

        $id = R::store( $newCar );

    }


    /**
     * @return mixed
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $book = R::load( 'book', $id );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {

        $car->make = 'Honda';
        $car->engine = 'V10';
        $car->tires = 4;
        $car->last_run = new DateTime(date("Y-m-d"));;
        $car->driver = 'Mika Huan';

        $id = R::store( $car );

    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $car = R::load( 'f1cars', $id );
        R::trash( $car );
    }
}