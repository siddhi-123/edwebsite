<!-- <?php
$name="";
$email="";
if(isset($_POST["name"]))
{
$name=$_POST["name"];
$email=$_POST["email"];
include('edconfig.php');
$sql="insert into newsletter(name,email) values('$name','$email')";
$result=mysqli_query($conn,$sql);
if($result)
{
	// echo "<div class=fixed>Registration Successfull. You can login now.</div>";
	header("Location:index.php");
}
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XACKTON | SECURITY IS AN INVESTMENT, NOT AN EXPENSE</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.jpeg">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- custom css link -->
    <link rel="stylesheet" href="assets/css/common.css">

    <!-- header & footer css link-->
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/loader.js"></script>

</head>
<body>
        <div class="loader"></div>
    <!-- header section starts -->

    <header class="header" id="header">
        <section class="flex">
            <input type="checkbox" id="check">
            <label for="check">
                <i class="fa fa-bars" id="btn"></i>
                <i class="fa fa-times" id="cancel"></i>
            </label>
            <img src="assets/images/logo no bg.png" class="logo" onclick="toggleMenu(this)">
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="index.php" class="link active">Home</a></li>
                <li><a href="courses.html" class="link">Courses</a></li>
                <li><a href="about.html" class="link">About</a></li>
                <li><a href="contact2.php" class="link">Contact</a></li>
            </ul>
        </div>
      </section>
      </header>

    <!-- header section ends -->

    <!-- home section starts-->

    <!-- <section class="home" id="home">

        <div class="content">
            <h3>Welcome to XACKTON </h3>
            <p>One stop destination for all your Learnings.</p>
            <a href="courses.html" class="btn">
                <span class="text text-1">Explore more</span>
                <span class="text text-2" aria-hidden="true">Explore more</span>
            </a>    
        </div>

    </section> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/car1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="neonText">Welcome to XACKTON</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/car2.jpeg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="neonText">Learn and advance your career</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/car3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="neonText">Best in class courses available here</h5>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <!-- home section ends -->

    <!-- about section starts -->

    <section class="about" id="about">

        <h1 class="heading">about us</h1>

        <div class="container">

            <figure class="about-image">
                <img src="assets/images/cyber.jpg" alt="" height="500">
                <img src="assets/images/cyber2.jpg" alt="" class="about-img">
            </figure>

            <div class="about-content">
                <h3>XACKTON :</h3>
                <p>XACKTON is a technology startup focused on providing reliable and secure IT solutions. We offer a range of services that cater to the diverse needs of our clients.
                    At XACKTON, we believe in delivering value to our clients by offering state-of-the-art IT services that are affordable and reliable. Our team of experts is dedicated to providing the best customer experience and ensuring that our clients receive the best services possible.</p>
                <p></p>    
                <a href="about.html" class="btn">
                    <span class="text text-1">read more</span>
                    <span class="text text-2" aria-hidden="true">read more</span>
                </a>        
            </div>

        </div>

    </section>

    <!-- about section ends -->

    <!-- subjects section starts -->

    <section class="subjects">

        <h1 class="heading">our popular courses</h1>

        <div class="box-container">

            <div class="box">
                <img src="assets/images/subject-1.png" alt="">
                <h3>development</h3>
                <p>placement ready course</p>
            </div>

            <div class="box">
                <img src="assets/images/subject-2.png" alt="">
                <h3>programming</h3>
                <p>fun & challenging</p>
            </div>

            

            <div class="box">
                <img src="assets/images/subject-4.png" alt="">
                <h3>basics of security</h3>
                <p>visit to cyber world</p>
            </div>

        </div>

    </section>

    <!-- subject section ends -->

    <!-- courses section starts -->

    <section class="courses" id="courses">

        <h1 class="heading">our famous courses</h1>

        <div class="box-container">

            <div class="box">
                <div class="image shine">
                    <a href="fswd.html"><img src="assets/images/course-1.jpg" alt=""></a>
                    
                </div>
                <div class="content">
                    <h3>Full stack web development</h3>
                    <div class="stars">
                        <p> Unleash your potential and become a proficient full stack web developer. Master the art of creating dynamic, interactive, and user-friendly websites from start to finish.</p>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image shine">
                    <a href="technology.html"> <img src="assets/images/course-2.jpg" alt=""></a>
                    
                </div>
                <div class="content">
                    <h3>Programming</h3>
                    <div class="stars">
                        <p>Take your coding skills to new heights with our comprehensive programming courses. Whether you're a beginner or an experienced coder, we have the perfect resources to help you level up your programming game.</p>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="image shine">
                    <a href="cyber.html">  <img src="assets/images/course-3.jpg" alt=""></a>
                    
                </div>
                <div class="content">
                    <h3>Basics of Security</h3>
                    <div class="stars">
                        <p>In today's digital landscape, security is paramount. Discover the fundamental principles of cybersecurity and safeguard your digital assets. Gain a solid foundation in the vital realm of cybersecurity .</p>
                    </div>
                </div>
            </div>


    </section>

    <!-- courses section ends -->

    <!-- reviews section starts -->

    <section class="reviews">
    <h1 class="heading">student's reviews</h1>

<div class="box-container">

   <div class="box">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam, dignissimos consectetur. </p>
      <div class="student">
         <img src="assets/images/pic-2.jpg" alt="">
         <div>
            <h3>john deo</h3>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>
      </div>
   </div>

   <div class="box">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam, dignissimos consectetur. Sed ullam iusto eveniet qui aut quibusdam vero voluptate libero facilis fuga. Eligendi eaque molestiae modi?</p>
      <div class="student">
         <img src="assets/images/pic-3.jpg" alt="">
         <div>
            <h3>john deo</h3>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>
      </div>
   </div>

   <div class="box">
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus, suscipit a. Quibusdam, dignissimos consectetur. Sed ullam iusto eveniet qui aut quibusdam vero voluptate libero facilis fuga. Eligendi eaque molestiae modi?</p>
      <div class="student">
         <img src="assets/images/pic-4.jpg" alt="">
         <div>
            <h3>john deo</h3>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
         </div>
      </div>
   </div>
</div>

    </section>
    <!-- footer section stars -->

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="assets/images/logo no bg.png" alt="">
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
            <h4>Follow Us</h4>
            <div class="icon">
                <a href="https://www.facebook.com/xackton"><i class="fa fa-facebook-f"></i></a>
                <a href="https://twitter.com/XacktonOfficial"><i class="fa fa-twitter"></i></a>
                <a href="https://www.youtube.com/channel/UCh1ORE8jXtSo68Oejxk2inQ"><i class="fa fa-youtube"></i></a>
                <a href="https://www.instagram.com/xackton/"><i class="fa fa-instagram"></i></a>
                <a href="http://wa.me/+917977837609"><i class="fa fa-whatsapp"></i></a>
            </div>
        </div>
        <div class="col">
            <h4>Newsletter</h4>
            <div class="box">
                <form class="newsletter" action="index.php" method="POST">
                    <label>Name</label> 
                    <input type="text" name="name" value="<?=htmlentities($name)?>"><br>
                   <label>Email Id </label>
                   <input type="email" name="email" value="<?=htmlentities($email)?>"><br><br>
                    <input type="submit" value="subscribe" class="sub">
                </form>
            </div>
        </div>
    
        <div class="copyright">
            <p>@2023 XACKTON. Design & Developed</p>
        </div>
    </footer>

    <!-- footer section ends -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- custom js -->
    <script src="js/script.js"></script>
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