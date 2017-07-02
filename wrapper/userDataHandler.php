<?php

class userDataHandler {

    public static function authenticateUser($user, $pwd) {
        $query = "SELECT username, role, id FROM user WHERE username = '" . $user . "' AND password = '" . ($pwd) . "'";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public static function registerUser($data) {
        $data['username'] = $_SESSION['user'];
        $query = "INSERT into register(Arrival_date,Departure_date,Incharge_Name,Incharge_Gender,Incharge_Mobile,Address,City,State,Email_Id,Males_Count,Females_Count,Children_Count,Member_Name_1,Gender_1,Age_1,Mobile_1,Member_Name_2,Gender_2,Age_2,Mobile_2,Member_Name_3,Gender_3,Age_3,Mobile_3,Member_Name_4,Gender_4,Age_4,Mobile_4,Member_Name_5,Gender_5,Age_5,Mobile_5,Vehicle_Type,via,created_by,created_at,done) VALUES('".$data['arrivalDate']."','".$data['departureDate']."','".$data['inchargeName']."','".$data['gender']."','".$data['mobileNumber']."','".$data['address']."','".$data['city']."','".$data['state']."','".$data['email']."',".$data['numberOfMales'].",".$data['numberOfFemales'].",".$data['numberOfChildren'].",'".$data['textinput1']."','".$data['selectbasic1']."','".$data['Age1']."','".$data['mobile1']."','".$data['textinput2']."','".$data['selectbasic2']."','".$data['Age2']."','".$data['mobile2']."','".$data['textinput3']."','".$data['selectbasic3']."','".$data['Age3']."','".$data['mobile3']."','".$data['textinput4']."','".$data['selectbasic4']."','".$data['Age4']."','".$data['mobile4']."','".$data['textinput5']."','".$data['selectbasic5']."','".$data['Age5']."','".$data['mobile5']."','".$data['vehicle_type']."','".$data['from']."','".$data['username']."',now(),'0')";
        $result = queryRunner::doInsert($query);

        return $result;
    }

    public static function testing($data) {
        $data['username'] = $_SESSION['user'];
        $query = "INSERT into testing(Arrival_date,Departure_date,Incharge_Name,Incharge_Gender,Incharge_Mobile,Address,City,State,Email_Id,Males_Count,Females_Count,Children_Count,Member_Name_1,Gender_1,Age_1,Mobile_1,Member_Name_2,Gender_2,Age_2,Mobile_2,Member_Name_3,Gender_3,Age_3,Mobile_3,Member_Name_4,Gender_4,Age_4,Mobile_4,Member_Name_5,Gender_5,Age_5,Mobile_5,Vehicle_Type,via,created_by,created_at,done) VALUES('".$data['arrivalDate']."','".$data['departureDate']."','".$data['inchargeName']."','".$data['gender']."','".$data['mobileNumber']."','".$data['address']."','".$data['city']."','".$data['state']."','".$data['email']."',".$data['numberOfMales'].",".$data['numberOfFemales'].",".$data['numberOfChildren'].",'".$data['textinput1']."','".$data['selectbasic1']."','".$data['Age1']."','".$data['mobile1']."','".$data['textinput2']."','".$data['selectbasic2']."','".$data['Age2']."','".$data['mobile2']."','".$data['textinput3']."','".$data['selectbasic3']."','".$data['Age3']."','".$data['mobile3']."','".$data['textinput4']."','".$data['selectbasic4']."','".$data['Age4']."','".$data['mobile4']."','".$data['textinput5']."','".$data['selectbasic5']."','".$data['Age5']."','".$data['mobile5']."','".$data['vehicle_type']."','".$data['from']."','".$data['username']."',now(),'0')";
        $result = queryRunner::doInsert($query);

        return $result;
    }

    

    //get complete status form guest table
    public  function getCompleteStatus() {
        $query = "SELECT * FROM register where City = '".$_SESSION['user']."' ORDER BY created_at DESC";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    //get pending status form guest table
    public  function getPendingStatus() {
        $query = "SELECT * FROM register where City = '".$_SESSION['user']."'  AND done = '0' ORDER BY created_at DESC";
        $result = queryRunner::doSelect($query);
        return $result;
    }
    
    //get completed status form guest table
    public  function getCompletedStatus() {
        $query = "SELECT * FROM register where City = '".$_SESSION['user']."'  AND done = '1' ORDER BY created_at DESC";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    //get completed status form guest table
    public  function getGlobalCompletedRegistrations() {
        $query = "SELECT * FROM register where done = '1' ORDER BY created_at DESC";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    //get completed status form guest table
    public  function getGlobalTotalRegistrations() {
        $query = "SELECT * FROM register ORDER BY created_at DESC";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    //get completed status form guest table
    public  function getGlobalPendingRegistrations() {
        $query = "SELECT * FROM register where done = '0' ORDER BY created_at DESC";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public  function getCompleteInventoryAlotted() {
        $query = "SELECT * FROM inventory where isReturned = '0'";
        $result = queryRunner::doSelect($query);
        return $result;
    }
}

?>