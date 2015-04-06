<?php
/**
 * Flights
 * @author MagoR
 * @version 0.6
 * Controller class for Pilot records, personal information, flights and more.
*/
class flights extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index($pid = false){ 
        $this->myflights();
    }
    
    
    function myflights($pid = false){ 
        $pilot = isset($pid) ? $this->model->get_pilots('*', array('ID', $pid), false) : null;
        if($pilot){ $pilot['NAME'] = ' for ' . $pilot['NAME']; }else{ $pilot['NAME'] = ''; }
        $this->view->setPlaces(array(
        'title' => 'Logged Flights' . $pilot['NAME'],
        'subtitle' => 'Recorded Flights',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Logged Flights' => '/pilot/myflights/' . $pid ),
        'logo' => 'iconfa-pencil'
        ));
        if($pid){Session::set('tmpid', $pid);}
        $set = $this->model->myflights($pid);
        $this->view->__set('pid' , $pid);
        $this->view->__set('flights' , $set);
        $this->view->render('flights/view/myflights');
    }
    
    function instructions($pid = false){ 
        $pilot = isset($pid) ? $this->model->get_pilots('*', array('ID', $pid), false) : null;
        if($pilot){ $pilot['NAME'] = ' for ' . $pilot['NAME']; }else{ $pilot['NAME'] = ''; }
        $this->view->setPlaces(array(
        'title' => 'Logged Instructions' . $pilot['NAME'],
        'subtitle' => 'Recorded Flights',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Logged Flights' => '/flights/myflights/' . $pid ,
            'Logged Instructions' => '#' ),
        'logo' => 'iconfa-pencil'
        ));
        if($pid){Session::set('tmpid', $pid);}
        $set = $this->model->myInstruction($pid);
        $this->view->__set('pid' , $pid);
        $this->view->__set('flights' , $set);
        $this->view->render('flights/view/myflights.instruction');
    }
    
    function trainings($pid = false){ 
        $pilot = isset($pid) ? $this->model->get_pilots('*', array('ID', $pid), false) : null;
        if($pilot){ $pilot['NAME'] = ' for ' . $pilot['NAME']; }else{ $pilot['NAME'] = ''; }
        $this->view->setPlaces(array(
        'title' => 'Logged Training Flights' . $pilot['NAME'],
        'subtitle' => 'Recorded Flights',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Logged Flights' => '/flights/myflights/' . $pid ,
            'Logged Trainings' => '#' ),
        'logo' => 'iconfa-pencil'
        ));
        if($pid){Session::set('tmpid', $pid);}
        $set = $this->model->myTraining($pid);
        $this->view->__set('pid' , $pid);
        $this->view->__set('flights' , $set);
        $this->view->render('flights/view/myflights.training');
    }
    
    function pic($pid = false){ 
        $pilot = isset($pid) ? $this->model->get_pilots('*', array('ID', $pid), false) : null;
        if($pilot){ $pilot['NAME'] = ' for ' . $pilot['NAME']; }else{ $pilot['NAME'] = ''; }
         $this->view->setPlaces(array(
        'title' => 'Logged PIC Time' . $pilot['NAME'],
        'subtitle' => 'Recorded Flights',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Logged Flights' => '/flights/myflights/' . $pid ,
            'Logged PIC' => '#'),
        'logo' => 'iconfa-pencil'
        ));
        if($pid){Session::set('tmpid', $pid);}
        $set = $this->model->myPIC($pid);
        $this->view->__set('pid' , $pid);
        $this->view->__set('flights' , $set);
        $this->view->render('flights/view/myflights.PIC');
    }
     
    function flight($fid = false){ 
        $pid = false;
        $this->view->setPlaces(array(
        'title' => 'Flight Profile',
        'subtitle' => 'Recorded Flights',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Logged Flights' => '/flights/myflights/' . $pid,
            'Flight Profile #' . $fid => '#'),
        'logo' => 'iconfa-pencil'
        ));
        $set = $this->model->flightProfile($fid);
        $this->view->__set('pid' , $pid);
        $this->view->__set('flights' , $set);
        $this->view->render('flights/view/flight.profile');
    }

    
    function edit($fid){ 
        if($_POST){ $this->_saveFlight($_POST, $fid); }
        $pid = false;
        $this->view->setPlaces(array(
        'title' => 'Edit Flight Profile #' . $fid,
        'subtitle' => 'Recorded Flights',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Logged Flights' => '/flights/myflights/' . $pid,
            'Flight Profile #' . $fid => '#'),
        'logo' => 'iconfa-pencil'
        ));
        $set = $this->model->flightProfile($fid);
        $extra = array('none' => 0);
        $options[0] = $this->model->generate_pilot_dropdown($set['pilot_id']);
        $options[1] = $this->model->generate_pilot_dropdown($set['student_id'], $extra);
        $options[2] = $this->model->generate_aircraft_dropdown($set['ac_id']);
        $options[3] = $this->model->generate_ops_dropdown($set['type_of_operation']);
        $this->view->__set('pid' , $pid);
        $this->view->__set('pilot_options', $options);
        $this->view->__set('flights' , $set);
        $this->view->render('flights/view/flight.edit');  
    }
    
    function restore($fid){ 
        $pid = false;
        $this->view->setPlaces(array(
        'title' => 'Flight Profile',
        'subtitle' => 'Recorded Flights',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Logged Flights' => '/flights/myflights/' . $pid,
            'Flight Profile #' . $fid => '#'),
        'logo' => 'iconfa-pencil'
        ));
        $set = $this->model->binnedflightProfile($fid);
        $this->view->__set('pid' , $pid);
        $this->view->__set('flights' , $set);
        $this->view->render('flights/view/flight.restore');
    }
    
    function binnedflights($pid = false){ 
        $pilot = isset($pid) ? null : null;
        if($pilot){ $pilot['NAME'] = ' for ' . $pilot['NAME']; }else{ $pilot['NAME'] = ''; }
        $this->view->setPlaces(array(
        'title' => 'Removed Flights' . $pilot['NAME'],
        'subtitle' => 'Removed Flights',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Removed Flights' => '/flights/binnedflights/' ),
        'logo' => 'iconfa-pencil'
        ));
        $set = $this->model->binnedflights();
        $this->view->__set('flights' , $set);
        $this->view->render('flights/view/binned.flights');
    }
    
    
    function report($fid){ 
        
        
    }
    
    function untrash($fid){ 
        $this->model->unmoveFlight($fid);
        mCore::redirect_default('flights/flight/' . $fid);  
        
    }
    
    function trash($fid){ 
        $this->model->removeFlight($fid);
        mCore::redirect_default('flights/binnedflights/');    
    }
    
    private function _saveFlight($data, $fid){ 
        $this->model->updateFlight($data, $fid);  
    }
        
}


