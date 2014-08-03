<?php
/**
 * DeltaTau Project Core DataBase Conduit
 * 
 * @author MagoR
*/
class Database extends PDO {

    function __construct() {
     
        $host = C_HOST;
        $username = C_NAME;
        $dbname = C_USER;
        $passwd = C_LOG;
        $options = array();
        $dsn = 'mysql:host='.$host.';dbname='.$dbname;
        
        parent::__construct($dsn, $username, $passwd, $options);
        
    }

}
