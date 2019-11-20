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
        
        /** Action/Method Name **/
        $method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());
        
        /*** Controller Object ***/
        $obj = new $controller();
        if(method_exists($obj, $method)){
            //Controller Action may return view path or json data depending upon whether the controller is api controller or just controller
            $view_path = $obj->$method();
            if($view_path == "" || $view_path == null){
                $view_obj = new View($obj->getData(),$view_path);
                $content = $view_obj->render();
                $layout = self::$router->getRoute();

                $layout_path = VIEWS_PATH.DS.$layout.'.view.php';//all the view pages have file extension ".view.php" for convension of this project
                //die($layout_path);
                $layout_view_obj = new View(array("content"=>$content),$layout_path);
                echo $layout_view_obj->render();
            }
            else{
                /** In case of Api Controller the result is json encoded data **/
                echo $view_path;
            }
        }
        else {
            throw new Exception("Method '".$method."' of controller class '".$controller."' does not exist.");
        }
   
    }
}
