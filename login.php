<?php
session_start();
$_SESSION["login"]=0;
$u="";
$success=0;
if(isset($_POST["uname"]))
{
$u=$_POST["uname"];
$p=$_POST["pwd"];
include 'edconfig.php';
$sql="select * from users where uname='$u' and pwd = '$p'";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)==1)
{
	$row=mysqli_fetch_assoc($result);
    if($row['is_verified']==1){
        $_SESSION["login"]=1;
		$_SESSION["uname"]=$u;
		header("Location:home.php");
		$success=1;    
    }
	else //status is "A"
	{
		echo"Please verify your email";
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
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpeg">
    <link rel="stylesheet" href="./assets/css/style2.css">
    <script src="assets/js/loader.js"></script>
    <script src="assets/js/passval.js"></script>
    <title>USER Login</title>
</head>
<body>
<div class="loader"></div>
    <article class="stage">
    <header class="header">
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
        <form action="login.php" method=POST>
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="signup.php"><b>Sign Up</b></a></span>
                <h1 style="text-align:center; color : white ; padding-bottom : 10px ;">User Login</h1>            
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
                <span>Are you an admin? <a href="#">Admin Login</a></span>
                </div> -->
                <div class="two">
                    <label><a href="password.html">Forgot password?</a></label>
                </div>
            </div>
        </div>
</form>
</div>  
</article> 


<!-- <script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";script
    }
   }
 
</script>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
        a.className += " white-btn";
        b.className = "btn";
        x.style.opacity = 1;
        y.style.opacity = 0;
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
        a.className = "btn";
        b.className += " white-btn";
        x.style.opacity = 0;
        y.style.opacity = 1;
    }

</script> -->
<script>
    //     window.onscroll = function() {scrollFunction()};
     
    // function scrollFunction() {
    //   if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        
    //     document.getElementById("header").style.background = "#000";
    //   } else {
       
    //     document.getElementById("header").style.background = "none";
    //   }
    // }
</script>
</body>
</html>
<?php
}
?>