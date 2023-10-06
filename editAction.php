<?php
// Include the database connection file
include 'edconfig.php';
session_start();
if(!isset($_SESSION["login"])||$_SESSION["login"]==0)
{
	header("Location:adlogin.php");
}
if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email_id']);	
	
	// Check for empty fields
	if (empty($fname) || empty($lname) || empty($email)) {
		if (empty($fname)) {
			echo "<font color='red'>fname field is empty.</font><br/>";
		}
		
		if (empty($lname)) {
			echo "<font color='red'>lname field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($conn, "UPDATE users SET `fname` = '$fname', `lname` = '$lname', `email_id` = '$email' WHERE `id` = $id");
		
		// Display success messlname
		// echo "<p><font color='green'>Data updated successfully!</p>";
		// echo "<a href='admin.php'>Home Page</a>";
		// header("Location:admin.php");
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
                    <li><a href="admin.php" class="link active">Home</a></li>
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
              <div id="toggle-btn" class="fas fa-sun"></div>
           </div>
     
           <div class="profile">
                <img src="./assets/images/pic-7.jpg" class="image" alt="">
                <?php
            include 'edconfig.php';
        $sql="select fname from admin where uname='".$_SESSION["uname"]."'";
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
                    <a href="logout2.php" class="option-btn">Logout</a>
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
        $sql="select fname,lname from admin where uname='".$_SESSION["uname"]."'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        { ?>
            <h3 class="name"><?php echo $row['fname']." ".$row['lname']; ?></h3>  
            <?php
        }
        ?>
           <a href="profile.php" class="btn">view profile</a>
        </div>
     
        <nav class="navbar">
           <a href="admin.php"><i class="fas fa-home"></i><span>Home</span></a>
           <a href="courses.html"><i class="fas fa-graduation-cap"></i><span>Courses</span></a>
           <a href="about.html"><i class="fas fa-question"></i><span>About</span></a>
           <a href="contact.html"><i class="fas fa-headset"></i><span>Contact us</span></a>
           <a href="cart.php"><i class="fas fa-cart-shopping"></i><span>Cart</span></i></a>
        </nav>
        </div>
        <!-- <section class="courses">
        <h2>Edit Data</h2>
	
	<form name="edit" method="post" action="editAction.php">
		<table border="0">
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="fname" value="<?php echo $fname; ?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lname" value="<?php echo $lname; ?>"></td>
			</tr>
			<tr> 
				<td>Email Id</td>
				<td><input type="text" name="email_id" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</section> -->

<section class="courses">
	<?php
echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='admin.php'>Home Page</a>";?>
</section>
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
        <a href="logout2.php">Logout</a>
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
    }<?php
}
}
?>
</script>
</body>
</html>