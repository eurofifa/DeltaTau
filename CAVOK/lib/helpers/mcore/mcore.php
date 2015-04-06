<?php
/**
 * DeltaTau Project | mCore
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
 */
class mCore {

    function __construct() {
        
    }
    
    /**
     * tableIzer Calculator
     * SUM Only
     * @version v1.0
     * @var array
     * @example array(
     *      'res' => 0,
     *      'row' => 0,
     *      'operator' => '+',
     * ) 
     */
    public static $calc = false;
    
   /**
     * Get where the function called
     * @return string
     * @rmk originally created for core View class
    */
    public static function get_calling_class() {
        $trace = debug_backtrace();
        $class = $trace[1]['class'];
        for ($i = 1; $i < count($trace); $i++) {
            if (isset($trace[$i])) {
                if ($class != $trace[$i]['class']) {
                    return $trace[$i]['class'];
                }
            }
        }
    }
    
    /**
     * Get where the function called
     * @return string
     * @rmk originally created for core View class
    */
    public static function get_calling_method() {
        $trace = debug_backtrace();
        $class = $trace[1]['class'];
        for ($i = 1; $i < count($trace); $i++) {
            if (isset($trace[$i])) {
                if ($class != $trace[$i]['class']) {
                    return $trace[$i]['function'];
                }
            }
        }
    }
    
    /**
     * Get Rendered file content
     * @return string
     * @rmk originally created for core View class
    */
    public static function get_rendered($file){ 
        if(!file_exists($file)){ return false; }
        ob_start();
        include $file;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
    
    /**
     * Redirect without action!
     * @return string
     * @rmk originally created for core Login class
    */
    public static function redirect_default($param = false){ 
        header('Location: ' . HTTP_PATH . $param);
        exit;
    }
    
    /**
     * Renders Date, Day and Time in HTML (predefined)
     * If $novis = true returns array!
     * @return string or array
     * @rmk originally created for Theme Header
    */
    public static function renderDate($novis = false){ 
        
        $date = date('m F Y');
        $day = date('l');
        $time = date('h:i A');
        
        $render = '<span class="big">' . $date . '</span><span>' . $day . ', ' . $time . '</span>';
        
        if(!$novis){
            echo $render;
        }else{ 
            return array($date, $day, $time);
        }
        
        
    }
    
    /**
     * Gnereate BreadCrumbs for selected Theme (if so supports)
     * @param array $bread
     * @return echo $li
     * @note $bread = array('Home' => '/home/');
     */
    public static function generateBreadcrumbs($bread){ 
        $li = null;
        foreach ($bread as $crumb => $link) { 
            if($link){
                $li .= '<li>' . '<a href=' . $link . '>' . $crumb . '</a>';
            }else{ 
                $li .= '<li>' . $crumb;
            }
            if(!self::_lastKey($bread, $crumb)){ 
                $li .= '<i class="fa fa-angle-right"></i>';
            }
            $li .= '</li>';
        }        
          echo $li;
    }
    
    /**
     * Check user permission!
     * @return bool
     * @rmk originally created for core BootStrap class
    */
    public static function check_permission($controller){ 
        ACL::pass_controller($controller);
        if($controller == 'login'){ return true; }
        Session::init();
        if(!Session::get('uGroup')){ return false; }
        ACL::pass_usergroup(Session::get('uGroup'));
        return ACL::check(array('usergroup' => Session::get('uGroup'), 'rights' => array($controller)));
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
     * TableIzer v1.5 
     * 
     * @author: MagoR
     * 
     * @param $arg array associative
     * @param $setup array numeric | string 
     * @param $link bool
     * @return string table body
     * 
     * @example mCore::tableIzer($data,array(array(1,3,4,5),array('Name', 'Stuff 1', 'Stuff 2'),'class="example"'),false);
     * $link = array(
     * 'row' => 1,
     * 'url' => '/cont/method/'
     * 'row-param' => 0);
     * @note expects raw query results and number of columns to show
     * @note then generates table.body for HTML output
     * @note $link parameter accepts base URLs for edit link generation
     * @note $setup[2] parameter accepts custom tags for the generated table
     * @note $setup[1] or $setup[2] might be omitted
     * 
    */
    public static function tableIzer($arg,$setup,$link = false){     
        $calc = self::$calc;
        $cols = $setup[0];
        $heads = isset($setup[1]) ? $setup[1] : false;
        $tag = isset($setup[2]) ? $setup[2] : false;
        $result = '<table>';
        
        if($tag){ $result = '<table ' . $tag . '>'; }
        
        if($heads){
            $result .= '<thead><tr>';
            foreach ($heads as $value){ $result .= '<td>' . $value . '</td>'; }
            $result .= '</tr></thead>';
        }
        
        $result .= '<tbody>';
        
        foreach ($arg as $key => $value){ 
            $count = 0;
            $leap = 0;
            $result .= '<tr>';
            foreach ($value as $x => $y){ 
               foreach ($cols as $z){
                   if($count == $link['row-param']){ 
                       $myid = $y;
                   }
                   if($count == $z){
                       if($leap == $link['row'] && $link == true){
                        $url = $link['url'];   
                        $result .= '<td><a href="'.$url.$myid.'">' . $y . '</a></td>';
                       }else{ 
                        $result .= '<td>' . $y . '</td>';  
                       }
                       if($z == $calc['row']){ 
                            $number = (float)$y;
                            $calc['res'] = $calc['res'] + $number;
                        }
                       $leap++;
                   }
               }
               $count++;
            } 
            $result .= '</tr>';
        }
        
        $result .= '</tbody>';
        $result .= '</table>';
        self::$calc = $calc['res'];
        return $result;
    }
    
    
    public static function _setCalc($value){ 
            self::$calc = $value;     
    }
    
    public static function _getCalc(){ 
        return self::$calc;
    }
    
    /**
     * Render DropDownOptions for any supplied data!
     * @param array $items
     * @param array $selected
     * @param array $extra
     * 
     * @example 
     * 
     * $selected = array(
     *      'value' => 'to test against',
     *      'value_key' => 'key to set as value',
     *      'name_key' => 'key to set as name',
     *      'other_value' => array('value', 'name')
     * 
     * );
     * 
     * $extra = array(
     *      'name of option' => 'value of option'
     * );
     * 
     */
    public static function renderDropDownOptions($items, $selected, $extra){ 
        $result = null;
        $match = false;
        foreach ($items as $row => $data){ 
            if($data == $selected['value']){ 
                $sel = 'selected';
                $match = true;
            }else{ 
                $sel = null;
            }
            $result .= '<option value="' . $data[$selected['value_key']] . '" ' . $sel .'>' . $data[$selected['name_key']] . '</option>';
        }
        if(!$match && isset($selected['other_value'])){ 
                $result .= '<option value="'. $selected['other_value'][0] . '" selected>' . $selected['other_value'][1] . '</option>';
            }
        if(isset($extra)){ 
            foreach ($extra as $name => $value){ 
                $result .= '<option value="' . $value . '">' . $name . "</option>";
            }
        }
        return $result;  
    }
  
}
