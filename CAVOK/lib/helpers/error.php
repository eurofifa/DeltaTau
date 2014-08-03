<?php
/**
 * DeltaTau Default Error Handling
 * @author MagoR
*/
class Error extends Controller {

    function __construct() {
       parent::__construct();
    }
    
   /**
     * NoClass Error 
    */
    public function NoClass(){  
        $file = CNT_PATH . 'home/home.php';
        if (file_exists($file)) {
            require_once $file;
            $controller = 'home';
            return $controller;
        } else {
            throw new Exception('Request denied.');
            return false;
        }
    }

}
