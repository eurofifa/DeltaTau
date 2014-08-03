<?php

class doboz extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){ 
        if($_POST){ 
         $this->model->book($_POST);
         $this->view->render('booked');
         exit;
        }
        $msg = $this->model->msg();
        $this->view->__set('test', $msg);
        $this->view->render('doboz');
    }
    
    function offline(){ 
        $this->view->render('offline');
    }

}

