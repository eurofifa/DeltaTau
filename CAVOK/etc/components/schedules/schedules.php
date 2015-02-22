<?php

class schedules extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){ 
        $this->view->setPlaces(array(
        'title' => 'Welcome',
        'subtitle' => 'CAVOK Online Journey Log',
        'breadcrumb' => 'Home Page',
        'logo' => 'iconfa-pencil'
        ));
        $this->view->render();
    }

}

