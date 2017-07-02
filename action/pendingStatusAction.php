<?php
if(!isset($_SESSION))
    session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';


class PendingStatus{
    
    public  function getPendingStatus(){
        $userDataHandlerObj = new userDataHandler();
        $result = $userDataHandlerObj->getPendingStatus();
        return $result;
    }
}



?>
