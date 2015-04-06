<?php

class pilot_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function msg(){  
        return 'Model Initialized.';
    }
    
    public function pilot_profile($pid = false){ 
        if(ACL::is_extended('pilot') && $pid !== false){ 
            $res = $this->get_pilots('*', array('ID', $pid), false);
        }else{
            $res = $this->get_pilots('*', array('ID', Session::get('PID')), false);
        }
            $user = $this->get_users(false, $res['ID']);
            $res['username'] = $user['username'];
        return $res;
    }
    
    public function edit_profile($data){ 
        
        $data = filter_input($type, $variable_name);
        
        $res = $this->rec_pilots($data, true);  
    }
    
 
}
