<?php
/**
 * DeltaTau Project | Model
 * @author Gabor B Magyari
 * @version 0.5.0
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
     * Record users
     * @param array $arg User data to be recorded
     * @param array $update User data to be updated
     * @example $arg = array('username', 'password', 'PID');
     * @example $update = array('newusername', 'newpassword', 'PID');
     * @note password should be provided in plain text (no MD5)
     */
    public function rec_users($arg, $update){  
        $write = isset($update) ? false : true;
        $update = isset($update) ? $update : false;
        if($update !== false){
            if(isset($update[3])){$upd = array(':username' => $update[0], ':password' => md5($update[1]), ':PID' => $update[3]);}
            else{$upd = array(':username' => $update[0], ':password' => md5($update[1]));}
            $items = array('tablename' => 'users', 'write' => false, 'condition' => 'and', 'custom' => 'username = "' . $arg[0] . '" and password = "' . md5($arg[1]).'"', 'items' => $upd,'check' => array( ':username' => $arg[0], ':password' => md5($arg[1])));
        }else{
            $items = array('tablename' => 'users', 'write' => true, 'items' => array(':username' => $arg[0], ':password' => md5($arg[1]),':PID' => $arg[3], ':type' => 'user'));
        }
        DB::update($items, $write);
    }
    
    /**
     * Get all or selected pilots from database
     * @param int $select fields to be selected
     * @param bool $condition condition for the query
     * @param bool $items fields to filter
     * @return array assoc
     * @example $items = array ( 'PID', 12 ) provided $condition is false
     */
    public function get_pilots($select = '*', $items = false, $condition = false){ 
        $custom = false;
        $data = $items;
        if($condition === false && $items !== false){ $custom = $items[0] . ' = ' . $items[1]; $data = array($items[0] => $items[1]); }
        $items = array(
          'tablename' => 'pilots',
          'select' => $select,
          'condition' => $condition,
          'custom' => $custom,
          'items' => $data
        );
        $res = $this->get_all($items);
        return $res;   
    }
    
    /**
     * Record pilots
     * @param array $arg User data to be recorded
     * @param array $update User data to be updated
     * @example $items = array('username' => 'Joe', 'password' => '1234');
     * @example $update | True for force update
     */
    public function rec_pilots($items, $udpate = false){  
        $items['items'] = $items;
        $items['tablename'] = 'pilots';
        if($update){ 
            $this->upd_all($items);
        }else{ 
            $this->rec_all($items);
        }
       
    }
    
    
    /**
     * Get all or selected aircrafts from database
     * @param int $select fields to be selected
     * @param bool $condition condition for the query
     * @param bool $items fields to filter
     * @return array assoc
     */
    public function get_aircrafts($select = '*', $items = false, $condition = false){ 
       $custom = false;
        $data = $items;
        if($condition === false && $items !== false){ $custom = $items[0] . ' = ' . $items[1]; $data = array($items[0] => $items[1]); }
        $items = array(
          'tablename' => 'aircrafts',
          'select' => $select,
          'condition' => $condition,
          'custom' => $custom,
          'items' => $data
        );
        $res = $this->get_all($items);
        return $res;    
    }
    
    /**
     * Record aircrafts
     * @param array $arg User data to be recorded
     * @param array $update User data to be updated
     * @example $items = array('username' => 'Joe', 'password' => '1234');
     * @example $update | True for force update
     */
    public function rec_aircrafts($items, $udpate = false){  
        $items['items'] = $items;
        $items['tablename'] = 'aircrafts';
        if($update){ 
            $this->upd_all($items);
        }else{ 
            $this->rec_all($items);
        }
       
    }
    
    
    /**
     * Get all or selected flights from database
     * @param int $select fields to be selected
     * @param bool $condition condition for the query
     * @param bool $items fields to filter
     * @return array assoc
     */
    public function get_flights($select = '*', $items = false, $condition = false){ 
        $custom = false;
        $data = $items;
        if($condition === false && $items !== false){ $custom = $items[0] . ' = ' . $items[1]; $data = array($items[0] => $items[1]); }
        $items = array(
          'tablename' => 'flight_log',
          'select' => $select,
          'condition' => $condition,
          'custom' => $custom,
          'items' => $data
        );
        $res = $this->get_all($items);
        return $res;   
    }
    
    /**
     * Record flights
     * @param array $arg User data to be recorded
     * @param array $update User data to be updated
     * @example $items = array('username' => 'Joe', 'password' => '1234');
     * @example $update | True for force update
     */
    public function rec_flights($items, $udpate = false){  
        $items['items'] = $items;
        $items['tablename'] = 'flight_log';
        if($update){ 
            $this->upd_all($items);
        }else{ 
            $this->rec_all($items);
        }
       
    }
    
    
    /**
     * Get all or selected usergroups from database
     * @param int $select fields to be selected
     * @param bool $condition condition for the query
     * @param bool $items fields to filter
     * @return array assoc
     */
    public function get_usergroups($select = '*', $items = false, $condition = false){ 
        $custom = false;
        $data = $items;
        if($condition === false && $items !== false){ $custom = $items[0] . ' = ' . $items[1]; $data = array($items[0] => $items[1]); }
        $items = array(
          'tablename' => 'usergroups',
          'select' => $select,
          'condition' => $condition,
          'custom' => $custom,
          'items' => $data
        );
        $res = $this->get_all($items);
        return $res;   
    }
    
    /**
     * Record usergroups
     * @param array $arg User data to be recorded
     * @param array $update User data to be updated
     * @example $items = array('username' => 'Joe', 'password' => '1234');
     * @example $update | True for force update
     */
    public function rec_usergroups($items, $udpate = false){  
        $items['items'] = $items;
        $items['tablename'] = 'usergroups';
        if($update){ 
            $this->upd_all($items);
        }else{ 
            $this->rec_all($items);
        }
       
    }
    
    /**
     * Get all or selected trainings from database
     * @param int $select fields to be selected
     * @param bool $condition condition for the query
     * @param bool $items fields to filter
     * @return array assoc
     */
    public function get_trainings($select = '*', $items = false, $condition = false){ 
        $custom = false;
        $data = $items;
        if($condition === false && $items !== false){ $custom = $items[0] . ' = ' . $items[1]; $data = array($items[0] => $items[1]); }
        $items = array(
          'tablename' => 'trainings',
          'select' => $select,
          'condition' => $condition,
          'custom' => $custom,
          'items' => $data
        );
        $res = $this->get_all($items);
        return $res;     
    }
    
    /**
     * Record pilots
     * @param array $arg User data to be recorded
     * @param array $update User data to be updated
     * @example $items = array('username' => 'Joe', 'password' => '1234');
     * @example $update | True for force update
     */
    public function rec_trainings($items, $udpate = false){  
        $items['items'] = $items;
        $items['tablename'] = 'trainings';
        if($update){ 
            $this->upd_all($items);
        }else{ 
            $this->rec_all($items);
        }
       
    }
    
    /**
     * Recall
     * Record items into any table.
     * @param array $items Define tablename and pass post data
     * @param bool $write Force WRITE condition
     * @example
     * $items = array(
     *      'tablename' => 'pilots',
     *      'items' => $postdata
     * );
     * 
     */    
    public function rec_all($items, $write = true){
        foreach ($items['items'] as $key => $value){ 
            $upd[':'.$key] = $value;
        }
        $data = array('tablename' => $items['tablename'], 'write' => $write, 'items' => $upd);
        DB::update($data, $write); 
    }
    
    /**
     * Update all
     * Udpate items into any table. (may be deprecated)
     * @param array $items Define tablename and pass post data
     * @param bool $write Force WRITE condition
     * @example
     * $items = array(
     *      'tablename' => 'pilots',
     *      'items' => $postdata
     * );
     * 
     */    
    public function upd_all($items, $write = false){
        foreach ($items['items'] as $key => $value){ 
            $upd[':'.$key] = $value;
        }
        $data = array('tablename' => $items['tablename'], 'write' => $write, 'items' => $upd);
        DB::update($data, $write, true); 
    }
    
    /**
     * Getall
     * Get items from any table.
     * @param array $items Define tablename and pass post data
     * @example Omit field to ignore!
     * $items = array(
     *      'tablename' => 'pilots',
     *      'select' => $fields,
     *      'condition' => 'and or',
     *      'items' => $postdata
     * );
     * @return array Returns the result of the query
     */    
    public function get_all($items){
        $upd = array();
        if(isset($items['items']) && $items['items'] !== false){
            foreach ($items['items'] as $key => $value){ 
                $upd[':'.$key] = $value;
            }
        }
        $custom = false;
        $select = isset($items['select']) ? $items['select'] : '*';
        $condition = isset($items['condition']) ? $items['condition'] : false;
        if(isset($items['custom']) && $items['custom'] !== false){ 
            $condition = true;
            $custom = $items['custom'];
        }
        $data = array('tablename' => $items['tablename'], 'select' => $select, 'condition' => $condition, 'custom' => $custom, 'items' => $upd);
        $res = DB::get_one($data);
        return $res;
    }
    
    
    
}