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
                    header("location: ../home.php");
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
            $result = $userDataHandlerObj->getFamilyInchargeDetailsByMobileNumber($this->postParams);
            if (!empty($result)) {
                $this->postParams['inchargeId'] = $result[0]['inchargeId'];
                $result2 = $userDataHandlerObj->getFamilyMembersByFamilyInchargeId($this->postParams);
                $_SESSION['familyInchargeDetails'] = $result[0];
                $_SESSION['familyMemberDetails'] = $result2;
                $_SESSION['message'] = "Details Found.";
                header("location: ../sangatDetail.php");
            }
            else {
                $distinctInchargeIdByMemberMobileNumber = $userDataHandlerObj->getDistinctInchargeIdByMemberMobileNumber($this->postParams);
                if(sizeof($distinctInchargeIdByMemberMobileNumber) == 1){
                    $this->postParams['inchargeId'] = $distinctInchargeIdByMemberMobileNumber[0]['inchargeId'];
                    $familyInchargeDetails = $userDataHandlerObj->getFamilyInchargeDetailsById($this->postParams);
                    $familyMemberDetails = $userDataHandlerObj->getFamilyMembersByFamilyInchargeId($this->postParams);
                    $_SESSION['familyInchargeDetails'] = $familyInchargeDetails[0];
                    $_SESSION['familyMemberDetails'] = $familyMemberDetails;
                    $_SESSION['message'] = "Details Found.";
                    header("location: ../sangatDetail.php");
                }
                else{
                    $_SESSION['message'] = "Bad data. Please contact admin for this issue.";
                    header("location: ../sangatDetail.php");
                }
            }
        }
        else if ($this->postParams['action'] == 'familyRegistration') {
            $userDataHandlerObj = new userDataHandler();
            $this->postParams['createdBy'] = $_SESSION['user'];
            $result = $userDataHandlerObj->familyRegistration($this->postParams);
            if (!empty($result)) {
                session_start();
                $result2 = $userDataHandlerObj->getNewlyCreatedFamilyInchargeId($this->postParams);
                $this->postParams['inchargeId'] = $result2[0]['inchargeId'];
                if($this->postParams['count'] > 0)
                {
                    $result3 = $userDataHandlerObj->saveFamilyMembers($this->postParams);
                    if (!empty($result3)) {
                        $_SESSION['message'] = "Family Members Saved.";
                        header("location: ../home.php");
                    }
                    else{
                        $_SESSION['message'] = "Family Members Save failed.";
                        header("location: ../home.php");
                    }
                }
                else{
                    $_SESSION['message'] = "Family Incharge Details Saved.";
                    header("location: ../home.php");
                }
            }
            else {
                $_SESSION['message'] = "Failed incharge registration.";
                header("location: ../home.php");
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
                $bodytext = "Your Anumati Pass has been registered in Shri Anandpur. Please take the print of the attached anumati pass to avoid long queues at Shri Anandpur."; //
                $mail->From      = 'sanjaynainani@xcelerators.biz';
                $mail->FromName  = 'Anumati Pass Sewa';
                $mail->Subject   = 'Anumati Pass for '. $this->postParams['name'];
                $mail->Body      = $bodytext;
                $mail->AddAddress($this->postParams['email']);
                $mail->AddStringAttachment($emailAttachment, 'anumati-pass.pdf');
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
        else if($this->postParams['action'] == 'generateAnumatiPass'){
            $success = false;
            $userDataHandlerObj = new userDataHandler();
            $this->postParams['anumatiPassNumber'] = time();
            $this->postParams['createdBy'] = $_SESSION['user'];
            
            if(isset($this->postParams['memberIdForAnumatiPass'])){
                $familyMemberIds = $this->postParams['memberIdForAnumatiPass'];
                foreach ($familyMemberIds as $familyMemberId){ 
                    $this->postParams['isIncharge'] = 0;
                    if($this->postParams['inchargeId'] == $familyMemberId){
                        $this->postParams['isIncharge'] = 1;
                    }
                    $this->postParams['memberId'] = $familyMemberId;
                    $result = $userDataHandlerObj->generateAnumatiPass($this->postParams);
                    if(!empty($result)){
                        $success = true;
                    }
                }
            }
            if($success){
                $anumatiPassDetails = $userDataHandlerObj->getAnumatiPassDetailsByNumber($this->postParams);
                $inchargeDetails = $userDataHandlerObj->getFamilyInchargeDetailsById($this->postParams);
                foreach ($anumatiPassDetails as $anumatiPassDetail){ 
                    $memberDetail = $userDataHandlerObj->getMemberDetailById($anumatiPassDetail);
                    $memberDetails[] = $memberDetail[0];
                }
                $_SESSION['anumatiPassDetails'] = $anumatiPassDetails;
                $_SESSION['inchargeDetails'] = $inchargeDetails[0];
                $_SESSION['memberDetails'] = $memberDetails;
                $_SESSION['message'] = "Anumati Pass Generated Successfully";
                header("location: ../home.php");
            }
            else{
                $_SESSION['message'] = "There was some error while generating anumati pass. Please try after some time.";
                header("location: ../home.php");
            }
        }
        else if($this->postParams['action'] == 'sendMail'){
            echo json_encode(array("sendSuccess"=>'successfuly registered'));
        }

    }

}

$ActionObj = new Action();
$ActionObj->execute();
?>
