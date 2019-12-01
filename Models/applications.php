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
    
    public function read($columns = array(), $cond = array(), $order_by = "") {
        $order_by = $order_by==""?"create_at desc":$order_by;
        return parent::read($columns, $cond, $order_by);
    }
    
    public function readAppLog($user_id, $process_id){
        $qry = "select * from applications_log_view where action_user_id = ? and from_process_id=? order by action_date desc limit 100";
        $stmt = self::$conn->prepare($qry);
        $res = $stmt->execute(array($user_id, $process_id));
        if($res){
            if($stmt->rowCount()==0){
                $this->response['status'] = false;
                $this->response['msg'] = "No record found";
                $this->response['status_code'] = 404;
            }
            else{
                $this->response['status'] = true;
                $this->response['msg'] = "Record found";
                $this->response['status_code'] = 404;
                $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
                $data =array();
                foreach ($rows as $row){
                    $obj = new model();
                    foreach ($row as $key=>$val){
                        $obj->$key = $val;
                    }
                    $data[] = $obj;
                }
                $this->response['data'] = $data;
            }
        }
        else{
            $this->response['status'] = false;
            $this->response['msg'] = "Oops! An internal error occurs.";
            $this->response['status_code'] = 500;
            $this->response['error'] = $stmt->errorInfo();
            
        }
        return $this->response;
    }
    
}