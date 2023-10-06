<?php
// Include the database connection file
include 'edconfig.php';

session_start();
if(!isset($_SESSION["login"])||$_SESSION["login"]==0)
{
	header("Location:adlogin.php");
}

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($conn, "DELETE FROM users WHERE id = $id");

// Redirect to the main display page (index.php in our case)
header("Location:admin.php");

?>