<?php

class home extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){ 
        $this->view->setPlaces(array(
        'title' => 'Welcome',
        'subtitle' => 'CAVOK Online Journey Log',
        'breadcrumb' => array(
            'Home Page' => '/',
            'Pilot' => '/pilot/',
            'Edit' => '/pilot/edit'),
        'logo' => 'iconfa-pencil'
        ));
        $this->view->render();
    }

}

