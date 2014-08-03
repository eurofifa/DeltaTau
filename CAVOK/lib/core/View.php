<?php
/**
 * DeltaTau Project
 * 
 * @author MagoR
 * @note default view controller
 * 
 */
class View {

    private $_req = array();
    
    function __construct() { }
    
   /**
     * Render Output
     * @param string $name
     * @param bool $wrap
     * 
     * @note renders HTML output as requested
    */
    public function render($name = false, $wrap = true){
        $res = $this->_req;
        if(!$name){ $name = $this->_locateTemplate(mCore::get_calling_class(), mCore::get_calling_method());  }
        if($wrap == true){
            $this->_renderHeader();
            require VIW_PATH.'header.php';
            require_once VIW_PATH.$name.'.php';
            require VIW_PATH.'footer.php';
        }else{ 
            require_once VIW_PATH.$name.'.php';
        }
    }
    
    /**
     * Define Template location
     * @return string
     */
    private function _locateTemplate($caller, $method){ 
        if($method !== 'index'){ 
            return 'pages/' . $caller . '/' . $method;
        }else{ 
            return 'pages/'. $caller . '/' .  $caller;
        }
    }
    
    /**
     * Renders HTML Header for OUTPUT
     * @return string
     */
    private function _renderHeader(){  
        $result = "<!DOCTYPE html>\n<html>\n<head>\n";
        $result .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n".'<meta name="viewport" content="width=device-width, initial-scale=1.0" />'."\n";
        $result .= mCore::get_rendered(VIW_PATH.'supplements/metas.php');
        print $result;        
        print $this->_setTitle();
        print $this->_loadStyles();
        //print $this->_loadjQ();
        print $this->_loadJS();     
        print "</head>\n<body>\n";
    }
    
    /**
     * Set Title Tag
     * @return string
     */
    private function _setTitle(){ 
        $res = $this->_req;
        $result = '';
        if(isset($res['title'])){
            $result .= '<title>'.$res['title'].'</title>'."\n";
        }else{ 
            $result .= '<title>'.SITE_NAME.'</title>'."\n";
        } 
        return $result;
    }
    
    /**
     * Load Styles
     * @return string
    */
    private function _loadStyles(){ 
        $result = '';
        foreach (glob(VIW_PATH."css/*.css") as $filename){
            $result .= '<link rel="stylesheet" href="'.HTTP_PATH.'theme/dt-css/'.basename($filename).'"/>'."\n";
        }
        $result .= mCore::get_rendered(VIW_PATH.'supplements/styles.php');  
        return $result;
    }
    
    /**
     * Load Styles
     * @return string
    */
    private function _loadJS(){ 
        $result = '';
        $result .= mCore::get_rendered(VIW_PATH.'supplements/scripts.php');
        foreach (glob(VIW_PATH."js/*.js") as $filename){
            $result .= '<script type="text/javascript" src="'.HTTP_PATH.'theme/dt-js/'.basename($filename).'"></script>'."\n";
        }
        return $result;
    }
    
    /**
     * Load jQuery Lib
     * @return string
     */
    private function _loadjQ(){ 
        return '<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.min.js"></script>'."\n";  
    }
    
   /**
     * Set Require Paramater
     * 
     * @param string $name
     * @param string $value
    */
    public function __set($name, $value) {
        $this->_req[$name] = $value;
    }

}
