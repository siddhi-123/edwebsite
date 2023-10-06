
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="assets/images/logo no bg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Login Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">User Password Recover</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Password Recover</div>
                    <div class="card-body">
                        <form action="recover.php" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email_id" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Recover" name="recover">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

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

// require 'credential.php';
// $email = $email; 
$mail = new PHPMailer(true);
$mail->IsSMTP();
// $mail->SMTPAuth = true;       
// $mail->SMTPOptions = array(
//     'ssl' => array(
//     'verify_peer' => false,
//     'verify_peer_name' => false,
//     'allow_self_signed' => true
//     )
//     );          
$mail->SMTPSecure = "ssl";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 486; 
$mail->Username = "siddhi.xackton@gmail.com";   //Enter your username/emailid
$mail->Password = "ipxqjgmfcumplzlq";   //Enter your password
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

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form onsubmit="sendEmail(); reset(); return false;">
            <h3>GIT</h3>
            <input type="text" id="email" placeholder="Email Id" required>
            <input type="hidden">
            <button type="submit">Send</button>
        </form>
    </div>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail() {
            Email.send({
            Host : "smtp.gmail.com",
            Username : "siddhi.xackton@gmail.com",
            Password : "Siddhi@123",
            To : document.getElementById("email").value,
            From : "siddhi.xackton@gmail.com",
            Subject : "This is the subject",
            Body : "And this is the body"
        }).then(
        message => alert(message)
            );
        }
    </script>
</body>
</html> -->