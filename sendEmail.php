<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Set up email information
    $to = "your_email@example.com"; // Replace with your email address
    $subject = "Contact Form Submission";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your message. We will get back to you soon!";
    } else {
        echo "Something went wrong. Please try again later.";
    }
}
?>
