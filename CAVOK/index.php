<?php
/**
 * DeltaTau Project
 * @author Gabor B Magyari
 * @version 0.1
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
 */

#LOCATE POSITION
define('BASE_PATH', dirname(realpath(__FILE__)) . '/');

#CONFIGURATION MAY TAKES PLACE HERE
#DEFINE BASIC PATHS
define('APP_PATH', BASE_PATH . 'etc/components/');
define('LIB_PATH', BASE_PATH . 'lib/');


#DEFINE APP BASE
define('CNT_PATH', APP_PATH);
define('VIW_PATH', BASE_PATH . 'theme/');

#ALL SET#

#DETERMINE EXACT DATE#
define('SYS_DATE' , date("Y-m-d"));

#LOAD DeltaTau
require_once LIB_PATH.'DeltaTau.php';
