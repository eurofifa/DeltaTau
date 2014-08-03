<?php
/**
 * mCore
 * @version 0.1
 * @author MagoR
 * 
 * General Core material. Expansion for MVC core classes.
 * 
 */
class mCore {

    function __construct() {
        
    }

   /**
     * Get where the function called
     * @return string
     * @rmk originally created for core View class
    */
    public static function get_calling_class() {
        $trace = debug_backtrace();
        $class = $trace[1]['class'];
        for ($i = 1; $i < count($trace); $i++) {
            if (isset($trace[$i])) {
                if ($class != $trace[$i]['class']) {
                    return $trace[$i]['class'];
                }
            }
        }
    }
    
    /**
     * Get where the function called
     * @return string
     * @rmk originally created for core View class
    */
    public static function get_calling_method() {
        $trace = debug_backtrace();
        $class = $trace[1]['class'];
        for ($i = 1; $i < count($trace); $i++) {
            if (isset($trace[$i])) {
                if ($class != $trace[$i]['class']) {
                    return $trace[$i]['function'];
                }
            }
        }
    }
    
    /**
     * Get Rendered file content
     * @return string
     * @rmk originally created for core View class
    */
    public static function get_rendered($file){ 
        ob_start();
        include $file;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
    
    /**
     * Redirect without action!
     * @return string
     * @rmk originally created for core Login class
    */
    public static function redirect_default(){ 
        header('Location: ' . HTTP_PATH);
        exit;
    }
    
    /**
     * Check user permission!
     * @return bool
     * @rmk originally created for core BootStrap class
    */
    public static function check_permission($controller){ 
        ACL::pass_controller($controller);
        if($controller == 'login'){ return true; }
        Session::init();
        if(!Session::get('uGroup')){ return false; }
        ACL::pass_usergroup(Session::get('uGroup'));
        return ACL::check(array('usergroup' => Session::get('uGroup'), 'rights' => array($controller)));
    }
    
    /**
     * TableIzer v1.2 
     * 
     * @author: MagoR
     * 
     * @param $arg array associative
     * @param $setup array numeric | string 
     * @param $link bool
     * @return string table body
     * 
     * @example mCore::tableIzer($data,array(array(1,3,4,5),array('Name', 'Stuff 1', 'Stuff 2')),false);
     * 
     * @note expects raw query results and number of columns to show
     * @note then generates table.body for HTML output
     * @note $link parameter accepts base URLs for edit link generation
     * @note place result between <table> tags!
     *
     * @done custom table.header generation
     * @todo full table generation
     * 
    */
    public static function tableIzer($arg,$setup,$link = false){     
        
        $cols = $setup[0];
        $heads = $setup[1];
        
        if($heads){
            $result .= '<thead><tr>';
            foreach ($heads as $value){ $result .= '<td>' . $value . '</td>'; }
            $result .= '</tr></thead>';
        }
        
        $result .= '<tbody>';
        
        foreach ($arg as $key => $value){ 
            $count = 0;
            $leap = 0;
            $result .= '<tr>';
            foreach ($value as $x => $y){ 
               foreach ($cols as $z){
                   if($count == 0){ 
                       $myid = $y;
                   }
                   if($count == $z){
                       if($leap == 0 && $link == true){
                        $url = admin_url($link);   
                        $result .= '<td><a href="'.$url.$myid.'">' . $y . '</a></td>';
                       }else{ 
                        $result .= '<td>' . $y . '</td>';  
                       }
                       $leap++;
                   }
               }
               $count++;
            } 
            $result .= '</tr>';
        }
        
        $result .= '</tbody>';
        
        return $result;
    }
    
    

}

