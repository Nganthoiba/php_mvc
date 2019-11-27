<?php
/**
 * Description of users
 *
 * @author Nganthoiba
 */
class Users extends model{
    /*** data structures for user***/
    public  $users_id , 
            $full_name ,     
            $email  ,        
            $phone_no  ,     
            $role_id,        
            $user_password,  
            $verify,         
            $created_at,     
            $update_at,      
            $delete_at,      
            $profile_image,  
            $aadhaar,        
            $updated_by;    
    
    /***********************/
    public function __construct($data = array()) {
        parent::__construct();
        $this->setTable("users");
        $this->setKey("users_id");
        
        /** setting default values **/
        
        if(sizeof($data)){
            $this->full_name = isset($data['full_name'])?$data['full_name']:"";
            $this->email = isset($data['email'])?$data['email']:"";
            $this->phone_no = isset($data['phone_no'])?$data['phone_no']:"";
            $this->role_id = isset($data['role_id'])?$data['role_id']:0;
            $this->user_password = isset($data['password'])? hash("sha256", $data['password']):"";
            $this->verify = 0;
            $this->created_at = date('Y-m-d H:i:s');
            $this->update_at = null;
            $this->delete_at = null;
            $this->profile_image = null;
            $this->aadhaar = null;
            $this->updated_by = isset($data['updated_by'])?$data['updated_by']:$this->users_id;
        }
    }
    
    //populating data in user table
    public function add() {
        $this->users_id = UUID::v4();
        if(!$this->isValidated()){
            return $this->response;
        }
        //$rec = $this->toArray();
        $rec = json_decode(json_encode(new UserAddModel($this)),true);
        return parent::create($rec);
    }
    
    //For reading user data from users table
    public function read($columns = array(), $cond = array(), $order_by = "") {
        return parent::read($columns, $cond, $order_by);
    }
    
    //For updating user data
    public function save(){
        $this->verify = ($this->verify == false)?0:1;
        $params = $this->toArray();
        unset($params['users_id']);
        //return $params;
        $cond = array("users_id"=> $this->users_id);
        return parent::update($params, $cond);
    }
    
    //For removing data
    public function remove(){
        $cond = array("users_id"=> $this->users_id);
        return parent::delete($cond);
    }
    //finding a user 
    public function find($id) {
        $user = parent::find($id);
        unset($user->user_password);
        unset($user->table_name);
        return $user;
    }
    
    /*** PRIVATE METHODS ***/
    
    /*** function to check whether an email already exist ***/
    private function isEmailExist($email){
        $qry = "select * from users where email = :email";
        $stmt = self::$conn->prepare($qry);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        return ($stmt->rowCount()>0);
    }
    /*** function to validate user data for login ***/
    private function isValidated(){
        $this->response['status'] = false;
        $this->response['status_code'] = 403;
        if($this->full_name === ""){
            $this->response['msg'] = "Missing full name";
            return false;
        }
        if($this->email === ""){
            $this->response['msg'] = "Missing email";
            return false;
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->response['msg'] = "Invalid email format";
            return false;
        }
        if($this->isEmailExist($this->email)){
            $this->response['msg'] = "The email already exists with another account, please try with another.";
            return false;
        }
        if($this->phone_no === ""){
            $this->response['msg'] = "Missing Phone No.";
            return false;
        }
        if($this->role_id === "" || $this->role_id === 0){
            $this->response['msg'] = "Missing User Role.";
            return false;
        }
        if($this->user_password === ""){
            $this->response['msg'] = "Missing password.";
            return false;
        }
        return true;
    } 
    
    //convert to associative array
    private function toArray(){
        $arr = array(
            "users_id" => $this->users_id,
            "full_name" => $this->full_name,
            "email" => $this->email,
            "phone_no" => $this->phone_no,
            "role_id" => $this->role_id,
            "verify" => $this->verify,
            "created_at" => $this->created_at,
            "update_at" => $this->update_at,
            "delete_at" => $this->delete_at,
            "aadhaar" => $this->aadhaar,
            "updated_by" => $this->updated_by
        );
        return $arr;
    }
}