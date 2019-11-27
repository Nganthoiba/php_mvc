<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RoleController
 *
 * @author Nganthoiba
 */
class RoleController extends Controller{
    //these modules are only for admin
    public function addRoles(){
        if(!Logins::isAuthenticated() || Logins::getRoleName() != "Admin"){
            $this->redirectTo();
        }
        $role = new roles();
        $data = $this->_cleanInputs($_POST);
        $this->data['addRoleResponse'] = "";
        if(isset($data['role_name'])){
            $role->role_name = $data['role_name'];
            $add_result= $role->add();
            $this->data['addRoleResponse']=$add_result['msg'];
        }
        
        $res = $role->read();
        $this->data['roles'] = $res['data'];
        return $this->view();
    }
    /*
    public function edit(){
        if(!Logins::isAuthenticated() || Logins::getRoleName() != "Admin"){
            $this->redirectTo();
        }
        $param = $this->getParams();
        $role = new roles();
        $this->data['msg']="";
        if(sizeof($param)){
            $role_id = $param[0];
            $role = $role->find($role_id);
            $this->data['role'] = $role;
        }
        else{
            $this->data['msg'] = "Invalid request";
        }
        //if there is post data
        $data = $this->_cleanInputs($_POST);
        if(sizeof($data)){
            if(isset($data['role_name']) && isset($data['roles_id'])){
                $res = $this->updateRole($data['roles_id'],$data['role_name']);
                $this->data['msg'] = $res['msg'];
                if($res['status_code'] == 200){
                    $role->roles_id = $data['roles_id'];
                    $role->role_name = $data['role_name'];
                    $this->data['role'] = $role;
                }
            }
        }
        return $this->view();
    }
    */
    public function remove(){
        if(!Logins::isAuthenticated() || Logins::getRoleName() != "Admin"){
            $this->redirectTo();
        }
        $param = $this->getParams();
        $this->data['msg'] = "";
        $this->data['role'] = null;
        if(sizeof($param)){
            $roles_id = $param[0];
            $role = new roles();
            $role = $role->find($roles_id);
            if($role == null){
                $this->data['msg'] = "Role does not exist,ididi";
            }
            $this->data['role']=$role;
        }
        else{
            $this->data['msg'] = "Invalid request";
        }
        return $this->view();
    }
    
    public function confirmRemove(){
        if(!Logins::isAuthenticated() || Logins::getRoleName() != "Admin"){
            $this->redirectTo();
        }
        $this->data['msg'] = "";
        $data = $this->_cleanInputs($_POST);
        if(isset($data['roles_id'])){
            $roles_id = $data['roles_id'];
            $role = new roles();
            $role = $role->find($roles_id);
            if($role == null){
                $this->data['msg'] = "Role does not exist.". json_encode($role);
            }
            else{
                $res = $role->remove();
                $this->data['msg'] = $res['msg'];
            }
        }
        return $this->view();
    }
    
    public function processRoleMapping(){
        $process = new Process();
        $res = $process->read();
        $this->data['processes'] = $res['data'];
        
        return $this->view();
    }
    
    private function updateRole($roles_id, $role_name){
        $role = new roles();
        $role->role_name = $role_name;
        $role->roles_id = $roles_id;
        return $role->save();
    }
}
