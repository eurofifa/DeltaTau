<?php
/**
 * DeltaTau Project | Error
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
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
