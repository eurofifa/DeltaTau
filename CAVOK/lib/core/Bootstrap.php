<?php
/**
 * DeltaTau Project | Bootstrap
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
 */
class BootStrap {
    
    private $_url = null;
    private $_controller = null;
   
     /**
      * Constructs Bootsrap with predefined params
      */
     function __construct() {  
        $this->_getURL();
        if (empty($this->_url[0])) { 
            Session::init();
            $this->_loadDefaultController();
            return false;
        }
        
        /**
         * STRIP BASE URL
         * REFER TO CONFIG
         */
        if(HT_OVR){ $this->_stripDIR(); }
        
        $this->_loadExistingController($this->_url[0]);
        $this->_callControllerMethod();
      }
          
    /**
     * Loads the default controller upon blank request
     */
    private function _loadDefaultController(){ 
            if(Session::is_logged()){ 
                 $this->_loadExistingController('home');
                 $this->_callControllerMethod(); 
            }else{ 
                unset($_SESSION);
                Session::destroy();
                $this->_loadExistingController('login');
                $this->_callControllerMethod(); 
            }
    }

    /**
     * Loads the requested controller
     * @param sets the requested controller $controller
     */
    private function _loadExistingController($controller){
             if(mCore::check_permission($controller) == false){ $this->_loadDefaultController(); exit; }
             $file = CNT_PATH .$controller . '/' . $controller . '.php';
             if (file_exists($file)) {
                 require_once $file;
             } else {
                 $controller = $this->_error();   
             }
             $this->_controller = new $controller;
             $this->_controller->loadModel($controller);
     }
     
     /**
      * Throw an error if no controller exists
      * @return var to back to index
      * @todo optionally disable fall back parameter
      */
     private function _error(){
              require_once LIB_PATH . 'helpers/error.php';
              $error = new Error();
              $controller = $error->NoClass();
              return $controller;
     }
     
     /**
      * Call requested method according to URL
      * @return boolean false upon success
      * @param var $controller falls back to default method index
      * 
      * http://host/controller/method/(param1)/(param2)/(param3)
      * 
      * url[0] = Controller 
      * url[1] = Method
      * url[2] = Param#1
      * url[3] = Param#2
      * url[4] = Param#3
      * 
      */
     private function _callControllerMethod(){ 
         $lenght = count($this->_url);  
         if($lenght > 1){ if(!method_exists($this->_controller, $this->_url[1])){ $this->_controller->index(); return false; }} 
         switch ($lenght){  
             case 5: $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]); break;
             case 4: $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]); break;
             case 3: $this->_controller->{$this->_url[1]}($this->_url[2]); break;
             case 2: $this->_controller->{$this->_url[1]}(); break;
             default: $this->_controller->index(); break;
          }   
     }
     
     /**
      * Parse $_GET from requested URL
      */
     private function _getURL(){
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
     }
    
     /*
      * Auto-strip HTTP_DIR when set
      */
     private function _stripDIR(){ 
         $url = $this->_url;
         if($url[0] == HTTP_DIR){
             unset($url[0]);
             $url = array_values($url);
             unset($this->_url);
             $this->_url = $url;
         }
     }
     
     
}
