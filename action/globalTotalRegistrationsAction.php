<?php
if(!isset($_SESSION))
    session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';


class GlobalTotalRegistrations{
    
    public  function getGlobalTotalRegistrations(){
        $userDataHandlerObj = new userDataHandler();
        $result = $userDataHandlerObj->getGlobalTotalRegistrations();
        return $result;
    }
}



?>
