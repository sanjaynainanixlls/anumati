<?php
if(!isset($_SESSION))
    session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';


class GlobalPendingRegistrations{
    
    public  function getGlobalPendingRegistrations(){
        $userDataHandlerObj = new userDataHandler();
        $result = $userDataHandlerObj->getGlobalPendingRegistrations();
        return $result;
    }
}



?>
