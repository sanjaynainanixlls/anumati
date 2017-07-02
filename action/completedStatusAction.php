<?php
if(!isset($_SESSION))
    session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';


class CompletedStatus{
    
    public  function getCompletedStatus(){
        $userDataHandlerObj = new userDataHandler();
        $result = $userDataHandlerObj->getCompletedStatus();
        return $result;
    }
}



?>
