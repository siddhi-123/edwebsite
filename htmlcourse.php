<?php
session_start();
include 'edconfig.php';
if(!isset($_SESSION["login"])||$_SESSION["login"]==0)
{
	header("Location:login.php");
}
if(isset($_POST['add_to_cart'])){
   $image = $_POST['image'];
   $course_name = $_POST['course_name'];
   $price = $_POST['price'];
   $file_name = $_POST['file_name'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE course_name = '$course_name' AND uname = '".$_SESSION["uname"]."'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(uname, image, course_name, price, file_name) VALUES('".$_SESSION["uname"]."', '$image', '$course_name', '$price','$file_name')") or die('query failed');
      $message[] = 'Course added to cart!';
   }

};
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Xackton</title>
        <meta name="title" content="Xackton">
        <meta name="description" content="This is an education website ">
        <link rel="stylesheet" href="assets/css/stylehome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">   
        <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpeg">   
        <script src="assets/js/loader.js"></script>
    </head>
    <body id="top">
    <div class="loader"></div>
        <header class="header" id="header">
            <section class="flex">
                <img src="./assets/images/logo no bg.png" class="logo">
          <div class="nav-menu" id="navMenu">
              <ul>
                <li><a href="home.php" class="link">Home</a></li>
                <li><a href="courses.php" class="link">Courses</a></li>
                <li><a href="#" class="link">About</a></li>
                <li><a href="#" class="link">Contact</a></li>
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
      </nav>
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
       <a href="contact.html"><i class="fas fa-headset"></i><span>Contact us</span></a>
       <a href="cart.php"><i class="fas fa-cart-shopping"></i><span>Cart</span></i></a>
    </nav>
    </div>
    <div class="course">
        <h1> WEB DEVELOPMENT</h1>
        <h2>Front End Development</h2>  
          <b>HTML &nbsp; CSS &nbsp; JAVASCRIPT</b>
          <div class="container">
          <div class="image">
          <img src="assets/images/front11.jpg" height="500px" width="550px" class="img"/>
          </div>
      <div class="text"><p>Welcome to XACKTON, your go-to destination for top-notch custom website development services. Our team of experts is dedicated to crafting unique websites that perfectly align with your specific requirements. By leveraging cutting-edge technologies such as HTML, CSS, and JavaScript, we ensure that your website stands out from the crowd.
          
          Furthermore, at XACKTON, we believe in the power of knowledge sharing. We are committed to passing on our skills to future generations who are eager to educate themselves in these valuable fields. That's why our Full Stack Development course is the ideal choice for anyone seeking to acquire these essential skills. 
          
          Join us at XACKTON and embark on a journey of digital transformation. Let us create a visually stunning, fully functional, and user-centric website that not only meets your requirements but also exceeds your expectations. Together, we can build a strong online presence for your business and drive remarkable success in the digital realm.
      </p>
  </div> 
  </div> 
      <div class="back">
          <h2>Back End Development</h2>
          <b>PHP &nbsp; SQL</b>
      </div>
  <div class="container1">    
      <div class="text1"><p>At XACKTON, we specialize in crafting customized, full stack websites that perfectly cater to our clients' unique requirements. Our team of experts harnesses the latest advancements in PHP and SQL technologies to bring your vision to life. We handle everything, from coding and building the database to developing the server and application, recognizing the server's pivotal role as the network's lifeblood.
          
          At XACKTON, we are not just passionate about developing cutting-edge websites; we also thrive on sharing knowledge. We are committed to empowering future generations by imparting our invaluable skills in these fields. That's why our Full Stack Development course is the ultimate choice for individuals eager to acquire these essential skills.
          
          Join us at XACKTON and unlock your potential in the world of full stack web development. Enroll in our comprehensive Full Stack Development course today and pave the way to a successful future.</p>
      </p>
  </div>
  <div class="img1">
      <img src="assets/images/back11.jpg" height="500px" width="550px" class="img2"/>
  </div>
  </div>
<div class="more-btn">
    <div id="toggle-btn" class="fas fa-sun"></div>
</div>

        <footer class="section-p1">
            <div class="col">
                <img class="logo" src="assets/images/logo no bg.png" alt="">
                <h4>Contact</h4>
                <p><strong>Address: </strong> Mumbai = 400 037</p>
                <p><strong>Email Id:</strong><a href="mailto:info@xackton.com">info@xackton.com</a></p>
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
                <a href="index.html">Sign Up</a>
                <a href="index.html">Login</a>
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
        
    </body>
</html>