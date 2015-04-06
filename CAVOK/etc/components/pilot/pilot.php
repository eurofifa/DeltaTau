<?php
/**
 * Pilot Profile
 * @author MagoR
 * @version 0.6
 * Controller class for Pilot records, personal information, flights and more.
*/
class pilot extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index($pid = false){ 
        $this->view->setPlaces(array(
        'title' => 'Pilot Records',
        'subtitle' => 'Pilot Information',
        'breadcrumb' => array(
            'Pilot' => '/' . $pid,
            'Personal Info' => '/pilot/' . $pid,
            'Edit Records' => '/pilot/edit/' . $pid),
        'logo' => 'iconfa-pencil'
        ));
        $set =$this->model->pilot_profile($pid);
        $this->view->__set('pilot' , $set);
        $this->view->render('pilot/view/pilot');
    }
    
    function edit($pid = false){ 
        if(isset($_POST)){ 
            $this->_updateProfile($_POST);
        }
        $this->view->setPlaces(array(
        'title' => 'Edit Pilot Records',
        'subtitle' => 'Edit Pilot Information',
        'breadcrumb' => array(
            'Pilot' => '/pilot/',
            'Personal Info' => '/pilot/' . $pid,
            'Edit Records' => '/pilot/edit/' . $pid),
        'logo' => 'iconfa-pencil'
        ));
        $set =$this->model->pilot_profile($pid);
        $this->view->__set('pilot' , $set);
        $this->view->render('pilot/view/edit.pilot');
    }

    function pw(){ 
        
    }
    
    private function _updateProfile($data){ 
        
        
    }
    
    
}

