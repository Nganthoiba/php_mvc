<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author Nganthoiba
 */
class View {
    protected $data;
    protected $path;
    
    protected static function getDefaultViewPath(){
        $router = App::getRouter();
        if(!$router){
            return false;
        }
        $controller = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.html';
        return VIEWS_PATH.DS.$controller.DS.$template_name;
    }

    public function __construct($data=array(),$path = null) {
        $this->data = $data;
        $this->path = $path;
    }
    
    public function render(){
        $data = $this->data;
        ob_start();
        if(file_exists($this->path)){
            include_once ($this->path);
        }
        ob_get_clean();
    }
}
