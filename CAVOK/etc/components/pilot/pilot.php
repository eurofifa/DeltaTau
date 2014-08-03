<?php
/**
 * Log-A-Flight
 * @author MagoR
 * @version 0.1
 * Controller class for flight record keeping.
*/
class pilot extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){ 
        $this->view->render(false,false);
    }
    
}

