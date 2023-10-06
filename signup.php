<?php
include('edconfig.php');
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

function sendMail($e,$v_code){
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
//   $e = $_REQUEST['email_id'];
$mail->setFrom($email, 'Siddhi - From XACKTON');
$mail->addAddress($e);
$mail->isHTML(true);
$mail->Subject = 'Reset Password';
        $mail->Body    = "Thanks for registration!
        Click the link below to verify the email address
        <a href='http://localhost/edwebsite/verified.php?email_id=$e&v_code=$v_code'>Verify</a>";
    
        $mail->send();{
        return true;
    }
}
    
$id="";
$fn="";
$ln="";
$e="";
$p="";
$cp="";
if(isset($_POST["uname"]))
{
$id=$_POST["uname"];
$fn=$_POST["fname"];
$ln=$_POST["lname"];
$e=$_POST["email_id"];
$p=$_POST["pwd"];
$cp=$_POST["cpwd"];
$v_code=bin2hex(random_bytes(16));
if($p!=$cp){
    echo "<div class=fixed>Passwords do not match</div>";
}else{
$sql="insert into users(uname,fname,lname,email_id,pwd,cpwd,role,verification_code,is_verified) values('$id','$fn','$ln','$e','$p','$cp','user','$v_code','0')";
$result=mysqli_query($conn,$sql);
if($result && sendMail($_POST['email_id'],$v_code))
{
	// echo "<div class=fixed>Registration Successfull. You can login now.</div>";
	// header("Location:login.php");
    echo "<script>
    alert('Registration successful');
    window.location.href='login.php';
    </script>";
}
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpeg">
    <link rel="stylesheet" href="./assets/css/style2.css">
    <script src="assets/js/loader.js"></script>
    <script src="assets/js/passval.js"></script>
    <title>USER Registration</title>
</head>
<body>
<div class="loader"></div>
    <article class="stage">
    <header class="header" id="header">
        <section class="flex">
            <input type="checkbox" id="check">
            <label for="check">
                <i class="fa fa-bars" id="btn"></i>
                <i class="fa fa-times" id="cancel"></i>
            </label>
            <img src="assets/images/logo no bg.png" class="logo">
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="index.php" class="link">Home</a></li>
                <li><a href="courses.html" class="link">Courses</a></li>
                <li><a href="about.html" class="link">About</a></li>
                <li><a href="contact2.php" class="link">Contact</a></li>
                <li><a href="login.php" class="link2"><i class="bx bx-log-in"></i>Login</a></li>
                <li><a href="signup.php" class="link2 active"><i class="fab fa-login"></i>Sign Up</a></li>
            </ul>
        </div>
        </section>
    </header> 
    <div class="wrapper">
    <video autoplay loop muted play-inline class="back-video">
        <source src="assets/images/login-bg2.mp4" type="video/mp4">
        </video>
    <form action="signup.php"  method= POST>
        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="login.php"><b>Login</b></a></span>
                <header style="text-align:center; color : white ; padding-bottom : 10px ;">User Sign Up</header> 
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="uname" id="uname" value="<?=htmlentities($id)?>" placeholder="Username" required="">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" name="fname" id="fname" value="<?=htmlentities($fn)?>" placeholder="Firstname" required="">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" name="lname" id="lname" value="<?=htmlentities($ln)?>" placeholder="Lastname" required="">
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="email_id" id="email_id" value="<?=htmlentities($e)?>" placeholder="Email" required="">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="pwd" id="password" value="<?=htmlentities($p)?>" placeholder="Password" required="" onInput="check()">
                <i class="bx bx-lock-alt"></i>
                <i id="see" onclick="see()" class="fa fa-eye"></i>
                <i id="show" onclick="show()" class="fa fa-question-circle-o"></i>
            </div>
            <div class="pass" id="pass">
                    <div id="count">Length : 0</div>
                    <i id="check0" class="fa fa-check-circle"></i><span>Length more than 5.</span><br>
                    <i id="check1" class="fa fa-check-circle"></i><span>Length not more than 10.</span><br>
                    <i id="check2" class="fa fa-check-circle"></i><span>Contains numerical character.</span><br>
                    <i id="check3" class="fa fa-check-circle"></i><span>Contains special character.</span>
                </div>
            <div class="input-box">
                <input type="password" class="input-field" name="cpwd" id="password2" value="<?=htmlentities($cp)?>" placeholder="Confirm Password" required="">
                <i class="bx bx-lock-alt"></i>
                <i id="see2" onclick="see2()" class="fa fa-eye"></i>
            </div>
            <div class="input-box">
            <input type="submit" class="submit">
            </div>
            <p id = "output"> </p>
            <div class="two-col">
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </div>
    </div> 
</form>
</article>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- <script src="assets/js/script2.js"></script> -->
<script>
        window.onscroll = function() {scrollFunction()};
     
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        
        document.getElementById("header").style.background = "#000";
      } else {
       
        document.getElementById("header").style.background = "none";
      }
    }
</script>
</body>
</html>