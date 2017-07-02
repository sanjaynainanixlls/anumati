<?php
if(!isset($_SESSION))
    session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';

class Action {

    private $postParams;

    public function execute() {
        $this->postParams = Functions::getPostParams();
        if ($this->postParams['action'] == 'login') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->authenticateUser($this->postParams['username'], $this->postParams['pwd']);
            if (!empty($result)) {
                $_SESSION["user"] = $result[0]['username'];
                $_SESSION["role"] = $result[0]['role'];
                $_SESSION["userId"] = $result[0]['id'];
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'ADMIN')
                    header("location: ../home.php");
                else if (isset($_SESSION['role']) && $_SESSION['role'] == 'RECEPTION') {
                    header("location: ../dataEntry.php");
                }
                else if (isset($_SESSION['role']) && $_SESSION['role'] == 'DATAENTRY') {
                    header("location: ../globalRegistrations.php");
                }
                else if (isset($_SESSION['role']) && $_SESSION['role'] == 'TESTING') {
                    header("location: ../testing.php");
                } 
            } else {
                $_SESSION['error'] = "Invalid Username or Password!";
                header("location: ../index.php");
            }
        } else if ($this->postParams['action'] == 'register') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->registerUser($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['message'] = "Registration Done Successfully.";
                header("location: ../dataEntry.php");
            }
            else {
                $_SESSION['message'] = "Registration Failed. Please try again.";
                header("location: ../dataEntry.php");
            } 
        }
        else if($this->postParams['action'] == 'testing'){
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->testing($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['message'] = "Registration Done Successfully.";
                header("location: ../testing.php");
            }
            else {
                $_SESSION['message'] = "Registration Failed. Please try again.";
                header("location: ../testing.php");
            } 
        }  
        else if ($this->postParams['action'] == 'markAsDone') {
                $userDataHandlerObj = new userDataHandler();
                $result = $userDataHandlerObj->markAsDone($this->postParams['id']);
                if ($result) {
                    session_start();
                    $_SESSION['message'] = "Registration Completed.";
                    header("location: ../globalPendingRegistrations.php");
                }
        }
    }

}

$ActionObj = new Action();
$ActionObj->execute();
?>
