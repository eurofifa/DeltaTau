<?php
/**
 * System Model
 * @author MagoR
 * @version 0.1
 * Controller class for general settings, user managemant etc.
*/
class system extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * Not applicable at the moment
     */
    function index(){ 
        mCore::redirect_default();
    }
    
    /**
     * List users
     * @return string HTML output for render
     */
    function users(){ 
        
        $set =$this->model->list_users();
        $this->view->__set('res' , $set);
        
        $set =$this->model->list_pilots();
        $this->view->__set('pilots' , $set);
        
        $set =$this->model->list_aircrafts();
        $this->view->__set('acs' , $set);
        
        $set =$this->model->list_usergroups();
        $this->view->__set('ug' , $set);
        
        $set =$this->model->list_flights();
        $this->view->__set('flights' , $set);
        
        $set =$this->model->list_trainings();
        $this->view->__set('trainings' , $set);
        
        $this->view->render('system/view/system');
        
    }
    
    
    
    
    
}

