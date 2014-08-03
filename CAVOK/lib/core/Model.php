<?php
/**
 * DeltaTau Project
 * 
 * @author MagoR
 * @note default Model Controller
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
        $res = DB::get_one(array(
           'tablename' => 'users',
          'select' => '*',
           'condition' => $condition,
           'custom' => false,
           'items' => array(
               ':ID' => $ID
           )
       ));
        return $res;
    }
    
    

}
