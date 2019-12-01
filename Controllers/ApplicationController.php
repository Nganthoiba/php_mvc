<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicationController
 *  
 * @author Nganthoiba
 */
class ApplicationController extends Controller{
    public $applications;
    public function __construct($data = array()) {
        parent::__construct($data);
        $applications = new applications();
    }
    public function index(){
        return $this->view();
    }
    public function viewApplications(){
        $users_id = "";
        /* Check user is authenticated */
        if(Logins::isAuthenticated() && (strtolower(Logins::getRoleName())=="applicant" || strtolower(Logins::getRoleName())=="admin")){
            $info = $_SESSION['user_info'];
            $users_id = $info['users_id'];
        }
        else{
            //redirect to login page if user is not authenticated
            $this->redirect("Account", "login");
        }
        $applications = new applications();
        $process_id = 0; //to be get from user input 
        $list = strtolower(Logins::getRoleName())=="admin"?$applications->read():$applications->readAppLog($users_id,$process_id);
        //return json_encode($list);
        $this->data['applications'] = $list['data'];
        return $this->view();
    }
    
    public function getCertificateTypes(){
        $certificateType = new certificate_types();
        $res = $certificateType->read();
        return $this->sendResponse($res['status'], $res['msg'], $res['status_code'],$res['error'],$res['data']);
    }
    
    /*** validation function for application */
    public function apply(){
        $users_id = "";
        /* Check user is authenticated */
        if(Logins::isAuthenticated()){
            $info = $_SESSION['user_info'];
            $users_id = $info['users_id'];
        }
        else{
            //redirect to login page if user is not authenticated
            $this->redirect("Account", "login");
        }
        $data = $this->_cleanInputs($_POST);
        
        if(sizeof($data)){
            $status_code = 404;//Bad Request
            
            //$aadhaar = isset($data['aadhaar'])?str_replace(" ","",$data['aadhaar']):""; //Aadhaar 
            $appli_for = isset($data['urgent_ordinary'])?$data['urgent_ordinary']:""; //Application For
            $case_type = isset($data['case_type'])?$data['case_type']:""; //Case Type
            $case_no = isset($data['case_no'])?$data['case_no']:""; //Case No
            $case_year = isset($data['case_year'])?$data['case_year']:""; 
            $appel_petitioner = isset($data['appel_petitioner'])?$data['appel_petitioner']:""; 
            $respondant_opp = isset($data['respondant_opp'])?$data['respondant_opp']:""; 
            $cert_type = isset($data['cert_type'])?(int)$data['cert_type']:""; 
            $order_date = isset($data['order_date'])?$data['order_date']:""; 
      
            // application written by client if certificate type is not for order copy
            $appln_det = $cert_type==1?"": !isset($data['textData'])?"":htmlspecialchars(preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data['textData']));
            $appln_src_ip = get_client_ip();
            $submit_date = date('Y-m-d H:i:s');
            /*** input validations *****/
            /*if(strlen($aadhaar) != 12)
            {
                $this->response['msg'] = 'Invalid aadhaar number: '.trim($aadhaar,"\t ");
                $this->response['status'] = false;
            }
            */
            if(trim($case_type) == "")
            {
                $this->response['msg'] = 'Please select case type ';
                $this->response['status'] = false;
            }
            else if(trim($case_no) == "")
            {
                $this->response['msg'] = 'Please fill case no ';
                $this->response['status'] = false;
            }
            else if(trim($appel_petitioner) == "")
            {
                $this->response['msg'] = 'Please fill appellant/petitioner name ';
                $this->response['status'] = false;
            }
            else if(trim($respondant_opp) == "")
            {
                $this->response['msg'] = 'Please fill respondent/opposite party name ';
                $this->response['status'] = false;
            }
            else if(trim($cert_type) == "")
            {
                $this->response['msg'] = 'Please select certificate type ';
                $this->response['status'] = false;
            }
            else if(trim($order_date) == "")
            {
                $this->response['msg'] = 'Please enter date of order or disposal ';
                $this->response['status'] = false;
            }
            /*************End input validation ***************/
            else{
                
                $applicationModel = new applications();
                //$applicationModel->aadhaar = $aadhaar;
                $applicationModel->app_for = $appli_for;
                $applicationModel->appln_det = $appln_det;
                $applicationModel->appln_src_ip = $appln_src_ip;
                $applicationModel->case_no = $case_no;
                $applicationModel->case_type = $case_type;
                $applicationModel->case_year = $case_year;
                $applicationModel->certificate_type = $cert_type;
                $applicationModel->create_at = $submit_date;
                $applicationModel->order_date = $order_date;
                $applicationModel->petitioner = $appel_petitioner;
                $applicationModel->respondent = $respondant_opp;
                $applicationModel->users_id = $users_id;
                $resp = $applicationModel->add();
                $status_code = $resp['status_code'];
                if($status_code == 200){
                    $this->response['msg'] = "You have successfully submitted. Thank you.";
                    $this->response['status'] = true;
                }
                else{
                    $this->response['msg'] = $resp['msg'];
                    $this->response['status'] = false;
                    $this->response['error'] = $resp['error'];
                }
                
            }
            return $this->sendResponse($this->response['status'],$this->response['msg'],$status_code,$this->response['error']);
        }
        return $this->view();
    }
    
    public function status(){
        return $this->view();
    }
}
