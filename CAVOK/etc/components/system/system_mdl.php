<?php
/**
 * System Model
 * @author MagoR
 * @version 0.1
 * Model class for general settings, user managemant etc.
*/
class system_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * Standard MSG
     * @return string initialized
     */
    public function msg(){  
        return 'System Model Initialized.';
    }
    
    
    /**
     * List all registered users
     * 
     */
    public function list_users($ID){ 
        $users = $this->list_users($ID);
        
        
        
    }
    
    
    
    
    
}

