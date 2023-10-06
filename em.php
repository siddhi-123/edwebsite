<?php
include('edconfig.php');
if(isset($_REQUEST['recover']))
{
  $email = $_REQUEST['email_id'];
  $check_email = mysqli_query($conn,"select email_id from users where email_id='$email'");
  $res = mysqli_num_rows($check_email);
  $token = bin2hex(random_bytes(50));

  if($res>0)
  {
    $message = '<div>
     <p><b>Hello!</b></p>
     <p>You are recieving this email because we recieved a password reset request for your account.</p>
     <br>
     <p>Hi there, click on this <a href="new_password.php?token=' . $token . '>link</a> to reset your password on our site</p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>';

include_once("SMTP/class.phpmailer.php");
include_once("SMTP/class.smtp.php");
require 'credential.php';
$email = $email; 
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = EMAIL;   //Enter your username/emailid
$mail->Password = PASS;   //Enter your password
$mail->FromName = "Tech Area";
$mail->AddAddress($email);
$mail->Subject = "Reset Password";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  header('location: pending.php?email=' . $email);
}
}
else
{
  $msg = "We can't find a user with that email address";
}
}?>