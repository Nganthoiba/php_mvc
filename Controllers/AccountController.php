<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author Nganthoiba
 */
class AccountController extends Controller{
    protected $model;
    public function __construct($data = array()) {
        parent::__construct($data);
        $this->modal = new Users();
        $this->data['login_response']="";
        $this->data['email']="";
        $this->data['password']="";
    }
    public function index(){
        $this->data['content'] = "Hello! This is index file of AccountController";
        $this->data['test'] = "Hello! This is test file";
    }
    //login action
    public function login(){
        //first check whether a user is already logged in, if someone logged in then redirect the page to the home page  
        if(Logins::isAuthenticated()){
            header("Location: ".Config::get('host')."/default/testing");
        }
        $data = $this->_cleanInputs($_POST);
        if(sizeof($data)){
            $res = $this->isLoginDataValid($data);
            $this->data['email']=$data['email'];
            $this->data['password']=$data['password'];
            
            if($res['status'] == true){
                $loginModel = new UserLoginModel($data['email'], $data['password']);
                $resLogin = $loginModel->isLoginSuccessfull();
                //echo json_encode($resLogin); exit();
                if($resLogin['status'] === true){
                    $_SESSION['user_info'] = $resLogin['data'];
                    header("Location: ".Config::get('host')."/default/testing");
                }
                else{
                    $this->data['login_response'] = "Login failed, please try with proper credentials";
                }
            }
            else{
                $this->data['login_response'] = $res['msg'];
            }  
        }
    }
    
    //logout action
    public function logout(){
        if(isset($_SESSION['user_info'])){
            $info = $_SESSION['user_info'];
            $login_id = $info['login_id'];
            if(Logins::isUserLoggedIn($login_id)){
                $logins = new Logins();
                $resLogout=$logins->logout($login_id);
            }
        }
        session_destroy();
        $this->data['content'] ="<center>You have successfully logged out</center>";
    }
    //signup action
    public function register(){
        //first check whether a user is already logged in, if someone logged in then redirect the page to the home page
        if(Logins::isAuthenticated()){
            header("Location: ".Config::get('host')."/default/testing");
        }
        $data = $this->_cleanInputs($_POST);
        if(sizeof($data)){
            //captcha validation
            $captcha_code = isset($data['captcha_code'])?$data['captcha_code']:"";
            if(!$this->isValidCaptchaCode($captcha_code)){
                $this->sendResponse(false,"Captcha code is invalid",403);
            }
            $users = new Users($data);//creating user model
            $users->role_id = 14;//For applicants
            $resp = $users->add();//adding new record for user
            if($resp['status_code'] == 200){
                $resp['msg'] = "You have successfully signed up. Thank you.";
            }
            $this->sendResponse($resp['status'],$resp['msg'],$resp['status_code'],$resp['error']);
        }
        
    }
    
    public function getUsers(){
        $params = $this->getParams();
        $user_id = isset($params[0])?$params[0]:"";
        $users = new Users();//creating user model
        if($user_id == ""){
            $columns = array(
                'users_id',
                'full_name',
                'email',
                'phone_no',
                'role_id',
                'verify',
                'created_at',
                'update_at',
                'delete_at',
                'aadhaar',
                'updated_by');
            $cond = array();
            $resp = $users->read($columns,$cond, "full_name");
            $this->sendResponse($resp['status'],$resp['msg'],$resp['status_code'],$resp['error'],$resp['data']);
        }
        else{
            $users = $users->find($user_id);
            if($users == null){
                $this->sendResponse(false,"User not found",404,array(),$users);
            }
            $this->sendResponse(true,"User found",200,array(),$users);
        }
    }

    /*** function to check whether captcha code is valid or not ***/
    private function isValidCaptchaCode($captcha_code){
        if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $captcha_code) != 0){  
            return false;
	}
        else{
            // Captcha verification is Correct. Final Code Execute here!		
            return true;
	}
    }
    
    private function isLoginDataValid($data = array()){
    
        if(!isset($data['email']) || $data['email']==="")
        {
            return array("status"=>false,"msg"=>"Please enter your email.");
        }
        if(!isset($data['password']) || $data['password']==="")
        {
            return array("status"=>false,"msg"=>"Please enter password");
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return array("status"=>false,"msg"=>"Email is invalid, please enter correctly.");
        }
        return array("status"=>true,"msg"=>"Validated");
    }
    
}
