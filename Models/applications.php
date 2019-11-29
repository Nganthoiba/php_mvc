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
            /*$aadhaar,*/
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
        $conn = self::$conn;
        $conn->beginTransaction();
        //Record to be inserted
        $is_order = $this->case_type==1?"y":"n";
        $rec = array(
            "applications_id"=>$this->applications_id ,
            /*"aadhaar"=>$this->aadhaar ,*/
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
            "users_id"=>$this->users_id,
            "is_order"=>$is_order
        );
        $resp = parent::create($rec);
        if($resp['status_code']!=200){
            return $resp;
        }
        $action = "creation";
        $process_id = 0;//first process
        $remark = "Application is submitted";
        
        $app_log_res = insertApplicationLog($conn, $action,  $this->applications_id, $process_id, $remark,$is_order);
        if(!$app_log_res['status']){
            $conn->rollback();
            $app_log_res['status_code'] = 500;
            //$app_log_res['error'] = array("Internal Server Error");
            return $app_log_res;
        }
        $conn->commit();
        return $resp;
    }
    
}