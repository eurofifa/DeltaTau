<?php
/**
 * System Model
 * @author MagoR
 * @version 0.1
 * Controller class for general settings, user managemant etc.
*/
class system extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * Not applicable at the moment
     */
    function index(){ 
        mCore::redirect_default();
    }
    
    /**
     * List users
     * @return string HTML output for render
     */
    function users(){ 
        
        
        
        $this->view->render();
        
    }
    
    
    
    
    
}

