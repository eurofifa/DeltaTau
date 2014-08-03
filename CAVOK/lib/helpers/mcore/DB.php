<?php
/**
 * DeltaTau Project mCore DataBase Conduit
 * 
 * @author MagoR
*/
class DB  {

    private static $db;
    
    /**
     * Get One
     * @param array $items
     * 
     * $items = array(
     *      'tablename' => 'tablename',
     *      'select' => '*',
     *      'condition' => 'and',
     *      'custom' => false,
     *      'items' => array(
     *          ':username' => 'username',
     *          ':password' => 'password'
     *      )
     *  );
     * 
     * 
     */
    public static function get_one($items){ 
        $query = "SELECT " . $items['select'] . " FROM " . $items['tablename'];
        if(isset($items['condition']) && $items['condition'] !== false){ $query .= " WHERE "; 
        if(isset($items['custom']) && $items['custom'] !== false){ $query .= $items['custom']; }else{
            foreach ($items['items'] as $key => $value){  
                $pre = str_replace(':', '', $key);
                $query .= $pre . " = " . $key;
                if(!self::_lastKey($items['items'], $key)){ $query .= " " . $items['condition'] . " ";  }
            } }
        }

        $db = self::_connectDB();

        $sth = $db->prepare((string)$query);
        $sth->execute($items['items']);
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        if(count($res) < 2 && count($res) > 0){ return $res[0]; }elseif(count($res) > 1){ return $res; }else{ return false; }
    }

    /**
     * Update Table // Insert New Records
     * @author MagoR
     * @version 1.0
     * 
     * @param array $items assoc
     * @param bool $write force_insert
     * 
     * @rmk 
     * $items = array( 
     *      'tablename' => 'tablename',
     *      'write' => false,
     *      'condition' => 'and',
     *      'custom' => false,
     *      'items' => array(
     *          ':col1' => 'rec1',
     *          ':col2' => 'rec2'
     *      )
     * );
     * 
     * @return array associative
     * 
    */
    public static function update($items, $write = false, $update = false){ 
        if(DB::_checkItemExists($items) > 0 && $write == false){ 
            $query = DB::_updateTable($items);
        }elseif($update == true){ 
            $query = DB::_updateTable($items);
        }else{ 
            $query = DB::_insertInto($items);
        }
        $db = self::_connectDB();
        $sth = $db->prepare((string)$query);
        $sth->execute($items['items']);
    }
    
    /**
     * Check if Item already exists
     * @return boolean
     */
    private static function _checkItemExists($items){ 
        $query = "SELECT EXISTS(SELECT 1 FROM ".$items['tablename']." WHERE ";
        foreach ($items['items'] as $key => $value){  
                $pre = str_replace(':', '', $key);
                $query .= $pre . " = " . $key;
                if(!self::_lastKey($items['items'], $key)){ $query .= " and ";  }else{ $query .= ")"; }
        }
         $sth = self::executeQuery((string)$query, $items['items']);
         foreach ($sth[0] as $key => $value){ return (int)$value; }
    }
    
   /**
     * Assemble Inster INTO Query
     * @return string
    */
    private static function _insertInto($items) {
         $query = "INSERT INTO " . $items['tablename'] . " (";
         foreach ($items['items'] as $key => $value) {
          $pre = str_replace(':', '', $key);
          $query .= "`".$pre."`";
          if (DB::_lastKey($items['items'], $key)) { $query .= ")"; }else{ $query .= ", "; }
         }
         $query .= " VALUES (";
         foreach ($items['items'] as $key => $value) {
          $query .= $key;
          if (DB::_lastKey($items['items'], $key)) { $query .= ")"; }else{ $query .= ", "; }
         }
         return (string)$query;
    }
    
   /**
     * Assemble UPDATE Query
     * @return string
    */
    private static function _updateTable($items){
        $query = "UPDATE " . $items['tablename'] . " SET ";
        foreach ($items['items'] as $key => $value) {
            $pre = str_replace(':', '', $key);
            $query .= $pre . " = " . $key;
            if (!DB::_lastKey($items['items'], $key)) {
                $query .= ", ";
            }
        }
        if (isset($items['condition'])) { $query .= " WHERE "; }
        if (isset($items['custom']) && $items['custom'] !== false) { $query .= $items['custom'];}
        return (string)$query;
    }
    
    /**
     * Last key of the array
     * 
     * @param array $array
     * @param string $key
     * @return bool
    */
    private static function _lastKey($array, $key) {
        $last_key = key( array_slice( $array, -1, 1, TRUE ) );
        if($key == $last_key){ return true; }else{ return false; }
    } 
    
    /**
     * Connect DataBase
     * 
     * @return object
    */
    private static function _connectDB() {
        global $state;
        try {
            $db = new Database();
        } catch (PDOException $e) {
            print "Connection Error:";
            if($state == true){ print "Error: " . $e->getMessage() . "<br/>";   }
            die();
        }
        return $db;
    }
    
    /**
     * Execute DB Queries
     * 
     * @return object
    */
    public static function executeQuery($query, $items){ 
        $db = self::_connectDB();
        $sth = $db->prepare((string)$query);
        $sth->execute($items);
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } 
    
}

