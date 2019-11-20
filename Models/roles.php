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
    private $role_id;
    private $role_name;
    
    public function __construct() {
        parent::__construct();
        $this->setTable("roles");
        $this->setKey("role_id");
    }
}
