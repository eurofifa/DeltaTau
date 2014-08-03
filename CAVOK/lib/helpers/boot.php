<?php
/**
 * DeltaTau Project
 * @author Gabor B Magyari
 * 
 * Auto Load Core
 * 
 */
class boot {

    function __construct() {
        $this->_setState();
        $this->_autoLoad();
        $this->_load_mCore();
        $this->_updateRegistry();
        $this->_autoLaunch();
    }
    
    /**
     * Set General State
     * 
     * @author MagoR
     * @note sets general state such as "DEVELOPER" for error reporting and such.
     */
    private function _setState(){
        if(DEVELOPER === TRUE){ 
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
            error_reporting(-1);
            global $state; $state =  true;
        }
        if(FORCE_SSL === TRUE){ define('HTTP_PATH', 'https://' . $_SERVER['HTTP_HOST'] . '/' . HTTP_DIR); }else{ define('HTTP_PATH', 'http://' . $_SERVER['HTTP_HOST'] . '/' . HTTP_DIR); }
        define('PUB_PATH', HTTP_PATH . 'theme/');
        define('CSS_LIB', PUB_PATH . 'css/');
        define('JS_LIB', PUB_PATH . 'js/');
    }

    /**
     * Loads Core Files
     * 
     * @author MagoR
     * @note auto load all files from CORE
     */
    private function _autoLoad(){ 
        foreach (glob(LIB_PATH."core/*.php") as $filename){
            include $filename;
        }
    }
    
    /**
     * Loads mCore Files
     * 
     * @author MagoR
     * @note auto load all files from mCore
     */
    private function _load_mCore(){ 
        foreach (glob(LIB_PATH."helpers/mcore/*.php") as $filename){
            include $filename;
        }
    }
    
    /**
     * Update Registry
     * 
     * @author MagoR
     * @note update components list in db registry
    */
    private function _updateRegistry(){ 
        $path = CNT_PATH; $list = array();
        foreach (new DirectoryIterator($path) as $file) {
            if ($file->isDot()){continue;}
            if ($file->isDir()) {
                $sth = DB::update(array(
                    'tablename' => 'registry',
                    'write' => false,
                    'condition' => 'and',
                    'custom' => 'classname = :classname and nicename = :nicename',
                    'items' => array(
                        ':classname' => $file->getFilename(),
                        ':nicename' => $file->getFilename()
                    )
                ));
                $list[] = $file->getFilename();
            }
        }
        ACL::set('sadmin', array('type' => 'components', 'allow' => $list));
        ACL::set('sadmin', array('type' => 'extended', 'allow' => $list));
        //DB::update(array('tablename' => 'usergroups','write' => false,'condition' => 'and','custom' => 'usergroup = :usergroup','items' => array(':usergroup' => 'sadmin',':components' => serialize($list), ':extended' => serialize($list))));
    }
    
    /**
     * Initialize Bootstrap
     * 
     * @author MagoR
     */
    private function _autoLaunch(){ 
        global $app;
        $app = new BootStrap();
    }
}
