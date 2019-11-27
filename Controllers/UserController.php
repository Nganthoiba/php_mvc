<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author Nganthoiba
 */
class UserController extends Controller{
   
    public function index(){
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
            return $this->sendResponse($resp['status'],$resp['msg'],$resp['status_code'],$resp['error'],$resp['data']);
        }
        else{
            $users = $users->find($user_id);
            if($users == null){
                return $this->sendResponse(false,"User not found",404,array());
            }
            return $this->sendResponse(true,"User found",200,array(),$users);
        }
    }
    public function viewUsers(){
        if(Logins::getRoleName()!="Admin"){
            $this->redirectTo();
        }
        
        $users = new Users();//creating user model
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
        $this->data['response'] = $resp;
        
        return $this->view();
    }
    public function addUsers(){
        $roles = new roles();
        $res = $roles->read();
        $this->data['roles'] = $res['data'];
        $this->data['response'] = "";
        
        $data = $this->_cleanInputs($_POST);
        if(sizeof($data)){
            $user = new Users($data);
            $res = $user->add();
            if($res['status_code'] == 200){
                $this->data['response'] = "User has been added successfully.";
            }   
            else{
                $this->data['response'] = $res['msg'];
            }
        }
        return $this->view();
    }
}
