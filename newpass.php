<?php
// Retrieve the user's email address from the form submission
$email = $_POST['email_id'];

// Generate a unique token for password reset
$token = generateUniqueToken();

// Store the token in the database or any other data source
storeTokenInDatabase($email, $token);

// Compose the email
$to = $email;
$subject = 'Password Reset';
$message = 'Click the following link to reset your password: http://localhost/edwebsite/index.php?email_id=' . urlencode($email) . '&token=' . urlencode($token);
$headers = 'From: siddhi.xackton@gmail.com' . "\r\n" .
           'Reply-To: siddhi.xackton@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

// Send the email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully. Please check your inbox for further instructions.";
} else {
    echo "Error sending email.";
}

// Function to generate a unique token
function generateUniqueToken() {
    return bin2hex(random_bytes(32));
}

// Function to store the token in the database
function storeTokenInDatabase($email, $token) {
    // Connect to the database (replace with your own database credentials)
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'edwebsite';

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Store the token in the database
    $sql = "INSERT INTO password_reset_tokens (email_id, token) VALUES ('$email', '$token')";

    if (mysqli_query($conn, $sql)) {
        echo "Token stored successfully.";
    } else {
        echo "Error storing token: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>