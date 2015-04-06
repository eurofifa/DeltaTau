<?php
/**
 * DeltaTau Project | Session
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
 */
class Session {

    public static function init(){
        @session_start();
    }
    
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }          
    }
    
    public static function un_set($key){ 
        if(isset($_SESSION[$key])){ 
            unset($_SESSION[$key]);
        }
    }

    public static function is_logged(){ 
        if(self::get('lIN')){ return true; }
        return false;
    }
    
    public static function destroy(){
        session_destroy();
    }

}

