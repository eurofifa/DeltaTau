<?php

class pilot_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function msg(){  
        return 'Model Initialized.';
    }
}

