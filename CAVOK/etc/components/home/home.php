<?php

class home extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){ 
        $msg = $this->model->msg();
        $this->view->__set('test', $msg);
        $this->view->render();
    }

}

