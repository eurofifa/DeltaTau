<?php

class login_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
   /**
     * Run Login sequence
    * @return redirect log
    */
    public function run($ajax = false){ 
        $values = $this->_checkPost();
        $user = DB::get_one(array(
            'tablename' => 'users',
            'select' => '*',
            'condition' => 'and',
            'items' => array(
                ':username' => $values['username'],
                ':password' => md5($values['passwd'])
            )
        ));
        if($user){ $this->_setSessionVariables($user); }else{ 
           if($ajax){ print 'DENIED'; exit; }else{
                mCore::redirect_default();
           }
        }
        if($ajax){ print 'GRANTED'; exit; }else{
            mCore::redirect_default();
        }
    }
    
    /**
     * Check for valid request
     * @return array assoc
    */
    private function _checkPost(){ 
        if(filter_input(INPUT_POST, 'username') && filter_input(INPUT_POST, 'passwd')){ 
            return array('username' => filter_input(INPUT_POST, 'username'), 'passwd' => filter_input(INPUT_POST, 'passwd'));
        }else{ 
            mCore::redirect_default();
        }
    }
    
    /**
     * Get Pilot Info for Login
     * @return array assoc
    */
    private function _getPilotInfo($PID){ 
        $pilot = DB::get_one(array(
            'tablename' => 'pilots',
            'select' => '*',
            'condition' => 'and',
            'items' => array(
                ':ID' => $PID
            )
        ));
        if(count($pilot) > 0){ return $pilot; }else{ return false; }   
    } 
    
    /**
     * Set Session Variables
     * @return array assoc
    */
    private function _setSessionVariables($user){ 
        $pilot = $this->_getPilotInfo($user['PID']);
        Session::init();
        Session::set('lIN', true);
        Session::set('uGroup', $user['type']);
        Session::set('uID' , $user['ID']);
        Session::set('PID' , $user['PID']);
        Session::set('uName' , $pilot['NAME']);
        Session::set('uMail' , $pilot['email']);
    }
  
}
