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
     */
    public function list_users($ID = false){ 
        $users = $this->get_users($ID);
        $result = mCore::tableIzer($users, array(array(0,1,2,3,4,5),false,'class="dyntable table table-bordered"'));
        return $result;  
    }
    
    public function rec_user(){
        $arg = array('testelek', '12345');
        $update = array('test', '54321');
        $this->rec_users($arg, $update);
    }
    
    
    /**
     * List all aircrafts users
     */
    public function list_aircrafts($ID = false){ 
        $users = $this->get_aircrafts($ID);
        $result = mCore::tableIzer($users, array(array(0,1,2,3,4,5),false,'class="dyntable table table-bordered"'));
        return $result;  
    }
    
    /**
     * List all registered pilots
     */
    public function list_pilots($ID = false){ 
        $users = $this->get_pilots($ID);
        $result = mCore::tableIzer($users, array(array(0,1,2,3,4,5),false,'class="dyntable table table-bordered"'));
        return $result;  
    }
    
    /**
     * List all flights logged
     */
    public function list_flights($ID = false){ 
        $users = $this->get_flights($ID);
        $result = mCore::tableIzer($users, array(array(0,1,2,3,4,5),false,'class="dyntable table table-bordered"'));
        return $result;  
    }
    
    /**
     * List all user groups
     */
    public function list_usergroups($ID = false){ 
        $users = $this->get_usergroups($ID);
        $result = mCore::tableIzer($users, array(array(0,1,2,3,4,5),false,'class="dyntable table table-bordered"'));
        return $result;  
    }
    
    /**
     * List all trainings
     */
    public function list_trainings($ID = false){ 
        $users = $this->get_trainings($ID);
        $result = mCore::tableIzer($users, array(array(0,1,2,3,4,5),false,'class="dyntable table table-bordered"'));
        return $result;  
    }
 
}

