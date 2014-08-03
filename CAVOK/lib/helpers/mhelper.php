<?php
/**
 * MHelper
 * @version 1.0
 * @note simple helper methods for debug and test
 * @note turns developer mode ON
 */
class Mhelper {

    function __construct() {
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
        error_reporting(-1);
        global $state; $state =  true;   
    }
    
    /**
     * Initiate Console
     * @author MagoR
     * 
     */
    private function _console(){ 
        echo 'console: on';
               
    }
    
    /**
     * Trace Method
     * 
     * @author MagoR
     * @param string $arg
     * @note catch method
     */
    function trace($arg){
        debug_backtrace($arg);      
    }
   
      
}

