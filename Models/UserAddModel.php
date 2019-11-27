<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserAddModel
 *
 * @author Nganthoiba
 */
//Data Model for adding user
class UserAddModel{
    public  $users_id , 
            $full_name ,     
            $email  ,        
            $phone_no  ,     
            $role_id,        
            $user_password,  
            $verify,  
            $aadhaar,        
            $updated_by;
    public function __construct(Users $user = null) {
        if($user != null){
            $this->users_id = $user->users_id;
            $this->full_name = $user->full_name;
            $this->email = $user->email;
            $this->phone_no = $user->phone_no;
            $this->role_id = $user->role_id;
            $this->user_password = $user->user_password;
            $this->verify = $user->verify;
            $this->aadhaar = $user->aadhaar;
            $this->updated_by = $user->updated_by;
        }
    }
}
