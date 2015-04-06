<?php
/**
 * DeltaTau Project | Access Layer Control
 * @author Gabor B Magyari
 * @version 0.4.0
 * 
 * @package DeltaTau Project
 * 
 * This project utilizes very basic OOP programing methods to render simple forms for small and quick projects.
 * 
 */
class ACL implements acl_intr  {

    public static $acl;
    protected static $controller;
    protected static $usergroup;
     
    /**
     * Ability to Pass Controller for ACL
     * @param string $controller name of called controller
     */
    public static function pass_controller($controller){ 
        self::$controller = $controller; 
    }
    
    /**
     * Ability to Pass Usergroup for ACL
     * @param string $usergroup name of usergroup
     */
    public static function pass_usergroup($usergroup){ 
        self::$usergroup = $usergroup; 
    }
    
    /**
     * Set Rights for Usergroup
     * @param string $usergroup
     * @param array $rights
     * 
     * array( 
     *  'type' => 'components', 
     *  'allow' => array('login', 'log')
     * )
     * 
     */
    public static function set($usergroup, $rights = array('type' => 'components', 'allow' => array('login', 'home'))){ 
        DB::update(array(
            'tablename' => 'usergroups',
            'write' => false,
            'condition' => 'and',
            'custom' => 'usergroup = :usergroup',
            'items' => array(
                ':usergroup' => $usergroup,
                ':'.$rights['type'] => serialize($rights['allow'])
            )
        ),false,true);
    }
    
    /**
     * Create Usergroup and Set Rights
     * @param string $usergroup
     * @param array $rights
     * 
     * array( 
     *  'type' => 'components', 
     *  'allow' => array('login', 'log')
     * )
     * 
     */
    public static function create($usergroup, $rights = array('type' => 'components', 'allow' => array('login', 'log'))){ 
        DB::update(array(
            'tablename' => 'usergroups',
            'write' => false,
            'condition' => 'and',
            'custom' => 'usergroup = :usergroup',
            'items' => array(
                ':usergroup' => $usergroup,
                ':'.$rights['type'] => serialize($rights['allow'])
            )
        ),true);
    }
       
    /**
     * Get Rights for Usergroup
     * @param string $usergroup name of usergroup
     * @param bool $extended true if extended 
     */
    public static function get($usergroup, $extended = false){ 
        if ($extended) { $type = 'extended'; } else { $type = 'components'; }
        $rights = DB::get_one(array(
                    'tablename' => 'usergroups',
                    'select' => $type,
                    'condition' => 'and',
                    'items' => array(
                        ':usergroup' => $usergroup
                    )
        ));
        if (isset($rights[$type])) { return unserialize($rights[$type]);}
        return false;
    }
    
    /**
     * Check Right(s) of Usergroup
     * @param array $items
     * @param bool $response
     * array( 
     *  'usergroup' => 'name',
     *  'extended' => true, 
     *  'rights' => array('login', 'log')
     * )
     * 
     */
    public static function check($items, $response = false){ 
        if(isset($items['extended'])){ $extended = $items['extended']; }else{ $extended = false; }   
        $rights = self::get($items['usergroup'],$extended);
        if(!$rights){ return false; }
        $match = false;
        foreach ($items['rights'] as $key => $value){
            foreach ($rights as $k => $v){ 
                if($value == $v){ if($response){ $match[] = $v; }else{ $match = true; }}
            }
        }
        return $match; 
    }
    
    /**
     * Check if user is extended
     * @param string $controller optionally provide controller classname
     * @param string $usergroup optionally provide name of any existing usergroup
     * @return bool TRUE if extended on current controller call
     */
    public static function is_extended($controller = false, $usergroup = false){ 
        if(!$controller){ $controller = self::$controller; }
        if(!$usergroup){ $usergroup = self::$usergroup; }
        return self::check(array('usergroup' => $usergroup, 'extended' => true, 'rights' => array($controller)));   
    }
    
    /**
     * Check if user is allowed on requested controller
     * @param string $controller optionally provide controller classname
     * @param string $usergroup optionally provide name of any existing usergroup
     * @return bool TRUE if extended on current controller call
     */
    public static function is_allowed($controller = false, $usergroup = false){ 
        if(!$controller){ $controller = self::$controller; }
        if(!$usergroup){ $usergroup = self::$usergroup; }
        return self::check(array('usergroup' => $usergroup, 'rights' => array($controller)));   
    }
    
    public static function renderRMK($origin, $action){ 
        $rmk = $origin . PHP_EOL;
        $date = mCore::renderDate(true);
        $rmk .= '// ' . $action . ' :' . Session::get('uName') . ' /' . Session::get('uID') . ' /' . $date[0] . ' /' . $date[1] . ' /' . $date[2];
        $rmk .= PHP_EOL . '<<=';
        return $rmk;   
    }

}