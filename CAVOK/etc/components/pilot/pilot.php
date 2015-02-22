<?php
/**
 * Log-A-Flight
 * @author MagoR
 * @version 0.1
 * Controller class for flight record keeping.
*/
class pilot extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index(){ 
        $this->view->setPlaces(array(
        'title' => 'Pilot Records',
        'subtitle' => 'Pilot Information',
        'breadcrumb' => 'Pilot Records',
        'logo' => 'iconfa-pencil'
        ));
        
        $set =$this->model->get_pilot();
        $this->view->__set('pilot' , $set);
        
        $this->view->render('pilot/view/pilot');
    }
    
    function edit(){ 
        $this->view->setPlaces(array(
        'title' => 'Edit Pilot Records',
        'subtitle' => 'Edit Pilot Information',
        'breadcrumb' => 'Edit Pilot Records',
        'logo' => 'iconfa-pencil'
        ));
        
        $set =$this->model->pilot_profile();
        $this->view->__set('pilot' , $set);
        
        $this->view->render('pilot/view/edit.pilot');
    }
    
    function flights(){ 
        
    }
    
    function pw(){ 
        
    }
    
    
}

