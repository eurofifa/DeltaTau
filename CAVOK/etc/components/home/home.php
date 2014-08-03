<?php

class home extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){ 
        if(ACL::is_extended()){ print 'No heywire, dude!'; }else{ print 'Heywire!'; }
        $msg = $this->model->msg();
        $this->view->__set('test', $msg);
        $this->view->render();
    }

}

