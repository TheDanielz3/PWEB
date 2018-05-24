<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\View;
use ArmoredCore\MVCReflexion\MVCInspector;
use ArmoredCore\WebKernel\ArmoredCore;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 20:31
 */
class DevToolsController extends BaseController
{

    public function index(){

    }

    public function RESTControllerForm(){

        $mvci = new MVCInspector();
        $modelNames = $mvci->getModels();
        $controllerNames = $mvci->getTaggedControllers();

        View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'REST/Resource Controller']);
        View::make('devtools.restcontrollerform', ['modelnames' => $modelNames, 'controllernames' => $controllerNames]);
    }

    public function accomponents(){
        $components = ArmoredCore::getComponents();
        View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'Armored Core']);
        View::Make('devtools.accomponents', ['components' => $components]);
    }

    public function inspect($iid){
        $instance = ArmoredCore::get($iid);

        View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'Armored Core Inspection']);
        View::Make('devtools.inspect', ['instance' => $instance]);
    }

}