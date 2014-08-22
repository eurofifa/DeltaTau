<?php
/**
 * DeltaTau Project | Database
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
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
