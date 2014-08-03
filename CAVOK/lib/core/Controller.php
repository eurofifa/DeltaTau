<?php
/**
 * DeltaTau Project Core Controller
 * 
 * @author MagoR
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

}

