<?php
session_start();
include 'edconfig.php';
if(!isset($_SESSION["login"])||$_SESSION["login"]==0)
{
	header("Location:login.php");
}
// if(isset($_POST['add_to_cart'])){
//    $image = $_POST['image'];
//    $course_name = $_POST['course_name'];
//    $price = $_POST['price'];

//    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE course_name = '$course_name' AND uname = '".$_SESSION["uname"]."'") or die('query failed');

//    if(mysqli_num_rows($select_cart) > 0){
//       $message[] = 'product already added to cart!';
//    }else{
//       mysqli_query($conn, "INSERT INTO `cart`(uname, image, course_name, price) VALUES('".$_SESSION["uname"]."', '$image', '$course_name', '$price')") or die('query failed');
//       $message[] = 'Course added to cart!';
//    }

// };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
                    <li><a href="about2.php" class="link">About</a></li>
                </ul>
            </div>
           <!-- <form action="search.html" method="post" class="search-form">
              <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
              <button type="submit" class="fas fa-search"></button>
           </form> -->
           <div class="icons">
              <div id="menu-btn" class="fas fa-bars"></div>
              <!-- <div id="search-btn" class="fas fa-search"></div> -->
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
           <a href="about2.php"><i class="fas fa-question"></i><span>About</span></a>
           <!-- <a href="contact.html"><i class="fas fa-headset"></i><span>Contact us</span></a> -->
           <a href="cart.php"><i class="fas fa-cart-shopping"></i><span>Cart</span></i></a>
        </nav>
        </div>
        <section class="courses">

   <h1 class="heading">My courses</h1>
   <div class="box-container">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `cart` WHERE uname = '".$_SESSION["uname"]."'") or die('query failed');
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="box">
            <div class="thumb"><img src="assets/images/<?php echo $row['image']; ?>" alt=""></div>
                <h3 class="title"><?php echo $row['course_name']; ?></h3>
                    <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                    <input type="hidden" name="course_name" value="<?php echo $row['course_name']; ?>">
                    <a href="<?php echo $row['file_name']?>" class="btn">Proceed to Learn</a>
            </div>
         <?php }?>
         </div>
         </div>
    <h1 class="heading">our courses</h1>
    <div class="box-container">
         <?php
        $result = mysqli_query($conn, "SELECT * FROM `courses`") or die('query failed');
        if (mysqli_num_rows($result) > 0) {
            $sn=1;
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="box">
            <div class="thumb"><img src="assets/images/<?php echo $row['image']; ?>" alt=""></div>
                <h3 class="title"><?php echo $row['course_name']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                    <b><div class="price">Rs.<?php echo $row['price']; ?></div></b>
            <div class="hide">
                <h2><?php echo $row['course_name']; ?></h2><br>
                <h3><?php echo $row['content']; ?></h3>
                <!-- <input type="submit" value="add to cart" name="add_to_cart" class="btn2"> -->
                <a href="<?php echo $row['overview_file']; ?>"><button class="btn2">Read More</button></a>
            </div>
            </div>
        <?php }}?>
        </div>
        </div>
   <!-- <div class="more-btn">
      <a href="courses.php" class="inline-option-btn">view all courses</a>
   </div>
         </div> -->

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
        <a href="about2.php">About Us</a>
        <a href="#">Careers</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
        <!-- <a href="contact2.php">Contact Us</a> -->
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
    
</body>
</html>