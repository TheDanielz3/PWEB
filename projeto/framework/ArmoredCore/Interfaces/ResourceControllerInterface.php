<?php

namespace ArmoredCore\Interfaces;
use Returns;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 20:03
 *
 *
 * REST Style interface convention for CRUD controllers
 *
 *
 */
interface ResourceControllerInterface
{

    /**
     * index (default route)
     * Responds to HTTP: GET
     * Responds to REST: GET
     *
     * Returns a view with a list of the models
     *
     * @return Returns a view with a list of the models
     */
    public function index();

    /**
     * create
     * Responds to HTTP: GET
     * Responds to REST: GET
     *
     * Returns a view with a form to create a new model
     *
     * @return Returns a view with a form to create a new model
     */

    public function create();

    /**
     * store
     * Responds to HTTP: POST
     * Responds to REST: POST
     * Validate post data
     * if valid:
     * Save data from new model form
     * @return Returns a view with a list of the models
     *
     * if not valid:
     * Return form to client with data and validation errors
     */
    public function store();


    public function show($id);

    public function edit($id);

    public function update($id);

    public function destroy($id);
}