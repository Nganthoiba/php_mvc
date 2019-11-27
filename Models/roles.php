<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of roles
 *
 * @author Nganthoiba
 */
class roles extends model{
    public $roles_id;
    public $role_name;
    
    public function __construct() {
        parent::__construct();
        $this->setTable("roles");
        $this->setKey("roles_id");
    }
    
    public function add(){
        $qry = "select max(roles_id)+1 as new_role from roles";
        $stmt = self::$conn->prepare($qry);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['new_role'] == NULL){
            $roles_id = 1;
        }
        else{
            $roles_id = (int)$row['new_role'];
        }
        
        $data = array(
            "roles_id"=>$roles_id,
            "role_name"=>$this->role_name
        );
        return parent::create($data);
    }
    
    public function read($columns = array(), $cond = array(), $order_by = "role_name") {
        return parent::read($columns, $cond, $order_by);
    }
    
    public function save(){
        $params = array(
            "role_name" => $this->role_name
        );
        $cond = array(
            "roles_id" => $this->roles_id
        );
        return parent::update($params, $cond);
    }
    
    public function find($role_id) {
        return parent::find($role_id);
    }
    
    public function remove(){
        $cond = array("roles_id"=>$this->roles_id);
        return parent::delete($cond);
    }
}
