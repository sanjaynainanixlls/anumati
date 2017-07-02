<?php
if(!isset($_SESSION))
    session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';


class GlobalCompletedRegistrations{
    
    public  function getGlobalCompletedRegistrations(){
        $userDataHandlerObj = new userDataHandler();
        $result = $userDataHandlerObj->getGlobalCompletedRegistrations();
        return $result;
    }
}



?>
