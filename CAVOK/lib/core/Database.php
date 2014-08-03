<?php
/**
 * DeltaTau Project Core DataBase Conduit
 * 
 * @author MagoR
*/
class Database extends PDO {

    function __construct() {
     
        $host = 'localhost';
        $username = 'pnet423_cavok';
        $dbname = 'pnet423_cavok_fos';
        $passwd = 'halovilag2';
        $options = array();
        $dsn = 'mysql:host='.$host.';dbname='.$dbname;
        
        parent::__construct($dsn, $username, $passwd, $options);
        
    }

}
