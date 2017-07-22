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
                include 'generatePDF.php';
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
        else if ($this->postParams['action'] == 'sangatRegistration') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->sangatRegistration($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['message'] = "Registration Done Successfully.";
                header("location: ../sangatRegistration.php");
            }
        }
        else if ($this->postParams['action'] == 'getSangatByMobileNumber') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->getSangatByMobileNumber($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['sangatDetails'] = $result;
                $_SESSION['message'] = "Details Found.";
                header("location: ../sangatDetail.php");
            }
            else {
                $_SESSION['message'] = "No Detail Found. Please enter correct mobile number.";
                header("location: ../searchRegistration.php");
            }
        }
        else if($this->postParams['action'] == 'generatePass'){
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->generateAnumatiPass($this->postParams);
            if (!empty($result)) {
                session_start();
                require_once('../mpdf/mpdf.php');
                require_once('../phpmailer/class.phpmailer.php');
                require_once('../phpmailer/class.smtp.php');
                ob_start();  // start output buffering
                $mpdf = new mPDF();
                $content = $this->postParams['printHtml'];
                $stylesheet = '<style>'.file_get_contents('pdf.css').'</style>';
                $mpdf->SetDisplayMode('fullpage');
                $mpdf->WriteHTML($stylesheet,1);
                $mpdf->WriteHTML($content,2);
                $emailAttachment = $mpdf->Output('file.pdf', 'S');
                $mail = new PHPMailer(); // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = "smtp.zoho.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "sanjaynainani@xcelerators.biz";
                $mail->Password = "sanjay@2049";
                $bodytext = "Check Email"; //
                $mail->From      = 'sanjaynainani@xcelerators.biz';
                $mail->FromName  = 'admin';
                $mail->Subject   = 'Important from Shri Anandpur';
                $mail->Body      = $bodytext;
                $mail->AddAddress($this->postParams['email']);
                $mail->AddStringAttachment($emailAttachment, 'file.pdf');
                if($mail->Send()){
                    $_SESSION['content'] = $content;
                    $_SESSION['message'] = "Registration Successful. Anumati Pass Sent to registered email";
                    header("location: ../searchRegistration.php");
                }
                else{
                    $_SESSION['message'] = "Registration Successful. But Anumati Pass Not Sent on the given email.";
                    header("location: ../searchRegistration.php");
                }
            }
            else {
                $_SESSION['message'] = "Failure";
                header("location: ../searchRegistration.php");
            }
        }
    }

}

$ActionObj = new Action();
$ActionObj->execute();
?>
