<?php

class pilot_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function msg(){  
        return 'Model Initialized.';
    }
    
    public function pilot_profile(){ 
        
        $res = $this->get_pilots('*', array('ID', Session::get('PID')), false);
        return $res;
    }
    
    
}

