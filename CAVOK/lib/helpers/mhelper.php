<?php
/**
 * DeltaTau Project | mHelper
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
 */
class Mhelper {

    function __construct() {  }
    
    /**
     * Trace Method
     * @author MagoR
     * @param string $arg
     */
    function trace($arg){
        debug_backtrace($arg);      
    }
    
}

