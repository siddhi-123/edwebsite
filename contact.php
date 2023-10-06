<?php
session_start();
include 'edconfig.php';
if(!isset($_SESSION["login"])||$_SESSION["login"]==0)
{
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpeg">
    <link rel="stylesheet" href="assets/css/stylehome.css">
    <script src="assets/js/loader.js"></script>
</head>
<body>
<div class="loader"></div>
    <header class="header" id="header">
        <section class="flex">
            <img src="./assets/images/logo no bg.png" class="logo">
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="home.php" class="link">Home</a></li>
                    <li><a href="courses.php" class="link">Courses</a></li>
                    <li><a href="#" class="link">About</a></li>
                    <li><a href="contact.php" class="link active">Contact</a></li>
                </ul>
            </div>
           <form action="search.html" method="post" class="search-form">
              <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
              <button type="submit" class="fas fa-search"></button>
           </form>
           <div class="icons">
              <div id="menu-btn" class="fas fa-bars"></div>
              <div id="search-btn" class="fas fa-search"></div>
              <div id="user-btn" class="fas fa-user"></div>
           </div>
     
           <div class="profile">
                <img src="./assets/images/pic-7.jpg" class="image" alt="">
                <?php
            include 'edconfig.php';
        $sql="select fname from users where uname='".$_SESSION["uname"]."'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        { ?>
            <h3 class="name">Welcome,<?php echo " ".$row['fname']; ?></h3>  
            <?php
        }
        ?>
                <a href="profile.php" class="option-btn">view profile</a>
                <div class="flex-btn">
                    <a href="cart.php" class="option-btn">Cart</a>
                    <a href="logout.php" class="option-btn">Logout</a>
                </div>
            </div>
        </section>
    </header>  
     <div class="side-bar">

        <div id="close-btn">
           <i class="fas fa-times"></i>
        </div>
     
        <div class="profile">
           <img src="./assets/images/pic-7.jpg" class="image" alt="">
           <?php
            include 'edconfig.php';
        $sql="select fname,lname from users where uname='".$_SESSION["uname"]."'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        { ?>
            <h3 class="name"><?php echo $row['fname']." ".$row['lname']; ?></h3>  
            <?php
        }
        ?>
        <?php
            include 'edconfig.php';
        $sql="select role from users where uname='".$_SESSION["uname"]."'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        { ?>
            <p class="role"><?php echo $row['role']; ?></p>  
            <?php
        }
        ?>
           <a href="profile.php" class="btn">view profile</a>
        </div>
     
        <nav class="navbar">
           <a href="home.php"><i class="fas fa-home"></i><span>Home</span></a>
           <a href="courses.php"><i class="fas fa-graduation-cap"></i><span>Courses</span></a>
           <a href="about.html"><i class="fas fa-question"></i><span>About</span></a>
           <a href="contact.php"><i class="fas fa-headset"></i><span>Contact us</span></a>
           <a href="cart.php"><i class="fas fa-cart-shopping"></i><span>Cart</span></i></a>
        </nav>
        </div>
        <section id="contact-details" class="section-p1">
       <div class="details">
        <span>GET IN TOUCH</span>
        <h2>Contact Us</h2>
        <h3>Office</h3>
        <div>
            <li>
                <i class="fas fa-location-arrow"></i>
                <p>Mumbai - 400 037</p>
            </li>
            <li>
                <i class="fas fa-envelope"></i>
                <p>info@xackton.com</p>
            </li>
            <li>
                <i class="fas fa-phone"></i>
                <p>Contact - +91 7977837609</p>
            </li>
        </div>
       </div> 
       <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30175.18198150283!2d72.87022885000002!3d19.0242269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cf399d0797f7%3A0xea8535f3c97b3e3e!2sMumbai%2C%20Maharashtra%20400037!5e0!3m2!1sen!2sin!4v1683364310379!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
       </div>
    </section>

    <section id="form-details">
    <?php
    // $rname = "";
    // $email = "";
    // $sub = "";
    // $mess = "";

    if(isset($_POST['rname'])){
    $rname = $_POST['rname'];
    $email = $_POST['email'];
    $sub = $_POST['sub'];
    $mess = $_POST['mess'];
    
    include('edconfig.php');
                        
        $save = "INSERT INTO contact(rname,email,sub,mess) VALUES('$rname','$email','$sub','$mess')";
        $query = mysqli_query($conn,$save);
        if ($query){
            echo "<div class=mess><h1>Thank you for contacting us. &emsp;
            We'll get back to you.</h1></div>";
            // header("Location:contact.php");
        } 
        else{
            echo "Error entering data";
        }
                            
}?>
        <form action=""  method= POST>
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" name="rname" required="" placeholder="Name">
            <input type="text" name="email" required="" placeholder="Email Id">
            <input type="text" name="sub" required="" placeholder="Subject">
            <textarea name="mess" id="" cols="30" rows="4" equired="" placeholder="Your Meassage"></textarea>
            <div class="input-box">
            <input type="submit" class="submit">
            </div>
        </form>
    </section>
<div class="more-btn">
        <div id="toggle-btn" class="fas fa-sun"></div>
</div>
<footer class="section-p1">
    <div class="col">
        <img class="logo" src="./assets/images/logo no bg.png" alt="">
        <h4>Contact</h4>
        <p><strong>Address: </strong> Mumbai = 400 037</p>
        <p><strong>Email Id: </strong><a href="mailto:info@xackton.com">info@xackton.com</a></p>
        <p><strong>Phone: </strong><a href="tel:+917977837609">+91 7977837609</a></p>
    </div>

    <div class="col">
        <h4>About</h4>
        <a href="about.html">About Us</a>
        <a href="#">Careers</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
        <a href="contact2.php">Contact Us</a>
    </div>

    <div class="col">
        <h4>My Account</h4>
        <a href="profile.php">View Profile</a>
        <a href="logout.php">Logout</a>
        <!-- <a href="#">View Cart</a>
        <a href="#">My Wishlist</a>
        <a href="#">Track My Order</a> -->
        <a href="#">Help</a>
    </div>

    <div class="col">
        <h4>Follow Us</h4>
        <div class="icon">
            <a href="https://www.facebook.com/xackton"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/XacktonOfficial"><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/channel/UCh1ORE8jXtSo68Oejxk2inQ"><i class="fab fa-youtube"></i></a>
            <a href="https://www.instagram.com/xackton/"><i class="fab fa-instagram"></i></a>
            <a href="http://wa.me/+917977837609"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>

    <div class="copyright">
        <p>@2023 XACKTON. Design & Developed</p>
    </div>
</footer>
    <script src="assets/js/script2.js"></script>
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