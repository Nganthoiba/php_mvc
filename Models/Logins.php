<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logins
 *
 * @author Nganthoiba
 */
class Logins extends model{
    public  $login_id,/*primary key*/
            $login_time,
            $logout_time,
            $expiry,   
            $source_ip,
            $device,
            $users_id;
    public function __construct($users_id="") {
        parent::__construct();
        /*** default values ***/
        $this->table_name = "logins";
        /**** table data ****/
        $this->users_id = $users_id;
        $key = "login_id";// setting the key of this model
        $this->setKey($key);
        
    }

    //Adding user login details
    public function add(){
        $this->login_id = randId(60);
        $this->source_ip = get_client_ip();
        $this->device = filter_input(INPUT_SERVER,'HTTP_USER_AGENT');
        $this->login_time = date('Y-m-d H:i:s');
        $Timestamp = strtotime($this->login_time);
        $TotalTimeStamp = strtotime('+ 2 hours', $Timestamp);//timestamp after 2 hours
        $this->expiry = date('Y-m-d H:i:s',$TotalTimeStamp);//expiry date time set just at two hours after login
        
        $data = array(
            "login_id"=>$this->login_id,
            "login_time"=>$this->login_time,
            "expiry"=>$this->expiry,
            "source_ip"=>$this->source_ip,
            "device"=>$this->device,
            "users_id"=>$this->users_id
        );
        return parent::create($data);
    }
    
    //To check whether someone is logged in
    public static function isAuthenticated(){
        if(!isset($_SESSION['user_info'])){
            return false;
        }
        $user_info = $_SESSION['user_info'];
        return (self::isUserLoggedIn($user_info['login_id']));
        //return true;
    }
    /*this function checks whether login id is valid which means user is logged in 
     * otherwise the user is not logged in */
    public static function isUserLoggedIn($login_id){
        
        /* this method is static, so it is required to check the connection */
        if(self::$conn == null || !self::$conn){
            $model = new model();//require to create a new object
        }
        $currentDatetime = date('Y-m-d H:i:s');
        $qry = "select * from logins "
                . "where login_id = :login_id "
                . "and   logout_time IS NULL "
                . "and   expiry > :curr_datetime";
        $stmt = self::$conn->prepare($qry);
        $stmt->bindParam(":login_id",$login_id);
        $stmt->bindParam(":curr_datetime",$currentDatetime);
        $stmt->execute();
        return ($stmt->rowCount()==1);
    }
    
    public function logout($login_id) {
        $params = array(
            "logout_time"=>date('Y-m-d H:i:s')
        );
        $cond = array("login_id"=> $login_id);
        return parent::update($params, $cond);
    }
    //finding the object of the same class by some id (key)
    public function find($key) {        
        $m = parent::find($key);
        return $m;
    }
}
