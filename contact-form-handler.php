<?php
if (isset($_POST['submit']))
{
require 'PHPMailerAutoload.php';
require 'credentials.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                              

$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = EMAIL;                 
$mail->Password = PASS;                           
$mail->SMTPSecure = 'tls';                        
$mail->Port = 587;                                

$mail->setFrom($_POST['email']);
$mail->addAddress('animesh.raj.om@gmail.com');     // Add receiver's email

$mail->isHTML(true);                                 

$mail->Subject = 'Website Contact Form';
$mail->Body    = '<div style="border: 2px solid red"><b>Website Message Notification</b></div><br>Name: '.$_POST['name'].'<br>Email: '.$_POST['email'].'<br>Message: '.$_POST['message'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>