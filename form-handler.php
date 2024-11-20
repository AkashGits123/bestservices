<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $service = htmlspecialchars($_POST['service']);
    $type = htmlspecialchars($_POST['type']);
    $username = htmlspecialchars($_POST['username']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    
    // Email configuration
    $to = "Servicecenterhelpline@gmail.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    
    // Email body
    $message = "
        <html>
        <head>
            <title>New Contact Form Submission</title>
        </head>
        <body>
            <h2>Contact Form Details</h2>
            <p><strong>Product/Service:</strong> $service</p>
            <p><strong>Type:</strong> $type</p>
            <p><strong>Name:</strong> $username</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Address:</strong> $address</p>
        </body>
        </html>
    ";
    
    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@servicecenterhelpline.co.in/" . "\r\n"; // Replace with your domain
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your form has been submitted successfully.";
    } else {
        echo "Sorry, there was an error sending your form. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
