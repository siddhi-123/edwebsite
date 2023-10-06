<?php
session_start();
$_SESSION["login"]=0;
$u="";
$success=0;
if(isset($_POST["uname"]))
{
$u=$_POST["uname"];
$p=md5($_POST["pwd"]);
include 'edconfig.php';
$sql="select * from admin where uname='$u' and pwd = '$p'";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)==1)
{
	$row=mysqli_fetch_assoc($result);
	if ($row["status"]=="I")
	echo "<div class=fixed> Account is Inactivated by the Admin </div>";
	else //status is "A"
	{
		$_SESSION["login"]=1;
		$_SESSION["uname"]=$u;
		header("Location:admin.php");
		$success=1;
	}
}
else
{
	echo "<div class=fixed>	INVALID username and/or password </div>";
}
}
if($success==0)
{
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
    <link rel="stylesheet" href="./assets/css/style2.css">
    <script src="passval.js"></script>
    <script src="assets/js/loader.js"></script>
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpeg">
    <title>ADMIN Login</title>
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
                <li><a href="signup.php" class="link2"><i class="fab fa-login"></i>Sign Up</a></li>
            </ul>
        </div>
        </section>
    </header>

<!----------------------------- Form box ----------------------------------->    
<div class="wrapper">
<video autoplay loop muted play-inline class="back-video">
        <source src="assets/images/login-bg2.mp4" type="video/mp4">
        </video>
        
        <!------------------- login form -------------------------->
        <form action="adlogin.php" method=POST>
        <div class="login-container" id="login">
                <div class="top">
                <span>Want to Login as User? <a href="login.php"><b>Login</b></a></span>
                <!-- <h1 style="text-align:center; color : white ; padding-bottom : 10px ;">User Login</h1> -->
                <h1 style="text-align:center; color : white ; padding-bottom : 10px ;">Admin Login</h1>            
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name=uname value="<?php echo $u;?>" placeholder="Username">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name=pwd id="password" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
                <i id="see" onclick="see()" class="fa fa-eye"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Sign In">
            </div>
            <div class="two-col">
                <!-- <div class="one">
                <span>Are you an admin? <a href="adlogin.php">Admin Login</a></span>
                </div> -->
                <div class="two">
                    <label><a href="forgetadpass.php">Forgot password?</a></label>
                </div>
            </div>
        </div>
</form>
</div>  
</article>
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
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bx-low');
    });
</script>
</body>
</html>
<?php
}
?>