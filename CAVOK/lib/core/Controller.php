<?php
/**
 * DeltaTau Project | Controller
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
 */
class Controller {
    
    function __construct() {
        $this->view = new View();
    }
    
    /**
     * Loads Model
     * @param string $name
     * @note loads model file
     */
    public function loadModel($name){
        $path = APP_PATH.$name.'/'.$name.'_mdl.php';
        if(file_exists($path)){   
            require $path;
            $modelName = $name.'_Model';
            $this->model = new $modelName;   
        }
    }
    
    /**
     * Report an Error
     * @param string $code Code of the error
     * @param string $message Message as desrciption
     */
    public function error($code, $message){ 
        throw new Exception($message, $code);
    }

}
