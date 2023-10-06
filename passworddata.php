<?php
session_start();
// $email2="";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;


require_once 'vendor/autoload.php';
require_once 'class-db.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

$mail->SMTPAuth = true;
$mail->AuthType = 'XOAUTH2';

$email = 'siddhi.xackton@gmail.com'; // the email used to register google app
$clientId = '934320167337-n7bgqe6mdodfe23d5dbroi5lc2ibilmk.apps.googleusercontent.com';
$clientSecret = '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';

$db = new DB();
$refreshToken = $db->get_refresh_token();

//Create a new OAuth2 provider instance
$provider = new Google(
    [
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
    ]
);

//Pass the OAuth provider instance to PHPMailer
$mail->setOAuth(
    new OAuth(
        [
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email,
        ]
    )
);
// if(isset($_REQUEST['recover']))
// {
//   $email2 = $_REQUEST['email_id'];
include('edconfig.php');
if(isset($_REQUEST['recover']))
{
  $email2 =  $_REQUEST['email_id'];
  $check_email = mysqli_query($conn,"select email_id from users where email_id='$email2'");
  $res = mysqli_num_rows($check_email);
  $token = bin2hex(random_bytes(50));

  if($res>0)
  {
    $sql = "INSERT INTO password_reset(email_id, token) VALUES ('$email2', '$token')";
    $results = mysqli_query($conn, $sql);
    $message = "<div>
     <p><b>Hello!</b></p>
     <p>You are recieving this email because we recieved a password reset request for your account.</p>
     <br>
     <p>Hi there, click on this <a href='http://localhost/edwebsite/new_password.html?token=$token'>link</a> to reset your password on our site</p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>";
$mail->setFrom($email, 'Siddhi - From XACKTON');
$mail->addAddress($email2);
$mail->isHTML(true);
$mail->Subject = 'Reset Password';
$mail->Body = $message;

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('location: pending.php?email=' . $email2);
}
  }
}

if(isset($_POST['change-password'])){
    $email2 = $_POST['email_id'];
    $password =  $_POST['pwd'];
    $cpassword = $_POST['cpwd'];
    if($password !== $cpassword){
        echo "Confirm password not matched!";
    }else{
        $update_pass = "UPDATE users SET pwd = '$password', cpwd = '$cpassword' WHERE email_id = '$email2'";
        $run_query = mysqli_query($conn, $update_pass);
        if($run_query){
            header("Location:psuccess.html");
        }else{
            echo "Failed to change your password!";
        }
    }
}
// }