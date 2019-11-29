<?php
function insertApplicationLog($conn,$action, $applications_id,$process_id,$remark="",$is_order="n"){
    $applications_log_id = UUID::v4();
    $user_info = $_SESSION['user_info'];
    $users_id = $user_info['users_id'];
    $role_id = $user_info['role_id'];
    
    if($action!="creation"){
        $application = new applications();
        $application = $application->find($applications_id);
        if($application == null){
            return array("status"=>false,"msg"=>"Can't load application ".$applications_id);
        }
        $res = getNextPrevRolesAndProcess($conn,$role_id,$process_id,$application_id,$is_order);
        if($res['status']==false){
            return $res;
        }
        $to_process_id = $res['to_process_id'];
        $to_role_id = $res['next_role_id'];
    }
    else{
        if($is_order=="y"){
            
            $to_role_id = 2;
            $to_process_id = 2;
        }
        else{
            
            $to_role_id = 1;
            $to_process_id = 1;
        }
    }
    if($process_id != $to_process_id){ //process changes
        if($to_process_id == -1){
            $to_role_id = -1;
        }
        else{
            $result =  firstRoleIdProcess($conn, $to_process_id);
            if(!$result['status']){
                return $result;
            }
            $to_role_id = $result['data']['role_id'];
        }
        
    }
    
    $qry = "insert into applications_log"
            . "("
            . "applications_log_id, application_id, users_id,   action_date,        action, "
            . "from_role_id,        to_role_id,     remark,     from_process_id,    to_process_id"
            . ")"
            . "values(?,?,?,now(),?,    ?,?,?,?,?)";
    $params = array(
        $applications_log_id,
        $applications_id,
        $users_id,
        $action,
        $role_id,
        $to_role_id,
        $remark,
        $process_id,
        $to_process_id
    );
    $stmt = $conn->prepare($qry);
    $res = $stmt->execute($params);
    if(!$res){
        //$conn->rollback();
        return array("status"=>false,"msg"=>"Failed to insert into application logs","error"=>$stmt->errorInfo());
    }
    //$conn->commit();
    return array("status"=>true,"msg"=>"Submitted to application log");
}

function getNextPrevRolesAndProcess($conn,$roles_id,$process_id,$application_id,$is_order){
    //check whether application type is order copy or not
    //$is_order = isOrderCopy($conn, $application_id);
    switch ($process_id){
        case 1: 
            $to_process_id = 2;
            break;
        case 2: 
            $to_process_id = 3;
            break;
        case 3: 
            $to_process_id = $is_order=="y"?4:5;
            break;
        case 4:
            $to_process_id = 7;
            break;
        case 5:
            $to_process_id = 6;
            break;
        case 6:
            $to_process_id = 7;
            break;
        case 7:
            $to_process_id = -1;//finish process
            break;
    }   
    $qry = "select * from process_role_map_view  
            where  process_id=? and user_role_id=?";
    $stmt = $conn->prepare($qry);
    $res = $stmt->execute(array($process_id,$roles_id));
    if(!$res || !$stmt->rowCount()){
        return array("status"=>false,"msg"=>"Internal Server Error");
    }
    $rows = $stmt->fetchall(PDO::FETCH_ASSOC);
    foreach ($rows as $row){
        $row['to_process_id'] = ($row['next_role_id']==-1 || $row['next_role_id']==NULL)?$to_process_id:$process_id;
    }
    return array("status"=>true,"previous_role_id"=>$row['previous_role_id'],
        "next_role_id"=>$row['next_role_id'],
        "to_process_id"=>$row['to_process_id']);
}// end of function getNextPrevRolesAndProcess($conn,$roles_id,$process_id,$application_id,$is_order)

//function to check whether an application is for order copy or not, the function returns binary 
function isOrderCopy($conn, $application_id){
    //$qry = "select * from applications where application_id=? and is_order='y'";
    $qry = "select * from applications where application_id=? and certificate_type=1";
    $stmt = $conn->prepare($qry);
    $res = $stmt->execute(array(
        $application_id
    ));
    return ($stmt->rowCount()>0);
}// end of function isOrderCopy($conn, $application_id)

function firstRoleIdProcess($conn, $process_id){
    $qry = "select user_role_id as role_id from process_role_map_view where process_id = ? and user_level = 1";
    $stmt = $conn->prepare($qry);
    $res = $stmt->execute(array($process_id));
    if(!$res || $stmt->rowCount() == 0){
        return array('status'=>false, 'msg'=> 'Internal Server Problem.','error'=>$stmt->errorInfo());
    }
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return array('status'=>true, 'data'=>$rows);
}// end of function firstRoleIdProcess($conn, $process_id)