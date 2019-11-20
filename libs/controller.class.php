<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author Nganthoiba
 */
class Controller {
    protected $params;
    protected $model;
    protected $data;
    public $response;


    public function getData(){
        return $this->data;
    }
    public function getModel(){
        return $this->model;
    }
    //these are the parameters appended in urls
    public function getParams(){
        return $this->params;
    }
    
    public function __construct($data = array()) {
        $this->data = $data;
        $this->params = App::getRouter()->getParams();
        $this->response = array(
            "status"=>false,
            "msg"=>"",
            "errors"=>array(),
            "data"=>array()
        );
    }
    
    public function sendResponse($status=false,$message="",$response_code=200,$errors=array(),$data=array()){
        $this->response['status'] = $status;
        $this->response['msg'] = $message;
        $this->response['errors'] = $errors;
        $this->response['data'] = $data;
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $response_code . " " . $this->_requestStatus($response_code));
        echo json_encode($this->response);
        exit();
    }
    
    /** For sending any type of data **/
    public function send_data($data = array()){
        header("Content-Type: application/json");
        echo json_encode($data);
        exit();
    }
    
    protected function _cleanInputs($data) {
        $clean_input = Array();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->_cleanInputs($v);
            }
        } else {
            $clean_input = trim(htmlspecialchars(strip_tags($data)));
        }
        return $clean_input;
    }

    protected function _requestStatus($code) {
        $status = array(  
            200 => 'OK',
            400 => 'Bad request',
            401 => 'Unauthorized request',
            402 => 'Payment required',
            403 => 'Forbidden',
            404 => 'Not Found',   
            405 => 'Method Not Allowed',
            409 => 'Conflict',
            500 => 'Internal Server Error'
        );
        return ($status[$code])?$status[$code]:$status[500]; 
    }
}
