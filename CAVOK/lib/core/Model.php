<?php
/**
 * DeltaTau Project | Model
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
 */
class Model {

    function __construct() {
        global $state;
        try {
            $this->db = new Database();
        } catch (PDOException $e) {
            print "Connection Error:";
            if($state == true){ print "Error: " . $e->getMessage() . "<br/>";   }
            die();
        }
    }
    
    /**
     * Get all or selected users from database
     * @param int $ID user ID
     * @param bool $PID assign pilot ID
     * @return array assoc
     */
    public function get_users($ID = false,$PID = false){ 
        $condition = false;
        if(isset($ID) && $ID !== false){ $items = array(':ID' => $ID); $condition = 'and'; }
        if($PID){ $items = array(':PID' => $PID); $condition = 'and'; }
        $res = DB::get_one(array('tablename' => 'users','select' => '*','condition' => $condition,'custom' => false,'items' => array(':ID' => $ID)));
        return $res;
    }
    
    /**
     * Get all or selected pilots from database
     * @param int $ID user ID
     * @param bool $PID assign pilot ID
     * @return array assoc
     */
    public function get_pilots($ID = false,$PID = false){ 
        $condition = false;
        if(isset($ID) && $ID !== false){ $items = array(':ID' => $ID); $condition = 'and'; }
        if($PID){ $items = array(':PID' => $PID); $condition = 'and'; }
        $res = DB::get_one(array('tablename' => 'pilots','select' => '*','condition' => $condition,'custom' => false,'items' => array(':ID' => $ID)));
        return $res;
    }
    
    /**
     * Get all or selected aircrafts from database
     * @param int $ID user ID
     * @param bool $PID assign pilot ID
     * @return array assoc
     */
    public function get_aircrafts($ID = false,$PID = false){ 
        $condition = false;
        if(isset($ID) && $ID !== false){ $items = array(':ID' => $ID); $condition = 'and'; }
        if($PID){ $items = array(':PID' => $PID); $condition = 'and'; }
        $res = DB::get_one(array('tablename' => 'aircrafts','select' => '*','condition' => $condition,'custom' => false,'items' => array(':ID' => $ID)));
        return $res;
    }
    
    /**
     * Get all or selected flight logs from database
     * @param int $ID user ID
     * @param bool $PID assign pilot ID
     * @return array assoc
     */
    public function get_flights($ID = false,$PID = false){ 
        $condition = false;
        if(isset($ID) && $ID !== false){ $items = array(':ID' => $ID); $condition = 'and'; }
        if($PID){ $items = array(':PID' => $PID); $condition = 'and'; }
        $res = DB::get_one(array('tablename' => 'users','select' => '*','condition' => $condition,'custom' => false,'items' => array(':ID' => $ID)));
        return $res;
    }
    
    /**
     * Get all or selected usergroups from database
     * @param int $ID user ID
     * @param bool $PID assign pilot ID
     * @return array assoc
     */
    public function get_usergroups($ID = false,$PID = false){ 
        $condition = false;
        if(isset($ID) && $ID !== false){ $items = array(':ID' => $ID); $condition = 'and'; }
        if($PID){ $items = array(':PID' => $PID); $condition = 'and'; }
        $res = DB::get_one(array('tablename' => 'users','select' => '*','condition' => $condition,'custom' => false,'items' => array(':ID' => $ID)));
        return $res;
    }
    
    /**
     * Get all or selected trainings from database
     * @param int $ID user ID
     * @param bool $PID assign pilot ID
     * @return array assoc
     */
    public function get_trainings($ID = false,$PID = false){ 
        $condition = false;
        if(isset($ID) && $ID !== false){ $items = array(':ID' => $ID); $condition = 'and'; }
        if($PID){ $items = array(':PID' => $PID); $condition = 'and'; }
        $res = DB::get_one(array('tablename' => 'users','select' => '*','condition' => $condition,'custom' => false,'items' => array(':ID' => $ID)));
        return $res;
    }
    
    
}