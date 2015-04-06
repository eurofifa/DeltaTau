<?php

class reports extends Controller {

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
    
    function opsreport(){ 
        
        
    }
    
    function safety(){ 
        
    }
    
    function maintenance(){ 
        
        
    }
    
    function requestflight(){ 
        
        
    }
    
    function openticket(){ 
        if(!ACL::is_extended('reports')){ 
            mCore::redirect_default();
            exit;
        }
      
    }
    
 
    
    
    
}

