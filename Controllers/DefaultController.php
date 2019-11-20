<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This is the default controller
 *
 * @author Nganthoiba
 */

class DefaultController extends Controller{
    public function index(){
        $dateTime = date('Y-m-d H:i:sP a');
        $Timestamp = strtotime($dateTime);
        /*

         * mins
         * hours
         * days         */
        $TotalTimeStamp = strtotime('+ 2 hours', $Timestamp);//after 2 hours of the current timestamp
        
        Config::set('site_name', 'index');
        $this->data['content'] = 'Hello this is the index action of default controller.'
                . '<br/> Todays date: '.$dateTime.' After 2 hours, date: '.date('Y-m-d H:i:sP a', $TotalTimeStamp);
    }
    public function contact(){
        Config::set('site_name', 'contact');
        $this->data['content'] = 'Hello this is the contact action of default controller.';
    }
    public function about(){
        Config::set('site_name', 'about');
        $this->data['content'] = 'Hello this is the about action of default controller.';
    }
    /*** just for testing ***/
    public function add(){
        $params = $this->getParams(); 
        $sum = 0;
        foreach ($params as $val){
            if(is_numeric($val)){
                $sum += $val;
            }
        }
        $this->send_data(array("Sum"=>$sum));
    }
    public function testing(){
        //first check whether a user is already logged in, if no one logged in then redirect the page to the login page
        if(!Logins::isAuthenticated()){
            session_destroy();//destroy the existing session information
            header("Location: ".Config::get('host')."/account/login");            
        }
    }
    
    public function captcha(){
        $captcha = new captcha();
        //$captcha->getCaptchaCode();
        $captcha->phpcaptcha('#171a17','#f7e80b',80,30,2,5,'#162453');
    }
    
}
