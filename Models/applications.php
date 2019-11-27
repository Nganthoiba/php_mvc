<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of applications
 *
 * @author Nganthoiba
 */
class applications extends model{
    
    /* Fields in the table applications */
    public  $applications_id,
            $aadhaar,
            $app_for,
            $case_type,
            $case_no,
            $case_year,
            $reference,
            $petitioner,
            $respondent,
            $certificate_type,
            $document,
            $read_by,
            $compared_by,
            $appln_det,
            $order_date,
            $create_at,
            $withdraw_at,
            $withdraw_reason,
            $appln_src_ip,
            $rejected_at,
            $rejected_by,
            $reason_of_reject,
            $users_id;
    
    public function __construct() {
        parent::__construct();
        $this->setTable(get_class($this));
        $this->setKey("applications_id");
    }
    
    //insert a new application
    public function add() {
        $this->applications_id = UUID::v4();
        //Record to be inserted
        $rec = array(
            "applications_id"=>$this->applications_id ,
            "aadhaar"=>$this->aadhaar ,
            "app_for"=>$this->app_for ,
            "case_type"=>$this->case_type ,
            "case_no"=>$this->case_no ,
            "case_year"=>$this->case_year ,
            "petitioner"=>$this->petitioner ,
            "respondent"=>$this->respondent ,
            "certificate_type"=>$this->certificate_type ,
            "order_date"=>$this->order_date ,
            "appln_det"=>$this->appln_det ,
            "appln_src_ip"=>$this->appln_src_ip ,
            "create_at"=>$this->create_at, 
            "users_id"=>$this->users_id 
        );
        return parent::create($rec);
    }
    
}