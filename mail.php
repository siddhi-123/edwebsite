<?php
    $to = "siddhimsolanki@gmail.com";
    $subject = "Test mail";
    $message = "Hello! Aap kaise ho?";
    $from = "siddhi.xackton@gmail.com";

    $header = "From: $from";

    mail($to,$subject,$message,$header);
    echo "Mail Sent";
?>