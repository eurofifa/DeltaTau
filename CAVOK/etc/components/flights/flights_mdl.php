<?php

class flights_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function msg(){  
        return 'Model Initialized.';
    }
        
    public function myflights($pid = false){ 
        if(ACL::is_extended('pilot') && $pid !== false){ 
            $res = $this->get_flights('*', array('custom' => 'pilot_id = ' . $pid . ' OR student_id = ' . $pid ), true);
        }else{
             $res = $this->get_flights('*', array('custom' => 'pilot_id = ' . Session::get('PID') . ' OR student_id = ' . Session::get('PID') ), true);
        }
        if(!$res){ 
          //mCore::redirect_default('pilot/myflights/'); 
          $res['table'] = 'No data availabe.';
          $res['calc'] = 'N/A';
          return $res;   
        }
        
        $calc = mCore::_setCalc(array('res' => 0, 'row' => 20));
        
        $res['table'] = mCore::tableIzer($res, array(
            array(1,2,7,8,9,10,13,20),
            array('DATE', 'REG', 'PIC', 'STU/SUP', 'HBBS/O', 'HBBS/I', 'LDG', 'TOTAL'),
            'class="table table-nomargin dataTable dataTable-tools table-bordered" data-order=\'[[ 0, "desc" ]]\''
        ), array('row' => 0,'url' => '/flights/flight/','row-param' => 0));

        $res['calc'] = mCore::_getCalc();
        
        return $res;        
    }
    
    public function binnedflights($pid = false){ 
        $res = $this->get_binned_flights('*');
        if(!$res){ 
          //mCore::redirect_default('pilot/myflights/'); 
          $res['table'] = 'No data availabe.';
          $res['calc'] = 'N/A';
          return $res;   
        }
       
        $res['table'] = mCore::tableIzer($res, array(
            array(1,2,7,8,9,10,13,20),
            array('DATE', 'REG', 'PIC', 'STU/SUP', 'HBBS/O', 'HBBS/I', 'LDG', 'TOTAL'),
            'class="table table-nomargin dataTable dataTable-tools table-bordered" data-order=\'[[ 0, "desc" ]]\''
        ), array('row' => 0,'url' => '/flights/restore/','row-param' => 0));
        
        return $res;        
    }
    
    public function flightProfile($fid){ 
        if(ACL::is_extended('flights')){ 
            $res = $this->get_flights('*', array('custom' => 'ID = ' . $fid ), true);
        }else{
            $res = $this->get_flights('*', array('custom' => 'ID = ' . $fid .' AND (pilot_id = ' . Session::get('PID') . ' OR student_id = ' . Session::get('PID') .')'), true);
        }
        if(!$res){ mCore::redirect_default('flights/myflights/'); }        
        return $res;       
    }
    
    public function binnedflightProfile($fid){ 
        if(ACL::is_extended('flights')){ 
            $res = $this->get_binned_flights('*', array('custom' => 'ID = ' . $fid ), true);
        }else{
            $res = $this->get_binned_flights('*', array('custom' => 'ID = ' . $fid .' AND (pilot_id = ' . Session::get('PID') . ' OR student_id = ' . Session::get('PID') .')'), true);
        }
        if(!$res){ mCore::redirect_default('flights/binnedflights/'); }        
        return $res;       
    }
    
    public function pilotStats($pid){ 
        if(ACL::is_extended('pilot')){ 
            
        }else{ 
            
        }
        if(!$res){ mCore::redirect_default('flights/myflight/'); }
        
        return $res; 
    }
    
    public function myInstruction($pid){ 
        if(ACL::is_extended('pilot') && $pid !== false){ 
            $res = $this->get_flights('*', array('custom' => 'pilot_id = ' . $pid . ' AND `dual` IS NOT NULL'), true);
        }else{
            $res = $this->get_flights('*', array('custom' => '`dual` IS NOT NULL AND pilot_id = ' . Session::get('PID')), true);
        }
        if(!$res){ 
          //mCore::redirect_default('pilot/myflights/'); 
          $res['table'] = 'No data availabe.';
          $res['calc'] = 'N/A';
          return $res;   
        }
        $calc = mCore::_setCalc(array('res' => 0, 'row' => 20));
        $res['table'] = mCore::tableIzer($res, array(
            array(1,2,7,8,9,10,13,20,21),
            array('DATE', 'REG', 'PIC', 'STU/SUP', 'HBBS/O', 'HBBS/I', 'LDG', 'TOTAL', 'OPS'),
            'class="table table-nomargin dataTable dataTable-tools table-bordered" data-order=\'[[ 0, "desc" ]]\''
        ), array('row' => 0,'url' => '/flights/flight/','row-param' => 0));

        $res['calc'] = mCore::_getCalc();
        return $res; 
    }
    
    public function myTraining($pid){ 
        if(ACL::is_extended('pilot') && $pid !== false){ 
            $res = $this->get_flights('*', array('custom' => '(pilot_id = ' . $pid . ' OR student_id = ' . $pid .') AND student_id <> 0'), true);
        }else{
            $res = $this->get_flights('*', array('custom' => '(pilot_id = ' . Session::get('PID') . ' OR student_id = ' . Session::get('PID') .') AND student_id <> 0'), true);
        }
         if(!$res){ 
            //mCore::redirect_default('pilot/myflights/'); 
            $res['table'] = 'No data availabe.';
            $res['calc'] = 'N/A';
            return $res;   
        }
        $calc = mCore::_setCalc(array('res' => 0, 'row' => 20));  
        $res['table'] = mCore::tableIzer($res, array(
            array(1,2,4,6,7,8,9,10,13,20,21),
            array('DATE', 'REG', 'BLOCK OFF', 'BLOCK ON', 'PIC', 'STU/SUP', 'HBBS/O', 'HBBS/I', 'LDG', 'TOTAL', 'OPS'),
            'class="table table-nomargin dataTable dataTable-tools table-bordered" data-order=\'[[ 0, "desc" ]]\''
        ), array('row' => 0,'url' => '/flights/flight/','row-param' => 0));

        $res['calc'] = mCore::_getCalc();
        return $res;        
    }
    
    public function myPIC($pid){ 
        if(ACL::is_extended('pilot') && $pid !== false){ 
            $res = $this->get_flights('*', array('custom' => 'pilot_id = ' . $pid . 'AND student_id = 0' ), true);
        }else{
            $res = $this->get_flights('*', array('custom' => 'pilot_id = ' . Session::get('PID') . ' AND student_id = 0'), true);
        }
         if(!$res){ 
            //mCore::redirect_default('pilot/myflights/'); 
            $res['table'] = 'No data availabe.';
            $res['calc'] = 'N/A';
            return $res;   
        }
        $calc = mCore::_setCalc(array('res' => 0, 'row' => 20));
        $res['table'] = mCore::tableIzer($res, array(
            array(1,2,3,4,5,6,7,9,10,13,20),
            array('DATE', 'REG', 'DEP', 'BLOCK OFF', 'ARR', 'BLOCK ON', 'PIC', 'HBBS/O', 'HBBS/I', 'LDG', 'TOTAL'),
            'class="table table-nomargin dataTable dataTable-tools table-bordered" data-order=\'[[ 0, "desc" ]]\''
        ), array('row' => 0,'url' => '/flights/flight/','row-param' => 0));

        $res['calc'] = mCore::_getCalc();
        return $res;      
    }

    public function updateFlight($data, $fid){  
        $arg = array(
            'date' => FILTER_SANITIZE_STRING,
            'ac_callsign' => FILTER_VALIDATE_INT,
            'pilot_id' => FILTER_VALIDATE_INT,
            'student_id' => FILTER_VALIDATE_INT,
            'type_of_operation' => FILTER_SANITIZE_ENCODED,
            'dual' => FILTER_SANITIZE_STRING,
            'departure' => FILTER_SANITIZE_ENCODED,
            'block_off' => FILTER_SANITIZE_STRING,
            'day_night' => FILTER_SANITIZE_ENCODED,
            'vfr_ifr' => FILTER_SANITIZE_ENCODED,
            'arrival' => FILTER_SANITIZE_ENCODED,
            'block_on' => FILTER_SANITIZE_STRING,
            'take_off' => FILTER_SANITIZE_STRING,
            'landing_time' => FILTER_SANITIZE_STRING,
            'engine_in' => FILTER_VALIDATE_FLOAT,
            'engine_out' => FILTER_VALIDATE_FLOAT,
            'hobbs_in' => FILTER_VALIDATE_FLOAT,
            'hobbs_out' => FILTER_VALIDATE_FLOAT,
            'landing' => FILTER_VALIDATE_INT,
            'remarks' => FILTER_SANITIZE_STRING
        );
        
        $post = filter_input_array(INPUT_POST, $arg);
        $post['ac_id'] = $post['ac_callsign'];
        $ac = $this->get_aircrafts('callsign', array('ID', $post['ac_id']));
        $pil = $this->get_pilots('NAME', array('ID', $post['pilot_id']));
        $stu = $this->get_pilots('NAME', array('ID', $post['student_id']));
        $post['ac_callsign'] = $ac['callsign'];
        $post['pilot_name'] = $pil['NAME'];
        $post['student_name'] = $stu['NAME'];
        $post['total_time'] = $post['hobbs_out'] - $post['hobbs_in'];
        $post['engine_time'] = $post['engine_out'] - $post['engine_in'];
        $post['remarks'] = ACL::renderRMK($post['remarks'], 'EDITED #' . $fid);
        $res = $this->rec_flights($post, true, array('ID' => $fid));
    }
   
    public function removeFlight($fid){ 
        DB::move_one(array('flight_log', 'flight_log_bin'), 'ID = ' . $fid);
    }
    
    public function unmoveFlight($fid){ 
        DB::move_one(array('flight_log_bin','flight_log'), 'ID = ' . $fid);
    }
    
}
