<?php
include dirname(dirname(__FILE__)) . '/sewa.ssdndeepu.com/config/config.php';
require_once('mpdf/mpdf.php');
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/class.smtp.php');
ob_start();  // start output buffering
include 'renderPDF.php';
$content = ob_get_clean(); // get content of the buffer and clean the buffer
$mpdf = new mPDF();
$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($content);
$mpdf->Output('my.pdf'); // output as inline content


$email = new PHPMailer();
$email->IsSMTP();
$email->SMTPAuth = true;
$email->Host = "smtp.zoho.com";
$email->Port = 587; //or port 25
$email->Username = "admin@ssdndeepu.com";
$email->Password = "pa88word";
$bodytext = "This is a test mail."; //
$email->From      = 'admin@ssdndeepu.com';
$email->FromName  = 'admin';
$email->Subject   = 'Anumati Pass';
$email->Body      = $bodytext;
$query = "SELECT * FROM testing ORDER BY ID desc LIMIT 1";
$result = queryRunner::doSelect($query);
$totalCount=$result[0]['Males_Count']+$result[0]['Females_Count']+$result[0]['Children_Count'];
$email->AddAddress(result[0]['Email_Id']);

$file_to_attach = 'my.pdf';

$email->AddAttachment( $file_to_attach , 'Result.pdf' );
if($email->Send()) {
    $_SESSION['message'] = "Message sent!";
    header("location: testing.php");
} else {
    $_SESSION['message'] = "Mailer Error: " . $email->ErrorInfo;;
    header("location: testing.php");
}

?>
