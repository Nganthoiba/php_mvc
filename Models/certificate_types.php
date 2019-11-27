<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of certificate_types
 *
 * @author Nganthoiba
 */
class certificate_types extends model{
    public $certificate_types_id;
    public $copy_name;
    
    public function __construct() {
        parent::__construct();
        $this->setTable(get_class($this));
        $this->setKey(get_class($this)."_id");
    }
    
    public function read($columns = array(), $cond = array(), $order_by = "") {
        $order_by = $order_by == ""? $this->getKey(): $order_by;
        return parent::read($columns, $cond, $order_by);
    }
    
    public function find($id){
        return parent::find($id);
    }
}
