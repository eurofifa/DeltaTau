<?php

class login extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){ 
        $this->view->render(false,false);
    }
    
    function run(){
       $this->model->run(); 
    }
    
    function login(){ 
        $this->model->run(true);
    }
    
    function logout(){
        Session::init();
        unset($_SESSION);
        Session::destroy();
        header('Location: ' . HTTP_PATH);
        exit;
    }

}

