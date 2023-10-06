<?php include('edconfig.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  -->
    <script src="assets/js/loader.js"></script>
	<link rel="stylesheet" href="assets/css/pass.css">
	<title>Password Reset PHP</title>
</head>
<body>
	<div class="bgAnimation" id="bgAnimation">
        <div class="backgroundAmim">
            
        </div>
    </div>
	<div class="success2">
	<form class="login-form" action="login.php" method="post">
		<p>
			We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. Please login into your email account and click on the link we sent to reset your password.
	<br><p><a class="button" href="login.php">Home</a></p>
		</form>
	</div>
	<script src="assets/js/success.js"></script>
</body>
</html>