<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Role
 *
 * @author Nganthoiba
 */
class Role extends model{
    public $role_id;
    public $role_name;
    
    public function __construct() {
        parent::__construct();
        $this->setTable("role");
        $this->setKey("role_id");
    }
    
    public function add(){
        $qry = "select max(role_id)+1 as new_role from role";
        $stmt = self::$conn->prepare($qry);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['new_role'] == NULL){
            $role_id = 1;
        }
        else{
            $role_id = (int)$row['new_role'];
        }
        
        $data = array(
            "role_id"=>$role_id,
            "role_name"=>$this->role_name
        );
        return parent::create($data);
    }
    
    public function read($columns = array(), $cond = array(), $order_by = "role_name") {
        $res = parent::read($columns, $cond, $order_by);
        if($res['status_code'] == 200 && sizeof($res['data'])>0){
            $roles = array();
            foreach ($res['data'] as $role){
               if($role->role_name == "Admin"){
                   continue;
               }
               $roles[] = $role;
            }
            $res['data'] = $roles;
        }
        return $res;
    }
    
    public function save(){
        $params = array(
            "role_name" => $this->role_name
        );
        $cond = array(
            "role_id" => $this->role_id
        );
        return parent::update($params, $cond);
    }
    
    public function find($role_id) {
        return parent::find($role_id);
    }
    
    public function remove(){
        $cond = array("role_id"=>$this->role_id);
        return parent::delete($cond);
    }
}
