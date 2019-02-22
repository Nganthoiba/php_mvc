<?php

/**
 * Description of App
 *
 * @author Nganthoiba
 */
class App {
    protected static $router;
    
    public static function getRouter(){
        return self::$router;
    }
    
    public static function run($uri){
        self::$router = new Router($uri);
        /** Controller Class Name **/
        $controller = ucfirst(self::$router->getController()).'Controller';
        
        /** Action Name **/
        $method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());
        
        /*** Controller Object ***/
        $obj = new $controller();
        if(method_exists($obj, $method)){
            $result = $obj->$method();
        }
        else {
            throw new Exception("Method '".$method."' of controller class '".$controller."' does not exist.");
        }
    }
}
